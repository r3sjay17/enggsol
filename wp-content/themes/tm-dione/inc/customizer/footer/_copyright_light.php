<?php
Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'copyright_text_color_light',
	'label'    => esc_html__( 'Text color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .copyright, .dark-light .copyright',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'copyright_link_color_light',
	'label'    => esc_html__( 'Link color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#111',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .copyright a, .dark-light .copyright a',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'copyright_link_color_hover_light',
	'label'    => esc_html__( 'Link color on hover', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .copyright a:hover, .dark-light .copyright a:hover',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'color-alpha',
	'settings'  => 'copyright_bg_color_light',
	'label'    => esc_html__( 'Background color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#fff',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.light .copyright, .dark-light .copyright',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );
