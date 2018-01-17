<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'copyright_enable',
	'label'       => esc_html__( 'Copyright', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display copyright area', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'copyright_social_menu_enable',
	'label'       => esc_html__( 'Social menu', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display Social menu copyright area', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'textarea',
	'settings'     => 'copyright_text',
	'label'       => esc_html__( 'Content', 'tm-dione' ),
	'description' => esc_html__( 'Entry the text for left block', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '&copy; Dione by Thememove. All Right Reserved 2016.',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.copyright .copyright_text',
			'function' => 'html',
		),
	),
	'required'    => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );


Kirki::add_field( 'tm-dione', array(
	'type'     => 'dimension',
	'settings'  => 'copyright_height',
	'label'    => esc_html__( 'Height', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '100px',
	'transport' => 'auto',
	'output'   => array(
		array(
			'element'  => '.copyright, .copyright > div, .copyright > div .row',
			'property' => 'height',
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
	'type'     => 'select',
	'settings'  => 'copyright_text_align',
	'label'    => esc_html__( 'Text align', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'transport' => 'auto',
	'choices'  => array(
		'default'   => 'Default',
		'left'   => 'Left',
		'center' => 'Center',
		'right'  => 'Right',
	),
	'required' => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'output'   => array(
		array(
			'element'  => '.copyright, .copyright > div, .copyright > div .row',
			'property' => 'text-align',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'select',
	'settings'  => 'copyright_display',
	'label'    => esc_html__( 'Display', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'col-md-12',
	'choices'  => array(
		'col-md-12' => 'Block',
		'col-md-6'   => 'Inline',
	),
	'required' => array(
		array(
			'setting'  => 'copyright_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );
