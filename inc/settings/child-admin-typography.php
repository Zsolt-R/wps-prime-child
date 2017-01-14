<?php
/**
 * Child theme typography
 *
 * @package wps_prime
 */

/* Add fonts */
$themeFonts = WpsGenerateThemeFonts::get_instance();


$themeFonts->remove_font('Lato');

$themeFonts->add_font('Montserrat',
	'sans-serif',
	'https://fonts.googleapis.com/css?family=Montserrat:400,700',
	'font-weight: 400',
	'font-weight: 700'
);

$themeFonts->add_font('Lato',
	'sans-serif',
	'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900',
	'font-weight: 400',
	'font-weight: 900'
);