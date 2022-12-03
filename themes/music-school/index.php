<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
<section class="page-banner" style="background-image: url(<?php echo get_theme_file_uri('/assets/img/violin-player.jpg'); ?>);">
  <div class="container">
    <h1>Music School</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ad!</p>
  </div>
</section>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <section class="page-content">
      <div class="container">
        <article class="py-2">
          <h2><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
          <?php the_content(); ?>
        </article>
      </div>
    </section>
  <?php endwhile; ?>
<?php else : ?>
  <h2><?php echo __('There is no content to display here.', 'music-school'); ?></h2>
<?php endif; ?>

<?php get_footer(); ?>