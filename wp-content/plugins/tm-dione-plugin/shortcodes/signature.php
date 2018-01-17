<?php
/**
 * Shortcode get link
 *
 * @param $attrs
 *
 * @return url
 */
add_shortcode('signature', 'tm_dione_signature_shortcode' );

function tm_dione_signature_shortcode( $attrs = array (), $content = '' )
{
	return '<img class="pull-right" src="'. get_template_directory_uri() . '/assets/images/signature.jpg"/>';

}