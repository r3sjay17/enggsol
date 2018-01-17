<?php
Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_text_color_light',
	'label'    => esc_html__( 'Text color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .site-footer, .light-dark .site-footer',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_link_color_light',
	'label'    => esc_html__( 'Link color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .site-footer a, .light-dark .site-footer a',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_link_color_on_hover_light',
	'label'    => esc_html__( 'Link color on hover', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => 'body .light .site-footer a:hover, body .light-dark .site-footer a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'footer_widget_title_color_light',
	'label'    => esc_html__( 'Widgets title color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#111',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .site-footer .widget-title, .light-dark .site-footer .widget-title',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color-alpha',
	'settings'  => 'footer_bg_color_light',
	'label'    => esc_html__( 'Background color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#ffffff',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .site-footer, .light-dark .site-footer',
			'property' => 'background-color',
		),
	),
) );
