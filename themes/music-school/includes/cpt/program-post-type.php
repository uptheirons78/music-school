<?php
/**
 * Post type: Program
 *
 * @package Music School
 * @since 1.0.0
 */
function music_school_program_post_type()
{
  $program_args = array(
    'menu_icon'             => 'dashicons-awards',
    'label'  => esc_html__('Programs', 'music-school'),
    'labels' => array(
      'menu_name'          => esc_html__('Programs', 'music-school'),
      'name_admin_bar'     => esc_html__('Program', 'music-school'),
      'add_new'            => esc_html__('Add Program', 'music-school'),
      'add_new_item'       => esc_html__('Add new Program', 'music-school'),
      'new_item'           => esc_html__('New Program', 'music-school'),
      'edit_item'          => esc_html__('Edit Program', 'music-school'),
      'view_item'          => esc_html__('View Program', 'music-school'),
      'update_item'        => esc_html__('View Program', 'music-school'),
      'all_items'          => esc_html__('All Programs', 'music-school'),
      'search_items'       => esc_html__('Search Programs', 'music-school'),
      'parent_item_colon'  => esc_html__('Parent Program', 'music-school'),
      'not_found'          => esc_html__('No Programs found', 'music-school'),
      'not_found_in_trash' => esc_html__('No Programs found in Trash', 'music-school'),
      'name'               => esc_html__('Programs', 'music-school'),
      'singular_name'      => esc_html__('Program', 'music-school'),
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
    'has_archive'         => true,
    'query_var'           => true,
    'can_export'          => true,
    'rewrite_no_front'    => false,
    'show_in_menu'        => true,
    'supports'  => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'programs'),
  );

  register_post_type('program', $program_args);
}

add_action('init', 'music_school_program_post_type');
