<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'radio-image',
	'settings'    => 'shop_layout',
	'label'       => esc_html__( 'Layout', 'tm-dione' ),
	'section'     => $section,
	'default'     => 'right-sidebar',
	'priority'    => $priority,
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/images/customizer/left-sidebar.png',
		'full-width' => get_template_directory_uri() . '/assets/images/customizer/full-width.png',
		'right-sidebar'   => get_template_directory_uri() . '/assets/images/customizer/right-sidebar.png',
	),
	'tooltip' => esc_html__( 'Choose Layout for shop', 'tm-dione' ),
) );

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'shop_wide_boxed',
    'description' => esc_html__('Wide or boxed', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'boxed',
    'choices' => array(
        'boxed' => 'Boxed',
        'wide' => 'Wide',
    ),
));

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'shop_product_column',
    'description' => esc_html__('Columns of Product', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '3',
    'choices' => array(
        '2' => esc_html__( '2 Columns', 'tm-dione' ),
		'3' => esc_html__( '3 Columns', 'tm-dione' ),
		'4' => esc_html__( '4 Columns', 'tm-dione' ),
    ),
));
