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
 * SET THEME DEFAULT SETTINGS
 *  NOTE: This may get deleted or altered very soon...
 * ------------------------------------------------------------------------ */
if ( ! function_exists( 'karmic_setup_theme_default_settings' ) ) {
	function karmic_setup_theme_default_settings() {
		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$karmic_posts_index_style = get_theme_mod( 'karmic_posts_index_style' );
		if ( '' == $karmic_posts_index_style ) {
			set_theme_mod( 'karmic_posts_index_style', 'default' );
		}
		// Sidebar position.
		$karmic_sidebar_position = get_theme_mod( 'karmic_sidebar_position' );
		if ( '' == $karmic_sidebar_position ) {
			set_theme_mod( 'karmic_sidebar_position', 'right' );
		}
		// Container width.
		$karmic_container_type = get_theme_mod( 'karmic_container_type' );
		if ( '' == $karmic_container_type ) {
			set_theme_mod( 'karmic_container_type', 'container' );
		}
	}
}

/* ------------------------------------------------------------------------ *
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 * ------------------------------------------------------------------------ */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'body_class', 'karmic_body_classes' );

if ( ! function_exists( 'karmic_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function karmic_body_classes( $classes ) {

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
    }

    // Adds a class of karmic-page to every page
    if ( is_page() ) {
      $classes[] = 'karmic-page';
    }
    // Adds a class of karmic-front-page to the front page.
    if ( is_front_page() ) {
      $classes[] = 'karmic-front-page';
    }
    // Adds a class of karmic-blog-page to blog posts
    if ( is_single() ) {
      $classes[] = 'karmic-blog-page';
    }

    return $classes;
	}
}

/**
 * Determines if post thumbnail can be displayed.
 */
function karmic_can_show_post_thumbnail() {
	return apply_filters( 'karmic_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/* ------------------------------------------------------------------------ *
 * SETS EXCERPT LENGTH, DEFAULT: 50 CHARACTERS
 * ------------------------------------------------------------------------ */
add_filter( 'excerpt_length', 'karmic_excerpt_length', 999 );
function karmic_excerpt_length( $length ) {
	return 20;
}


/* ------------------------------------------------------------------------ *
 * REPLACES [...] IN EXCERPT WITH HYPERLINK TO POST
 * ------------------------------------------------------------------------ */
add_filter( 'excerpt_more', 'new_excerpt_more' );
 function new_excerpt_more( $more ) {
	return '<br><br><a href=" ' . get_permalink() . ' " class="read-more">Read more »</a>';
}


/* ------------------------------------------------------------------------ *
 * CLEAN UP WORDPRESS HEADER/FOOTHER
 * ------------------------------------------------------------------------ */
add_action( 'after_setup_theme', 'cleanup' );
function cleanup() {
	remove_action( 'wp_head', 'rsd_link' ) ;
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 ) ;
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_head', 'rel_canonical' );
	remove_action( 'wp_head', 'rel_alternate' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );

	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
		
	add_filter( 'the_generator', '__return_empty_string' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	add_filter( 'show_admin_bar', '__return_false' );
}
function karmic_remove_version_scripts_styles( $src ) {
	if ( strpos( $src, 'ver=' )) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'karmic_remove_version_scripts_styles', 9999 );
add_filter( 'script_loader_src', 'karmic_remove_version_scripts_styles', 9999 );