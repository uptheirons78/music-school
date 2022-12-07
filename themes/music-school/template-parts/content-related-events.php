<?php

/**
 * Template part for displaying a list of related events inside a single program page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music School
 */

 $today = date('Ymd');

$event_date_query_args = array(
  'key'     => 'event_date',
  'compare' => '>=',
  'value'   => $today,
  'type'    => 'numeric'
);

$related_events_query_args = array(
  'key'     => 'related_program',
  'compare' => 'LIKE',
  'value'   => '"' . get_the_ID() . '"'
);

$args = array(
  'posts_per_page'  => 2,
  'post_type'       => 'event',
  'meta_key'        => 'event_date',
  'orderby'         => 'meta_value_num',
  'order'           => 'ASC',
  'meta_query'      => array($related_events_query_args, $event_date_query_args)
);

$events = new WP_Query($args);

?>

<?php if ($events->have_posts()) : ?>
  <hr>
  <div class="related-events py-2">
    <h2><?php echo __('Upcoming Events', 'music-school'); ?></h2>
    <ul>
      <?php while ($events->have_posts()) : $events->the_post(); ?>

        <li class="py-2">
          <h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php $eventDate = new DateTime(get_field('event_date')); ?>
          <?php $date = $eventDate->format('d M, Y'); ?>
          <p><span><?php _e('Event Date: ', 'music-school') ?></span><span><?php echo $date; ?></span></p>
          <p><?php echo get_the_term_list($post->ID, 'event-type', 'Event Type: ', ', '); ?></p>
        </li>

      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>