<?php
class WPBakeryShortCode_Horizontal_Scroll_Gallery extends WPBakeryShortCode {
}

/*** Image Grid ***/

$basename = "horizontal_scroll_gallery";

$group_design = __( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Horizontal Scroll Gallery",
	"base"                      => $basename,
	"category"                  => sprintf( __('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	'icon' => 'tm-shortcode-ico gallery-icon',
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
			'type'        => 'textfield',
			'heading'     => __( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'custom_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione' ),
		),
		array(
			'type'       => 'css_editor',
			'heading'    => __( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );
