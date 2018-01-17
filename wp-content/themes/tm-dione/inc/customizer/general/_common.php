<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'scroll_top_top_enable',
	'label'       => esc_html__( 'Scroll to top', 'tm-dione' ),
	'description' => esc_html__( 'Enabling this option will display Scroll-to-Top button', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );
