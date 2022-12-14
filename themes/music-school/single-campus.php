<?php

/**
 *
 * The template for displaying all single campus.
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

        <!-- Breadcrumbs -->
        <ul class="breadcrumbs py-1">
          <li>
            <a href="<?php echo get_post_type_archive_link('campus'); ?>">
              <?php echo __('All Campuses', 'music-school'); ?>
            </a>
          </li>
          <li><?php the_title(); ?></li>
        </ul>
        <!-- Content -->
        <div class="post-content py-2">
          <?php the_content(); ?>
        </div>
        <?php $map_location = get_field('map_location'); ?>
        <!-- Address -->
        <p><strong><?php echo __('Campus Location: ', 'music-school'); ?></strong><?php echo $map_location['address']; ?></p>
        <!-- Map -->
        <div class="acf-map">
          <div class="marker" data-lng="<?php echo $map_location['lng']; ?>" data-lat="<?php echo $map_location['lat']; ?>">
            <h2><?php the_title(); ?></h2>
            <?php echo $map_location['address'] ?>
          </div>
        </div>
        <!-- Related Programs -->
        <?php get_template_part('template-parts/content', 'related-programs'); ?>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>