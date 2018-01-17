<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'radio-image',
	'settings'    => 'page_layout',
	'label'       => esc_html__( 'Layout', 'tm-dione' ),
	'section'     => $section,
	'default'     => 'full-width',
	'priority'    => $priority,
	'choices'     => array(
		'left-sidebar'   => get_template_directory_uri() . '/assets/images/customizer/left-sidebar.png',
		'full-width' => get_template_directory_uri() . '/assets/images/customizer/full-width.png',
		'right-sidebar'   => get_template_directory_uri() . '/assets/images/customizer/right-sidebar.png',
	),
	'tooltip' => esc_html__( 'Choose Layout for page', 'tm-dione' ),
) );

// Kirki::add_field('tm-dione', array(
//     'type' => 'select',
//     'settings' => 'page_wide_boxed',
//     'description' => esc_html__('Wide or boxed', 'tm-dione'),
//     'section' => $section,
//     'priority' => $priority++,
//     'default' => 'boxed',
//     'choices' => array(
//         'boxed' => 'Boxed',
//         'wide' => 'Wide',
//     ),
// ));
