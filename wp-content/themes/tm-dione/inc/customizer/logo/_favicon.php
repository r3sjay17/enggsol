<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'image',
	'settings'     => 'favicon',
	'label'       => esc_html__( 'Favicon', 'tm-dione' ),
	'description' => esc_html__( 'File must be .png or .ico format. Optimal dimensions: 32px x 32px', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_template_directory_uri() . '/assets/images/favicon.ico',
) );
Kirki::add_field( 'tm-dione', array(
	'type'        => 'image',
	'settings'     => 'apple_touch_icon',
	'label'       => esc_html__( 'Apple Touch Icon', 'tm-dione' ),
	'description' => esc_html__( 'File must be .png format. Optimal dimensions: 152px x 152px', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_template_directory_uri() . '/assets/images/apple-icon.png',
) );
