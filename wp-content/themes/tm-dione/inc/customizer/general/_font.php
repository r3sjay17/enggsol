<?php
Kirki::add_field('tm-dione', array(
    'type' => 'typography',
    'settings' => 'body_font',
    'description' => __('Set up font settings for body text', 'tm-dione'),
    'section' => $section,
    'priority' => $priority++,
    'default' => array(
        'font-style' => array('bold', 'italic'),
        'font-family' => TM_DIONE_PRIMARY_FONT,
        'subsets' => array('latin-ext'),
        'variant' => '400',
		'font-size' => '14px',
        'line-height' => '1.6em',
        'letter-spacing' => '0.05em',
    ),
    'output' => array(
        array(
            'element' => 'body,p, h1, h2, h3, h4, h5, h6',
        ),
    ),
));
