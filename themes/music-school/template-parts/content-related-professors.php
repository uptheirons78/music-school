<?php
/**
 * Template part for displaying a list of related professors inside a single program page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music School
 */

$related_professors_query_args = array(
  'key'     => 'related_program',
  'compare' => 'LIKE',
  'value'   => '"' . get_the_ID() . '"'
);

$args = array(
  'posts_per_page'  => -1,
  'post_type'       => 'professor',
  'orderby'         => 'title',
  'order'           => 'ASC',
  'meta_query'      => array($related_professors_query_args)
);

$professors = new WP_Query($args);

?>

<?php if ($professors->have_posts()) : ?>
  <hr>
  <div class="related-professors py-2">
    <h2><?php echo __('Professor(s)', 'music-school'); ?></h2>
    <ul>
      <?php while ($professors->have_posts()) : $professors->the_post(); ?>

        <li class="py-2">
          <?php echo get_the_post_thumbnail($post->ID, 'professorPortrait'); ?>
          <h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </li>

      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>