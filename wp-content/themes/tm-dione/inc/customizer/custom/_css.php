<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'    => 'custom_css_enable',
	'label'       => esc_html__( 'Enable', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display top area', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'transport' => 'auto',
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'code',
	'settings'  => 'custom_css',
	'label'     => esc_html__( 'Custom CSS', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 'html{background-color:#fff;}',
	'choices'   => array(
		'language' => 'css',
		'theme'    => 'monokai',
	),
	'transport' => 'auto',
	'js_vars'   => array(
		array(
			'element'  => '#infinity-main-inline-css',
			'function' => 'html',
		),
	),
) );
