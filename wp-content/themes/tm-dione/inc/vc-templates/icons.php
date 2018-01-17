<?php
$default_args = array(
	"type"             => "",
	"icon_type"        => "fontawesome",
	"icon_fontawesome" => "",
	"icon_openiconic"  => "",
	"icon_typicons"    => "",
	"icon_entypo"      => "",
	"icon_linecons"    => "",
	"icon_pe7stroke"   => "",
	"icon"             => "",
	"icon_size"        => "",
	"color"            => "",
	"custom_icon"      => "",
	"align"            => "",
	"display"          => "",
	"custom_class"     => "",
	'css'              => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$html = "";

$style = '';

if ( $display != "" ) {
	$style .= 'display:' . $display . ';';
}

if ( $align != "" ) {
	$style .= 'text-align:' . $align . ';';
}

if ( $color != "" ) {
	$style .= 'color:' . $color . ';';
}

if ( $icon_size != "" ) {
	$style .= 'font-size:' . $icon_size . 'px;';
}

$id_style = uniqid('style-');
tm_dione_apply_style($style, '#' . $id_style);

$icon_html = '<div class="icon ' . $custom_class . $css_class . '" id="' . $id_style . '" >';

if ( $custom_icon != "" && $type == "custom" ) {
	if ( is_numeric( $custom_icon ) ) {
		$custom_icon_src = wp_get_attachment_url( $custom_icon );
	} else {
		$custom_icon_src = $custom_icon;
	}

	$icon_html .= '<img src="' . esc_attr($custom_icon_src) . '" alt="">';
} else {
	$iconClass = isset( ${"icon_" . $icon_type} ) ? esc_attr( ${"icon_" . $icon_type} ) : 'fa fa-adjust';
	$icon_html .= "<i class='" . $iconClass . "' ></i>";
}

$icon_html .= '</div>';

$html .= $icon_html;

echo '' . $html;
