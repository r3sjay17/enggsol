<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'image',
	'settings'     => 'logo_normal',
	'label'       => esc_html__( 'Logo Normal', 'tm-dione' ),
	'description' => esc_html__( 'Choose a default logo image to display', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_template_directory_uri() . '/assets/images/logo_default.png',
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'image',
	'settings'     => 'logo_light',
	'label'       => esc_html__( 'Logo Image - Light', 'tm-dione' ),
	'description' => esc_html__( 'Choose a logo image to display for "Dark" header skin', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_template_directory_uri() . '/assets/images/logo_white.png',
) );
Kirki::add_field( 'tm-dione', array(
	'type'        => 'image',
	'settings'     => 'logo_dark',
	'label'       => esc_html__( 'Logo Image - Dark', 'tm-dione' ),
	'description' => esc_html__( 'Choose a logo image to display for "Light" header skin', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_template_directory_uri() . '/assets/images/logo_default.png',
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'image',
	'settings'     => 'logo_sticky',
	'label'       => esc_html__( 'Logo Image - Sticky Header', 'tm-dione' ),
	'description' => esc_html__( 'Choose a logo image to display for "Sticky" header type', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_template_directory_uri() . '/assets/images/logo_default.png',
) );
