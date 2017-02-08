<?php
/**
 * Child theme typography
 *
 * @package wps_prime
 */

$childFonts = wps_fonts_setup();

$childFonts->remove_font('Lato');

$childFonts->add_font('Lato',
	'sans-serif',
	'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900',
	'font-weight: 400',
	'font-weight: 900'
);