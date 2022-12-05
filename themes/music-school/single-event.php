<?php
/**
 *
 * The template for displaying all single events.
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
    <section class="page-banner" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.2), rgba(0,0,0,.7)), url(<?php echo get_theme_file_uri('/assets/img/rock-event.jpg'); ?>);">
      <div class="container">
        <h2><?php the_title(); ?></h2>
        <p>
          <span><?php _e('Created on ', 'music-school'); ?></span>
          <span><?php the_time(get_option('date_format')) ?></span>
          <span><?php _e(' in ', 'music-school'); ?></span>
          <span><?php echo get_the_term_list($post->ID, 'event-type', '', ', '); ?></span>
        </p>
      </div>
    </section>
    <article>
      <div class="container py-4">
        <ul class="breadcrumbs py-1">
          <li>
            <a href="<?php echo get_post_type_archive_link('event'); ?>">
              <?php echo __('Events', 'music-school'); ?>
            </a>
          </li>
          <li><?php the_title(); ?></li>
        </ul>
        <div class="post-content py-2">
          <?php the_content(); ?>
        </div>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>