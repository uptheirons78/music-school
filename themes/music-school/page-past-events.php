<?php
/**
 * The template for the page: Past Events.
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
  'title' => __('Past Events', 'music-school'),
  'subtitle' => __('Take a look at our past events archive.', 'music-school'),
  'image' => get_theme_file_uri('/assets/img/rock-event.jpg')
);

pageBanner($page_banner_args);

/**
 * Past Events Custom Query
 */
$today = date('Ymd');

$meta_query_args = array(
  'key'     => 'event_date',
  'compare' => '<',
  'value'   => $today,
  'type'    => 'numeric'
);

$past_events_query_args = array(
  'paged'           => get_query_var('paged', 1),
  'post_type'       => 'event',
  'meta_key'        => 'event_date',
  'orderby'         => 'meta_value_num',
  'order'           => 'DESC',
  'meta_query'      => array($meta_query_args)
);

$pastEvents = new WP_Query($past_events_query_args);

?>

<?php if ($pastEvents->have_posts()) : ?>
  <section class="page-content">
    <div class="container">
      <?php while ($pastEvents->have_posts()) : ?>
        <?php $pastEvents->the_post(); ?>
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
      <?php
        echo paginate_links(array(
          'total' => $pastEvents->max_num_pages
        ));
      ?>
    </div>
  </section>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>