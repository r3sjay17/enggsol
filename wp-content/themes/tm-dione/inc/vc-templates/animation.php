<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class(''), $this->settings['base'], $atts);

$html = '<div class="'.$css_class.'">';
$html .= do_shortcode($content);
$html .= '</div>';

echo ''.$html;
