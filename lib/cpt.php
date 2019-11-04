<?php

if ( ! function_exists('sevice_post_type') ) {

  // Register Custom Post Type
  function sevice_post_type() {
  
    $labels = array(
      'name'                  => _x( 'Services', 'Post Type General Name', 'karmic' ),
      'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'karmic' ),
      'menu_name'             => __( 'Services', 'karmic' ),
      'name_admin_bar'        => __( 'Services', 'karmic' ),
      'archives'              => __( 'Item Archives', 'karmic' ),
      'attributes'            => __( 'Item Attributes', 'karmic' ),
      'parent_item_colon'     => __( 'Parent Item:', 'karmic' ),
      'all_items'             => __( 'All Items', 'karmic' ),
      'add_new_item'          => __( 'Add New Item', 'karmic' ),
      'add_new'               => __( 'Add New', 'karmic' ),
      'new_item'              => __( 'New Item', 'karmic' ),
      'edit_item'             => __( 'Edit Item', 'karmic' ),
      'update_item'           => __( 'Update Item', 'karmic' ),
      'view_item'             => __( 'View Item', 'karmic' ),
      'view_items'            => __( 'View Items', 'karmic' ),
      'search_items'          => __( 'Search Item', 'karmic' ),
      'not_found'             => __( 'Not found', 'karmic' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'karmic' ),
      'featured_image'        => __( 'Featured Image', 'karmic' ),
      'set_featured_image'    => __( 'Set featured image', 'karmic' ),
      'remove_featured_image' => __( 'Remove featured image', 'karmic' ),
      'use_featured_image'    => __( 'Use as featured image', 'karmic' ),
      'insert_into_item'      => __( 'Insert into item', 'karmic' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'karmic' ),
      'items_list'            => __( 'Items list', 'karmic' ),
      'items_list_navigation' => __( 'Items list navigation', 'karmic' ),
      'filter_items_list'     => __( 'Filter items list', 'karmic' ),
    );
    $args = array(
      'label'                 => __( 'Service', 'karmic' ),
      'description'           => __( 'Services information page', 'karmic' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
      'taxonomies'            => array( 'category' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-admin-tools',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => false,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
    );
    register_post_type( 'services', $args );
  
  }
  add_action( 'init', 'sevice_post_type', 0 );
  
  }