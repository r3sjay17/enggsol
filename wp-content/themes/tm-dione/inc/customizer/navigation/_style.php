<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => 'nav_font',
	'description' => esc_html__( 'Set up font settings for body text', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		'font-size'      => '12px',
		'font-weight'    => '500',
		'line-height'    => '1.6em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-family'    => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => '#site-navigation .menu > ul > li > a',
		),
	),
) );
