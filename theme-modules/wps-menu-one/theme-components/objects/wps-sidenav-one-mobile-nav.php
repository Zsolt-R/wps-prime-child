<?php
/**
 * Child theme mobile navigation
 *
 * @package wpshapers-theme
 */

/**
* Mobile sidenav
*/ 
function child_theme_site_sidenav(){  
    echo '<nav id="sidenav" class="side-nav lap-and-up--hide" role="navigation" data-ui-component="site-main-navigation">'; 
    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'side-nav__list', 'depth' => 0, 'walker'=> new Theme_Menu_Object() ) );
    echo '</nav><!-- #site-navigation -->';
}

/**
 * Mobile sidenav toggle button function
 */
function side_nav_toggle_button(){
    echo  '<button class="toggle-button site-nav__toggler lap-and-up--hide right" data-ui-component="menu-toggle-button"><i class="fa fa-bars"></i> MENU</span></button>';
}
