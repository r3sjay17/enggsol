<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'select',
	'settings'     => 'portfolio_single_layout',
	'label'       => esc_html__( 'Layout', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1-column',
	'choices'  => array(
		'1-column' => esc_html__('1 Column', 'tm-dione'),
		'2-columns' => esc_html__('2 Columns', 'tm-dione'),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'portfolio_header_section_enable',
	'label'       => esc_html__( 'Header section Enable', 'tm-dione' ),
	'description' => esc_html__( 'Turn on this option if you want to enable header section', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'portfolio_visit_button_enable',
	'label'       => esc_html__( '"Visit" button Enable', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'portfolio_client_enable',
	'label'       => esc_html__( 'Client Enable', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'portfolio_share_enable',
	'label'       => esc_html__( 'Share Enable', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
