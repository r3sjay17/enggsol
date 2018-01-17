<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'sticky_nav_main_menu_item_color',
	'label'       => esc_html__( 'Main menu item color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#111',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'header.header.headroom.headroom--not-top > .header-container #site-navigation .menu > ul > li > a',
				'header.header.headroom.headroom--not-top > .header-container #site-navigation .menu > ul > li',
				'header.header.headroom.headroom--not-top > .header-container .mini-cart_button',
				'header.header.headroom.headroom--not-top > .header-container .search-icon a',
			)),
			'property' => 'color',
		),
		array(
			'element' => implode(',', array(
				'header.header.headroom.headroom--not-top > .header-container #menu-bar-rect rect',
				'header.header.headroom.headroom--not-top > .header-container #right-menu-bar-rect rect',
			)),
			'property' => 'fill',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'sticky_nav_main_menu_item_color_hover',
	'label'       => esc_html__( 'Main menu item hover color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'header.header.headroom.headroom--not-top > .header-container #site-navigation .menu > ul > li > a:hover',
				'header.header.headroom.headroom--not-top > .header-container .mini-cart_button',
				'header.header.headroom.headroom--not-top > .header-container .search-icon a',
			)),
			'property' => 'color',
		),
		array(
			'element' => implode(',', array(
				'header.header.headroom.headroom--not-top > .header-container .menu-bar:hover #menu-bar-rect rect',
				'header.header.headroom.headroom--not-top > .header-container .menu-bar:hover #right-menu-bar-rect rect',
			)),
			'property' => 'fill',
		),
	),
) );
