<?php
/**
 * Shortcode
 *
 * @param $attrs
 *
 * @return url
 */
add_shortcode('tm_dione_color', 'tm_dione_color' );

function tm_dione_color( $attrs = array (), $content = '' )
{
	$atts = shortcode_atts( array(
		'cl' => '',
	), $attrs, 'tm_dione_color' );

	$html = '<span class="'.$atts['cl'].'">'.$content.'</span>';

	return $html;
}