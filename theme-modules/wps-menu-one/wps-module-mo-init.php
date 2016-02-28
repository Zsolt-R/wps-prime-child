<?php
/**
 *	WPS-nav-module
 *
 */

//Define module location.
define('MODULE_LOCATION',get_stylesheet_directory() . '/theme-modules/wps-menu-one');
define('MODULE_LOCATION_URI',get_stylesheet_directory_uri() . '/theme-modules/wps-menu-one');


// Deregister parent main navigation script.
add_action( 'wp_enqueue_scripts', 'remove_theme_scripts', 100 );
function remove_theme_scripts() {
    // Deregister Parent theme Script.
    wp_dequeue_script('main_menu_core');  
}

/***************************************
    #ADD MODULE SCRIPTS
****************************************/

// Add child Scripts.
add_action( 'wp_enqueue_scripts', 'add_module_mo_scripts', 20 );

function add_module_mo_scripts() {

	/* Slideout mobile navigation. - sidenav_one component */    
  wp_enqueue_script('site_slideout_js', MODULE_LOCATION_URI.'/assets/js/min/slideout.min.js', array('jquery'), '1.1.2', true );

}

/**
 * Sidenav Component
 */


/* Mobile Navigation and toggle button - sidenav_one component */
require MODULE_LOCATION.'/theme-components/objects/wps-sidenav-one-mobile-nav.php';

// Child theme frontent class filter functions.
require MODULE_LOCATION.'/inc/settings/child-front-layout-setup.php';


/* Setup Module */
add_action( 'after_setup_theme', 'module_mo_setup', 11);

/**
 * Module setup function
 */
function module_mo_setup() {

  /**  
   * Add settings
   */

  /* add toggle button - sidenav_one component */
  add_action('layout_header__body','side_nav_toggle_button',0);

  /* Theme NAV. add child theme nav (mobile). - sidenav_one component */
  add_action('body_start','child_theme_site_sidenav');

  /**
   * Add  frontend class filters
   */

  // Remove nav extra class
  add_filter('main_nav_class','theme_main_nav_class_hide',11);

  /* Header Layout Adjust */
  add_filter( 'header_layout_right_class', 'adjust_layout_header_right' );
  add_filter( 'header_layout_left_class', 'adjust_layout_header_left' );

}