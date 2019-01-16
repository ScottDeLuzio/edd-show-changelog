<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_shortcode( 'show_edd_changelog', 'eddscl_shortcode' );
function eddscl_shortcode( $atts ){
	if ( !defined( 'EDD_SL_VERSION' ) )
		return;

	$a = shortcode_atts( array(
		'id'		=> '',
		'collapse'	=> '',
		'heading'	=> '',
	), $atts );
	/* Version 3.6 of EDD Software Licensing introduced get_changelog()
	 * as a better way to access the changelog than get_post_meta().
	 * When EDD changes from CPT to custom tables, get_post_meta() won't work anymore.
	 * get_changelog() currently uses get_post_meta(), but can (likely) be updated to
	 * retrieve the changelog correctly when EDD is no longer using CPT for downloads.
	 */
	if( version_compare( EDD_SL_VERSION, '3.6' ) >= 0 ){
		$download	= new EDD_SL_Download( $a['id'] );
		$changelog	= $download->get_changelog();
	} else {
		$changelog	= get_post_meta( $a['id'], '_edd_sl_changelog', true );
	}

	switch ( $a['collapse'] ) {
		case 'true':
			$output = '<h2>' . $a['heading'] . '</h2>';
			$output .= '<div class="changelog">' . $changelog . '</div>';
			break;

		default:
			$heading	= apply_filters( 'eddscl_changelog_heading', 'h3' );

			$output = '<' . $heading . ' class="eddscl_heading"><button data-expandable="changelog">' . $a['heading'] . '</button></' . $heading . '>';
			$output .= '<div id="changelog">' . $changelog . '</div>';
			break;
	}
	return $output;
}