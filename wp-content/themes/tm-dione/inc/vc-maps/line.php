<?php

class WPBakeryShortCode_Line extends WPBakeryShortCode
{
}

/*** Line ***/

$basename = 'line';

$group_design = esc_html__('Design options', 'tm-dione');

vc_map(array(
    'name' => 'Line',
    'base' => $basename,
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico line-icon',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        // Text
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => 'Height',
            'param_name' => 'height',
            'description' => '',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => 'Width',
            'param_name' => 'width',
            'description' => '',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => 'Color',
            'param_name' => 'color',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Margin', 'tm-dione'),
            'param_name' => 'margin',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'tm-dione'),
            'param_name' => 'custom_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione'),
        ),
    ),
));
