<?php

class WPBakeryShortCode_Blog extends WPBakeryShortCode {
}

/*** Blog ***/

$basename = "blog";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	'name'     => esc_html__( 'Blog', 'tm-dione' ),
	'base'     => $basename,
	'category' => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"     => "tm-shortcode-ico blog-icon",
	'params'   => array(
		array(
			"type" => "number",
			"class" => "",
			"heading" => esc_html__("Base width of Image", 'tm-dione'),
			"param_name" => "img_size",
			'save_always' => true,
			'description' => esc_html__('Number of image\'s width, Example: 500', 'tm-dione'),
			"dependency" => Array('element' => "type", 'value' => array('grid', 'metro'))
		),
		array(
			"type"       => 'dropdown',
			"heading"    => esc_html__( 'Type', 'tm-dione' ),
			"param_name" => 'type',
			"value"      => array(
				__( "Default", 'tm-dione' ) => '',
				__( "Metro", 'tm-dione' )  => 'metro',
			),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Show Load More button', 'tm-dione' ),
			'param_name' => 'show_load_more',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
			"dependency" => Array('element' => "type", 'value' => array('metro'))
		),
		array(
			"type"       => 'dropdown',
			"heading"    => esc_html__( 'Order', 'tm-dione' ),
			"param_name" => 'order',
			"value"      => array(
				__( "ASC", 'tm-dione' )  => 'asc',
				__( "DESC", 'tm-dione' ) => 'desc',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Time format', 'tm-dione' ),
			'std' => 'm.d.Y',
			'param_name'  => 'time_format',
			'description' => 'Example: m.d.Y',
		),
		array(
			"type" => "number",
			"class" => "",
			"heading" => esc_html__("Number of posts", 'tm-dione'),
			"param_name" => "number_of_posts",
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Enter Category IDs', 'tm-dione' ),
			'param_name'  => 'category_ids',
			'description' => 'Example: <b>1</b> or <b>1, 23, 45</b>',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Enter Author IDs', 'tm-dione' ),
			'param_name'  => 'author_ids',
			'description' => 'Example: <b>1</b> or <b>1, 23, 45</b>',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'el_class',
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
