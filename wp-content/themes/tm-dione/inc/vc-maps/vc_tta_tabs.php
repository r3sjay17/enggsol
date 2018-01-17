<?php

vc_add_params('vc_tta_tabs', array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'tm-dione'),
            'value' => array(
                esc_html__('', 'tm-dione') => '',
                esc_html__('Style 01', 'tm-dione') => 'style-01',
                esc_html__('Style 02', 'tm-dione') => 'style-02',
                esc_html__('Vertical', 'tm-dione') => 'vertical',
            ),
            'param_name' => 'style',
        ),
    )
);
vc_map_update('vc_tta_tabs', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico tabs-icon',
));
