<?php
Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'header_type',
    'label' => esc_html__('Header template', 'tm-dione'),
    'description' => esc_html__('Choose the header template you want', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '1',
    'choices' => array(
        '1' => esc_html__('Default Header', 'tm-dione'),
		'1' => esc_html__('Centered-Menu Header', 'tm-dione'),
		'right-align' => esc_html__('Menu align right Header', 'tm-dione'),
        '2' => esc_html__('Left-Side Header', 'tm-dione'),
        'blank' => esc_html__('Blank Header', 'tm-dione'),
    ),
));
Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'header_dark_light',
    'label' => esc_html__('Header style', 'tm-dione'),
    'description' => esc_html__('Choose the header style you want', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'light',
    'choices' => array(
        'light' => esc_html__('Light', 'tm-dione'),
        'dark' => esc_html__('Dark', 'tm-dione'),
    ),
));

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'header_wide_boxed',
    'label' => esc_html__('Header Wide Boxed', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'wide',
    'choices' => array(
        'wide' => esc_html__('Wide', 'tm-dione'),
        'boxed' => esc_html__('Boxed', 'tm-dione'),
    ),
));

// Kirki::add_field('tm-dione', array(
//     'type' => 'toggle',
//     'settings' => 'nav_boxed_enable',
//     'label' => esc_html__('Nav boxed', 'tm-dione'),
//     'section' => $section,
//     'priority' => $priority++,
//     'default' => 0,
// ));

Kirki::add_field('tm-dione', array(
    'type' => 'toggle',
    'settings' => 'sidemenu_enable',
    'label' => esc_html__('Right-side menu', 'tm-dione'),
    'description' => esc_html__('Turn on this option if you want to enable Right-side menu in header', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 0,
));

Kirki::add_field('tm-dione', array(
    'type' => 'toggle',
    'settings' => 'hide_main_nav',
    'label' => esc_html__('Hide Main menu', 'tm-dione'),
    'description' => esc_html__('Turn on this option if you want to hide Main menu in header', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 0,
));

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'search_enable',
	'label'       => esc_html__( 'Search', 'tm-dione' ),
	'description' => esc_html__( 'Turn on this option if you want to enable search box in header', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'search_only_posts',
	'label'       => esc_html__( 'Search only Posts', 'tm-dione' ),
	'description' => esc_html__( 'Turn on this option if you want to enable search only posts', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'text',
	'settings'   => 'header_height',
	'label'     => esc_html__( 'Header height', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element' => implode(',', array(
				'.site-header > .container-fluid > .row',
				'.site-header > .container > .row',
				'header.header > .container-fluid > .row',
				'header.header > .container > .row',
			)),
			'property' => 'height',
			'units' => 'px',
		),
	),
) );
