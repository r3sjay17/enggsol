<?php

class WPBakeryShortCode_Process_Bar extends WPBakeryShortCode {
}

/*** Process Bar ***/

$basename = "process_bar";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Process Bar",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico processbar-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Enable reverse style', 'tm-dione' ),
			'param_name' => 'reverse_enable',
			'value'      => '',
			'options'    => array(
				'reverse_enable_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			'type'       => 'textfield',
			'admin_label' => true,
			'heading'    => esc_html__( 'Title', 'tm-dione' ),
			'param_name' => 'title',
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Title Color",
			"param_name" => "title_color",
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Title Element Tag",
			"param_name"  => "element_tag",
			"value"       => array(
				'Default' => "",
				"h1"      => "h1",
				"h2"      => "h2",
				"h3"      => "h3",
				"h4"      => "h4",
				"h5"      => "h5",
				"h6"      => "h6",
				"p"       => "p",
				"div"     => "div",
			),
			'save_always' => true,
			"description" => "Select element tag.",
		),
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Percentage', 'tm-dione' ),
			'param_name'  => 'percentage',
			"description" => "Enter just number. Omit %",
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Percentage Color",
			"param_name" => "percentage_color",
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => "Active Background Color",
			"param_name"  => "active_bg_color",
			"value"       => array(
				'Default'                 => "",
				"Main background color"   => "stBg",
				"Second background color" => "ndBg",
				"Custom"                  => "custom",
			),
			'save_always' => true,
			"description" => "Select element tag.",
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Custom Active Background Color",
			"param_name" => "custom_active_bg_color",
			"dependency" => array( "element" => "active_bg_color", "value" => array( "custom" ) ),
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => "Inactive Background Color",
			"param_name" => "inactive_bg_color",
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
