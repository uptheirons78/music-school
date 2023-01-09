<?php
/**
 * The template for search results.
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

/**
 * Output the page banner with a function: pageBanner()
 */
$page_banner_args = array(
  'title' => 'Search Results',
  'subtitle' => __('You searched for: ', 'music-school') . '&ldquo;' . esc_html(get_search_query(false)) . '&rdquo;',
  'image' => get_theme_file_uri('/assets/img/violin-player.jpg')
);

pageBanner($page_banner_args);

?>

<?php if (have_posts()) : ?>
  <section class="page-content">
    <div class="container">
      <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article class="py-2">
          <h2><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php echo paginate_links(); ?>
    </div>
  </section>
  <?php else : ?>
    <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>
<div class="container">
  <?php get_search_form(); ?>
</div>

<?php get_footer(); ?>