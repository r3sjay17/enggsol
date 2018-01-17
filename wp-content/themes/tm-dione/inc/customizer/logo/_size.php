<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'custom_logo_size',
	'label'       => esc_html__( 'Enable custom Logo size', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'dimension',
	'settings'    => 'logo_height',
	'label'       => esc_html__( 'Height (px)', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'media_query'   => '@media ( min-width: 63.9rem )',
			'element'  => '#logo img',
			'property' => 'height',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'custom_logo_size',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'dimension',
	'settings'    => 'logo_width',
	'label'       => esc_html__( 'Width (px)', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'media_query'   => '@media ( min-width: 63.9rem )',
			'element'  => '#logo img',
			'property' => 'width',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'custom_logo_size',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'dimension',
	'settings'    => 'logo_height_mb',
	'label'       => esc_html__( 'Height - Mobile (px)', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'media_query'   => '@media ( max-width: 63.9rem )',
			'element'  => '#logo img',
			'property' => 'height',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'custom_logo_size',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'dimension',
	'settings'    => 'logo_width_mb',
	'label'       => esc_html__( 'Width - Mobile (px)', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'media_query'   => '@media ( max-width: 63.9rem ) ',
			'element'  => '#logo img',
			'property' => 'width',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'custom_logo_size',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );
