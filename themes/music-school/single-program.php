<?php

/**
 *
 * The template for displaying all single programs.
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
    <?php pageBanner(); ?>
    <article>
      <div class="container py-4">
        <ul class="breadcrumbs py-1">
          <li>
            <a href="<?php echo get_post_type_archive_link('program'); ?>">
              <?php echo __('Programs', 'music-school'); ?>
            </a>
          </li>
          <li><?php the_title(); ?></li>
        </ul>
        <div class="post-content py-2">
          <?php the_content(); ?>
        </div>

        <!-- Related Professors Section -->
        <?php get_template_part('template-parts/content', 'related-professors'); ?>

        <!-- Related Events Section -->
        <?php get_template_part('template-parts/content', 'related-events'); ?>

        <!-- Related Campuses -->
        <?php $related_campuses = get_field('related_campus'); ?>
        <?php if (!empty($related_campuses)) : ?>
          <hr>
          <?php echo '<h2 class="py-2">' . get_the_title() . __(' is available at these campuses ') . '</h2>' ?>
          <ul>
            <?php foreach($related_campuses as $campus) : ?>
              <li><a href="<?php echo esc_url(get_the_permalink($campus)); ?>"><?php echo get_the_title($campus); ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>