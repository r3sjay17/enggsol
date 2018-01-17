<?php

class WPBakeryShortCode_Carousel extends WPBakeryShortCode {
}

/*** carousel ***/

$basename = "carousel";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Carousel",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico carousel-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "attach_images",
			"class"       => "",
			"heading"     => "Images",
			"param_name"  => "images",
			'save_always' => true,
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Image size",
			"param_name"  => "img_size",
			'save_always' => true,
			'description' => 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.',
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => "Slides per Row",
			"param_name"  => "slides_per_row",
			"value"       => array( '', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ),
			'save_always' => true,
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Hide Images', 'tm-dione' ),
			'param_name' => 'hide_images',
			'value'      => '',
			'options'    => array(
				'enable_hide_images' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Show Title', 'tm-dione' ),
			'param_name' => 'show_title',
			'value'      => '',
			'options'    => array(
				'enable_show_title' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
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
			'dependency'  => Array( 'element' => 'show_title', 'value' => array( 'enable_show_title' ) ),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Show Description', 'tm-dione' ),
			'param_name' => 'show_desc',
			'value'      => '',
			'options'    => array(
				'enable_show_desc' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Text Align",
			"param_name"  => "text_align",
			"value"       => array(
				""       => "",
				"Center" => "center",
				"Left"   => "left",
				"Right"  => "right",
			),
			"description" => ""
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Show Navigation', 'tm-dione' ),
			'param_name' => 'show_nav',
			'value'      => '',
			'options'    => array(
				'enable_show_nav' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Navigation Style', 'tm-dione' ),
			'param_name' => 'nav_style',
			'value'      => array(
				__( 'Default', 'tm-dione' ) => '',
				__( 'Style 1', 'tm-dione' ) => 'nav-style-1',
				__( 'Style 2', 'tm-dione' ) => 'nav-style-2',
			),
			'dependency' => Array( 'element' => 'show_nav', 'value' => array( 'enable_show_nav' ) ),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Show Dots', 'tm-dione' ),
			'param_name' => 'show_dots',
			'value'      => '',
			'options'    => array(
				'enable_show_dots' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Auto play?', 'tm-dione' ),
			'param_name' => 'auto_play',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			"type"        => "number",
			"class"       => "",
			"heading"     => "Autoplay Speed",
			"param_name"  => "autoplay_speed",
			'description' => 'Milliseconds ( default 2000 )',
			'dependency' => Array( 'element' => 'auto_play', 'value' => array( 'yes' ) ),
			'save_always' => true,
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
