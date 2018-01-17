<?php

class WPBakeryShortCode_Shop_Banner extends WPBakeryShortCode {
}

/*** Counter ***/

$basename = "shop_banner";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Shop Banner",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico shopbanner-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "attach_image",
			"class"       => "",
			"heading"     => "Image",
			"param_name"  => "image",
			'save_always' => true,
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Image size', 'tm-dione' ),
			'param_name' => 'img_size',
			"description" => "Example 570x240",
		),
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Button', 'tm-dione' ),
			'param_name' => 'button_link',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Description', 'tm-dione' ),
			'param_name' => 'desc',
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
