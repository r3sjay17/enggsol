<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'search_mode',
	'label'       => esc_html__( 'Only search posts', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'radio-image',
	'settings'    => 'search_layout',
	'label'       => esc_html__( 'Layout', 'tm-dione' ),
	'section'     => $section,
	'default'     => 'right-sidebar',
	'priority'    => $priority,
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/images/customizer/left-sidebar.png',
		'full-width' => get_template_directory_uri() . '/assets/images/customizer/full-width.png',
		'right-sidebar'   => get_template_directory_uri() . '/assets/images/customizer/right-sidebar.png',
	),
	'tooltip' => esc_html__( 'Choose Layout for search page', 'tm-dione' ),
) );

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'search_title',
    'label' => esc_html__('Search title', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'default',
    'choices' => array(
        'default' => 'Default style',
		'none' => 'Disable title',
    ),
));

Kirki::add_field( 'tm-dione', array(
	'type'      => 'text',
	'settings'   => 'search_title_height',
	'label'     => esc_html__( 'Search Title Height', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '150',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element'  => '.search .page-big-title',
			'property' => 'height',
			'units' => 'px',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'search_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'spacing',
	'settings'  => 'search_title_margin',
	'label'    => esc_html__( 'Margin', 'tm-dione' ),
	'transport' => 'auto',
	'section'  => $section,
	'choices'  => array(
		'top'    => true,
		'bottom' => true,
		'right'  => true,
		'left'   => true
	),
	'default'  => array(
		'top'    => '0',
		'bottom' => '60px',
		'right'  => '0',
		'left'   => '0'
	),
	'priority' => $priority ++,
	'output'   => array(
		array(
			'element'  => '.search .page-big-title',
			'property' => 'margin',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'search_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'image',
	'settings'  => 'search_title_bg_image',
	'label'    => esc_html__( 'Title\'s Background image', 'tm-dione' ),
	'help'     => esc_html__( 'Default background image for your header', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.search .page-big-title',
			'property' => 'background-image',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'search_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );
