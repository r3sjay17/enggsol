<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'breadcrumb_enable',
	'label'       => esc_html__( 'Breadcrumb', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display breadcrumb on every page', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );


Kirki::add_field( 'tm-dione', array(
	'type'     => 'text',
	'settings'  => 'breadcrumb_home_text',
	'label'    => esc_html__( '"Root" text', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'Home',
	'required' => array(
		array(
			'setting'  => 'breadcrumb_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'breadcrumb_color',
	'label'       => esc_html__( 'Color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#fff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.breadcrumb ul li a',
			'property' => 'color',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'breadcrumb_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'breadcrumb_color_active',
	'label' => esc_html__( 'Color active', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.breadcrumb ul li, .breadcrumb ul li a:hover',
			'property' => 'color',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'breadcrumb_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );
