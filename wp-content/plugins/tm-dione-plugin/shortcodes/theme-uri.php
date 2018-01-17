<?php
/**
 * Shortcode get link
 *
 * @param $attrs
 *
 * @return url
 */
 add_shortcode('tm_dione_theme_uri_shortcode', 'tm_dione_theme_uri_shortcode' );

 function tm_dione_theme_uri_shortcode( $attrs = array (), $content = '' )
 {
 	$theme_uri = get_template_directory_uri();

 	return trailingslashit( $theme_uri );
 }

if(!function_exists('tm_homepage')) {
	 add_shortcode('tm_homepage', 'tm_homepage' );
	 function tm_homepage( $attrs = array (), $content = '' )
	 {
	 	$theme_uri = home_url();

	 	return trailingslashit( $theme_uri );
	 }
 }
