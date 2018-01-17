<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'footer_layout_enable',
	'label'       => esc_html__( 'Footer enable', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display footer area', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'partial_refresh' => array(
		'footer_layout_enable' => array(
			'selector'        => '.footer-wrapper',
			'render_callback' => function () {
				get_template_part('template-parts/footer', Kirki::get_option( 'tm-dione', 'footer_type' ));
			},
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'footer_parallax_enable',
	'label'       => esc_html__( 'Footer Parallax', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will Parallax on Footer', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'footer_sticky_enable',
	'label'       => esc_html__( 'Footer Sticky Mode', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
	'active_callback' => array(
        array(
            'settings' => 'footer_layout_enable',
            'operator' => '==',
            'value' => 0,
        ),
    ),
) );

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'footer_type',
    'label' => esc_html__('Footer template', 'tm-dione'),
    'description' => esc_html__('Choose the Footer type you want', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '1',
    'choices' => array(
        '1' => esc_html__('Default Footer', 'tm-dione'),
        '2' => esc_html__('With subscribe form', 'tm-dione'),
    ),
	'partial_refresh' => array(
		'footer_type' => array(
			'selector'        => '.footer-wrapper',
			'render_callback' => function () {
				get_template_part('template-parts/footer', Kirki::get_option( 'tm-dione', 'footer_type' ));
			},
		),
	),
));

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'footer_wide_boxed',
    'label' => esc_html__('Footer Wide Boxed', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'boxed',
    'choices' => array(
        'wide' => esc_html__('Wide', 'tm-dione'),
        'boxed' => esc_html__('Boxed', 'tm-dione'),
    ),
));

// Kirki::add_field('tm-dione', array(
//     'type' => 'toggle',
//     'settings' => 'footer_full_width',
//     'label' => esc_html__('Footer Full Width', 'tm-dione'),
//     'section' => $section,
//     'priority' => $priority++,
//     'default' => 0,
// ));

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'footer_layout_quantity_columns',
    'label' => esc_html__('Layout', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '4',
    'choices' => array(
        1 => '1 Column',
        2 => '2 Columns',
        3 => '3 Columns',
        4 => '4 Columns',
    ),
));

Kirki::add_field('tm-dione', array(
    'type' => 'toggle',
    'settings' => 'footer_layout_custom_width',
    'label' => esc_html__('Custom Width of Columns', 'tm-dione'),
    'description' => esc_html__('Enabling this option will Custom Width of Column', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 1,
));

Kirki::add_field('tm-dione', array(
    'type' => 'text',
    'settings' => 'footer_layout_width_columns_1',
    'label' => esc_html__('Width of footer columns 1 (%)', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '30',
    'transport' => 'auto',
    'output' => array(
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column:first-child',
            'property' => 'flex-basis',
            'units' => '%',
        ),
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column:first-child',
            'property' => 'max-width',
            'units' => '%',
        ),
    ),
    'active_callback' => array(
        array(
            'settings' => 'footer_layout_custom_width',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Kirki::add_field('tm-dione', array(
    'type' => 'text',
    'settings' => 'footer_layout_width_columns_2',
    'label' => esc_html__('Width of footer columns 2 (%)', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '20',
    'transport' => 'auto',
    'output' => array(
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column.ft-cl-2',
            'property' => 'flex-basis',
            'units' => '%',
        ),
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column.ft-cl-2',
            'property' => 'max-width',
            'units' => '%',
        ),
    ),
    'active_callback' => array(
        array(
            'settings' => 'footer_layout_custom_width',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Kirki::add_field('tm-dione', array(
    'type' => 'text',
    'settings' => 'footer_layout_width_columns_3',
    'label' => esc_html__('Width of footer columns 3 (%)', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '25',
    'transport' => 'auto',
    'output' => array(
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column.ft-cl-3',
            'property' => 'flex-basis',
            'units' => '%',
        ),
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column.ft-cl-3',
            'property' => 'max-width',
            'units' => '%',
        ),
    ),
    'active_callback' => array(
        array(
            'settings' => 'footer_layout_custom_width',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Kirki::add_field('tm-dione', array(
    'type' => 'text',
    'settings' => 'footer_layout_width_columns_4',
    'label' => esc_html__('Width of footer columns 4 (%)', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '25',
    'transport' => 'auto',
    'output' => array(
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column.ft-cl-4',
            'property' => 'flex-basis',
            'units' => '%',
        ),
        array(
			'media_query'   => '@media ( min-width: 64rem )',
            'element' => '.footer-column-container .footer-column.ft-cl-4',
            'property' => 'max-width',
            'units' => '%',
        ),
    ),
    'active_callback' => array(
        array(
            'settings' => 'footer_layout_custom_width',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));

Kirki::add_field( 'tm-dione', array(
	'type'     => 'spacing',
	'settings'  => 'footer_padding',
	'label'    => esc_html__( 'Padding', 'tm-dione' ),
	'section'  => $section,
	'choices'  => array(
		'top'    => true,
		'bottom' => true,
		'right'  => true,
		'left'   => true
	),
	'default'  => array(
		'top'    => '100px',
		'bottom' => '100px',
		'right'  => '0px',
		'left'   => '0px'
	),
	'priority' => $priority ++,
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'padding',
		),
	),
	'transport' => 'auto',
) );
