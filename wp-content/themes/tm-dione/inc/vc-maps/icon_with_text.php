<?php

class WPBakeryShortCode_Icon_With_Text extends WPBakeryShortCode
{
}

/*** Icon With Text ***/

$basename = 'icon_with_text';

$group_design = esc_html__('Design options', 'tm-dione');
$group_icon = esc_html__('Icon options', 'tm-dione');
$process_icon = esc_html__('Process option', 'tm-dione');

vc_map(array(
    'name' => 'Icon with text',
    'base' => $basename,
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico iconbox-icon',
    'allowed_container_element' => 'vc_row',
    'params' => array(
        array(
            'type' => 'switch',
            'heading' => esc_html__('Enable reverse style', 'tm-dione'),
            'param_name' => 'reverse_enable',
            'value' => '',
            'options' => array(
                'reverse_enable_value' => array(
                    'label' => '',
                    'on' => esc_html__('Yes', 'tm-dione'),
                    'off' => esc_html__('No', 'tm-dione'),
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'tm-dione'),
            'param_name' => 'title',
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'tm-dione'),
            'param_name' => 'text',
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
            'heading' => 'Text align',
            'param_name' => 'text_align',
            'value' => array(
                'Default' => '',
                'Left' => 'text-left',
                'Center' => 'text-center',
                'Right' => 'text-right',
            ),
            'save_always' => true,
            'description' => 'Select element tag.',
        ),
        array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => 'Style',
            'param_name' => 'style',
            'value' => array(
                '' => '',
                'Style 01' => 'style-01',
                'Style 02' => 'style-02',
            ),
            'save_always' => true,
            'description' => '',
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('Link', 'tm-dione'),
            'param_name' => 'button_link',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom Class CSS', 'tm-dione'),
            'param_name' => 'custom_class',
        ),

        // Icon
        array(
            'type' => 'switch',
            'heading' => esc_html__('Disable icon', 'tm-dione'),
            'param_name' => 'icon_disable',
            'value' => '',
            'options' => array(
                'icon_disable_value' => array(
                    'label' => '',
                    'on' => esc_html__('Yes', 'tm-dione'),
                    'off' => esc_html__('No', 'tm-dione'),
                ),
            ),
            'group' => $group_icon,
        ),
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
            'group' => $group_icon,
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
            'group' => $group_icon,
        ),
        array_merge($fontawesome, array('group' => $group_icon)),
        array_merge($openiconic, array('group' => $group_icon)),
        array_merge($typicons, array('group' => $group_icon)),
        array_merge($entypo, array('group' => $group_icon)),
        array_merge($linecons, array('group' => $group_icon)),
        array_merge($pe7stroke, array('group' => $group_icon)),
        array(
            'type' => 'attach_image',
            'admin_label' => true,
            'class' => '',
            'heading' => 'Custom Icon',
            'param_name' => 'custom_icon',
            'dependency' => array('element' => 'type', 'value' => array('custom')),
            'group' => $group_icon,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'tm-dione'),
            'param_name' => 'color',
            'dependency' => array('element' => 'type', 'value' => array('font-icons')),
            'group' => $group_icon,
        ),
        array(
            'type' => 'number',
            'heading' => esc_html__('Size', 'tm-dione'),
            'param_name' => 'icon_size',
            'description' => 'Enter just number. Omit px',
            'dependency' => array('element' => 'icon_enable', 'value' => array('icon_enable_value')),
            'group' => $group_icon,
        ),

        array(
            'type' => 'switch',
            'heading' => esc_html__('Enable process style', 'tm-dione'),
            'param_name' => 'process_enable',
            'value' => '',
            'options' => array(
                'process_enable_value' => array(
                    'label' => '',
                    'on' => esc_html__('Yes', 'tm-dione'),
                    'off' => esc_html__('No', 'tm-dione'),
                ),
            ),
            'group' => $process_icon,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text Order', 'tm-dione'),
            'param_name' => 'text_order',
            'group' => $process_icon,
        ),
        array(
            'type' => 'switch',
            'heading' => esc_html__('Show title line', 'tm-dione'),
            'param_name' => 'title_line_enable',
            'value' => '',
            'options' => array(
                'title_line_enable_value' => array(
                    'label' => '',
                    'on' => esc_html__('Yes', 'tm-dione'),
                    'off' => esc_html__('No', 'tm-dione'),
                ),
            ),
            'group' => $process_icon,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Number Color', 'tm-dione'),
            'param_name' => 'process_text_color',
            'group' => $process_icon,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Weight', 'tm-dione'),
            'param_name' => 'process_font_weight',
            'group' => $process_icon,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Font Size', 'tm-dione'),
            'param_name' => 'process_font_size',
            'group' => $process_icon,
        ),

        array(
            'type' => 'switch',
            'heading' => esc_html__('Border enable', 'tm-dione'),
            'param_name' => 'process_border_enable',
            'value' => 'process_border_enable_value',
            'options' => array(
                'process_border_enable_value' => array(
                    'label' => '',
                    'on' => esc_html__('Yes', 'tm-dione'),
                    'off' => esc_html__('No', 'tm-dione'),
                ),
            ),
            'group' => $process_icon,
        ),

        array(
            'type' => 'css_editor',
            'heading' => esc_html__('Css', 'tm-dione'),
            'param_name' => 'css',
            'group' => $group_design,
        ),
    ),
));
