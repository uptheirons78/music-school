<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
    <section class="page-banner" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.3), rgba(0,0,0,.9)), url(<?php echo get_theme_file_uri('/assets/img/violin-player.jpg'); ?>);">
      <div class="container">
        <h2><?php the_title(); ?></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ad!</p>
      </div>
    </section>
    <section class="page-content">
      <div class="container">
        <?php $parent_ID = wp_get_post_parent_id(get_the_ID()); ?>
        <?php if ($parent_ID) : ?>
          <ul class="breadcrumbs py-1">
            <li>
              <a href="<?php echo esc_url(get_the_permalink($parent_ID)); ?>">
                <?php echo get_the_title($parent_ID); ?>
              </a>
            </li>
            <li><?php the_title(); ?></li>
          </ul>
        <?php endif; ?>
        <div class="generic-content py-2">
          <?php the_content(); ?>
        </div>
        <?php $pageArray = get_pages(array('child_of' => get_the_ID())); ?>
        <?php if ($parent_ID || $pageArray) : ?>
          <div class="page-links">
            <h3>
              <a href="<?php echo esc_url(get_the_permalink($parent_ID)); ?>">
                <?php echo get_the_title($parent_ID); ?>
              </a>
            </h3>
            <ul>
              <!-- How to get a list of child pages in WordPress -->
              <?php
              if ($parent_ID) {
                $childrenPages = $parent_ID;
              } else {
                $childrenPages = get_the_ID();
              }
              wp_list_pages(array(
                'title_li'    => NULL,
                'child_of'    => $childrenPages,
                'sort_column' => 'menu_order'
              ));
              ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endwhile; ?>
<?php else : ?>
  <h2><?php echo __('There is no content to display here.', 'music-school'); ?></h2>
<?php endif; ?>


<?php get_footer(); ?>