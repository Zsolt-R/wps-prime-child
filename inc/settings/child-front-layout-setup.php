<?php
/**
 * Child theme front end classes
 *
 * @package wps_prime
 */

/**
 * Function to add CSS class to main navigation
 *
 * @param array $classes Holds all the main navigation classes in an array.
 */
function theme_main_navigation_extra_class($classes){
	
	$classes[] = 'lap-and-up-mt';
	return $classes;
}
