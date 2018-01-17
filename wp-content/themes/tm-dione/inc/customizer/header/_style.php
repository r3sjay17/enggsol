<?php
Kirki::add_field('tm-dione', array(
    'type' => 'color-alpha',
    'settings' => 'header_bg_color',
    'label' => esc_html__('Background color - Light Header', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '#fff',
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '.header, header .header-bottom',
            'property' => 'background-color',
        ),
    ),
));

Kirki::add_field('tm-dione', array(
    'type' => 'color-alpha',
    'settings' => 'header_bg_color_dark',
    'label' => esc_html__('Background color - Dark Header', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '#111',
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '.header.dark, .dark .header-bottom',
            'property' => 'background-color',
        ),
    ),
));
