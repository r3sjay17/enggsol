<?php

class WPBakeryShortCode_List extends WPBakeryShortCode {
}

/*** List ***/

$basename = "list";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "List",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico list-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		// Text
		array(
			"type"        => "textarea_html",
			"class"       => "",
			"heading"     => "List Text",
			"param_name"  => "content",
			"value"       => "<ul><li>Lorem ipsum dolor sit amet</li><li>Duis aute irure dolor in repre</li></ul>",
			"description" => ""
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Style",
			"param_name"  => "style",
			"value"       => array(
				'' => '',
				'Style 01' => "style1",
				'Style 02' => "style2",
				'Style 03' => "style3",
				'Style 04' => "style4",
				'Style 05' => "style5",
				'Style 06' => "style6",
			),
			'save_always' => true,
			"description" => "Select style",
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'custom_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione' ),
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );
