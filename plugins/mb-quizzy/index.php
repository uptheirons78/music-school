<?php
/**
 * Plugin Name: MB Quizzy
 * Description: Give readers a multiple choice question
 * Version: 1.0
 * Author: Mauro Bono
 * Author URI: https://www.maurobono.com
 */
if (!defined('ABSPATH')) exit; //Exit if accessed directly

class MBQuizzy {
  function __construct() {
    add_action( 'init', array($this, 'adminAssets') );
  }

  function adminAssets() {
    wp_register_script('mbquizzy-block-type', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
    register_block_type('ourplugin/are-you-paying-attention', array(
      'editor_script' => 'mbquizzy-block-type',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
    ob_start(); ?>
    <h3>Today the sky is <?php echo esc_html($attributes['skyColor']); ?> and the grass is <?php echo esc_html($attributes['grassColor']); ?> !!!</h3>
  <?php return ob_get_clean();
}

}

$mbQuizzy = new MBQuizzy();