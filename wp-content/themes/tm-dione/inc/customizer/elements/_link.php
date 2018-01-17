<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => 'link_font',
	'description' => esc_html__( 'Set up font settings for text link', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default' => array(
        'font-style' => array('bold', 'italic'),
        'subsets' => array('latin-ext'),
        'variant' => '400',
		'font-size' => '',
        'line-height' => '1.6em',
        'letter-spacing' => '0.05em',
    ),
    'output' => array(
        array(
            'element' => 'html a',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'color',
	'settings'   => 'link_color',
	'label'     => esc_html__( 'Color', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '',
	'transport' => 'auto',
	'output' => array(
        array(
            'element' => 'html a',
			'property' => 'color',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'link_color_on_hover',
	'label'       => esc_html__( 'Color on hover', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'transport' => 'auto',
	'output' => array(
        array(
            'element' => 'html a',
			'property' => 'color',
        ),
    ),
) );
