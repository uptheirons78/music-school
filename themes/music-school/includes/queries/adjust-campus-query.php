<?php
/**
 * Adjust Campus Post Type Query
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function ms_adjust_campuses_query($query)
{

  if (!is_admin() && is_post_type_archive('campus') && $query->is_main_query()) {

    $query->set('posts_per_page', -1);
  }
}

add_action('pre_get_posts', 'ms_adjust_campuses_query');
