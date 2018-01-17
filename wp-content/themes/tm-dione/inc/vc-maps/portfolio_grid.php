<?php

class WPBakeryShortCode_Portfolio_Grid extends WPBakeryShortCode {
}

/*** Portfolio Grid ***/

$basename = "portfolio_grid";

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
	"name"                      => esc_html__( "Portfolio Grid", 'tm-dione' ),
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico portfoliogrid-icon",
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
			"type" => "number",
			"class" => "",
			"heading" => "Base width of Image",
			"param_name" => "img_size",
			'save_always' => true,
			'description' => esc_html__('Number of image\'s width, Example: 500', 'tm-dione'),
			"dependency" => Array('element' => "type", 'value' => array('grid'))
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => "Aspect ratio of images",
			"param_name"  => "ratio",
			"value"       => array(
				'1:1' => '1:1',
				'2:1' => "1:2",
				'3:2' => '3:2',
				'4:3' => "4:3",
				'16:9' => '16:9',
			),
			'save_always' => true,
			"dependency" => Array('element' => "type", 'value' => array('grid'))
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => "Type",
			"param_name"  => "type",
			"value"       => array(
				'Default' => '',
				'Grid' => "grid",
				'Masonry' => "masonry",
			),
			'save_always' => true,
		),
		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Style",
			"param_name"  => "style",
			"value"       => array(
				'Default' => '',
				'Style 01' => "style01",
				'Style 02' => "style02",
				'Metro' => "style03",
				'Nature size' => "nature_size",
			),
			'save_always' => true,
			'dependency'  => Array( 'element' => 'type', 'value' => array( 'masonry' ) ),
		),

		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Style",
			"param_name"  => "grid_style",
			"value"       => array(
				'Default' => '',
				'Normal' => "normal",
				'Show title and button' => "show-title-button",
			),
			'save_always' => true,
			"dependency" => Array('element' => "type", 'value' => array('grid'))
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Button text",
			"param_name" => "button_text",
			"value"       => esc_html__('View Home', 'tm-dione'),
			'save_always' => true,
			"dependency" => Array('element' => "grid_style", 'value' => array('show-title-button'))
		),

		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => "Link to",
			"param_name"  => "link_to",
			"value"       => array(
				'Default' => '',
				'Detail' => "detail",
				'Website' => 'website',
			),
			'save_always' => true,
		),

		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Columns",
			"param_name"  => "columns",
			"value"       => array(
				'' => '',
				'2 cols' => "folio-main-2cols",
				'3 cols' => "folio-main-3cols",
				'4 cols' => "folio-main-4cols",
				'5 cols' => "folio-main-5cols",
			),
			'save_always' => true,
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Hide Filter', 'tm-dione' ),
			'param_name' => 'hide_filter',
			'value'      => '',
			'options'    => array(
				'hide_filter_enable' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Order By",
			"param_name"  => "order_by",
			"value"       => array(
				'Default' => '',
				'Title' => "title",
				'Date' => "date",
				'Random' => "rand",
				'Comment count' => 'comment_count',
				'Slug' => 'slug',
				'ID' => 'id',
				'Last modified date' => 'modified',
				'Author' => 'author',
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
				'Default' => '',
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
