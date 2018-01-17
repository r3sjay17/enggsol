<?php
class WPBakeryShortCode_Thememove_Menu extends WPBakeryShortCode {
}

function get_menu() {
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	// Properly format the array.
	$items = array();
	foreach ( $menus as $menu ) {
		$items[ $menu->slug ] = $menu->name;
	}

	return $items;
}

vc_map( array(
	        'name'                      => esc_html__( 'TM Better Menu', 'tm-dione' ),
	        'base'                      => 'thememove_menu',
	        'category'                  => esc_html( sprintf( esc_html__( 'by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ) ),
			'icon' => 'tm-shortcode-ico textblock-icon',
	        'allowed_container_element' => 'vc_row',
	        'params'                    => array(
				array(
					"type"        => "textfield",
					'admin_label' => true,
					"class"       => "",
					"heading"     => "Title",
					"param_name"  => "title",
					"value"       => "",
				),
		        array(
			        'type'        => 'dropdown',
			        'heading'     => esc_html__( 'Menu', 'tm-dione' ),
			        'value'       => get_menu(),
			        'admin_label' => true,
			        'param_name'  => 'better_menu',
		        ),
	        ),
        ) );
