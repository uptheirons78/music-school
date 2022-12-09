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
    <!-- Output the page banner -->
    <?php pageBanner(); ?>

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
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>


<?php get_footer(); ?>