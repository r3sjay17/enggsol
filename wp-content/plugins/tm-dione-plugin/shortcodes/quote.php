<?php
// Shortcode
function tm_dione_quote( $atts, $content = "" ) {
	$atts = shortcode_atts( array(
		'style' => '',
		'class' => '',
	), $atts, 'tm_dione_quote' );

	$style = '';
	$css_class = 'quote';
	if ( $atts['style'] ) {
		$css_class .= ' '.$atts['style'];
	}
	if ( $atts['class'] ) {
		$css_class .= ' '.$atts['class'];
	}

	$htPre = '<blockquote class="'.$css_class.'" style="' . $style . '">';
	$htAft = '</blockquote>';
	$html  = $htPre . $content . $htAft;

	return $html;
}

add_shortcode( 'tm_dione_quote', 'tm_dione_quote' );