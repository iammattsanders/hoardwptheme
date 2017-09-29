<?php
/*

@package hoardtheme

  =======================================
  ADMIN ENQUEUE FUNCTIONS
  =======================================
*/

function hoard_load_admin_scripts( $hook ) {



if( 'toplevel_page_hoard' != $hook){
  return;
}

 wp_register_style( 'hoard-admin', get_template_directory_uri() . '/css/hoard.admin.css', array(), '1.0.0', 'all' );
 wp_enqueue_style('hoard-admin');

wp_enqueue_media();

 wp_register_script( 'hoard-admin-script', get_template_directory_uri() . '/js/hoard.admin.js', array('jquery'), '1.0.0', true );
 wp_enqueue_script ('hoard-admin-script');
}

add_action( 'admin_enqueue_scripts', 'hoard_load_admin_scripts');
