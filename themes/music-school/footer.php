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

<footer class="site-footer">
  <div class="site-info">
    <p>Copyright &copy; <?php echo date('Y'); ?> MB Development
      <span class="sep"> | </span>
      <?php
      printf(esc_html__('Theme: %1$s by %2$s.', 'music-school'), 'Music School', '<a href="https://maurobono.com/">Mauro Bono</a>');
      ?>
    </p>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>