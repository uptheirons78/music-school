<?php
/**
 * Post type: Professor
 *
 * @package Music School
 * @since 1.0.0
 */
function music_school_professor_post_type() {
  $professor_args = array(
    'menu_icon'             => 'dashicons-businessperson',
    'label'  => esc_html__('Professors', 'music-school'),
    'labels' => array(
      'menu_name'          => esc_html__('Professors', 'music-school'),
      'name_admin_bar'     => esc_html__('Professor', 'music-school'),
      'add_new'            => esc_html__('Add Professor', 'music-school'),
      'add_new_item'       => esc_html__('Add new Professor', 'music-school'),
      'new_item'           => esc_html__('New Professor', 'music-school'),
      'edit_item'          => esc_html__('Edit Professor', 'music-school'),
      'view_item'          => esc_html__('View Professor', 'music-school'),
      'update_item'        => esc_html__('View Professor', 'music-school'),
      'all_items'          => esc_html__('All Professors', 'music-school'),
      'search_items'       => esc_html__('Search Professors', 'music-school'),
      'parent_item_colon'  => esc_html__('Parent Professor', 'music-school'),
      'not_found'          => esc_html__('No Professors found', 'music-school'),
      'not_found_in_trash' => esc_html__('No Professors found in Trash', 'music-school'),
      'name'               => esc_html__('Professors', 'music-school'),
      'singular_name'      => esc_html__('Professor', 'music-school'),
    ),
    'public'              => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'show_in_rest'        => true,
    'menu-position'       => 5,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'query_var'           => true,
    'can_export'          => true,
    'rewrite_no_front'    => false,
    'show_in_menu'        => true,
    'supports'  => array('title', 'editor', 'excerpt', 'thumbnail'),
  );

  register_post_type('professor', $professor_args);
}

add_action('init', 'music_school_professor_post_type');
