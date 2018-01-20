<?php
/**
 * Plugin Name: weather update
 * Description: Use this plugin for show weathers update.
 * Plugin URI:
 * Author: Mohammad Imran
 * Author URI: http://imran71.ga/
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: imu_weather
 */

if ( !defined('ABSPATH') ) die( 'Sorry! This is not your place!' );


//----------------------------------------------------------------------
// Core constant defination
//----------------------------------------------------------------------
if (!defined('IMU_PLUGIN_VERSION')) define( 'IMU_PLUGIN_VERSION', '1.0.0' );
if (!defined('IMU_PLUGIN_BASENAME')) define( 'IMU_PLUGIN_BASENAME', plugin_basename(__FILE__) );
if (!defined('IMU_MINIMUM_WP_VERSION')) define( 'IMU_MINIMUM_WP_VERSION', '3.5' );
if (!defined('IMU_PLUGIN_DIR')) define( 'IMU_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if (!defined('IMU_PLUGIN_URI')) define( 'IMU_PLUGIN_URI', plugins_url('', __FILE__) );
if (!defined('IMU_PLUGIN_TEXTDOMAIN')) define( 'IMU_PLUGIN_TEXTDOMAIN', 'imu_weather' );


//----------------------------------------------------------------------
// Including Files
//----------------------------------------------------------------------


//add option page
require_once IMU_PLUGIN_DIR . '/inc/shortcode.php';

//register front end script & style
function imu_enqueue_styles(){

    //register bootstrap
    wp_register_style('weather-bootstrap',IMU_PLUGIN_URI .'/asset/css/bootstrap.min.css',true,IMU_PLUGIN_VERSION);
    wp_enqueue_style ('weather-bootstrap');

    //register fontawesome sheet
    wp_register_style('font-awesome',IMU_PLUGIN_URI .'/asset/css/font-awesome.min.css',true,IMU_PLUGIN_VERSION);
    wp_enqueue_style ('font-awesome');

    //register style sheet
    wp_register_style('weather-style',IMU_PLUGIN_URI .'/asset/css/weather-style.css',true,IMU_PLUGIN_VERSION);
    wp_enqueue_style ('weather-style');
    

    //js file for admin
    wp_register_script('weather-js',IMU_PLUGIN_URI .'/asset/js/weather-js.js',array('jquery'),IMU_PLUGIN_VERSION,true);
    wp_enqueue_script ('weather-js');

    //js file for admin
    wp_register_script('google-map','https://maps.googleapis.com/maps/api/js?key=AIzaSyD2P4Lcw0VH1Kui6BPZ3PNRUNMq_Gz5sQs&libraries=places');
    wp_enqueue_script ('google-map');

    ?>
<!--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2P4Lcw0VH1Kui6BPZ3PNRUNMq_Gz5sQs&libraries=places&callback=abc"></script>-->

    <?php

}
add_action('wp_enqueue_scripts','imu_enqueue_styles');


//register admin panel style
/*function hek_admin_enque_script(){
    //bootstrap for admin panel
    wp_register_style('bootstrap-admin',IMU_PLUGIN_URI .'/css/bootstrap.min.css',true,IMU_PLUGIN_VERSION);
    wp_enqueue_style ('bootstrap-admin');

    //js file for admin
    wp_register_script('admin-comingsoon',IMU_PLUGIN_URI .'/js/comingsoon.js',array('jquery'),IMU_PLUGIN_VERSION,true);
    wp_enqueue_script ('admin-comingsoon');
}

add_action("admin_enqueue_scripts", "hek_admin_enque_script");*/