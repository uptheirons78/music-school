<?php

/**
 * The front page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

?>
<section class="page-banner" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.3), rgba(0,0,0,.9)), url(<?php echo get_theme_file_uri('/assets/img/violin-player.jpg'); ?>);">
  <div class="container">
    <h1><?php bloginfo('name'); ?></h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ad!</p>
  </div>
</section>
<section class="blog-section">
  <div class="container py-4">
    <h1>From our blog</h1>
    <?php
    $args = array(
      'posts_per_page' => 2
    );
    $news = new WP_Query($args);
    ?>
    <?php if ($news->have_posts()) : ?>
      <?php while ($news->have_posts()) : $news->the_post(); ?>
        <article class="py-2">
          <h3><?php the_title(); ?></h3>
          <p><?php echo __('Published on: ', 'music-school'); ?><span><?php echo the_time('d M, Y') ?></span></p>
          <!-- you can use also wp_trim_words(the_content(), $num_of_words) -->
          <p class="py-1"><?php the_excerpt(); ?></p>
          <p><a href="<?php the_permalink(); ?>"><?php echo __('Read more') ?>&raquo;</a></p>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <a href="<?php echo get_post_type_archive_link('post'); ?>">
      <?php echo __('See all posts', 'music-school'); ?>
    </a>
  </div>
</section>

<?php get_footer(); ?>