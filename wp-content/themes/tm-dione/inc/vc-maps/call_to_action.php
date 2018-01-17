<?php

class WPBakeryShortCode_Call_To_Action extends WPBakeryShortCode {
}

/*** Call_To_Action ***/

$basename = "call_to_action";

$group_design = esc_html__( 'Design options', 'tm-dione' );
$group_icon   = esc_html__( 'Icon options', 'tm-dione' );

vc_map( array(
	"name"                      => esc_html__("Call-To-Action",'tm-dione' ),
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico call-to-action-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		// Text
		array(
			'type'       => 'textfield',
			'admin_label' => true,
			'heading'    => esc_html__( 'Title', 'tm-dione' ),
			'param_name' => 'title',
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Content', 'tm-dione' ),
			'param_name' => 'content',
		),
		array(
			"type"       => "colorpicker",
			"class"      => "",
			"heading"    => esc_html__("Title Color",'tm-dione' ),
			"param_name" => "title_color",
		),
		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => esc_html__("Title Element Tag",'tm-dione' ),
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
			"description" => esc_html__("Select element tag.",'tm-dione' ),
		),
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Button', 'tm-dione' ),
			'param_name' => 'button_link',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Button Style', 'tm-dione' ),
			'param_name' => 'button_style',
			"value"      => array(
				"Default"         => "",
				"Black Border"    => "btn-border-black",
				"White Border"    => "btn-border-white",
				"Gray Border"     => "btn-border-gray",
				"Primary Color"   => "btn-bg-primary-color",
				"Secondary Color" => "btn-bg-secondary-color",
				"Black Color"     => "btn-bg-black-color",
				"White Color"     => "btn-bg-white-color",
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Button Size', 'tm-dione' ),
			'param_name' => 'button_size',
			'value'      => array(
				esc_html__( 'Default', 'tm-dione' ) => '',
				esc_html__( 'Small', 'tm-dione' )   => 'btn-small',
				esc_html__( 'Medium', 'tm-dione' )  => 'btn-medium',
				esc_html__( 'Large', 'tm-dione' )   => 'btn-large',
			),
		),

		// Button 2
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Button 2', 'tm-dione' ),
			'param_name' => 'button_link2',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Button 2 Style', 'tm-dione' ),
			'param_name' => 'button_style2',
			"value"      => array(
				"Default"         => "",
				"Black Border"    => "btn-border-black",
				"White Border"    => "btn-border-white",
				"Gray Border"     => "btn-border-gray",
				"Primary Color"   => "btn-bg-primary-color",
				"Secondary Color" => "btn-bg-secondary-color",
				"Black Color"     => "btn-bg-black-color",
				"White Color"     => "btn-bg-white-color",
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Button 2 Size', 'tm-dione' ),
			'param_name' => 'button_size2',
			'value'      => array(
				esc_html__( 'Default', 'tm-dione' ) => '',
				esc_html__( 'Small', 'tm-dione' )   => 'btn-small',
				esc_html__( 'Medium', 'tm-dione' )  => 'btn-medium',
				esc_html__( 'Large', 'tm-dione' )   => 'btn-large',
			),
		),

		array(
			"type"        => "dropdown",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Align",
			"param_name"  => "align",
			"value"       => array(
				""       => "",
				"Center" => "center",
				"Left"   => "left",
				"Right"  => "right",
			),
			"description" => ""
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'custom_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Style', 'tm-dione' ),
			'param_name' => 'style',
			'value'      => array(
				esc_html__( 'Default', 'tm-dione' ) => '',
				esc_html__( 'Inline Style', 'tm-dione' )   => 'inline',
			),
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );
