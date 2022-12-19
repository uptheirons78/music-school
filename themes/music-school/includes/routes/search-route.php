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

function ms_search_results() {
  return 'Great, route created!!!';
}

add_action('rest_api_init', 'ms_search_route');
