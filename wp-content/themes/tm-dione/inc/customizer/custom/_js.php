<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'    => 'custom_js_enable',
	'label'       => esc_html__( 'Enable', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display top area', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'transport' => 'auto',
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'code',
	'settings' => 'custom_js',
	'label'    => esc_html__( 'Custom JS', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'choices'  => array(
		'language' => 'javascript',
		'theme'    => 'monokai',
	),
) );
