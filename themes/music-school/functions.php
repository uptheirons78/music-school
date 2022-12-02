<?php
/**
 * Music School functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define('THEME_VERSION', '1.0.0');
define('THEME_DIR', get_template_directory() );
define('THEME_URI', get_template_directory_uri());

/**
 * Enqueue Scripts and Styles
 */
require THEME_DIR . '/includes/enqueue-scripts.php';
