<?php
$default_args = array(
	'style'        => 'style1',
	"custom_class" => "",
	'css'          => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$style = ( $style != "" ) ? $style : 'style1';

$html = '<div class="amazing-list ' . esc_attr( $style ) . ' ' . $css_class . ' ' . $custom_class . '" >';
$html .= strip_tags( $content, "<ul><li>" );
$html .= '</div>';

echo '' . $html;
