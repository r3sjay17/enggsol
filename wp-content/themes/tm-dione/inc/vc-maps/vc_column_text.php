<?php
// Add params for vc text block
vc_add_params( 'vc_column_text', array(
	array(
		"type"        => "dropdown",
		//'admin_label' => true,
		"class"       => "",
		"heading"     => "Style",
		"description" => "Choose a TextBlock style",
		"param_name"  => "style",
		"value"       => array(
			"Default" => "",
			"Light Gray color" => "text-block_bg-light-gray-color",
			"Border Gray color" => "text-block_border-gray-color",
			"Background Secondary color" => "text-block_bg-secondary-color",
			"Background Dark color" => "text-block_bg-dark-color",
		)
	),
) );

vc_add_params( 'vc_column_text', array(
	array(
		"type"        => "dropdown",
		//'admin_label' => true,
		"class"       => "",
		"heading"     => "Drop-caps Style",
		"description" => "Choose a Drop-caps style",
		"param_name"  => "drop-caps-style",
		"value"       => array(
			"" => "",
			"Style 01" => "drop-caps style-01",
			"Style 02" => "drop-caps style-02",
			"Style 03" => "drop-caps style-03",
			"Style 04" => "drop-caps style-04",
			"Style 05" => "drop-caps style-05",
		)
	),
) );

add_filter( 'vc_shortcodes_css_class', 'tm_change_vc_column_text_class_name', 10, 3 );
function tm_change_vc_column_text_class_name( $class_string, $tag, $atts = null ) {
	// modify $class_string variable to your needs. You can use $tag variable to determine what element is currently rendered.
	if ( $tag == 'vc_column_text' ) {
		if(! empty( $atts['style'] )) {
			$class_string .= " " . $atts['style'];
		}
		if(! empty( $atts['drop-caps-style'] )) {
			$class_string .= " " . $atts['drop-caps-style'];
		}
	}

	return $class_string;
}

vc_map_update('vc_column_text', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico textblock-icon',
));
