<?php
/**
 * Post type: Event
 *
 * @package Music School
 * @since 1.0.0
 */
function music_school_event_post_type() {
  $event_args = array(
    'menu_icon'             => 'dashicons-calendar-alt',
    'label'  => esc_html__('Events', 'music-school'),
    'labels' => array(
      'menu_name'          => esc_html__('Events', 'music-school'),
      'name_admin_bar'     => esc_html__('Event', 'music-school'),
      'add_new'            => esc_html__('Add Event', 'music-school'),
      'add_new_item'       => esc_html__('Add new Event', 'music-school'),
      'new_item'           => esc_html__('New Event', 'music-school'),
      'edit_item'          => esc_html__('Edit Event', 'music-school'),
      'view_item'          => esc_html__('View Event', 'music-school'),
      'update_item'        => esc_html__('View Event', 'music-school'),
      'all_items'          => esc_html__('All Events', 'music-school'),
      'search_items'       => esc_html__('Search Events', 'music-school'),
      'parent_item_colon'  => esc_html__('Parent Event', 'music-school'),
      'not_found'          => esc_html__('No Events found', 'music-school'),
      'not_found_in_trash' => esc_html__('No Events found in Trash', 'music-school'),
      'name'               => esc_html__('Events', 'music-school'),
      'singular_name'      => esc_html__('Event', 'music-school'),
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
    'supports'  => array('title', 'editor', 'thumbnail'),
    'taxonomies' => array('event_type'),
    'rewrite' => true
  );

  $taxonomy_args = array(
    'label'                      => 'Event Type',
    'hierarchical'               => true,    // true->category-like, false->tag-like
    'public'                     => true,    // to see publicly
    'show_ui'                    => true,    // allow to be modified with a UI
    'show_admin_column'          => true,    // display the column of the taxonomy inside the CPTs database
    'show_in_nav_menus'          => true,    // make it available to show in nav menus
    'show_tagcloud'              => false,   // please don't use tagclouds
    'show_in_rest'               => true,    // show in REST API
  );

  register_post_type('event', $event_args);
  register_taxonomy('event_type', ['event'], $taxonomy_args);
}

add_action('init', 'music_school_event_post_type');
