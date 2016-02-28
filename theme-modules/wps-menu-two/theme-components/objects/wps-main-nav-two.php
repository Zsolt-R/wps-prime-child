<?php
/**
 * Child theme main navigation 
 * pluggable function override.
 * Include this file outside theme setup, it needs to be run as fast s possible in order to override the main theme's function
 *
 * @package wpshapers-theme
 */

/**
 * Override main navigation with pluggable function
 * this function override must happen as fast as possible, using it on child theme setup will throw an error
 */
function theme_site_nav() {

  echo '<nav id="site-nav-prime"'.main_nav_class().' role="navigation" data-ui-component="site-main-navigation">';

  wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mt_site-nav__list main-primary-nav', 'depth' => 0, 'walker'=> new Wps_Module_Mt_Walker() ) );
  
  echo '</nav><!-- #site-navigation -->';

}

function theme_site_nav_secondary() {

  echo '<nav id="site-nav-second" class="cd-secondary-nav" role="navigation" data-ui-component="site-main-navigation">';

  wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'site-nav__list main-secondary-nav', 'depth' => 0, 'walker'=> new Theme_Menu_Object() ) );
  echo '</nav><!-- #site-navigation -->';

}


/**
 * Mobile sidenav toggle button function
 */
function theme_site_nav_toggle_button(){
    echo  '<button class="cd-primary-nav-trigger" data-ui-component="menu-toggle-button"><span class="cd-menu-text">MENU</span> <span class="cd-menu-icon"></span></span></button>';
}