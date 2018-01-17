<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'preset',
	'settings'    => 'footer_preset',
	'label'       => 'Footer base config',
	'description' => esc_html__( 'Choose a footer base config you want', 'tm-dione' ),
	'section'     => $section,
	'default'     => 'boxed-footer',
	'priority'    => $priority ++,
	'multiple'    => 3,
	'choices'     => array(
		'boxed-footer' => array(
			'label'    => esc_html__( 'Boxed Footer', 'tm-dione' ),
			'settings' => array(
			),
		),
		'wide-footer' => array(
			'label'    => esc_html__( 'Wide Footer', 'tm-dione' ),
			'settings' => array(
				'footer_wide_boxed' => 'wide',
			),
		),
		'with-subscribe-form' => array(
			'label'    => esc_html__( 'With subscribe form', 'tm-dione' ),
			'settings' => array(
				'footer_type' => '2',
				'footer_wide_boxed' => 'wide',
				'copyright_text_align' => 'center',
			),
		),
		'minimal-footer' => array(
			'label'    => esc_html__( 'Minimal Footer', 'tm-dione' ),
			'settings' => array(
				'footer_layout_enable' => 0,
			),
		),
		'centeredMinimal-footer' => array(
			'label'    => esc_html__( 'CenteredMinimal Footer', 'tm-dione' ),
			'settings' => array(
				'footer_layout_enable' => 0,
				'copyright_text_align' => 'center',
			),
		),
		'centeredMinimal-footer-2' => array(
			'label'    => esc_html__( 'CenteredMinimal Footer Bigger', 'tm-dione' ),
			'settings' => array(
				'footer_layout_enable' => 0,
				'copyright_height' => '200px',
				'copyright_text_align' => 'center',
				'copyright_social_menu_enable' => 1,
			),
		),
		'sticky-centeredMinimal-footer' => array(
			'label'    => esc_html__( 'Sticky CenteredMinimal Footer', 'tm-dione' ),
			'settings' => array(
				'footer_sticky_enable' => 1,
				'footer_layout_enable' => 0,
				'copyright_text_align' => 'center',
			),
		),

		'sticky-centeredMinimal-social-footer' => array(
			'label'    => esc_html__( 'Sticky CenteredMinimal+Social Footer', 'tm-dione' ),
			'settings' => array(
				'footer_sticky_enable' => 1,
				'footer_layout_enable' => 0,
				'copyright_social_menu_enable' => 1,
				'copyright_display' => 'col-md-6',
				'copyright_text_align' => 'left',
			),
		),

		'disable-footer' => array(
			'label'    => esc_html__( 'Disable Footer', 'tm-dione' ),
			'settings' => array(
				'footer_layout_enable' => 0,
				'copyright_enable' => 0,
			),
		),

	),
) );

Kirki::add_field('tm-dione', array(
    'type' => 'select',
    'settings' => 'footer_dark_light',
    'label' => esc_html__('Footer style', 'tm-dione'),
    'description' => esc_html__('Choose the header style you want', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'dark',
    'choices' => array(
        'light' => esc_html__('Light', 'tm-dione'),
        'dark' => esc_html__('Dark', 'tm-dione'),
		'dark-light' => esc_html__('Dark - Light', 'tm-dione'),
		'light-dark' => esc_html__('Light - Dark', 'tm-dione'),
    ),
));
