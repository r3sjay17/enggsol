<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'nav_main_menu_item_color',
	'label'       => esc_html__( 'Main menu item color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'#site-navigation .menu > ul > li > a',
				'#site-navigation .menu > ul > li',
				'.mini-cart_button',
				'.search-icon a',
			)),
			'property' => 'color',
		),
		array(
			'element' => implode(',', array(
				'#menu-bar-rect rect',
				'#right-menu-bar-rect rect',
			)),
			'property' => 'fill',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'nav_main_menu_item_color_hover',
	'label'       => esc_html__( 'Main menu item hover color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'#site-navigation .menu > ul > li > a:hover',
				'.mini-cart_button',
				'.search-icon a',
			)),
			'property' => 'color',
		),
		array(
			'element' => implode(',', array(
				'.menu-bar:hover #menu-bar-rect rect',
				'.menu-bar:hover #right-menu-bar-rect rect',
			)),
			'property' => 'fill',
		),
	),
) );
