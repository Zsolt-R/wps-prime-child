<?php
/**
 *	WPS-Child Theme
 *
 */

$content_width = 1200; /* pixels */

// Theme options setup global.
$theme_options = get_option('wps_prime_settings');


/***************************************
    # REMOVE PARENT SCRIPTS & STYLES
****************************************/

// Deregister parent main site script.
add_action( 'wp_enqueue_scripts', 'remove_scripts', 100 );
function remove_scripts() {

    // Deregister Parent theme Script.
    wp_dequeue_script('site_js');  

}

// Remove parent style and add child style.
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Remove main stylesheet.
    wp_deregister_style( 'wps_prime-style' );

    // Add child style.
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');   
    
}

/***************************************
    #ADD CHILD THEME SCRIPTS
****************************************/

// Add child Scripts.
add_action( 'wp_enqueue_scripts', 'add_child_scripts', 20 );

function add_child_scripts() {

  // Site scripts init.
  wp_enqueue_script( 'theme_scripts', get_stylesheet_directory_uri().'/assets/js/min/theme.min.js', array(), '1.0.1', true );

}

/* Setup Child Theme */
add_action( 'after_setup_theme', 'child_theme_setup', 11);

/**
 * Child theme setup function
 */
function child_theme_setup() {
  
  /**  
   * Require settings
   */

  // Child theme frontent class filter functions.
  require get_stylesheet_directory() . '/inc/settings/child-front-layout-setup.php';

  // Custom Typography ( Uncomment to use ).
  // require get_stylesheet_directory() . '/inc/settings/child-admin-typography.php';

  // Custom image sizes ( Uncomment to use ).
  // require get_stylesheet_directory() . '/inc/settings/child-admin-image-sizes.php';

  /**
   * Add  frontend class filters
   */

  /* Main Navigation adjustments css */
  add_filter('main_nav_class','theme_main_navigation_extra_class');

}