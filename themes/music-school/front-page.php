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

<!-- Blog Section -->
<?php get_template_part('template-parts/frontpage', 'blog'); ?>

<!-- Blog Section -->
<?php get_template_part('template-parts/frontpage', 'events'); ?>

<?php get_footer(); ?>