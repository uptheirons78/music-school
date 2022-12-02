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
}
add_action('wp_enqueue_scripts', 'mb_scripts');
