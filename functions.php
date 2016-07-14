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

/**

// Add child Scripts.
add_action( 'wp_enqueue_scripts', 'add_child_scripts', 20 );
function add_child_scripts() {

  // Site scripts init.
  wp_enqueue_script( 'theme_scripts', get_stylesheet_directory_uri().'/assets/js/min/theme.min.js', array(), '1.0.1', true );

}

*/

/**
 * Two build in "hot swap" navigation modules
 *
 * You can activate one of them by uncommnet
 * Also see the style.scss to uncomment the css needed to function 
 *
 * Of course you can also delete them!
 */

// require get_stylesheet_directory() . '/theme-modules/wps-menu-one/wps-module-mo-init.php';
// require get_stylesheet_directory() . '/theme-modules/wps-menu-two/wps-module-mt-init.php';



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
  // add_filter('main_nav_class','theme_main_navigation_extra_class');

  /* Disable WP default gallery style and use our own see: assets/sass/project/_components.galleries.scss */
  add_filter( 'use_default_gallery_style', '__return_false' );

}

/**
*  Add site page content a backgroud image
*  unsing page featured image
*
*/

// Add page background image.
//add_action('wp_head','feat_img_content');

// Add nav class
//add_filter('site_header_class','header_nav_bg_modifier');


/**
* 
* If has featured image, add it as background to .site-content ON PAGES
*

function feat_img_content(){
  global $post;

  if(is_404() || is_single()){ return; }

  $thumb_id = get_post_thumbnail_id($post->ID) ? get_post_thumbnail_id($post->ID) : '';

  if(!$thumb_id){return;}

  $large_image_url = wp_get_attachment_image_src(  $thumb_id , 'full' );
  
 
  echo '<style type="text/css" media="screen">.site-pre-content{background:url(\''. $large_image_url[0] .'\') center center no-repeat;}.site-header{position:absolute; width: 100%;}</style>';

}


function header_nav_bg_modifier($classes){  
  global $post;

  if(is_404() || is_single() || null === $post){ return ; }

  $thumb_id = get_post_thumbnail_id($post->ID) ? get_post_thumbnail_id($post->ID) : '';

  if(!$thumb_id){return;}

  $classes[] = 'bg--opaq'; 

  return $classes;

}

*/