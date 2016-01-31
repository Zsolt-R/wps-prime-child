<?php
/**
 *	WPS-Child Theme
 *
 */
function theme_enqueue_styles() {

	// Remove main stylesheet
    wp_deregister_style( 'wps_prime-style' );

    // Add child style
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');   
    
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );