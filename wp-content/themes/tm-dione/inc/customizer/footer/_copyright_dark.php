<?php
Kirki::add_field( 'tm-dione', array(
	'type'     => 'color',
	'settings'  => 'copyright_text_color',
	'label'    => esc_html__( 'Text color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.copyright',
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
	'settings'  => 'copyright_link_color',
	'label'    => esc_html__( 'Link color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#999',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.copyright a',
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
	'settings'  => 'copyright_link_color_hover',
	'label'    => esc_html__( 'Link color on hover', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.copyright a:hover',
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
	'settings'  => 'copyright_bg_color',
	'label'    => esc_html__( 'Background color', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#333',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.copyright',
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
