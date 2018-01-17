<?php
$args = array(
	"type"                  => "",
	"style"                 => "",
	"icon_type"             => "",
	"icon_fontawesome"      => "",
	"icon_openiconic"       => "",
	"icon_typicons"         => "",
	"icon_entypo"           => "",
	"icon_linecons"         => "",
	"icon_pe7stroke"        => "",
	"background_color"      => "",
	"border"                => "",
	"border_width"          => "",
	"border_color"          => "",
	"icon"                  => "",
	"icon_size"             => "",
	"icon_color"            => "",
	"icon_background_color" => "",
	"custom_icon"           => "",
	//"content"               => "",
	"close_button_color"    => ""
);
extract( shortcode_atts( $args, $atts ) );

//init variables
$html                = "";
$icon_html           = "";
$message_classes     = "message " . $style;
$message_styles      = "";
$icon_styles         = "";
$close_button_styles = "";

// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $type );

if ( $type == "with_icon" ) {
	$message_classes .= " with_icon";
}

if ( $background_color != "" ) {
	$message_styles .= "background-color: " . $background_color . ";";
}
if ( $border == "yes" ) {

	$message_styles .= "border-style:solid;";
	if ( $border_width != "" ) {
		$message_styles .= "border-width: " . $border_width . "px;";
	}
	if ( $border_color != "" ) {
		$message_styles .= "border-color: " . $border_color . ";";
	}

}
if ( $icon_color != "" ) {
	$icon_styles .= "color: " . $icon_color;
}

if ( $icon_background_color != "" ) {
	$icon_styles .= " background-color: " . $icon_background_color;
}

if ( $close_button_color != "" ) {
	$close_button_styles .= "color: " . $close_button_color . ";";
}

$id_message_style = uniqid('message-style-');
tm_dione_apply_style($message_styles, '#' . $id_message_style);

$html .= "<div class='" . $message_classes . "' id='" . $id_message_style . "'>";


if ( $type == "with_icon" ) {
	$icon_html .= '<div class="message-icon">';
	if ( $custom_icon != "" ) {
		if ( is_numeric( $custom_icon ) ) {
			$custom_icon_src = wp_get_attachment_url( $custom_icon );
		} else {
			$custom_icon_src = $custom_icon;
		}

		$icon_html .= '<img src="' . esc_attr($custom_icon_src) . '" alt="">';
	} else {
		$id_icon_style = uniqid('icon-style-');
		tm_dione_apply_style($icon_styles, '#' . $id_icon_style);

		$iconClass = isset( ${"icon_" . $icon_type} ) ? esc_attr( ${"icon_" . $icon_type} ) : 'fa fa-adjust';
		$icon_html .= "<i class='" . esc_attr($iconClass) . "' id='" . esc_attr($id_icon_style) . "'></i>";
	}
	$icon_html .= '</div>';
}

$html .= $icon_html;

$html .= "<p>" . do_shortcode( $content );

$html .= '<span class="close pe-7s-close" data-dismiss="message"></span>';

$html .= "</p></div>"; //close message text div
echo '' . $html;
