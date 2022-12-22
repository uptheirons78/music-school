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
    'generalInfo'     => array(),
    'professors'      => array(),
    'programs'        => array(),
    'events'          => array(),
    'campuses'        => array()
  );

  if ($mainQuery->have_posts()) :
    while ($mainQuery->have_posts()) :
      $mainQuery->the_post();

      if (get_post_type() === 'post' || get_post_type() === 'page') :
        array_push($results['generalInfo'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
          'author'      => get_the_author()
        ));
      endif;

      if (get_post_type() === 'professor') :
        array_push($results['professors'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
          'image'       => get_the_post_thumbnail_url(0, 'professorPortrait') // 0 is for current post
        ));
      endif;

      if (get_post_type() === 'program') :
        array_push($results['programs'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
          'id'          => get_the_ID()
        ));
      endif;

      if (get_post_type() === 'event') :
        $eventDate = new DateTime(get_field('event_date'));
        $date = $eventDate->format('d M, Y');
        $description = NULL;

        if (has_excerpt()) :
          $description = get_the_excerpt();
        else :
          $description = wp_trim_words( get_the_content(), 18, '');
        endif;

        array_push($results['events'], array(
          'type'        => get_post_type(),
          'title'       => get_the_title(),
          'permalink'   => get_the_permalink(),
          'date'        => $date,
          'description' => $description
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

  if (!empty($results['programs'])) {

    $programsMetaQuery = array('relation' => 'OR');

    foreach ($results['programs'] as $item) {
      array_push($programsMetaQuery, array(
        'key'       => 'related_program',
        'compare'   => 'LIKE',
        'value'     => '"' . $item['id'] . '"',
      ));
    }

    $programRelationshipQuery = new WP_Query(array(
      'post_type' => 'professor',
      'meta_query' => $programsMetaQuery
    ));

    if ($programRelationshipQuery->have_posts()) :
      while($programRelationshipQuery->have_posts()) :
        $programRelationshipQuery->the_post();
        if (get_post_type() === 'professor') :
          array_push($results['professors'], array(
            'type'        => get_post_type(),
            'title'       => get_the_title(),
            'permalink'   => get_the_permalink(),
            'image'       => get_the_post_thumbnail_url(0, 'professorPortrait') // 0 is for current post
          ));
        endif;
      endwhile;
    endif;

    // Clean the results array from duplicates
    $results['professors'] = array_values(array_unique($results['professors'], SORT_REGULAR));

  }




  return $results;
}

add_action('rest_api_init', 'ms_search_route');
