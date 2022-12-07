<?php
/**
 * Adjust Program Post Type Query
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function ms_adjust_programs_query($query)
{

  if (!is_admin() && is_post_type_archive('program') && $query->is_main_query()) {

    $query->set('posts_per_page', -1);
    $query->set('orderby', 'name');
    $query->set('order', 'ASC');

  }

}

add_action('pre_get_posts', 'ms_adjust_programs_query');
