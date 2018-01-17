<?php

class WPBakeryShortCode_Tm_Video extends WPBakeryShortCode
{
}
vc_map(array(
    'name' => esc_html__('TM Video', 'tm-dione'),
    'base' => 'tm_video',
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
	 'icon' => 'tm-shortcode-ico video-icon',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => 'Video URL',
            'admin_label' => true,
            'param_name' => 'url',
            'description' => esc_html__('Enter your video url (Youtube/Vimeo) here', 'tm-dione'),
            'value' => 'http://vimeo.com/92033601',
        ),
        array(
            'type' => 'attach_image',
            'class' => '',
            'heading' => 'Poster',
            'param_name' => 'poster',
            'save_always' => true,
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'std' => 'full',
            'heading' => 'Image size',
            'param_name' => 'img_size',
            'save_always' => true,
            'description' => 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.',
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Player Scale',
            'admin_label' => false,
            'param_name' => 'player_scale',
            'value' => '1',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => 'Player Color',
            'admin_label' => false,
            'param_name' => 'player_color',
            'description' => esc_html__('Color of video player', 'tm-dione'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => 'Player Color on hover',
            'admin_label' => false,
            'param_name' => 'player_color_hover',
            'description' => esc_html__('Color of video player on hover', 'tm-dione'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Class', 'tm-dione'),
            'admin_label' => false,
            'param_name' => 'el_class',
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS', 'tm-dione'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'tm-dione'),
        ),
    ),
));
