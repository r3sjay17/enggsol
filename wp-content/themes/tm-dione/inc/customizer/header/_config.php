<?php
Kirki::add_field('tm-dione', array(
    'type' => 'preset',
	'label' => esc_html__('Header base config', 'tm-dione'),
    'settings' => 'header_preset',
    'description' => esc_html__('Choose a base header config you want', 'tm-dione'),
    'section' => $section,
    'default' => 'wide-header',
    'priority' => $priority++,
    'choices' => array(
		'wide-header' => array(
            'label' => esc_html__('Wide Header', 'tm-dione'),
            'settings' => array(
				'centered_logo_enable' => 0,
            ),
        ),
		'centered-wide-header' => array(
            'label' => esc_html__('Centered Wide Header', 'tm-dione'),
            'settings' => array(
				'centered_logo_enable' => 1,
            ),
        ),
		'boxed-header' => array(
            'label' => esc_html__('Boxed Header', 'tm-dione'),
            'settings' => array(
				'header_wide_boxed' => 'boxed',
				'centered_logo_enable' => 0,
            ),
        ),
		'centered-boxed-header' => array(
            'label' => esc_html__('Centered Boxed Header', 'tm-dione'),
            'settings' => array(
				'centered_logo_enable' => 1,
				'header_wide_boxed' => 'boxed',
            ),
        ),
		'left-header' => array(
            'label' => esc_html__('Left Header', 'tm-dione'),
            'settings' => array(
                'header_type' => 2,
            ),
        ),
		'right-side-menu' => array(
            'label' => esc_html__('Right-side menu', 'tm-dione'),
            'settings' => array(
                'sidemenu_enable' => 1,
            ),
        ),
		'sticky-header' => array(
            'label' => esc_html__('Sticky Header', 'tm-dione'),
            'settings' => array(
				'sticky_header_enable' => 1,
            ),
        ),
	  	'blank-header' => array(
            'label' => esc_html__('Blank Header', 'tm-dione'),
            'settings' => array(
                'header_type' => 'blank',
            ),
        ),
    ),
));
