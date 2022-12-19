<?php

/**
 * Function to customize the WP Rest API
 *
 * @package Music School
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

function ms_custom_rest() {
  /* Create the authorName fields inside posts WP Rest API */
  register_rest_field('post', 'authorName', array(
    'get_callback' => function () {
      return get_the_author();
    }
  ));

  register_rest_field('post', 'authorUrl', array(
    'get_callback' => function () {
      return get_the_author_posts_link();
    }
  ));
}

add_action( 'rest_api_init', 'ms_custom_rest' );
