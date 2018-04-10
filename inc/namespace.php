<?php

namespace Pressbooks\Lti\Provider;

/**
 * Generate a globally unique identifier (GUID)
 *
 * @return string
 */
function globally_unique_identifier() {
	$option = 'pressbooks_lti_GUID';
	$guid = get_site_option( $option );
	if ( ! $guid ) {
		if ( function_exists( 'com_create_guid' ) === true ) {
			$guid = trim( com_create_guid(), '{}' );
		} else {
			$guid = sprintf( '%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 16384, 20479 ), mt_rand( 32768, 49151 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ) );
		}
		update_site_option( $option, $guid );
	}
	return $guid;
}