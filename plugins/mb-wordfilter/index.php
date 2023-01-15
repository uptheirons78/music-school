<?php
/**
 * Plugin Name: MB WordFilter
 * Description: Replaces a list of words
 * Version: 1.0
 * Author: Mauro Bono
 * Author URI: https://www.maurobono.com
 */
if ( ! defined('ABSPATH') ) exit; //Exit if accessed directly

class MBWordFilterPlugin {
  function __construct() {
    add_action('admin_menu', array($this, 'ourMenu'));
  }

  function ourMenu() {

    $mainPageHook = add_menu_page(
      'Words to filter',
      'Word Filter',
      'manage_options',
      'wordfilter',
      array($this, 'wordFilterPage'),
      'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZT0iY3VycmVudENvbG9yIiBjbGFzcz0idy02IGgtNiI+CiAgPHBhdGggc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBkPSJNMTIgM2MyLjc1NSAwIDUuNDU1LjIzMiA4LjA4My42NzguNTMzLjA5LjkxNy41NTYuOTE3IDEuMDk2djEuMDQ0YTIuMjUgMi4yNSAwIDAxLS42NTkgMS41OTFsLTUuNDMyIDUuNDMyYTIuMjUgMi4yNSAwIDAwLS42NTkgMS41OTF2Mi45MjdhMi4yNSAyLjI1IDAgMDEtMS4yNDQgMi4wMTNMOS43NSAyMXYtNi41NjhhMi4yNSAyLjI1IDAgMDAtLjY1OS0xLjU5MUwzLjY1OSA3LjQwOUEyLjI1IDIuMjUgMCAwMTMgNS44MThWNC43NzRjMC0uNTQuMzg0LTEuMDA2LjkxNy0xLjA5NkE0OC4zMiA0OC4zMiAwIDAxMTIgM3oiIC8+Cjwvc3ZnPgo=',
      100
    );

    add_submenu_page(
      'wordfilter',
      'Words to filter',
      'Words List',
      'manage_options',
      'wordfilter',
      array($this,'wordFilterPage'),
      1
    );

    add_submenu_page(
      'wordfilter',
      'Word Filter Options',
      'Options',
      'manage_options',
      'word-filter-options',
      array($this,'optionsSubPage'),
      1
    );

    add_action( "load-{$mainPageHook}", array($this, 'mainPageAssets') );

  }

  function mainPageAssets() {
    wp_enqueue_style( 'word-filter-admin-css', plugin_dir_url(__FILE__) . 'style.css' );
  }

  function handleForm() {
    if (isset($_POST['ourNonce'])) {
      $ourNonce = $_POST['ourNonce'];
    }

    if ( wp_verify_nonce( $ourNonce, 'saveFilterWords' ) && current_user_can('manage_options') ) {
      $words = isset($_POST['words_to_filter']) ? sanitize_text_field($_POST['words_to_filter']) : '';
      update_option('words_to_filter', $words); ?>
      <div class="updated">
        <p>Your filtered words were saved.</p>
      </div>
    <?php } else { ?>
      <div class="error">
        <p>Sorry, you do not have permission to perform that action.</p>
      </div>
    <?php }
  }

  function wordFilterPage() { ?>
    <div class="wrap">
      <h1 class="word-filter-title">Word Filter</h1>
      <?php if ( isset($_POST['formsubmitted']) && $_POST['formsubmitted'] == true ) $this->handleForm(); ?>
      <form action="" method="POST">
        <input type="hidden" name="formsubmitted" value="true">
        <?php wp_nonce_field('saveFilterWords', 'ourNonce'); ?>
        <label for="words_to_filter">
          <p>Enter a comma-separeted list of words to filter from your site's content.</p>
        </label>
        <div class="word-filter__flex-container">
          <textarea name="words_to_filter" id="words_to_filter" placeholder="bad, mean, awful, horrible"><?php echo esc_textarea(get_option('words_to_filter')); ?></textarea>
        </div>
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save changes" />
      </form>
    </div>
  <?php }

  function optionsSubPage() { ?>
  Hello Words
  <?php }


}

$mbWordFilterPlugin = new MBWordFilterPlugin();