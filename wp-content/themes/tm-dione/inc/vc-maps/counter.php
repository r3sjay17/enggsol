<?php

class WPBakeryShortCode_Counter extends WPBakeryShortCode
{
}

/*** Counter ***/

$basename = 'counter';

$group_design = esc_html__('Design options', 'tm-dione');

vc_map(array(
    'name' => 'Counter',
    'base' => $basename,
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'description' => esc_html__('Your milestones, achievements, etc.', 'tm-dione'),
    'icon' => 'tm-shortcode-ico counter-icon',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        // Text
        array(
            'type' => 'number',
            'admin_label' => true,
            'heading' => esc_html__('Counter value', 'tm-dione'),
            'param_name' => 'counter_value',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => 'Value Color',
            'param_name' => 'value_color',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Counter title', 'tm-dione'),
            'param_name' => 'counter_title',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => 'Title Color',
            'param_name' => 'title_color',
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Title Element Tag',
            'param_name' => 'element_tag',
            'value' => array(
                'Default' => '',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
                'p' => 'p',
                'div' => 'div',
            ),
            'save_always' => true,
            'description' => 'Select element tag.',
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Format',
            'param_name' => 'format',
            'value' => array(
                'Default' => 'd',
                '12,345,678' => '(,ddd)',
                '12.345.678' => '(.ddd)',
                '12 345 678' => '( ddd)',
            ),
            'description' => '',
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Duration',
            'param_name' => 'duration',
            'value' => array(
                '' => '',
                '0 second' => 'duration-0s',
                '1 second' => 'duration-1s',
                '2 seconds' => 'duration-2s',
                '3 seconds' => 'duration-3s',
                '4 seconds' => 'duration-4s',
                '5 seconds' => 'duration-5s',
                '6 seconds' => 'duration-6s',
                '7 seconds' => 'duration-7s',
                '8 seconds' => 'duration-8s',
                '9 seconds' => 'duration-9s',
                '10 seconds' => 'duration-10s',
                '11 seconds' => 'duration-11s',
                '12 seconds' => 'duration-12s',
                '13 seconds' => 'duration-13s',
                '14 seconds' => 'duration-14s',
                '15 seconds' => 'duration-15s',
                '16 seconds' => 'duration-16s',
                '17 seconds' => 'duration-17s',
                '18 seconds' => 'duration-18s',
                '19 seconds' => 'duration-19s',
                '20 seconds' => 'duration-20s',
            ),
            'description' => '',
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Align',
            'param_name' => 'align',
            'value' => array(
                '' => '',
                'Center' => 'center',
                'Left' => 'left',
                'Right' => 'right',
            ),
            'description' => '',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'tm-dione'),
            'param_name' => 'custom_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tm-dione'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
