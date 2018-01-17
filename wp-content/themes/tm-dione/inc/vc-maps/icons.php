<?php

class WPBakeryShortCode_Icons extends WPBakeryShortCode
{
}

/*** Icons ***/

$basename = 'icons';

$group_design = esc_html__('Design options', 'tm-dione');

vc_map(array(
    'name' => 'Icons',
    'base' => $basename,
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'description' => esc_html__('Add a set of multiple icons and give some custom style.', 'tm-dione'),
    'icon' => 'tm-shortcode-ico icons-icon',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Type',
            'param_name' => 'type',
            'value' => array(
                'Font icons' => 'font-icons',
                'Custom' => 'custom',
            ),
            'save_always' => true,
            'description' => '',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library', 'tm-dione'),
            'value' => array(
                esc_html__('Font Awesome', 'tm-dione') => 'fontawesome',
                esc_html__('Open Iconic', 'tm-dione') => 'openiconic',
                esc_html__('Typicons', 'tm-dione') => 'typicons',
                esc_html__('Entypo', 'tm-dione') => 'entypo',
                esc_html__('Linecons', 'tm-dione') => 'linecons',
                esc_html__('P7 Stroke', 'tm-dione') => 'pe7stroke',
            ),
            'admin_label' => true,
            'param_name' => 'icon_type',
            'description' => esc_html__('Select icon library.', 'tm-dione'),
            'dependency' => array('element' => 'type', 'value' => array('font-icons')),
        ),
        $fontawesome,
        $openiconic,
        $typicons,
        $entypo,
        $linecons,
        $pe7stroke,
        array(
            'type' => 'attach_image',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Custom Icon',
            'param_name' => 'custom_icon',
            'dependency' => array('element' => 'type', 'value' => array('custom')),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'tm-dione'),
            'param_name' => 'color',
            'dependency' => array('element' => 'type', 'value' => array('font-icons')),
        ),
        array(
            'type' => 'number',
            'heading' => esc_html__('Size', 'tm-dione'),
            'param_name' => 'icon_size',
            'description' => 'Enter just number. Omit px',
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Display',
            'param_name' => 'display',
            'value' => array(
                '' => '',
                'Block' => 'block',
                'Inline' => 'inline',
                'Inline Block' => 'inline-block',
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
            'heading' => esc_html__('Custom Class CSS', 'tm-dione'),
            'param_name' => 'custom_class',
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tm-dione'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
