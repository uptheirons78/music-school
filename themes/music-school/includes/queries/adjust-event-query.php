<?php
/**
 * Adjust Event Post Type Query
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function ms_adjust_events_query($query) {

  if(!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {

    $today = date('Ymd');

    $meta_query_args = array(
      'key'     => 'event_date',
      'compare' => '>=',
      'value'   => $today,
      'type'    => 'numeric'
    );

    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array($meta_query_args));

  }

}

add_action('pre_get_posts', 'ms_adjust_events_query');
