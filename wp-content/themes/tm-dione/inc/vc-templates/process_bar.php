<?php
$default_args = array(
	"title"                  => "",
	"element_tag"            => "h6",
	"title_color"            => "",
	"percentage"             => "80",
	"percentage_color"       => "",
	"active_bg_color"        => "",
	"custom_active_bg_color" => "",
	"inactive_bg_color"      => "",
	"reverse_enable"         => "",
	"custom_class"           => "",
	'css'                    => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if($reverse_enable == 'reverse_enable-value') {
	$css_class .= ' reverse reverse-md';
}

$progress_active_style = $progress_active_class = "";

if ( $active_bg_color != "" ) {
	if ( $active_bg_color == 'custom' ) {
		$progress_active_style = 'background-color:' . $custom_active_bg_color . ';';
	} else {
		$progress_active_class = $active_bg_color;
	}
}

$html = "";

$style = $style_title = '';

if ( $title_color != "" ) {
	$style_title .= 'color:' . $title_color . ';';
}
$style = $progress_active_style;

$selector_style = uniqid('selector_style-');
$selector_style_title = uniqid('selector_style_title-');

tm_dione_apply_style($style, '#'.$selector_style);
tm_dione_apply_style($style_title, '#'.$selector_style_title);


$element_tag = ( $element_tag != "" ) ? $element_tag : 'h6';
$opentag     = '<' . $element_tag . ' class="progress-label" id="' . $selector_style_title . '">';
$closetag    = '</' . $element_tag . '>';

$html .= '<div class="progress-item' . $css_class . '">';

$html .= $opentag . $title . $closetag;
$html .= '<div class="progress">';
$html .= '<div class="progress-bar ' . $progress_active_class . '" data-progress-width="'.esc_attr($percentage).'" id="' . $selector_style . ' ">';
$html .= '<span class="sr-only">' . $percentage . '% Complete</span>';
$html .= '<span class="progress_units">' . $percentage . '%</span>';
$html .= '</div></div></div>';

echo '' . $html;
