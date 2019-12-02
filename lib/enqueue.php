<?php
/**
 * Enqueue front end theme scripts [CSS & JS]
 *
 * @package karmic
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'karmic_scripts' ) ) {
  /**
   * Enqueues the CSS and JS files.
   * ------------------------------------------------------------------------ */
  function karmic_scripts() {
    // Get the theme data.
    $the_theme     = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );
      
    $css_version = $theme_version . '.' . filemtime( KARMIC_THEMEROOT . '/assets/css/main.min.css' );
      wp_enqueue_style( 'karmic-styles', KARMIC_THEME_DIR . '/assets/css/main.min.css', array(), $css_version );
      
      wp_deregister_script( 'jquery' );
      
      $js_version = $theme_version . '.' . filemtime( KARMIC_THEMEROOT . '/assets/js/main.min.js' );
      wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', '', '3.4.1', true );
      wp_enqueue_script( 'karmic-scripts', KARMIC_THEME_DIR . '/assets/js/main.min.js', array(), $js_version, true );
      wp_enqueue_script( 'vendor-scripts', KARMIC_THEME_DIR . '/assets/js/vendors.min.js', array(), $js_version, true );
      wp_enqueue_script( 'fontawesome', KARMIC_THEME_DIR . '/assets/js/all.min.js', array(), '5.11.2', true );
      
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
} // endif function_exists( 'karmic_scripts' ).

add_action( 'wp_enqueue_scripts', 'karmic_scripts' );