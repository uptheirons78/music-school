<?php

/**
 * The template for displaying all programs.
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

?>
<section class="page-banner" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.3), rgba(0,0,0,.9)), url(<?php echo get_theme_file_uri('/assets/img/program.jpg'); ?>);">
  <div class="container">
    <h1><?php _e('All Our Programs', 'music-school'); ?></h1>
    <p><?php _e('Find your path, follow your dream.', 'music-school'); ?></p>
  </div>
</section>
<?php if (have_posts()) : ?>
  <section class="page-content">
    <div class="container">
      <div class="py-2">
        <h3><?php echo __('As a leading music school and specialist provider of creative industries education, our courses offer our students a comprehensive and immersive learning experience, connecting them directly with their chosen industry.', 'music-school'); ?></h3>
      </div>
      <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article class="py-2">
          <h2><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
          <div class="generic-content">
            <?php the_excerpt(); ?>
            <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo __('Course Details', 'music-school'); ?> &raquo;</a></p>
          </div>
        </article>
      <?php endwhile; ?>
    </div>
  </section>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>