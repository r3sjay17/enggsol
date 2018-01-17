<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'toggle',
	'settings'     => 'centered_logo_enable',
	'label'       => esc_html__( 'Centered Logo', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );
