<?php

class WPBakeryShortCode_Price_Box extends WPBakeryShortCode {
}

$basename = "price_box";

vc_map( array(
	"name"              => esc_html__( "Price Box", "tm-dione" ),
	"base"              => $basename,
	"icon"              => "tm-shortcode-ico pricing-icon",
	"admin_label"       => true,
	'admin_enqueue_js'  => TM_DIONE_THEME_ROOT . '/assets/admin/vc-extend-compare-table.js',
	'admin_enqueue_css' => TM_DIONE_THEME_ROOT . '/assets/admin/vc-extend.css',
	"category"          => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"params"            => array(
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Title", 'tm-dione' ),
			"param_name"  => "title",
			"description" => esc_html__( "Title of this column (plan)", "tm-dione" )
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Price", "tm-dione" ),
			"param_name"  => "price",
			"description" => esc_html__( "Price of this plan", "tm-dione" )
		),
		array(
			"type"       => "textarea",
			"heading"    => esc_html__( "Features", "tm-dione" ),
			"param_name" => "features",
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
				"Gray Border"     => "btn-border-gray",
				"Primary Color"   => "btn-bg-primary-color",
				"Secondary Color" => "btn-bg-secondary-color",
				"Black Color"     => "btn-bg-black-color",
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Button Size', 'tm-dione' ),
			'param_name' => 'button_size',
			'value'      => array(
				__( 'Default', 'tm-dione' ) => '',
				__( 'Small', 'tm-dione' )   => 'btn-small',
				__( 'Medium', 'tm-dione' )  => 'btn-medium',
				__( 'Large', 'tm-dione' )   => 'btn-large',
			),
		),
		array(
			"type"        => "dropdown",
			"admin_label" => true,
			"admin_label" => true,
			"heading"     => esc_html__( "Column Size", "tm-dione" ),
			"param_name"  => "column_size",
			"value"       => array(
				''                               => '',
				esc_html__( '2', 'tm-dione' )    => '2',
				//esc_html__( '12/5', 'tm-dione' ) => '12/5',
				esc_html__( '3', 'tm-dione' )    => '3',
				esc_html__( '4', 'tm-dione' )    => '4',
				esc_html__( '6', 'tm-dione' )    => '6',
			),
			"description" => esc_html__( "Select between 2, 3, 4, 6. Total column_size values of all columns should equal to 12", 'tm-dione' ),
			"std"         => '3',
			'dependency'  => array(
				'callback' => 'compareTableCallbackColumns',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Box Style', 'tm-dione' ),
			'param_name' => 'box_style',
			"value"      => array(
				"Default"  => "",
				"Style 01" => "style01",
				"Style 02" => "style02",
				"Style 03" => "style03",
				"Style 04" => "style04",
			)
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Enable Special Column', 'tm-dione' ),
			'param_name' => 'special_column_enable',
			'value'      => '',
			'options'    => array(
				'special_column_enable_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
	),
) );
