<?php
/**
 *
 * The template for displaying all single professor.
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
        <div class="professor-image">
          <?php echo get_the_post_thumbnail($post->ID, 'professorPortrait'); ?>
        </div>
        <div class="post-content py-2">
          <?php the_content(); ?>
        </div>
        <?php $related_programs = get_field('related_program'); ?>
        <?php if ($related_programs) : ?>
          <div class="related-programs py-2">
            <h2><?php echo __('Program(s)', 'music-school'); ?></h2>
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