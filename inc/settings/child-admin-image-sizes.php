<?php

 // Override parent setup
 add_image_size( 'wps_prime_medium', 336, 420, true );
 add_image_size( 'wps_child_medium_small', 245, 300, array( 'center', 'center' ) );
 add_image_size( 'wps_child_mini', 40, 40, array( 'center', 'center' ) );
 add_image_size( 'wps_child_square_medium', 150, 150, array( 'center', 'center' ) );
 add_image_size( 'wps_child_square_small', 100, 100, array( 'center', 'center' ) );

 // Full image size used in full width sliders.
add_image_size( 'wps_child_medium_large', 664, 400, array( 'center', 'center' ) );

// Show at insertion.
add_filter( 'image_size_names_choose', 'child_custom_image_sizes_choose' );

/**
 * Add image sizes to content insert image size list
 *
 * @param array $sizes Image sizes array.
 * @return array
 */


function child_custom_image_sizes_choose( $sizes ) {
	$custom_sizes = array(

		'wps_child_medium_large' => 'WPS Medium Large',
		'wps_child_medium_small' => 'WPS Medium Small',

	);
	return array_merge( $sizes, $custom_sizes );
}


//ref: https://wordpress.org/support/topic/new-image-size-medium_large-not-generated-on-upload
add_action( 'after_switch_theme', 'enforce_image_size_options' );
function enforce_image_size_options() {
	//update_option( 'thumbnail_size_w', 155 );
	//update_option( 'thumbnail_size_h', 0 );
	//update_option( 'thumbnail_crop', 0 );
	update_option( 'medium_size_w', 308 );
	update_option( 'medium_size_h', 210 );
	update_option( 'medium_crop', 1 );
	// update_option( 'medium_large_size_w', 838 );
	// update_option( 'medium_large_size_h', 0 );
	//update_option( 'large_size_w', 350 );
	//update_option( 'large_size_h', 0 );
}
