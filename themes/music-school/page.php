<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
    <section class="page-banner" style="background-image: url(<?php echo get_theme_file_uri('/assets/img/violin-player.jpg'); ?>);">
      <div class="container">
        <h2><?php the_title(); ?></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ad!</p>
      </div>
    </section>
    <section class="page-content">
      <div class="container">
        <ul class="breadcrumbs py-1">
          <li><a href="#">About</a></li>
          <li><a href="#">Our Goals</a></li>
        </ul>
        <div class="generic-content py-2">
          <?php the_content(); ?>
        </div>
      </div>
    </section>
  <?php endwhile; ?>
<?php else : ?>
  <h2><?php echo __('There is no content to display here.', 'music-school'); ?></h2>
<?php endif; ?>


<?php get_footer(); ?>