<?php
$default_args = array(
	'height'       => '',
	"width"        => "",
	"color"        => "",
	'margin'       => "",
	'custom_class' => '',
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = $custom_class;

$style = '';

if ( $color != "" ) {
	$style .= 'background:' . $color . ';';
}

if ( $margin != "" ) {
	$style .= 'margin:' . $margin . ';';
}

if ( $height != "" ) {
	$style .= 'height:' . $height . ';';
}

if ( $width != "" ) {
	$style .= 'width:' . $width . ';';
}

$id_style = uniqid('style-');
tm_dione_apply_style($style, '#' . $id_style);

$html = '<div class="amazing-line ' . $css_class . '" id="' . $id_style . '" >';
$html .= '</div>';

echo "" . $html;
