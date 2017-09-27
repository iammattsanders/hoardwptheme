<?php

/*

@package hoardtheme

  =======================================
  ADMIN PAGE
  =======================================
*/

function hoard_add_admin_page() {

// Generate Admin Page
  add_menu_page( 'hoard Theme Options', 'hoard', 'manage_options', 'alecaddd_hoard', 'hoard_theme_create_page', 'dashicons-admin-customizer', 110);

//Generate Admin Subpages
add_submenu_page( 'alecaddd_hoard', 'hoard Theme Options', 'Settings', 'manage_options', 'alecaddd_hoard', 'hoard_theme_create_page' );

add_submenu_page( 'alecaddd_hoard', 'hoard CSS Options', 'Custom CSS', 'manage_options', 'alecaddd_hoard_css', 'hoard_theme_settings_page' );
}

// Run it

add_action( 'admin_menu', 'hoard_add_admin_page' );

function hoard_theme_create_page() {
//generate admin page
require_once(get_template_directory() . '/inc/templates/hoard-admin.php');
}

function hoard_theme_settings_page() {
//generate settings subpage
}
