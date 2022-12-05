<?php

/**
 * Template part for displaying a blog section in Front Page with last 2 posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music School
 */
?>
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
          <p><?php echo __('Published on: ', 'music-school'); ?><span><?php the_time(get_option('date_format')); ?></span></p>
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