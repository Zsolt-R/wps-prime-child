<?php
/**
 * Child theme front end classes
 *
 * @package wps_prime
*/

/**
 * Setting for theme header layout left area
 *
 * @param array $classes Storred css classes.
 * @return array
 */
function header_layout_left( $classes ) {

	$classes[] = 'col';
	$classes[] = '_palm-8';
	$classes[] = '_lap-and-up-3';
	return $classes;
}


/**
 * Setting for theme header layout right area
 *
 * @param array $classes Storred css classes.
 * @return array
 */
function header_layout_right( $classes ) {

	$classes[] = 'col';
	$classes[] = '_palm-4';
	$classes[] = '_lap-and-up-9';
	return $classes;
}

/**
 * Setting for id="primary"
 *
 * @param array $classes Storred css classes.
 * @return array
 */
function main_layout( $classes ) {
	global $wp_query, $wpdb;

	// Element to be removed.
	$whitelist = array();

	// Add 'class-name' to the $classes array!
	$classes[] = 'col';
	$classes[] = '_lap-and-up-9';
	$classes[] = 'content-area';

	// Whitelist Elements to be removed upon condition!
	if ( is_page_template( 'templates/template-nosidebar.php' ) || is_404() ) {
		$whitelist[] = '_lap-and-up-9';
	}

	if ( is_page_template( 'templates/template-fullwidth.php' ) || is_404() ) {
		$whitelist[] = '_lap-and-up-9';
		$whitelist[] = 'col';
	}

	// Remove Classes!
	$classes = array_diff( $classes, $whitelist );
	// Return the $classes array!
	return $classes;
}

/**
 * Page html Wrappers
*/


/**
 * Add page wrapper html element
 */
function page_top() {

	global $wp_query, $wpdb;

	$meta = get_post_meta(get_the_ID(),'page_full_width',true);


	// Whitelist Elements to be removed upon condition!
	if ( is_page_template( 'templates/template-fullwidth.php' ) || is_404()) {
		return;
	} else {
		echo'<div class="o-wrapper"><div class="grid-1">';
	}
}

/**
 * Add page wrapper html element
 */
function page_end() {

	global $wp_query, $wpdb;

	$meta = get_post_meta(get_the_ID(),'page_full_width',true);

	// Whitelist Elements to be removed upon condition!
	if ( is_page_template( 'templates/template-fullwidth.php' ) || is_404()) {
		return;
	} else {
		echo '</div></div>';
	}
}