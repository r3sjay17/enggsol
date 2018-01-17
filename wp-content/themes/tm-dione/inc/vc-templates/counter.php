<?php
$default_args = array(
	"counter_value" => "",
	"counter_title" => "",
	"element_tag"   => "",
	"title_color"   => "",
	"value_color"   => "",
	"format"        => "d",
	"duration"      => "duration-1s",
	"align"         => "center",
	"custom_class"  => "",
	'css'           => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$custom_id = uniqid('counter-');

$html = "";

$style = $style_title = $style_number = '';

if ( $title_color != "" ) {
	$style_title .= 'color:' . $title_color . ';';
}

if ( $value_color != "" ) {
	$style_number .= 'color:' . $value_color . ';';
}

if ( $align != "" ) {
	$style .= 'text-align:' . $align . ';';
}

$selector_style = uniqid('selector_style-');
$selector_style_title = uniqid('selector_style_title-');
$selector_style_number = uniqid('selector_style_number-');

tm_dione_apply_style($style, '#'.$selector_style);
tm_dione_apply_style($style_title, '#'.$selector_style_title);
tm_dione_apply_style($style_number, '#'.$selector_style_number);


$element_tag = ( $element_tag != "" ) ? $element_tag : 'h5';
$opentag     = '<' . $element_tag . ' class="counter-title" id="' . $selector_style_title . '">';
$closetag    = '</' . $element_tag . '>';

//echo '' . $html;
?>
<div class="counter" id="<?php echo esc_attr( $selector_style ) ?>">
	<div id="<?php echo esc_attr( $selector_style_number ) ?>"
	     class="counter-number <?php echo esc_attr( $duration . $css_class ) ?>"
	     data-format="<?php echo esc_attr( $format ) ?>"
	     data-counter="<?php echo esc_attr( $counter_value ) ?>">
	</div>
	<?php echo '' . $opentag . $counter_title . $closetag ?>
</div>
