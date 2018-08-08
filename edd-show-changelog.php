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
include( EDDSCL_PLUGIN_DIR . '/includes/eddscl-output.php' );

include( EDDSCL_PLUGIN_DIR . '/includes/scripts.php' );