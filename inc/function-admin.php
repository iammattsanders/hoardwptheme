<?php

/*

@package hoardtheme

  =======================================
  ADMIN PAGE
  =======================================
*/

function hoard_add_admin_page() {

// Generate Admin Page
  add_menu_page( 'Hoard Theme Options', 'Hoard', 'manage_options', 'hoard', 'hoard_theme_create_page', 'dashicons-admin-customizer', 110);

//Generate Admin Subpages
add_submenu_page( 'hoard', 'Hoard Theme Options', 'General', 'manage_options', 'hoard', 'hoard_theme_create_page' );
add_submenu_page( 'hoard', 'Hoard CSS Options', 'Custom CSS', 'manage_options', 'hoard_css', 'hoard_theme_settings_page' );


//Activate Custom Settings
add_action ( 'admin_init', 'hoard_custom_settings');
}

add_action( 'admin_menu', 'hoard_add_admin_page' );

function hoard_custom_settings() {
register_setting( 'hoard-settings-group', 'first_name');
register_setting( 'hoard-settings-group', 'last_name');
register_setting( 'hoard-settings-group', 'tagline');
register_setting( 'hoard-settings-group', 'twitter', 'hoard_sanitize_twitter');
register_setting( 'hoard-settings-group', 'facebook');
// register_setting( 'hoard-settings-group', 'first_name');
// register_setting( 'hoard-settings-group', 'first_name');
 add_settings_section( 'hoard-sidebar-options', 'Sidebar Options', 'hoard_sidebar_options', 'hoard');
 add_settings_field( 'sidebar-name', 'Full Name', 'hoard_sidebar_name', 'hoard', 'hoard-sidebar-options');
  add_settings_field( 'sidebar-tagline', 'Tagline', 'hoard_sidebar_tagline', 'hoard', 'hoard-sidebar-options');
  add_settings_field( 'sidebar-twitter', 'Twitter', 'hoard_sidebar_twitter', 'hoard', 'hoard-sidebar-options');
    add_settings_field( 'sidebar-facebook', 'Facebook', 'hoard_sidebar_facebook', 'hoard', 'hoard-sidebar-options');
}

function hoard_sidebar_options() {
  echo 'Customize your sidebar information';
}

function hoard_sidebar_name() {
  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/>
   <input type="text" name="last_name" value="'.$lasttName.'" placeholder="Last Name"/>';
}

function hoard_sidebar_tagline() {
  $tagline = esc_attr( get_option( 'tagline' ) );
  echo '<input type="text" name="tagline" value="'.$tagline.'" placeholder="Tagline"/>';
}

function hoard_sidebar_twitter() {
  $twitter = esc_attr( get_option( 'twitter' ) );
  echo '<input type="text" name="twitter" value="'.$twitter.'" placeholder="Twitter"/><p class="description">Input your username without the @ character</p>';
}

function hoard_sidebar_facebook() {
  $facebook = esc_attr( get_option( 'facebook' ) );
  echo '<input type="text" name="facebook" value="'.$facebook.'" placeholder="Facebook"/>';
}

// Sanitization settings

function hoard_sanitize_twitter( $input ){
  $output = sanitize_text_field($input);
  $output = str_replace('@', '', $output);
  return $output;
}

function hoard_theme_create_page() {
//generate admin page
require_once(get_template_directory() . '/inc/templates/hoard-admin.php');
}

function hoard_theme_settings_page() {
//generate settings subpage
}
