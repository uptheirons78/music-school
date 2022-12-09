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
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>