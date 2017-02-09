<?php
/**
 * WPS Prime 2 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WPS_Prime_2
 */

/***************************************
    # REMOVE PARENT SCRIPTS & STYLES
****************************************/
// Stylesheet is loading automatically from the stylesheet directory

add_action( 'wp_enqueue_scripts', 'wps_remove_scripts', 11 );
function wps_remove_scripts() {
        wp_dequeue_script('site_js'); // Partent main js, here we initiate all the js plugins and custom scripts.
}

/***************************************
    #ADD CHILD THEME SCRIPTS
****************************************/

add_action( 'wp_enqueue_scripts', 'wps_add_child_scripts' );
function wps_add_child_scripts() {
  wp_enqueue_script( 'theme_scripts', get_stylesheet_directory_uri().'/js/min/site.min.js', array(), '1.0.1', true );  
}

/*************************************************
    #DIRECT OVERWRITE PARENT THEME COMPONENTS
**************************************************/

// Overwrite the front end layout element classes, previously set in the parent theme.
//require get_stylesheet_directory() . '/template-components/theme-front-setup/child-front-layout-setup.php';

// Overwrite the Template tags defined in the parent theme.
//require get_stylesheet_directory() . '/template-components/child-front-template-tags.php';

// Overwrite parent navigation
//require_once( get_stylesheet_directory() .'/template-components/components/child-site-nav.php' );

// Overwrite footer site microcopy
//require_once( get_stylesheet_directory() .'/template-components/components/theme-footer-site-microcopy.php' );

// Child theme fine tune
require get_stylesheet_directory() . '/inc/settings/child-theme-fine-tune.php';


/************************************************************
#Remove Parent theme components

You can remove any theme component registered in the parent theme and replace it with your 
custom components.
Uncomment the component you wisth to remove/replace
If you want top modify a component functionality/output you can overwrite it's function
using the pluggable functions method. In this case you don't need to remove it.
more info: https://codex.wordpress.org/Pluggable_Functions

**************************************************************/

/* Remove parent theme components */
add_action('after_setup_theme','wps_remove_wps_parent_components',11);
function wps_remove_wps_parent_components(){
  // remove_action( 'wps_theme_header', 'wps_layout_header' ); // Remove the theme header (including logo and nav)
  // remove_action( 'wps_theme_header_left', 'wps_theme_site_logo' ); // Remove main logo
  // remove_action( 'wps_theme_header_right', 'wps_main_site_nav' ); // Remove  main navigation
  // remove_action( 'wps_after_header', 'wps_main_site_nav_mobile' ); // Remove mobile navigation
  // remove_action( 'wps_theme_header_right', 'wps_main_site_mobile_nav_toggler' ); // Remove the mobile navigation toggle button
  // remove_action( 'wps_after_footer','wps_footer_micro' ); // Remove footer micro-copy
  // remove_action( 'wps_before_content','wps_theme_page_pre_content' ); // Remove page pre content
  // remove_action( 'wps_before_footer','wps_theme_global_content_area' ); // Remove Global Content Object 
}

/**************************************************
	#Remove footer widget areas / sidebars
***************************************************/

function wps_remove_some_widgets(){
    //  Unregister footer sidebars.
    unregister_sidebar( 'sidebar-footer-4' );
}
//add_action( 'widgets_init', 'wps_remove_some_widgets', 11 );


/*******************************************
 * Start Child theme setup
 *******************************************/

/* Setup Child Theme */
add_action( 'after_setup_theme', 'wps_child_theme_setup');


function wps_child_theme_setup() {
  
  // HOOK CHILD THEME NAVIGATION
  // First remove / unhook parent main nav 
  //add_action( 'wps_after_header', 'wps_main_site_nav' );

  /**
   * Theme custom settings
   */
  // Custom Typography ( Uncomment to use ).
  //require get_stylesheet_directory() . '/inc/settings/child-admin-typography.php';

  // Custom image sizes ( Uncomment to use ).
  //require get_stylesheet_directory() . '/inc/settings/child-admin-image-sizes.php';
}