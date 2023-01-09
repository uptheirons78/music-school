<?php
/**
 * Enqueue scripts
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function mb_scripts() {
  wp_enqueue_style('main-style', THEME_URI . '/build/index.css', array(), microtime());
  wp_enqueue_script('main-js-file', THEME_URI . '/build/index.js', array(), microtime(), true);
  wp_localize_script( 'main-js-file', 'fields_js', array(
    'api' => MAPBOX_API,
    'root_url' => get_site_url(),
  ));

  // Leaflet CSS and JS: load only for single or archive pages of the post type 'campus'
  if (is_singular('campus') || is_post_type_archive('campus')) {
    wp_enqueue_style('leaflet-map-css', '//unpkg.com/leaflet@1.9.3/dist/leaflet.css');
    wp_enqueue_script('leaflet-js', '//unpkg.com/leaflet@1.9.3/dist/leaflet.js', NULL, '1.9.3', false );
  }
}
add_action('wp_enqueue_scripts', 'mb_scripts');
