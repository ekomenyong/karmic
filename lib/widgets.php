<?php
/**
 * Register widget area.
 * 
 * @package karmic
 * @version 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function karmic_sidebar() {
	
	register_sidebar( array(
		'name' 				=> esc_html__( 'Sidebar', 'karmic' ),
		'id' 					=> 'sidebar-1',
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 		=> '</h3>',
	) );

	register_sidebar( array(
		'name' 				=> esc_html__( 'Social Footer', 'karmic' ),
		'id' 					=> 'social-footer',
		'before_widget' 	=> '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3 class="social-footer-heading">',
		'after_title' 		=> '</h3>',
	) );

	register_sidebar( array(
		'name' 				=> esc_html__( 'Footer Center', 'karmic' ),
		'id' 					=> 'footer-center',
		'before_widget' 	=> '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3 class="pre-footer-heading">',
		'after_title' 		=> '</h3>',
	) );

	register_sidebar( array(
		'name' 				=> esc_html__( 'Footer Right', 'karmic' ),
		'id' 					=> 'footer-right',
		'before_widget' 	=> '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3 class="pre-footer-heading">',
		'after_title' 		=> '</h3>',
	) );
}
add_action( 'widgets_init', 'karmic_sidebar' );