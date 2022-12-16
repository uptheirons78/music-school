<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
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

<footer class="site-footer py-2">
  <div class="search-container container">
    <button id="search-button" class="search-button">
      <span><?php echo __('Search', 'music-school'); ?></span>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>
    </button>
  </div>
  <div class="site-info container">
    <p>Copyright &copy; <?php echo date('Y'); ?> MB Development
      <span class="sep"> | </span>
      <?php
      printf(esc_html__('Theme: %1$s by %2$s.', 'music-school'), 'Music School', '<a href="https://maurobono.com/">Mauro Bono</a>');
      ?>
    </p>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<div id="search-overlay" class="search-overlay">
  <div class="top">
    <div class="container">
      <input type="text" class="search-term" placeholder="What are you looking for ?" id="search-term" autocomplete="off">
      <button id="search-close-button" class="search-close-button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="container">
      <div id="search-overlay-results">
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>

</html>