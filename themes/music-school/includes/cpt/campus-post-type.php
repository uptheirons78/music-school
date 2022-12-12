<?php
/**
 * Post type: Campus
 *
 * @package Music School
 * @since 1.0.0
 */
function music_school_campus_post_type()
{
  $campus_args = array(
    'menu_icon'             => 'dashicons-location-alt',
    'label'  => esc_html__('Campuses', 'music-school'),
    'labels' => array(
      'menu_name'          => esc_html__('Campuses', 'music-school'),
      'name_admin_bar'     => esc_html__('Campus', 'music-school'),
      'add_new'            => esc_html__('Add Campus', 'music-school'),
      'add_new_item'       => esc_html__('Add new Campus', 'music-school'),
      'new_item'           => esc_html__('New Campus', 'music-school'),
      'edit_item'          => esc_html__('Edit Campus', 'music-school'),
      'view_item'          => esc_html__('View Campus', 'music-school'),
      'update_item'        => esc_html__('View Campus', 'music-school'),
      'all_items'          => esc_html__('All Campuses', 'music-school'),
      'search_items'       => esc_html__('Search Campuses', 'music-school'),
      'parent_item_colon'  => esc_html__('Parent Campus', 'music-school'),
      'not_found'          => esc_html__('No Campuses found', 'music-school'),
      'not_found_in_trash' => esc_html__('No Campuses found in Trash', 'music-school'),
      'name'               => esc_html__('Campuses', 'music-school'),
      'singular_name'      => esc_html__('Campus', 'music-school'),
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
    'rewrite' => array('slug' => 'campuses'),
  );

  register_post_type('campus', $campus_args);
}

add_action('init', 'music_school_campus_post_type');
