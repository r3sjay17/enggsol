<?php
Kirki::add_field( 'tm-dione', array(
	'type'      => 'text',
	'settings'   => 'mobile_header_height',
	'label'     => esc_html__( 'Header height', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'media_query'   => '@media ( max-width: 63.9rem )',
			'element' => implode(',', array(
				'.site-header > .header-container > .row',
				'header.header > .header-container > .row',
			)),
			'property' => 'height',
			'units' => 'px',
		),
	),
) );
