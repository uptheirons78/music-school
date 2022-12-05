<?php

/**
 * Template part for displaying an events section in Front Page with next 2 events
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music School
 */
?>
<section class="events-section">
  <div class="container py-4">
    <h1>Our Events</h1>
    <?php
    $args = array(
      'posts_per_page' => 2,
      'post_type' => 'event'
    );
    $events = new WP_Query($args);
    ?>
    <?php if ($events->have_posts()) : ?>
      <?php while ($events->have_posts()) : $events->the_post(); ?>
        <article class="py-2">
          <h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><span><?php _e('Event Date: ', 'music-school') ?></span><span>HERE EVENT DATE</span></p>
          <p><?php echo get_the_term_list($post->ID, 'event-type', 'Event Type: ', ', '); ?></p>
          <!-- you can use also wp_trim_words(the_content(), $num_of_words) -->
          <p class="py-1"><?php the_excerpt(); ?></p>
          <p><a href="<?php the_permalink(); ?>"><?php echo __('Read more') ?>&raquo;</a></p>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <a href="<?php echo get_post_type_archive_link('event'); ?>">
      <?php echo __('See all events', 'music-school'); ?>
    </a>
  </div>
</section>