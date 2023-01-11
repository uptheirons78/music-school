<?php
/**
 * Plugin Name: MB Plugin One
 * Description: Personal first try with plugin development
 * Version: 1.0
 * Author: Mauro Bono
 * Author URI: https://maurobono.com
 */
function mb_add_html_to_post_content($content) {
  // Just filter content inside post and when the query is a main one
  if (is_single() && is_main_query()) {
    $added_html = '<p class="py-2">I am a little bit of HTML code just to test this plugin.</p>';
    return $content . $added_html;
  }
  // In all other cases return the content itself
  return $content;
}

add_filter('the_content', 'mb_add_html_to_post_content');