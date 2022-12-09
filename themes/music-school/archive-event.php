<?php
/**
 * The template for displaying all events.
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

/**
 * Output the page banner with a function: pageBanner()
 */
$page_banner_args = array(
  'title' => __('All Our Events', 'music-school'),
  'subtitle' => __('See what is going on in our music school.', 'music-school'),
  'image' => get_theme_file_uri('/assets/img/rock-event.jpg')
);

pageBanner($page_banner_args);

?>

<?php if (have_posts()) : ?>
  <section class="page-content">
    <div class="container">
      <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article class="py-2">
          <h2><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
          <div class="meta">
            <?php $eventDate = new DateTime(get_field('event_date')); ?>
            <?php $date = $eventDate->format('d M, Y'); ?>
            <p><span><?php _e('Event Date: ', 'music-school') ?></span><span><?php echo $date; ?></span></p>
          </div>
          <div class="generic-content py-2">
            <?php the_excerpt(); ?>
            <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo __('Event Program', 'music-school'); ?> &raquo;</a></p>
          </div>
        </article>
      <?php endwhile; ?>
      <?php echo paginate_links(); ?>
      <hr>
      <p class="py-2"><?php echo __('Take a look at our', 'music-school'); ?> <a href="<?php echo site_url('/past-events'); ?>"><?php echo __('past events', 'music-school'); ?> &raquo;</a></p>
    </div>
  </section>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>