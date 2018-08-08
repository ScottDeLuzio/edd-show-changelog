<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action( 'wp_enqueue_scripts', 'eddscl_front_end_specific_scripts' );

/* Adds the JS required to collapse and expand the changelog notice
 * Adds the styles for the changelog button and other related features.
 * Avoids adding JS or style to any pages other than single download pages.
 */
function eddscl_front_end_specific_scripts(){
	global $post;

	if ( $post && $post->post_type == 'download' && is_singular( 'download' ) ){
		wp_enqueue_script( 'eddscl-collapse-header', plugin_dir_url( EDDSCL_PLUGIN ) . 'includes/js/collapse-header.js', array( 'jquery' ), EDDSCL_PLUGIN_VERSION );
		wp_enqueue_style( 'eddscl-styles', plugin_dir_url( EDDSCL_PLUGIN ) . 'includes/css/eddscl-styles.css', array(), EDDSCL_PLUGIN_VERSION );
	}
}