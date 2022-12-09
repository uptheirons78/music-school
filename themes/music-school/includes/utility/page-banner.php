<?php

/**
 * Function to print a page banner inside posts or pages
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function pageBanner($args = NULL) {

  // Title
  if (!isset($args['title'])) {
    $args['title'] = get_the_title();
  }

  // Subtitle
  if (!isset($args['subtitle'])) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!isset($args['image'])) {
    if (get_field('page_banner_image') && !is_archive() && !is_home()) {
      $args['image'] = get_field('page_banner_image')['sizes']['pageBanner'];
    } else {
      $args['image'] = get_theme_file_uri('/assets/img/violin-player.jpg');
    }
  }

?>

  <section class="page-banner" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.2), rgba(0,0,0,.7)), url(<?php echo $args['image']; ?>);">
    <div class="container">
      <h2><?php echo $args['title']; ?></h2>
      <p><?php echo $args['subtitle']; ?></p>
    </div>
  </section>

<?php

}
