<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'    => 'sticky_header_enable',
	'label'       => esc_html__( 'Sticky Header enable', 'tm-dione' ),
	'description' => 'Click to <a data-focus="logo_sticky">Logo</a> if you want to Logo for sticky Header</a>',
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'text',
	'settings'   => 'sticky_header_height',
	'label'     => esc_html__( 'Header height', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '60',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element' => implode(',', array(
				'.site-header.headroom.headroom--not-top > .container-fluid > .row',
				'.site-header.headroom.headroom--not-top > .container > .row',
				'header.header.headroom.headroom--not-top > .container-fluid > .row',
				'header.header.headroom.headroom--not-top > .container > .row',
			)),
			'property' => 'height',
			'units' => 'px',
		),
	),
) );

Kirki::add_field('tm-dione', array(
    'type' => 'color-alpha',
    'settings' => 'sticky_header_bg_color',
    'label' => esc_html__('Background color', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '',
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '.header.headroom.headroom--not-top',
            'property' => 'background-color',
        ),
    ),
	'active_callback' => array(
		array(
            'settings' => 'sticky_header_enable',
            'operator' => '==',
            'value' => '1',
        ),
    ),
));

Kirki::add_field('tm-dione', array(
    'type' => 'color-alpha',
    'settings' => 'sticky_header_border_color',
    'label' => esc_html__('Border color', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '',
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '.header.headroom.headroom--not-top',
            'property' => 'border-color',
        ),
    ),
	'active_callback' => array(
		array(
            'settings' => 'sticky_header_enable',
            'operator' => '==',
            'value' => '1',
        ),
    ),
));
