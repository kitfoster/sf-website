<?php
/**
 * Sinisgalli Foster functions and definitions
 *
 * @package WordPress
 * @subpackage Sinisgalli_Foster
 * @since 1.0
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function sinisgallifoster_setup() {
	function sinisgallifoster_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		// wp_enqueue_style( 'navbar', get_template_directory(), 'template-parts/navigation');
	}
	add_action( 'wp_enqueue_scripts', 'sinisgallifoster_scripts' );

	function register_nav() {
		// register_nav_menu('header-menu',__( 'Header Menu' ));
	}
	add_action( 'init', 'register_nav' );

};
add_action( 'after_setup_theme', 'sinisgallifoster_setup' );

?>
