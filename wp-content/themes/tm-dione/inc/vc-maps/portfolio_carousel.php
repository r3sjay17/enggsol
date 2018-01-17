<?php

class WPBakeryShortCode_Portfolio_Carousel extends WPBakeryShortCode {
}

/*** Portfolio Carousel ***/

$basename = "portfolio_carousel";

$group_design = esc_html__( 'Design options', 'tm-dione' );

$terms = get_terms( 'portfolio_category', array(
	//'hide_empty' => false,
) );

$categories = array();
foreach($terms as $key => $term) {
	$categories[$term->name] = $term->slug;
}

if(!isset($terms) || empty($terms)) {
	return;
}

vc_map( array(
	"name"                      => esc_html__( "Portfolio Carousel", 'tm-dione' ),
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico carousel-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			"type"        => "checkbox",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Categories",
			"param_name"  => "categories",
			"value"       => $categories,
			'save_always' => true,
		),
		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Layout",
			"param_name"  => "layout",
			"value"       => array(
				'Default' => '',
				'Fullscreen' => "fullscreen",
			),
			'save_always' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Slides to show', 'tm-dione' ),
			'param_name'  => 'slide_to_show',
		),
		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Order By",
			"param_name"  => "order_by",
			"value"       => array(
				'' => '',
				'Title' => "title",
				'Date' => "date",
			),
			'save_always' => true,
		),
		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Order",
			"param_name"  => "order",
			"value"       => array(
				'' => '',
				'ASC' => "ASC",
				'DESC' => "DESC",
			),
			'save_always' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Number', 'tm-dione' ),
			'param_name'  => 'number',
			'description' => esc_html__( 'Number of portolios on page (-1 is all)', 'tm-dione' ),
			'std' => '-1',
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Image size",
			"param_name" => "img_size",
			'save_always' => true,
		),
		array(
			'type'        => 'number',
			'heading'     => esc_html__( 'Item padding', 'tm-dione' ),
			'param_name'  => 'item_padding',
			'description' => esc_html__( 'px', 'tm-dione' ),
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
