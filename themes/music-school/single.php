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

get_header();

?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>

    <?php

    $meta = '<span>' . __('Posted by ', 'music-school') . '</span>'
      . '<span>' . get_the_author_posts_link() . '</span>'
      . '<span>' . __(' on ', 'music-school') . '</span>'
      . '<span>' . get_the_time(get_option('date_format')) . '</span>'
      . '<span>' . __(' in ', 'music-school') . '</span>'
      . '<span>' . get_the_category_list(', ') . '</span>';

    $page_banner_args = array(
      'subtitle' => $meta
    );

    pageBanner($page_banner_args);

    ?>
    <article>
      <div class="container py-4">
        <ul class="breadcrumbs py-1">
          <li>
            <a href="<?php echo get_post_type_archive_link('post'); ?>">
              <?php echo __('Blog', 'music-school'); ?>
            </a>
          </li>
          <li><?php the_title(); ?></li>
        </ul>
        <div class="post-content py-2">
          <?php the_content(); ?>
        </div>
      </div>
    </article>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>