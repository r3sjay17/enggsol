<?php
add_filter( 'thememove_import_demos', 'tm_dione_import_demos' );

function tm_dione_import_demos() {
	return array(
		'thememove01' => array(
			'screenshot' => TM_DIONE_THEME_ROOT . '/screenshot.jpg',
			'name'       => TM_DIONE_PARENT_THEME_NAME
		),
	);
}

add_filter( 'thememove_import_style', 'tm_dione_import_style' );

function tm_dione_import_style() {
	return array(
		'title_color' => '#222',
		'link_color' => '#222',
		'notice_color' => '#222',
		'logo' => get_template_directory_uri() . '/assets/images/logo_default.png',
	);
}

add_filter( 'thememove_import_package_url', 'tm_dione_import_package_url' );

function tm_dione_import_package_url() {
	return 'http://api.insightstud.io/update/dione/import/tm-dione-thememove01.zip';
}

add_action( 'tm_after_import_data', 'tm_dione_after_import_data');

function tm_dione_after_import_data(){
	global $wpdb;
	$old = 'http:\/\/dongnt.local\/dione\/';
	$new = trim(json_encode(get_site_url('/'). '/'), '"');
	$wpdb->query($wpdb->prepare( "UPDATE `wp_revslider_slides` SET `params` = replace(params, %s, %s)", $old, $new ));
	$wpdb->query($wpdb->prepare( "UPDATE `wp_revslider_slides` SET `layers` = replace(layers, %s, %s)", $old, $new ));
}
