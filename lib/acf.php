<?php
/**
 * This file is used to set settings for Advanced Custom Fields.
 * 
 * 
 * @package karmic
 * @version 1.0.0
*/


/* ------------------------------------------------------------------------ *
 * Register ACF Option Pages and Subpages
 * ------------------------------------------------------------------------ */
add_action('acf/init', 'register_acf_options_pages');
function register_acf_options_pages() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title' 	=> 'Karmic Theme Options',
      'menu_title'	=> 'Karmic',
      'menu_slug' 	=> 'theme-options',
      //'icon_url'    => 'dashicons-smiley',
      'capability'	=> 'manage_options',
      'position'    => '3',
      'redirect'		=> false
    ));
    acf_add_options_sub_page(array(
      'page_title' 	=> 'Theme Homepage Options',
      'menu_title'	=> 'Homepage Options',
      'parent_slug'	=> 'theme-options',
    ));
  }
}