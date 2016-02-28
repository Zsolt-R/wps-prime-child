<?php
/**
 *	WPS-nav-module
 *
 */

// Define module location.
define('MODULE_LOCATION',get_stylesheet_directory() . '/theme-modules/wps-menu-two');
define('MODULE_LOCATION_URI',get_stylesheet_directory_uri() . '/theme-modules/wps-menu-two');

// Deregister parent main navigation script.
add_action( 'wp_enqueue_scripts', 'remove_theme_scripts', 100 );
function remove_theme_scripts() {
    // Deregister Parent theme Script.
    wp_dequeue_script('main_menu_core');  
}

/***************************************
    #ADD CHILD THEME SCRIPTS
****************************************/

// Add child Scripts.
add_action( 'wp_enqueue_scripts', 'add_module_mt_scripts', 20 );

function add_module_mt_scripts() {

	/* Slideout mobile navigation. - sidenav_one component */    
  wp_enqueue_script('site_slideout_js', MODULE_LOCATION_URI.'/assets/js/min/nav.min.js', array('jquery'), '1.1.2', true );

}

/**
 * Sidenav Component
 *
 * Require these components early to allow correct pluggable function override
 */

/*  Custom Menu Walker */
require MODULE_LOCATION.'/inc/functions/wps-module-mt-walker.php';

/* Override parent theme main navigation */
require MODULE_LOCATION.'/theme-components/objects/wps-main-nav-two.php';


// Child theme frontent class filter functions.
require MODULE_LOCATION.'/inc/settings/child-front-layout-setup.php';


/* Setup Module */
add_action( 'after_setup_theme', 'module_mt_setup', 11);

/**
 * Module setup function
 */
function module_mt_setup() {

  /* This theme uses wp_nav_menu() in one location. */
    register_nav_menus( array(
      'secondary' => __( 'Secondary Menu', 'wps-prime' ),
  ) );

  // Add secondary navigation
  remove_action( 'layout_header__body', 'theme_site_navigation',10 );
  add_action( 'before_content', 'theme_site_nav',10 );


  // Add secondary navigation
  add_action( 'layout_header__body', 'theme_site_nav_secondary',10 );


    /* add toggle button - sidenav_one component */
  add_action('layout_header__body','theme_site_nav_toggle_button',11);

  // Remove nav extra class
  add_filter('main_nav_class','theme_main_nav_class_remove',11);

  /* Header Layout Right css - sidenav_one component */
  add_filter( 'header_layout_right_class', 'adjust_layout_header_right' );
  add_filter( 'header_layout_left_class', 'adjust_layout_header_left' );
}