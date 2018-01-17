<?php

class WPBakeryShortCode_Testimonials extends WPBakeryShortCode {
}

/*** Testimonials ***/

$basename = "testimonials";

$group_style  = "Custom Style";
$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Testimonials",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico testimonials-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "textfield",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Category",
			"param_name"  => "category",
			"value"       => "",
			"description" => "Category Slug (leave empty for all)"
		),
		array(
			"type"        => "textfield",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Number",
			"param_name"  => "number",
			"value"       => "",
			"description" => "Number of Testimonials"
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Order By",
			"param_name"  => "order_by",
			"value"       => array(
				""       => "",
				"Title"  => "title",
				"Date"   => "date",
				"Random" => "rand"
			),
			"description" => ""
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Order Type",
			"param_name"  => "order",
			"value"       => array(
				""           => "",
				"Ascending"  => "ASC",
				"Descending" => "DESC",
			),
			"description" => "",
			"dependency"  => array( "element" => "order_by", "value" => array( "title", "date" ) )
		),

		array(
			'type'             => 'switch',
			'heading'          => esc_html__( 'Enable Author Image', 'tm-dione' ),
			'param_name'       => 'enable_author_image',
			'value'            => '',
			'options'          => array(
				'enable_author_image_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),

		array(
			'type'             => 'switch',
			'heading'          => esc_html__( 'Show navigation', 'tm-dione' ),
			'param_name'       => 'show_navigation',
			'value'            => '',
			'options'          => array(
				'show_navigation_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
			'edit_field_class' => 'uvc-divider last-uvc-divider vc_column vc_col-sm-12',
		),

		array(
			'type'             => 'switch',
			'heading'          => esc_html__( 'Only text', 'tm-dione' ),
			'param_name'       => 'only_text',
			'value'            => '',
			'options'          => array(
				'only_text_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
			'edit_field_class' => 'uvc-divider last-uvc-divider vc_column vc_col-sm-12',
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Custom CSS class",
			"param_name"  => "el_class",
			"description" => "",
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );


// Arrow Icon
vc_add_param( $basename, array(
	'type'             => 'switch',
	'heading'          => esc_html__( 'Enable arrow icon', 'tm-dione' ),
	'param_name'       => 'enable_arrow_icon',
	'value'            => '',
	'options'          => array(
		'enable_arrow_icon_value' => array(
			'label' => '',
			'on'    => esc_html__( 'Yes', 'tm-dione' ),
			'off'   => esc_html__( 'No', 'tm-dione' )
		)
	),
	'edit_field_class' => 'uvc-divider last-uvc-divider vc_column vc_col-sm-12',
) );

vc_add_param( $basename, array(
		"type"        => "dropdown",
		"class"       => "",
		"admin_label" => true,
		"heading"     => esc_html__( "Direction", "tm-dione" ),
		"param_name"  => "arrow_icon_direction",
		"value"       => array(
			"Choose" => "arrow",
			"Up"    => "arrow up",
			"Right"  => "arrow right",
			"Down" => "arrow down",
			"Left"   => "arrow left",
		),
		'dependency'  => Array( 'element' => 'enable_arrow_icon', 'value' => array( 'enable_arrow_icon_value' ) ),
		"description" => esc_html__( "Select the kind of background would you like to set for this row.", 'tm-dione' ),
	)
);

// Style
vc_add_params( $basename, array(
		array(
			"type"        => "colorpicker",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Text Color",
			"param_name"  => "text_color",
			"description" => "",
			'group' => $group_style,
		),
		array(
			"type"        => "textfield",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Text Font Size",
			"param_name"  => "text_font_size",
			"description" => "",
			'group' => $group_style,
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Author Text Font Weight",
			"param_name"  => "author_text_font_weight",
			"value"       => array(
				"Default"         => "",
				"Thin 100"        => "100",
				"Extra-Light 200" => "200",
				"Light 300"       => "300",
				"Regular 400"     => "400",
				"Medium 500"      => "500",
				"Semi-Bold 600"   => "600",
				"Bold 700"        => "700",
				"Extra-Bold 800"  => "800",
				"Ultra-Bold 900"  => "900"
			),
			"description" => "",
			'group' => $group_style,
		),
		array(
			"type"        => "colorpicker",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Author Text Color",
			"param_name"  => "author_text_color",
			"description" => "",
			'group' => $group_style,
		),
		array(
			"type"        => "textfield",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Author Text Font Size (px)",
			"param_name"  => "author_text_font_size",
			"description" => "Enter just number. Omit px",
			'group' => $group_style,
		),
	)
);
