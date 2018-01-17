<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$button_link = vc_build_link( $button_link );
$link        = ( isset( $button_link['url'] ) ) ? $button_link['url'] : '';
$link_title  = ( isset( $button_link['title'] ) ) ? $button_link['title'] : '';
$link_target = ( isset( $button_link['target'] ) ) ? $button_link['target'] : '';
$cst_link    = '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= ' ' . $style . ' ' . $text_align;

$html = "";

$style = '';
if ( $reverse_enable == 'reverse_enable_value' ) {
	$css_class .= ' reverse';
}
if ( $process_enable == 'process_enable_value' ) {
	$css_class .= ' process-style';
	if ( $title_line_enable == 'title_line_enable_value' ) {
		$css_class .= ' title-line';
	}
}

if ( $color != "" ) {
	$style .= 'color:' . $color . ';';
}

if ( $icon_size != "" ) {
	$style .= 'font-size:' . $icon_size . 'px;';
}

$id_style = uniqid('style-');
tm_dione_apply_style($style, '#' . $id_style);

$icon_html = '<div class="icon" id="' . $id_style . '" >';

if ( $custom_icon != "" && $type == "custom" ) {
	if ( is_numeric( $custom_icon ) ) {
		$custom_icon_src = wp_get_attachment_url( $custom_icon );
	} else {
		$custom_icon_src = $custom_icon;
	}

	$icon_html .= '<img src="' . esc_attr($custom_icon_src) . '" alt="">';
} else {
	$iconClass = isset( ${"icon_" . $icon_type} ) ? esc_attr( ${"icon_" . $icon_type} ) : 'fa fa-adjust';
	$icon_html .= "<i class='" . esc_attr($iconClass) . "'></i>";
}

$icon_html .= '</div>';

$style_process_order    = '';
$style_process_order_cl = "";
if ( $process_text_color != "" ) {
	$style_process_order .= 'color:' . $process_text_color . ';';
}

if ( $process_font_weight != "" ) {
	$style_process_order .= 'font-weight:' . $process_font_weight . ';';
}
if ( $process_font_size != "" ) {
	$style_process_order .= 'font-size:' . $process_font_size . ';';
}
if ( $process_border_enable != "process_border_enable_value" ) {
	$style_process_order_cl .= 'without-border';
}
$id_style_process_order = uniqid('style_process_order-');
tm_dione_apply_style($style_process_order, '#' . $id_style_process_order);

// print HTML
$element_tag = ( $element_tag != "" ) ? $element_tag : 'h5';
$opentag     = '<' . $element_tag . ' class="title-box">';
$closetag    = '</' . $element_tag . '>';

$text = ( $text != "" ) ? "<p>{$text}</p>" : '';

if ( $link ) {
	$cst_link = '<a class="text-link" href="' . esc_url( $link ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . ' <i class="fa fa-angle-right"></i></a>';
}
$html .= '<div class="icon-boxes ' . $custom_class . $css_class . '">';

$icon_cl = '';
if($icon_disable == 'icon_disable_value' ) {
	$icon_cl = "icon-disable";
}

if ( $process_enable == 'process_enable_value' ) {
	$html .= '<div class="text-order ' . $style_process_order_cl . '" id="' . $id_style_process_order . '">' . $text_order . '</div>';
} elseif ( $reverse_enable != 'reverse_enable_value' ) {
	$html .= '<div class="icon-boxes_icon '.$icon_cl.'">' . $icon_html . '</div>';
}
$html .= '<div class="icon-boxes_content"> ' . $opentag . $title . $closetag . $text . $cst_link . '</div>';

if ( $reverse_enable == 'reverse_enable_value' && $process_enable != 'process_enable_value' ) {
	$html .= '<div class="icon-boxes_icon '.$icon_cl.'">' . $icon_html . '</div>';
}

$html .= '</div>';

echo '' . $html;
