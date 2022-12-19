<?php
/**
 * Custom Search Route
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function ms_search_route() {
  $args = array(
    'methods' => WP_REST_Server::READABLE, //it's a Get method
    'callback' => 'ms_search_results'
  );
  register_rest_route('music-school/v1', 'search', $args);
}

function ms_search_results($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'professor', 'program', 'event', 'campus'),
    'posts_per_page' => -1,
    's'         => sanitize_text_field($data['term'])
  ));

  $results = array(
    'general_info'    => array(),
    'professors'      => array(),
    'programs'        => array(),
    'events'          => array(),
    'campuses'        => array()
  );

  if ($mainQuery->have_posts()) :
    while ($mainQuery->have_posts()) :
      $mainQuery->the_post();

      if (get_post_type() === 'post' || get_post_type() === 'page') :
        array_push($results['general_info'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
        ));
      endif;

      if (get_post_type() === 'professor') :
        array_push($results['professors'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
        ));
      endif;

      if (get_post_type() === 'program') :
        array_push($results['programs'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
        ));
      endif;

      if (get_post_type() === 'event') :
        array_push($results['events'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
        ));
      endif;

      if (get_post_type() === 'campus') :
        array_push($results['campuses'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
        ));
      endif;

    endwhile;
  endif;

  return $results;
}

add_action('rest_api_init', 'ms_search_route');
