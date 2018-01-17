<?php

global $tm_tta_type, $tm_tabs, $tab_active;

$output = $title = $icon = $icon_color = $title_color = $background_color = $el_id = '';

extract( shortcode_atts( array(
	'title'            => esc_html__( "Section", "tm-dione" ),
	'el_id'            => '',
	'css'              => '',
	"active_section"   => "",
	"use_icon"         => "",
	"icon_type"        => "",
	"icon_fontawesome" => "",
	"icon_openiconic"  => "",
	"icon_typicons"    => "",
	"icon_entypo"      => "",
	"icon_linecons"    => "",
	"icon_pe7stroke"   => "",
	'el_class'         => '',

), $atts ) );

if('vc_tta_accordion' == $tm_tta_type) :

	global $tm_accordion_id;
	$custom_id = uniqid('section-');

	$icon_html = $icon_styles = '';

	$el_id = ( isset( $el_id ) && ! empty( $el_id ) ) ? $el_id : $custom_id;

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' . $el_class . ' ' ), $this->settings['base'], $atts );

	if($use_icon == 'enable_use_icon') {
		$id_icon_styles = uniqid('icon_styles-');
		tm_dione_apply_style($icon_styles, '#' . $id_icon_styles);

		$iconClass = isset( ${"icon_" . $icon_type} ) ? esc_attr( ${"icon_" . $icon_type} ) : 'fa fa-adjust';
		$icon_html .= "<i class='accordion-icon " . $iconClass . "' id='" . $id_icon_styles . "'></i>";
	}

	$cl_title = '';
	if($use_icon == 'enable_use_icon') {
		$cl_title .= 'with_icon ';
	}
	if( $active_section != 'enable_active_section' ) {
		$cl_title .= 'collapsed ';
	}
	?>

	<div class="panel <?php echo esc_attr( $css_class ) ?>">
		<div class="panel-heding" role="tab">
			<div class="panel-title">
				<a class="<?php echo esc_attr( $cl_title ) ?>"
				   data-toggle="collapse" data-parent="#<?php echo esc_attr( $tm_accordion_id ) ?>"
				   href="#<?php echo esc_attr( $el_id ) ?>">
					<?php echo '' . $icon_html . $title; ?>
				</a>
			</div>
		</div>
		<div id="<?php echo esc_attr( $el_id ) ?>" class="panel-collapse collapse <?php echo esc_attr( ( $active_section == 'enable_active_section' ) ? 'in' : '' ) ?>">
			<div class="panel-body">
				<?php echo wpb_js_remove_wpautop( $content ) ?>
			</div>
		</div>
	</div>

<?php

elseif ( 'vc_tta_tabs' == $tm_tta_type ):

	$el_id = ( isset( $el_id ) && ! empty( $el_id ) ) ? $el_id : "tab-" . rand();
	$tm_tabs['nav'][$el_id] = $title;
	$tm_tabs['content'][$el_id] = $content;

	if( $active_section == 'enable_active_section' ) {
		$tab_active = $el_id;
	}

endif;
