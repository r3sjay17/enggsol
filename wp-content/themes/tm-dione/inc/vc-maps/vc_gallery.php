<?php
/*** Gallery ***/

vc_remove_param('vc_gallery', 'title');
vc_remove_param('vc_gallery', 'type');
vc_remove_param('vc_gallery', 'interval');
vc_remove_param('vc_gallery', 'source');
vc_remove_param('vc_gallery', 'custom_srcs');
vc_remove_param('vc_gallery', 'img_size');
vc_remove_param('vc_gallery', 'external_img_size');


vc_add_param("vc_gallery", array(
	"type" => "attach_images",
	"class" => "",
	'admin_label' => true,
	"heading" => "Images",
	"param_name" => "images",
	'save_always' => true,
//	"dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_add_param("vc_gallery", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Image size",
	"param_name" => "img_size",
	'save_always' => true,
	"std" => 'full',
	'description' => 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.',
//	"dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_add_param("vc_gallery", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Column Number",
	"param_name" => "column_number",
	"value" => array('', 1, 2, 3, 4, 5),
	'save_always' => true,
//	"dependency" => Array('element' => "type", 'value' => array('image_grid'))
));

vc_map_update('vc_gallery', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico gallery-icon',
));
