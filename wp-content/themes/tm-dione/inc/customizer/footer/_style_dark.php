<?php
Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_text_color',
	'label'    => esc_html__( 'Text color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_link_color',
	'label'    => esc_html__( 'Link color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.site-footer a',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_link_color_on_hover',
	'label'    => esc_html__( 'Link color on hover', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => 'body .site-footer a:hover',
			'property' => 'color',
		),
	),
) );


Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_widget_title_color',
	'label'    => esc_html__( 'Widgets title color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#fff',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.site-footer .widget-title',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color-alpha',
	'settings'  => 'footer_bg_color',
	'label'    => esc_html__( 'Background color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#111',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'background-color',
		),
	),
) );
