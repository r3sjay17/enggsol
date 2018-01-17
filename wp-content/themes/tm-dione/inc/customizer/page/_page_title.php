<?php
Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'page_title',
    'label' => esc_html__('Page title', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'default',
    'choices' => array(
        'default' => 'Default style',
        //'center-style' => 'Center style',
		'none' => 'Disable title',
    ),
));

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => 'page_title_font',
	'description' => esc_html__( 'Set up font settings for page title', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		'font-size'      => '24px',
		'font-weight'    => '300',
		'line-height'    => '1',
		'letter-spacing' => '0.03em',
	),
	'choices'     => array(
		'font-style'     => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => '.page-big-title .entry-title',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'page_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'text',
	'settings'   => 'page_title_height',
	'label'     => esc_html__( 'Page Title Height', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '150',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element'  => '.page-big-title',
			'property' => 'height',
			'units' => 'px',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'page_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'spacing',
	'settings'  => 'page_title_margin',
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
		'bottom' => '100px',
		'right'  => '0',
		'left'   => '0'
	),
	'priority' => $priority ++,
	'output'   => array(
		array(
			'element'  => '.page-big-title',
			'property' => 'margin',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'page_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'page_title_color',
	'label'       => esc_html__( 'Title color', 'tm-dione' ),
	'description' => esc_html__( 'Choose color for title', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#FFFFFF',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.page-big-title .entry-title',
			'property' => 'color',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'page_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'color',
	'settings'   => 'page_title_bg_color',
	'label'     => esc_html__( 'Title\'s Background color', 'tm-dione' ),
	'help'      => esc_html__( 'Setup background color for your header', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element'  => 'body .page-big-title',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
        array(
            'settings' => 'page_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'image',
	'settings'  => 'page_title_bg_image',
	'label'    => esc_html__( 'Title\'s Background image', 'tm-dione' ),
	'help'     => esc_html__( 'Default background image for your header', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element'  => '.page-big-title',
			'property' => 'background-image',
		),
	),
	'active_callback' => array(
		array(
            'settings' => 'page_title',
            'operator' => '==',
            'value' => 'default',
        ),
    ),
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'color-alpha',
	'settings'   => 'page_title_center_style_bg_color',
	'label'     => esc_html__( 'Overlay color for Center style', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element'  => 'body .page-big-title.center-style:after, body .page-big-title--single.center-style:after',
			'property' => 'background-color',
		),
	),
) );
