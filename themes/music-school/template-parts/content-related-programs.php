<?php
/**
 * Template part for displaying a list of related programs inside a single campus page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Music School
 */

$related_programs_query_args = array(
  'key'     => 'related_campus',
  'compare' => 'LIKE',
  'value'   => '"' . get_the_ID() . '"'
);

$args = array(
  'posts_per_page'  => -1,
  'post_type'       => 'program',
  'orderby'         => 'title',
  'order'           => 'ASC',
  'meta_query'      => array($related_programs_query_args)
);

$programs = new WP_Query($args);

?>

<?php if ($programs->have_posts()) : ?>
  <hr>
  <div class="related-programs py-2">
    <h2><?php echo __('Program(s)', 'music-school'); ?></h2>
    <ul>
      <?php while ($programs->have_posts()) : $programs->the_post(); ?>

        <li>
          <p><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></p>
        </li>

      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>