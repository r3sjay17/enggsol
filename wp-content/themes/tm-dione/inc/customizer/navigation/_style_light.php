<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'nav_main_menu_item_color_light',
	'label'       => esc_html__( 'Main menu item color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#fff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'header.dark #site-navigation .menu > ul > li > a',
				'header.dark #site-navigation .menu > ul > li',
				'header.dark .mini-cart_button',
				'header.dark .search-icon a',
			)),
			'property' => 'color',
		),
		array(
			'element' => implode(',', array(
				'header.dark #menu-bar-rect rect',
				'header.dark #right-menu-bar-rect rect',
			)),
			'property' => 'fill',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'nav_main_menu_item_color_light_hover',
	'label'       => esc_html__( 'Main menu item hover color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'header.dark #site-navigation .menu > ul > li > a:hover',
				'header.dark .mini-cart_button',
				'header.dark .search-icon a',
			)),
			'property' => 'color',
		),
		array(
			'element' => implode(',', array(
				'header.dark .menu-bar:hover #menu-bar-rect rect',
				'header.dark .menu-bar:hover #right-menu-bar-rect rect',
			)),
			'property' => 'fill',
		),
	),
) );
