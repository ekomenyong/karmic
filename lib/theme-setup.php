<?php
/**
 * Theme setup and custom theme supports.
 * 
 * Learn more at: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package karmic
 * @version 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* ------------------------------------------------------------------------ *
 *                              [ THEME SETUP ]
 * Sets up theme defaults and registers support for various WordPress features.
 * 
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * ------------------------------------------------------------------------ */
if ( ! function_exists ( 'karmic_setup' ) ) {
  
   function karmic_setup() {
      /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on balance, use a find and replace
		 * to change 'karmic' to the name of your theme in all the template files
      */
		load_theme_textdomain( 'karmic', KARMIC_THEMEROOT . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/*
		 * Let WordPress manage the document title.
		 *
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		*/
		add_theme_support( 'post-thumbnails' );
		// add_image_size( $name, $width, $height, $crop );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus ( array( 
			'primary'   => __( 'Primary', 'karmic' ),
			'footer'    => __( 'Footer', 'karmic' )
		));

		/*
		 * Switch default core markup for search form, comment form,
		 * and comments to output valid HTML5.
		*/
		add_theme_support( 'html5', array( 
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		));

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		));

		// Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( 'karmic_custom_background_args', array( 
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// )));

		/*
		 * Adding support for Widget edit icons in customizer
		*/
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
    */
		add_theme_support( 'custom-logo', array(
			'flex-height' 	=> true,
			'flex-width'  	=> true,
			'header-text' 	=> array( 'site-title', 'site-description' )
		));

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		karmic_setup_theme_default_settings();
   }
}
add_action( 'after_setup_theme', 'karmic_setup'  );