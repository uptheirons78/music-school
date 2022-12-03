<?php

/**
 * Template part for displaying the main header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music School
 */
?>
<header id="primary-header" class="primary-header">

  <div class="container">

    <h1 class="site-title">
      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
        <?php bloginfo('name'); ?>
      </a>
    </h1>

    <button class="hamburger" type="button" aria-expanded="false" aria-label="Menu" aria-controls="main-navigation">
      <svg fill="var(--purple-7)" class="hamburger" viewBox="0 0 100 100" width="30">
        <rect class="line top" width="80" height="8" x="10" y="25" rx="5"></rect>
        <rect class="line middle" width="80" height="8" x="10" y="45" rx="5"></rect>
        <rect class="line bottom" width="80" height="8" x="10" y="65" rx="5"></rect>
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