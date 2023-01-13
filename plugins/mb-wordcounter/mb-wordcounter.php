<?php
/**
 * Plugin Name: MB WordCounter
 * Description: A plugin to count post words and reading time
 * Version: 1.0
 * Author: Mauro Bono
 * Author URI: https://maurobono.com
 * Text Domain: wcpdomain
 * Domain Path: /languages
 */
class MBWordCounter
{
  function __construct() {
    add_action('admin_menu', array($this, 'adminPage'));
    add_action('admin_init', array($this, 'settings'));
    add_filter('the_content', array($this, 'isWrap'));
    add_action('init', array($this, 'languages'));
  }

  function languages() {
    load_plugin_textdomain( 'wcpdomain', false, dirname( plugin_basename(__FILE__)) . '/languages' );
  }

  function isWrap($content) {
    if (
        is_main_query() && is_single() &&
        (
        get_option('wcp_wordcount', '1') ||
        get_option('wcp_charcount', '1') ||
        get_option('wcp_readtime', '1')
        )
    ) {
      return $this->createHTML($content);
    }

    return $content;
  }

  function createHTML($content) {
    $html = '<div class="py-2">';
    $html .= '<h3>' . esc_html(get_option('wcp_headline', 'Post Statistics')) . '</h3>';
    $html .= '<p>';

    if (get_option('wcp_wordcount', '1') || get_option('wcp_readtime', '1')) {
      $wordCount = str_word_count(strip_tags($content));
    }

    if (get_option('wcp_wordcount', '1')) {
      $html .= esc_html__('This post has', 'wcpdomain') . ' ' . $wordCount . ' ' . esc_html__('words', 'wcpdomain') . '.<br>';
    }

    if (get_option('wcp_charcount', '1')) {
      $html .= 'This post has ' . strlen(strip_tags($content)) . ' characters.<br>';
    }

    if (get_option('wcp_readtime', '1')) {
      $html .= 'Readtime ' . round($wordCount/225) . ' minute(s).<br>';
    }

    $html .= '</p>';
    $html .= '</div>';

    if (get_option('wcp_location', '0') == '0') {
      return $html . $content;
    }
    return $content . $html;
  }

  function adminPage() {
    add_options_page('Word Counter', __('Word Counter', 'wcpdomain'), 'manage_options', 'wordcounter', array($this, 'settingsHTML'));
  }

  function settings() {
    /** Create a section in the settings page */
    add_settings_section('wcp_first_section', NULL, NULL, 'wordcounter');

    /** Create and register a field inside a specific section inside settings page: LOCATION */
    add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'wordcounter', 'wcp_first_section');
    register_setting('wordcounterplugin', 'wcp_location', array('sanitize_callback' => array($this, 'sanitizeLocation'), 'default' => '0'));

    /** Create and register a field inside a specific section inside settings page: HEADLINE */
    add_settings_field('wcp_headline', 'Headline', array($this, 'headlineHTML'), 'wordcounter', 'wcp_first_section');
    register_setting('wordcounterplugin', 'wcp_headline', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Post Statistics'));

    /** Create and register a field inside a specific section inside settings page: WORDCOUNT (checkbox) */
    add_settings_field('wcp_wordcount', 'Word Count', array($this, 'checkboxHTML'), 'wordcounter', 'wcp_first_section', array('theName' => 'wcp_wordcount'));
    register_setting('wordcounterplugin', 'wcp_wordcount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));

    /** Create and register a field inside a specific section inside settings page: CHARACTER COUNT (checkbox) */
    add_settings_field('wcp_charcount', 'Character Count', array($this, 'checkboxHTML'), 'wordcounter', 'wcp_first_section', array('theName' => 'wcp_charcount'));
    register_setting('wordcounterplugin', 'wcp_charcount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));

    /** Create and register a field inside a specific section inside settings page: READ TIME (checkbox) */
    add_settings_field('wcp_readtime', 'Read Time', array($this, 'checkboxHTML'), 'wordcounter', 'wcp_first_section', array('theName' => 'wcp_readtime'));
    register_setting('wordcounterplugin', 'wcp_readtime', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
  }

  function settingsHTML()
  { ?>
    <div class="wrap">
      <h1>Word Counter Settings</h1>
      <form action="options.php" method="POST">
        <?php settings_fields('wordcounterplugin'); ?>
        <?php do_settings_sections('wordcounter'); ?>
        <?php submit_button(); ?>
      </form>
    </div>
  <?php }

  /** Render the HTML for the LOCATION field */
  function locationHTML()
  { ?>
    <select name="wcp_location">
      <option value="0" <?php selected(get_option('wcp_location'), '0'); ?>>Beginning of post</option>
      <option value="1" <?php selected(get_option('wcp_location'), '1'); ?>>End of post</option>
    </select>
  <?php }

  /** Render the HTML for the HEADLINE field */
  function headlineHTML()
  { ?>
    <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')); ?>">
  <?php }

  /** Render the HTML for checkboxes */
  function checkboxHTML($args)
  { ?>
    <input type="checkbox" name="<?php echo $args['theName']; ?>" value="1" <?php checked(get_option($args['theName']), '1'); ?>>
  <?php }

  /** Sanitize custom method */
  function sanitizeLocation($input) {
    if ($input != '0' && $input != '1') {
      add_settings_error('wcp_location', 'wcp_location_error', 'Display location must be either beginning or end.');
      return get_option('wcp_location');
    }
    return $input;
  }

}

$mbWordCounter = new MBWordCounter();
