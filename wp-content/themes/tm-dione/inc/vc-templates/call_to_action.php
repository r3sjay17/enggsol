<?php
$default_args = array(
	"title"         => "",
	"element_tag"   => "",
	"title_color"   => "",
	"button_link"   => "",
	"button_style"  => "",
	"button_size"   => "",
	"button_link2"  => "",
	"button_style2" => "",
	"button_size2"  => "",
	"align"         => "center",
	"custom_class"  => "",
	"style"         => "",
	'css'           => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$cta_style = $style;

$button_link   = vc_build_link( $button_link );
$button_url    = ( isset( $button_link['url'] ) ) ? $button_link['url'] : '';
$button_title  = ( isset( $button_link['title'] ) ) ? $button_link['title'] : '';
$button_target = ( isset( $button_link['target'] ) ) ? $button_link['target'] : '';

$button_link   = vc_build_link( $button_link2 );
$button_url2    = ( isset( $button_link['url'] ) ) ? $button_link['url'] : '';
$button_title2  = ( isset( $button_link['title'] ) ) ? $button_link['title'] : '';
$button_target2 = ( isset( $button_link['target'] ) ) ? $button_link['target'] : '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$html = "";

$style = $style_title = '';

if ( $title_color != "" ) {
	$style_title .= 'color:' . $title_color . ';';
}

if ( $align != "" ) {
	$style .= 'text-align:' . $align . ';';
}

$id_style = uniqid('style-');
$id_style_title = uniqid('title-style-');
tm_dione_apply_style($style, '#' . $id_style);
tm_dione_apply_style($style_title, '#' . $id_style_title);

$element_tag = ( $element_tag != "" ) ? $element_tag : 'h1';
$opentag     = '<' . $element_tag . ' class="cta-title" id="' . $id_style_title . '">';
$closetag    = '</' . $element_tag . '>';

if( $cta_style != 'inline') {
	$html .= '<div class="call-to-action ' . $css_class . '" id="' . $id_style . '">';

	$html .= $opentag . $title . $closetag;
	$html .= '<p>' . $content . '</p>';
	if($button_title!="") {
		$html .= '<a target="' . $button_target . '" href="' . esc_attr($button_url) . '" class="btn ' . $button_style . ' ' . $button_size . '">' . $button_title . '</a>';
	}
	if($button_title2!="") {
		$html .= '<a target="' . $button_target2 . '" href="' . esc_attr($button_url2) . '" class="btn ' . $button_style2 . ' ' . $button_size2 . '">' . $button_title2 . '</a>';
	}
	$html .= '</div>';

} else {
	?>
	<div class="row row-xs-center call-to-action-inline <?php echo esc_attr($css_class) ?> <?php echo ''. $style ?>">
		<div class="col-md-7">
			<?php echo "". $opentag . $title . $closetag; ?>
		</div>
		<div class="col-md-5 text-md-right">
			<?php
				if($button_title!="") {
					echo '<a target="' . $button_target . '" href="' . esc_attr($button_url) . '" class="btn ' . $button_style . ' ' . $button_size . '">' . $button_title . '</a>';
				}
				if($button_title2!="") {
					echo '<a target="' . $button_target2 . '" href="' . esc_attr($button_url2) . '" class="btn ' . $button_style2 . ' ' . $button_size2 . '">' . $button_title2 . '</a>';
				}
			?>
		</div>
	</div>
	<?php
}

echo '' . $html;
