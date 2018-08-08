<?php
/*
Plugin Name: EDD Show Changelog
Description: Shows the changelog at the bottom of the download page
Author: Scott DeLuzio
Version: 1.0.0
Author URI: https://scottdeluzio.com/
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! defined( 'EDDSCL_PLUGIN' ) ) {
	define( 'EDDSCL_PLUGIN', __FILE__ );
}
if( ! defined( 'EDDSCL_PLUGIN_DIR' ) ) {
	define( 'EDDSCL_PLUGIN_DIR', dirname( __FILE__ ) );
}
if( ! defined( 'EDDSCL_PLUGIN_VERSION' ) ) {
	define( 'EDDSCL_PLUGIN_VERSION', '1.0.0' );
}

/* Adds the JS required to collapse and expand the changelog notice
 * Adds the styles for the changelog button and other related features.
 */
add_action( 'wp_enqueue_scripts', 'eddscl_front_end_specific_scripts' );

function eddscl_front_end_specific_scripts(){
	wp_enqueue_script( 'eddscl-collapse-header', plugin_dir_url( EDDSCL_PLUGIN ) . 'includes/js/collapse-header.js', array( 'jquery' ), EDDSCL_PLUGIN_VERSION );
	wp_enqueue_style( 'eddscl-styles', plugin_dir_url( EDDSCL_PLUGIN ) . 'includes/css/eddscl-styles.css', array(), EDDSCL_PLUGIN_VERSION );
}
include( EDDSCL_PLUGIN_DIR . '/includes/eddscl-output.php' );