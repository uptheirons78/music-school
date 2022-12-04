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
<section class="page-banner" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.3), rgba(0,0,0,.9)), url(<?php echo get_theme_file_uri('/assets/img/violin-player.jpg'); ?>);">
  <div class="container">
    <?php if (is_home()) : ?>
      <h1><?php echo __('Blog', 'music-school'); ?></h1>
    <?php endif; ?>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ad!</p>
  </div>
</section>
<?php if (have_posts()) : ?>
  <section class="page-content">
    <div class="container">
      <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article class="py-2">
          <h2><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
          <div class="meta">
            <p>
              Posted by <?php the_author_posts_link(); ?> on <?php the_time('d M, Y'); ?> in <?php echo get_the_category_list(', '); ?>
            </p>
          </div>
          <div class="generic-content py-2">
            <?php the_excerpt(); ?>
            <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo __('Read more', 'music-school'); ?> &raquo;</a></p>
          </div>
        </article>
      <?php endwhile; ?>
      <?php echo paginate_links(); ?>
    </div>
  </section>
<?php else : ?>
  <h2><?php echo __('There is no content to display here.', 'music-school'); ?></h2>
<?php endif; ?>

<?php get_footer(); ?>