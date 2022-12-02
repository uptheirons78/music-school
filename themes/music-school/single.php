<?php
/**
 *
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

?>
<div class="container">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
      <?php the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    <?php endwhile; ?>
  <?php else : ?>
    <h2><?php echo __('There is no content to display here.', 'music-school'); ?></h2>
  <?php endif; ?>
</div>