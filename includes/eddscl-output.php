<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action( 'edd_after_download_content', 'eddscl_filter_for_changelog' );
function eddscl_filter_for_changelog( $download_id = false ){
	if ( !$download_id || !defined( 'EDD_SL_VERSION' ) )
		return;

	/* Version 3.6 of EDD Software Licensing introduced get_changelog()
	 * as a better way to access the changelog than get_post_meta().
	 * When EDD changes from CPT to custom tables, get_post_meta() won't work anymore.
	 * get_changelog() currently uses get_post_meta(), but can be updated to
	 * retrieve the changelog correctly when EDD is no longer using CPT for downloads.
	 */
	if( version_compare( EDD_SL_VERSION, '3.6' ) >= 0 ){
		$download	= new EDD_SL_Download( $download_id );
		$changelog	= $download->get_changelog();
	} else {
		$changelog	= get_post_meta( $download_id, '_edd_sl_changelog', true );
	}
	$heading	= apply_filters( 'eddscl_changelog_heading', 'h3' );

	echo '<' . $heading . ' class="eddscl_heading"><button data-expandable="changelog">' . __( 'Show Changelog', 'eddscl' ) . '</button></' . $heading . '>';
	echo '<div id="changelog">' . $changelog . '</div>';
}