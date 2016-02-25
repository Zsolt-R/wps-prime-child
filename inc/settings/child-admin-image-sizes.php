<?php

// Full image size used in full width sliders.
// add_image_size( 'wps_child_medium_large', 832, 512, array( 'center', 'center' ) );
// add_image_size( 'wps_child_medium_small', 255, 180, array( 'center', 'center' ) );

// Show at insertion.
// add_filter( 'image_size_names_choose', 'child_custom_image_sizes_choose' );

/**
 * Add image sizes to content insert image size list
 *
 * @param array $sizes Image sizes array.
 * @return array
 */

/*
function child_custom_image_sizes_choose( $sizes ) {
	$custom_sizes = array(

		'wps_child_medium_large' => 'WPS Medium Large',
		'wps_child_medium_small' => 'WPS Medium Small',

	);
	return array_merge( $sizes, $custom_sizes );
}
*/