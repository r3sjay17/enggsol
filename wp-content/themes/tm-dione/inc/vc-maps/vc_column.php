<?php

if (!class_exists('VC_Thememove_Column')) {
    class VC_Thememove_Column
    {
        public function __construct()
        {
            //add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
            /*add_action('wp_enqueue_scripts',array($this,'front_scripts'),9999); */
            add_action('admin_init', array($this, 'parallax_init'));
            //echo WPB_VC_VERSION;

            if (defined('WPB_VC_VERSION') && version_compare(WPB_VC_VERSION, '4.4', '>=')) {
                add_filter('vc_shortcode_output', array($this, 'execute_ultimate_vc_shortcode'), 10, 3);
            }
        }/* end constructor */

        public function execute_ultimate_vc_shortcode($output, $obj, $attr)
        {
            if ($obj->settings('base') == 'vc_column') {
                $output .= $this->parallax_shortcode($attr, '');
            }

            return $output;
        }

        public static function parallax_shortcode($atts, $content)
        {
            $output = $bg_type = $bg_image = $bg_image_new = $bsf_img_repeat = $parallax_style = $video_opts = $video_url = $video_url_2 = $video_poster = $bg_image_size = $bg_image_position = $u_video_url = $parallax_sense = $bg_cstm_size = $bg_override = $bg_img_attach = $u_start_time = $u_stop_time = $layer_image = $css = $animation_type = $horizontal_animation = $vertical_animation = $animation_speed = $animated_bg_color = $fadeout_row = $fadeout_start_effect = $parallax_content = $parallax_content_sense = $disable_on_mobile = $disable_on_mobile_img_parallax = $animation_repeat = $animation_direction = $enable_overlay = $overlay_color = $overlay_pattern = $overlay_pattern_opacity = $overlay_pattern_size = $multi_color_overlay = $overlay = $overlay_style = $overlay_grad = $overlay_opacity = $bg_image_repeat = $pattern_image = $pattern_url = $bg_solid_color = $bg_grad = '';

            $ult_hide_row = $ult_hide_row_large_screen = $ult_hide_row_desktop = $ult_hide_row_tablet = $ult_hide_row_tablet_small = $ult_hide_row_mobile = $ult_hide_row_mobile_large = '';

            extract(shortcode_atts(array(
                'bg_type' => '',
                'bg_image' => '',
                'bg_solid_color' => '',
                'bg_grad' => '',
                'bg_image_new' => '',
                'bg_image_repeat' => 'repeat',
                'bg_image_size' => 'cover',
                'bg_cstm_size' => '',
                'bg_img_attach' => 'scroll',
                'bg_image_position' => '',
                'enable_overlay' => '',
                'overlay_color' => '',
                'overlay_style' => '',
                'overlay_grad' => '',
                'overlay_opacity' => '80',
                'pattern_image' => '',
            ), $atts));

            // Background
            if ($bg_type == 'image') {
                if ($bg_image_new != '') {
                    $bg_img_id = $bg_image_new;
                    $bg_img = wp_get_attachment_image_src($bg_img_id, 'full');

                    $bg_image = 'data-bg-img="url(\''.$bg_img[0].'\')" data-image-id="'.$bg_img_id.'" data-bg-img-repeat="'.$bg_image_repeat.'" data-bg-img-size="'.$bg_image_size.'" data-bg-img-position="'.$bg_image_position.'"   data-bg-img-attach="'.$bg_img_attach.'"    data-bg-img-cstm-size="'.$bg_cstm_size.'" ';
                }
            } elseif ($bg_type == 'grad') {
                $bg_grad = 'data-bg-grad="'.$bg_grad.'"';
            } elseif ($bg_type == 'bg_color') {
                $bg_solid_color = 'data-bg-color="'.$bg_solid_color.'"';
            }

            // Overlay
            if ($enable_overlay == 'enable_overlay_value') {
                if ($pattern_image != '') {
                    $pattern_url = wp_get_attachment_image_src($pattern_image, 'full');
                    $pattern_url = $pattern_url[0];
                    //$overlay_pattern .= 'data-overlay-pattern="' . wp_get_attachment_image_src( $pattern_image, 'full' ) . '"';
                }

                $overlay = ' data-overlay="true" data-overlay-style="'.$overlay_style.'"  data-overlay-color="'.$overlay_color.'" data-overlay-pattern="'.$pattern_url.'" data-overlay-opacity="'.($overlay_opacity / 100).'" data-overlay-pattern-size="'.$overlay_pattern_size.'" data-overlay-grad="'.$overlay_grad.'" ';
            } else {
                $overlay = ' data-overlay="false" ';
            }

            $tm_column = '';
            if ($bg_type != '') {
                $tm_column = 'data-tm-column="true"';
            }

            $html = '<div class="upb_bg_img" '.$tm_column.' '.$bg_image.' '.$bg_grad.' '.$bg_solid_color.' '.$overlay.'></div>';
            $output .= $html;

            return $output;
        }

        public function tab_background()
        {
            $group_name = esc_html__('Background', 'tm-dione');

            if (function_exists('vc_add_param')) {
                vc_add_param('vc_column', array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Background Style', 'tm-dione'),
                        'param_name' => 'bg_type',
                        'value' => array(
                            esc_html__('Default', 'tm-dione') => '',
                            esc_html__('Single Color', 'tm-dione') => 'bg_color',
                            esc_html__('Gradient Color', 'tm-dione') => 'grad',
                            esc_html__('Image', 'tm-dione') => 'image',
                        ),
                        'description' => esc_html__('Select the kind of background would you like to set for this row.', 'tm-dione'),
                        'group' => $group_name,
                    )
                );

                vc_add_param('vc_column', array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background Color', 'tm-dione'),
                    'param_name' => 'bg_solid_color',
                    'value' => '',
                    'group' => $group_name,
                    'dependency' => array('element' => 'bg_type', 'value' => array('bg_color')),
                ));

                vc_add_param('vc_column', array(
                        'type' => 'gradient',
                        'class' => '',
                        'heading' => esc_html__('Gradient Type', 'tm-dione'),
                        'param_name' => 'bg_grad',
                        'description' => esc_html__('At least two color points should be selected.', 'tm-dione'),
                        'dependency' => array('element' => 'bg_type', 'value' => array('grad')),
                        'group' => $group_name,
                    )
                );

                vc_add_param('vc_column', array(
                        'type' => 'attach_image',
                        'class' => '',
                        'heading' => esc_html__('Background Image', 'tm-dione'),
                        'param_name' => 'bg_image_new',
                        'value' => '',
                        'description' => esc_html__('Upload or select background image from media gallery.', 'tm-dione'),
                        'dependency' => array('element' => 'bg_type', 'value' => array('image')),
                        'group' => $group_name,
                    )
                );

                vc_add_param('vc_column', array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Background Image Repeat', 'tm-dione'),
                        'param_name' => 'bg_image_repeat',
                        'value' => array(
                            esc_html__('Repeat', 'tm-dione') => '',
                            esc_html__('Repeat X', 'tm-dione') => 'repeat-x',
                            esc_html__('Repeat Y', 'tm-dione') => 'repeat-y',
                            esc_html__('No Repeat', 'tm-dione') => 'no-repeat',
                        ),
                        'description' => esc_html__('Options to control repeatation of the background image.', 'tm-dione').' '.__('Learn on', 'tm-dione')." <a href='".esc_url('http://www.w3schools.com/cssref/playit.asp?filename=playcss_background-repeat')."' target='_blank'>".__('W3School', 'tm-dione').'</a>',
                        'dependency' => array('element' => 'bg_type', 'value' => array('image')),
                        'group' => $group_name,
                    )
                );
                vc_add_param('vc_column', array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Background Image Size', 'tm-dione'),
                        'param_name' => 'bg_image_size',
                        'value' => array(
                            esc_html__('Cover - Image to be as large as possible', 'tm-dione') => '',
                            esc_html__('Contain - Image will try to fit inside the container area', 'tm-dione') => 'contain',
                            esc_html__('Initial', 'tm-dione') => 'initial',
                            esc_html__('Custom', 'tm-dione') => 'cstm',
                        ),
                        'description' => esc_html__('Options to control repeatation of the background image.', 'tm-dione').' '.__('Learn on', 'tm-dione')." <a href='".esc_url('http://www.w3schools.com/cssref/playit.asp?filename=playcss_background-size&preval=50%25')."' target='_blank'>".__('W3School', 'tm-dione').'</a>',
                        'dependency' => array('element' => 'bg_type', 'value' => array('image')),
                        'group' => $group_name,
                    )
                );
                vc_add_param('vc_column', array(
                        'type' => 'textfield',
                        'class' => '',
                        'heading' => esc_html__('Custom Background Image Size', 'tm-dione'),
                        'param_name' => 'bg_cstm_size',
                        'value' => '',
                        'description' => esc_html__('You can use initial, inherit or any number with px, em, %, etc. Example- 100px 100px', 'tm-dione'),
                        'dependency' => array('element' => 'bg_image_size', 'value' => array('cstm')),
                        'group' => $group_name,
                    )
                );
                vc_add_param('vc_column', array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Scroll Effect', 'tm-dione'),
                        'param_name' => 'bg_img_attach',
                        'value' => array(
                            esc_html__('Move with the content', 'tm-dione') => '',
                            esc_html__('Fixed at its position', 'tm-dione') => 'fixed',
                        ),
                        'description' => esc_html__('Options to set whether a background image is fixed or scroll with the rest of the page.', 'tm-dione'),
                        'dependency' => array('element' => 'bg_type', 'value' => array('image')),
                        'group' => $group_name,
                    )
                );

                vc_add_param('vc_column', array(
                        'type' => 'textfield',
                        'class' => '',
                        'heading' => esc_html__('Background Image Posiiton', 'tm-dione'),
                        'param_name' => 'bg_image_position',
                        'value' => '',
                        'description' => esc_html__('You can use any number with px, em, %, etc. Example- 100px 100px.', 'tm-dione'),
                        'dependency' => array('element' => 'bg_type', 'value' => array('image')),
                        'group' => $group_name,
                    )
                );
            }
        }

        public function tab_effect()
        {
            $group_effects = esc_html__('Effect', 'tm-dione');

            // Overlay
            vc_add_param('vc_column', array(
                'type' => 'switch',
                'heading' => esc_html__('Enable Overlay', 'tm-dione'),
                'param_name' => 'enable_overlay',
                'value' => '',
                'options' => array(
                    'enable_overlay_value' => array(
                        'label' => '',
                        'on' => esc_html__('Yes', 'tm-dione'),
                        'off' => esc_html__('No', 'tm-dione'),
                    ),
                ),
                'edit_field_class' => 'uvc-divider last-uvc-divider vc_column vc_col-sm-12',
                'group' => $group_effects,
            ));

            vc_add_param('vc_column', array(
                'type' => 'dropdown',
                'class' => '',
                'group' => $group_effects,
                'heading' => 'Style',
                'param_name' => 'overlay_style',
                'value' => array(
                    'Choose' => '',
                    'Primary Color' => 'stBg',
                    'Second Color' => 'ndBg',
                    'Primary Color Gradient' => 'primary_gradient',
                    'Custom Solid Color' => 'custom_solid_color',
                    'Custom Gradient' => 'custom_gradient',
                ),
                'dependency' => array('element' => 'enable_overlay', 'value' => array('enable_overlay_value')),
            ));

            vc_add_param('vc_column', array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Color', 'tm-dione'),
                'param_name' => 'overlay_color',
                'value' => '',
                'group' => $group_effects,
                'dependency' => array('element' => 'overlay_style', 'value' => array('custom_solid_color')),
            ));

            vc_add_param('vc_column', array(
                    'type' => 'gradient',
                    'class' => '',
                    'heading' => esc_html__('Gradient Type', 'tm-dione'),
                    'param_name' => 'overlay_grad',
                    'description' => esc_html__('At least two color points should be selected.', 'tm-dione'),
                    'dependency' => array('element' => 'overlay_style', 'value' => array('custom_gradient')),
                    'group' => $group_effects,
                )
            );

            vc_add_param('vc_column', array(
                    'type' => 'attach_image',
                    'class' => '',
                    'heading' => esc_html__('Pattern Image', 'tm-dione'),
                    'param_name' => 'pattern_image',
                    'value' => '',
                    'description' => esc_html__('Upload or select pattern image from media gallery.', 'tm-dione'),
                    'dependency' => array('element' => 'enable_overlay', 'value' => array('enable_overlay_value')),
                    'group' => $group_effects,
                )
            );

            vc_add_param(
                'vc_column',
                array(
                    'type' => 'number',
                    'heading' => esc_html__('Opacity', 'tm-dione'),
                    'param_name' => 'overlay_opacity',
                    'value' => '',
                    'suffix' => '%',
                    'group' => $group_effects,
                    'dependency' => array('element' => 'enable_overlay', 'value' => array('enable_overlay_value')),
                    'description' => esc_html__('Default 80', 'tm-dione'),
                )
            );
        }

        public function parallax_init()
        {
            $this->tab_background();
            $this->tab_effect();
        }
    }
}
new VC_Thememove_Column();
