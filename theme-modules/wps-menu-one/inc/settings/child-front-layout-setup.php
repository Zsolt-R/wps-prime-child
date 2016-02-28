<?php
/**
 * Child theme front end classes
 *
 * @package wps_prime
 */

/**
 *
 * @param array $classes Holds all the main header right area classes in an array.
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
function theme_main_nav_class_hide($classes){


  $classes[] = 'palm--hide';


  return $classes;
}