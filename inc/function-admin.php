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
add_submenu_page( 'hoard', 'Hoard Sidebar Options', 'Sidebar', 'manage_options', 'hoard', 'hoard_theme_create_page' );
add_submenu_page( 'hoard', 'Hoard Theme Options', 'Theme Options', 'manage_options', 'hoard_theme', 'hoard_theme_support_page' );
add_submenu_page( 'hoard', 'Hoard CSS Options', 'Custom CSS', 'manage_options', 'hoard_css', 'hoard_theme_settings_page' );

}
add_action( 'admin_menu', 'hoard_add_admin_page' );

//Activate Custom Settings
add_action ( 'admin_init', 'hoard_custom_settings');

function hoard_custom_settings() {
//Sidebar Options
register_setting( 'hoard-settings-group', 'profile_picture');
register_setting( 'hoard-settings-group', 'first_name');
register_setting( 'hoard-settings-group', 'last_name');
register_setting( 'hoard-settings-group', 'tagline');
register_setting( 'hoard-settings-group', 'twitter', 'hoard_sanitize_twitter');
register_setting( 'hoard-settings-group', 'facebook');
// extra setting line

add_settings_section( 'hoard-sidebar-options', 'Sidebar Options', 'hoard_sidebar_options', 'hoard');

add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'hoard_sidebar_profile', 'hoard', 'hoard-sidebar-options');
add_settings_field( 'sidebar-name', 'Full Name', 'hoard_sidebar_name', 'hoard', 'hoard-sidebar-options');
add_settings_field( 'sidebar-tagline', 'Tagline', 'hoard_sidebar_tagline', 'hoard', 'hoard-sidebar-options');
add_settings_field( 'sidebar-twitter', 'Twitter', 'hoard_sidebar_twitter', 'hoard', 'hoard-sidebar-options');
add_settings_field( 'sidebar-facebook', 'Facebook', 'hoard_sidebar_facebook', 'hoard', 'hoard-sidebar-options');
//extra settings line

//Theme Support Options
register_setting( 'hoard-theme-support', 'post_formats');

add_settings_section( 'hoard-theme-options', 'Theme Options', 'hoard_theme_options', 'hoard_theme');

add_settings_field( 'post-formats', 'Post Formats', 'hoard_post_formats', 'hoard_theme', 'hoard-theme-options');

}

function hoard_theme_options() {
  echo 'Activate and Deactivate specific Theme Support Options';
}

function hoard_post_formats() {
 $options = get_option( 'post_formats' );
 $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
 $output = '';
 foreach ( $formats as $format ){
   $checked = ( @$options[$format] == 1 ? 'checked' : '' );
   $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
 }
 echo $output;

}




//Sidebar Options Functions
function hoard_sidebar_options() {
  echo 'Customize your sidebar information';
}

function hoard_sidebar_profile() {
  $profilePic = esc_attr( get_option( 'profile_picture' ) );
  echo '
  <input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">
  <input type="hidden" id="profile-picture-preview" name="profile_picture" value="'.$profilePic.'"/>';
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


//Template submenu functions

function hoard_theme_create_page() {
//generate sidebar options page
require_once(get_template_directory() . '/inc/templates/hoard-admin.php');
}

function hoard_theme_settings_page() {
//generate CSS settings subpage
echo '<h1>CSS</h1>';
}

function hoard_theme_support_page() {
//generate theme support page
require_once(get_template_directory() . '/inc/templates/hoard-theme-support.php');
}
