<?php

/**
 * The template for displaying archive pages.
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
    <h1><?php the_archive_title(); ?></h1>
    <?php if (get_the_archive_description()) : ?>
      <p><?php the_archive_description(); ?></p>
    <?php else : ?>
      <p><?php echo __('No archive description to display here.', 'music-school'); ?></p>
    <?php endif; ?>
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
            <?php if (get_post_type() === 'event') : ?>
              <p><span><?php _e('Event Date: ', 'music-school') ?></span><span>HERE EVENT DATE</span></p>
            <?php else : ?>
              <p>
                <span><?php _e('Posted by', 'music-school'); ?></span> <?php the_author_posts_link(); ?> <span><?php _e(' on ', 'music-school'); ?></span> <?php the_time('d M, Y'); ?> <span><?php _e(' in ', 'music-school'); ?></span> <?php echo get_the_category_list(', '); ?>
              </p>
            <?php endif; ?>
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
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>