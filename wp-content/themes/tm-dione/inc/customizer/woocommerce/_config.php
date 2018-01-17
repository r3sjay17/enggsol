<?php
Kirki::add_field('tm-dione', array(
    'type' => 'preset',
    'settings' => 'shop_base_config',
    'description' => esc_html__('Choose a base config you want', 'tm-dione'),
    'section' => $section,
    'default' => '1',
    'priority' => $priority++,
    'multiple' => 3,
    'choices' => array(
        '1' => array(
            'label' => esc_html__('Default', 'tm-dione'),
            'settings' => array(
            ),
        ),
		'2' => array(
            'label' => esc_html__('Boxed', 'tm-dione'),
            'settings' => array(
                'shop_wide_boxed' => 'boxed',
				'shop_product_column' => 3,
				'shop_layout' => 'full-width',
            ),
        ),
		'3' => array(
            'label' => esc_html__('Wide', 'tm-dione'),
            'settings' => array(
				'shop_wide_boxed' => 'wide',
				'shop_product_column' => 4,
				'shop_layout' => 'full-width',
            ),
        ),
		'4' => array(
            'label' => esc_html__('Boxed + sidebar', 'tm-dione'),
            'settings' => array(
				'shop_wide_boxed' => 'boxed',
				'shop_product_column' => 3,
				'shop_layout' => 'right-sidebar',
            ),
        ),
		'5' => array(
            'label' => esc_html__('Wide + sidebar', 'tm-dione'),
            'settings' => array(
				'shop_wide_boxed' => 'wide',
				'shop_product_column' => 4,
				'shop_layout' => 'right-sidebar',
            ),
        ),
    ),
));
