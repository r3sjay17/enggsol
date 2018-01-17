<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'minicart_enable',
	'label'       => esc_html__( 'Mini Cart', 'tm-dione' ),
	'description' => esc_html__( 'Turn on this option if you want to enable mini cart in header', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
