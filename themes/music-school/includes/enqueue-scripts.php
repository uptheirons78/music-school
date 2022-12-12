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
  wp_enqueue_style('main-style', THEME_URI . '/build/index.css', array(), THEME_VERSION);
  wp_enqueue_script('main-js-file', THEME_URI . '/build/index.js', array(), THEME_VERSION, true);
  wp_localize_script( 'main-js-file', 'fields_js', array('api' => MAPBOX_API));

  // Leaflet Maps
  wp_enqueue_style('leaflet-map-css', '//unpkg.com/leaflet@1.9.3/dist/leaflet.css');
  wp_enqueue_script('leaflet-js', '//unpkg.com/leaflet@1.9.3/dist/leaflet.js', NULL, '1.9.3', false );
}
add_action('wp_enqueue_scripts', 'mb_scripts');
