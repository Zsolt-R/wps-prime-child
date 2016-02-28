<?php
/**
 * Child theme front end classes
 *
 * @package wps_prime
 */

function adjust_layout_header_left($classes){

	$classes[] = '2/3';
	return $classes;
}

function adjust_layout_header_right($classes){

	$classes[] = 'txt--right';
	$classes[] = '1/3';
	return $classes;
}

// Remove default nav class
function theme_main_nav_class_remove($classes){

  // Element to be removed.
  $whitelist = array();
  
  $whitelist[] = 'lap-and-up-mt';

  $classes[] = 'cd-primary-nav';

  $classes = array_diff( $classes, $whitelist );

  return $classes;
}