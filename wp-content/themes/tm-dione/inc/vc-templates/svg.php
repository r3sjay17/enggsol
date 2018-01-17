<?php
$default_args = array(
	'svg_icon'     => 'svg01',
	'color'        => '',
	'zoom'         => '',
	"custom_class" => "",
	'css'          => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
if( $custom_class != '' ) {
	$css_class .= ' ' . $custom_class;
}

$style_rect = '';

if ( $color == '' ) {
	$css_class .= ' ndSvgFill';
} else {
	$uniq = 'svgFill-' . rand();
	$css_class .= ' ' . $uniq;
	$style_rect = '<style> .' . $uniq . ' svg rect { fill: ' . $color . ' } </style>';
}

$style = '';
if ( $zoom != '' ) {
	$style = 'zoom:' . $zoom;
}
$selector_style = uniqid('selector_style-');
tm_dione_apply_style($style, '#'.$selector_style);

$svg_icons = array(
	'svg01' => '<svg id="' . $selector_style . '" viewBox="0 0 34 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px" width="34px" height="14px">
		                        <rect x="-0.283" y="0" width="34" height="1.8263"></rect>
									<rect x="5.3838" y="6" width="22.6667" height="1.8261"></rect>
									<rect x="11.0503" y="12" width="11.3334" height="1.8261"></rect>
		                    </svg>',
);

$html = '<div class="svg ' . $css_class . '" >';
$html .= $svg_icons[ $svg_icon ];
$html .= '</div>';

echo '' . $html;
?>

<script>
	jQuery(document).ready(function ($) {
		'use strict';
		$('head').append('<?php echo '' . $style_rect ?>');
	});
</script>
