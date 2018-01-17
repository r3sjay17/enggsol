<?php

require_once( dirname( __FILE__ ) . '/thememove.importer.php' );

if ( ! empty( $_POST['import_sample_data'] ) ) {

	global $wpdb;

	$tm_importer = new TM_WP_Importer( $generate_thumb );

	$start = microtime( true );

	$tm_importer->dispatch();

	$time_elapsed_secs = format_import_time( microtime( true ) - $start );

	echo '<script type="text/javascript">document.title="' . esc_html__( 'Initializing Data', 'tm-core' ) . '";</script>';

	// Set 'hello-world' post to unpublished
	$wpdb->query( "UPDATE `" . $wpdb->posts . "` SET `post_status` = 'unpublished' WHERE `post_name` = 'hello-world'" );
}

/**
 * Format import time to human reable
 *
 * @param $time
 *
 * @return string
 */
function format_import_time( $time ) {
	return gmdate( 'H:i:s', $time );;
}