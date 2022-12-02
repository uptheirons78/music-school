<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'music-school'); ?></a>

    <header id="primary-header" class="primary-header">

      <div class="container">

        <h1 class="site-title">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
          </a>
        </h1>

        <button class="hamburger" type="button" aria-expanded="false" aria-label="Menu" aria-controls="main-navigation">
          <svg fill="var(--color-hamburger)" class="hamburger" viewBox="0 0 100 100" width="30">
            <rect class="line top" width="80" height="8" x="10" y="30" rx="5"></rect>
            <rect class="line middle" width="80" height="8" x="10" y="50" rx="5"></rect>
            <rect class="line bottom" width="80" height="8" x="10" y="70" rx="5"></rect>
          </svg>
        </button>

        <nav id="main-navigation" class="main-navigation" data-visible="false">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'container'      => '',
          )
        );
        ?>
        </nav>
      </div>
    </header>