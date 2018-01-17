<?php

class WPBakeryShortCode_Compare_Table extends WPBakeryShortCodesContainer {
}

$basename = "compare_table";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
		"name"         => esc_html__( "Pricing Table", "tm-dione" ),
		"base"         => $basename,
//	"content_element" => true,
		"icon"         => "tm-shortcode-ico pricing-icon",
		"as_parent"    => array( 'only' => 'price_box' ),
		"class"        => "",
		//"controls"     => "full",
		"category"     => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
		"is_container" => true,
		"params"       => array(
			array(
				'type'       => 'switch',
				'heading'    => esc_html__( 'Enable compare', 'tm-dione' ),
				'param_name' => 'compare_enable',
				'value'      => '',
				'options'    => array(
					'compare_enable_value' => array(
						'label' => '',
						'on'    => esc_html__( 'Yes', 'tm-dione' ),
						'off'   => esc_html__( 'No', 'tm-dione' )
					)
				),
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Title", "tm-dione" ),
				"admin_label" => true,
				"param_name"  => "title",
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
				"type"        => "textarea",
				"heading"     => esc_html__( "Captions", "tm-dione" ),
				"admin_label" => true,
				"param_name"  => "captions",
			),
			array(
				'type'       => 'switch',
				'heading'    => esc_html__( 'Auto create cell', 'tm-dione' ),
				'param_name' => 'auto_create_cell',
				'value'      => '',
				'options'    => array(
					'auto_create_cell_value' => array(
						'label' => '',
						'on'    => esc_html__( 'Yes', 'tm-dione' ),
						'off'   => esc_html__( 'No', 'tm-dione' )
					)
				),
				"description" => esc_html__("Auto create cell with each line", "tm-dione" )
			),
			array(
				'type'        => 'number',
				'heading'     => esc_html__( 'Custom content height', 'tm-dione' ),
				'param_name'  => 'custom_height',
				"description" => esc_html__("unit px", "tm-dione" )
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__( "Class", "tm-dione" ),
				"param_name"  => "el_class",
				"description" => esc_html__( "Custom CSS class", "tm-dione" )
			),
			array(
				"type"       => "textfield",
				"heading"    => esc_html__( "ID", 'tm-dione' ),
				"param_name" => "el_id",
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__( 'Css', 'tm-dione' ),
				'param_name' => 'css',
				'group'      => $group_design,
			),
		),
		"js_view"      => 'VcColumnView'
	)
);
