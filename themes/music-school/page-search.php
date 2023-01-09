<?php
/**
 * Template for displaying search page.
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <!-- Output the page banner -->
    <?php pageBanner(); ?>

    <section class="page-content">
      <div class="container">
        <div class="generic-content py-2">
          <?php get_search_form(); ?>
        </div>
      </div>
    </section>

  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>


<?php get_footer(); ?>