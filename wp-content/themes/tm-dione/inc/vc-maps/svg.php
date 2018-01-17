<?php

class WPBakeryShortCode_Svg extends WPBakeryShortCode {
}

/*** List ***/

$basename = "svg";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "SVG",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico svg-icon",
	"params"                    => array(
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "SVG icon",
			"param_name"  => "svg_icon",
			"value"       => array(
				'' => '',
				'type01' => "svg01",
			),
			'save_always' => true,
			"description" => "Select icon",
		),
		array(
			"type"        => "colorpicker",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Color",
			"param_name"  => "color",
			"description" => ""
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'custom_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione' ),
		),
		array(
			"type"        => "number",
			"class"       => "",
			"heading"     => "Zoom",
			"param_name"  => "zoom",
			"description" => ""
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );
