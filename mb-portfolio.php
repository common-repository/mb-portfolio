<?php

/*
Plugin Name: MB Portfolio
Description: The stylish portfolio for WordPress. Shortcode [mb_portfolio navigation="true" posts="6" term_id="" pagination="false"].
Version: 1.1
Author: Muhammad Mubeen
Author URI: https://www.fiverr.com/wp_expert28
License: GPLv3 or later
*/


add_action( 'wp_enqueue_scripts', 'mbpg_scriptsLinkFunction' );
function mbpg_scriptsLinkFunction() {
   
    wp_enqueue_style( 'bootstrapcdn_css', plugins_url( '/css/bootstrap.min.css', __FILE__ ));
    wp_enqueue_style( 'font_awesome_css', plugins_url( '/css/font-awesome.min.css', __FILE__ ));
    wp_enqueue_style( 'lightbox_css', plugins_url( '/css/lightbox.min.css', __FILE__ ));
    wp_enqueue_style( 'mbpg_style_css',plugins_url( '/css/mb-style.css', __FILE__ ));


    wp_enqueue_script( 'mbpg_isotope_js', plugins_url( '/js/isotope.pkgd.min.js', __FILE__ ), array( 'jquery'), '1.0.0', true );
    wp_enqueue_script( 'mbpg_lightbox_js', plugins_url( '/js/lightbox.min.js', __FILE__ ), array( 'jquery'), '1.0.0', true );
    wp_enqueue_script( 'mbpg_main_js', plugins_url( '/js/main.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
  
    


    
}
$path= plugin_dir_path( __FILE__ )."inc/meta_field.php";
require_once($path);
$path1= plugin_dir_path( __FILE__ )."inc/cpt.php";
require_once($path1);
$path2= plugin_dir_path( __FILE__ )."inc/taxonomy.php";
require_once($path2);
$path3= plugin_dir_path( __FILE__ )."inc/shortcode.php";
require_once($path3);
//Shortcode
