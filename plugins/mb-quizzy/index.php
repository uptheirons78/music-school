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
    add_action( 'enqueue_block_editor_assets', array($this, 'adminAssets') );
  }

  function adminAssets() {
    wp_enqueue_script('mbquizzy-block-type', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
  }
}

$mbQuizzy = new MBQuizzy();