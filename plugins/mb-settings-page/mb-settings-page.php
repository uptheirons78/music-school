<?php
/**
 * Plugin Name: MB Settings Page
 * Description: Add a settings page to WP Dashboard
 * Version: 1.0
 * Author: Mauro Bono
 * Author URI: https://maurobono.com
 */
class MBWordCounter {
  function __construct() {
    add_action( 'admin_menu', array($this, 'adminPage') );
  }

  function adminPage() {
    /**
     * 1. Page title
     * 2. Menu title
     * 3. Capability
     * 4. Menu Slug
     * 5. Callback
     * 6. Position
     */
    add_options_page('Word Counter', 'Word Counter', 'manage_options', 'wordcounter', array($this, 'settingsHTML'));
  }


  function settingsHTML() { ?>
    <div class="wrap">
      <h1>Word Counter Settings</h1>
    </div>
  <?php }

}

$mbWordCounter = new MBWordCounter();

/**
 * Procedural Programming Way
 */

/*

function mb_wc_plugin_register_options_page() {

  add_options_page('Word Counter', 'Word Counter', 'manage_options', 'wordcounter', 'mb_wc_plugin_options_page');
}

add_action('admin_menu', 'mb_wc_plugin_register_options_page');

function mb_wc_plugin_options_page() { ?>
  Hello Darkness my old friend
<?php }

*/

