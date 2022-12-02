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

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

get_header();

?>

<div class="container">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>
      <article class="py-2">
        <h2><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
    <?php else : ?>
      <h2><?php echo __('There is no content to display here.', 'music-school'); ?></h2>
  <?php endif; ?>
</div>

<?php get_footer(); ?>