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
    <?php

      $meta = '<span>' . __('Created on ', 'music-school') . '</span>'
      . '<span>' . get_the_time(get_option('date_format')) . '</span>'
      . '<span>' . __(' in ', 'music-school') . '</span>'
      . '<span>' . get_the_term_list($post->ID, 'event-type', '', ', ') . '</span>'
      ;

      $page_banner_args = array(
        'subtitle' => $meta
      );

      pageBanner($page_banner_args);

    ?>
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
          <?php $eventDate = new DateTime(get_field('event_date')); ?>
          <?php $date = $eventDate->format('d M, Y'); ?>
          <p class="py-2"><span><?php _e('Event Date: ', 'music-school') ?></span><span><?php echo $date; ?></span></p>
          <?php the_content(); ?>
        </div>
        <?php $related_programs = get_field('related_program'); ?>
        <?php if ($related_programs) : ?>
          <div class="related-programs py-2">
            <h2><?php echo __('Related Programs', 'music-school'); ?></h2>
            <ul>
              <?php foreach ($related_programs as $program) : ?>
                <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>