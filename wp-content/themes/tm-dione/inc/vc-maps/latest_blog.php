<?php

class WPBakeryShortCode_Latest_Blog extends WPBakeryShortCode {
}

/*** Latest_Blog ***/

$basename = "latest_blog";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	'name'     => esc_html__( 'Latest Blog', 'tm-dione' ),
	'base'     => $basename,
	'category' => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"         => "tm-shortcode-ico blog-icon",
	'params'   => array(
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Enter numbers of articles', 'tm-dione' ),
			'param_name' => 'number_of_posts',
		),
		array(
			"type"       => 'dropdown',
			"heading"    => esc_html__( 'Style', 'tm-dione' ),
			"param_name" => 'style',
			"value"      => array(
				__( "No image", 'tm-dione' ) => 'no-image',
				__( "Grid", 'tm-dione' )     => 'grid',
				__( "Masonry", 'tm-dione' )  => 'masonry',
			),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Disable author', 'tm-dione' ),
			'param_name' => 'disable_author',
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
			"type" => "textfield",
			"class" => "",
			"heading" => "Image size",
			"param_name" => "img_size",
			'save_always' => true,
			'description' => 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.',
			"dependency" => Array('element' => "style", 'value' => array('grid', 'masonry'))
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Time format', 'tm-dione' ),
			'param_name'  => 'time_format',
			'description' => 'Example: m.d.Y or M d, Y  <a target="_blank"  href="'.esc_attr('https://codex.wordpress.org/Formatting_Date_and_Time').'">Read more</a> ',
		),
		array(
			"type"       => 'dropdown',
			"heading"    => esc_html__( 'Order By', 'tm-dione' ),
			"param_name" => 'orderby',
			"value"      => array(
				__( "Title", 'tm-dione' ) => 'title',
				__( "Date", 'tm-dione' )  => 'date',
			),
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
