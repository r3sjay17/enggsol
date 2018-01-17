<?php

class HP_Icon_Separator extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'hp_icon_separator', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("Title with Icon Separator", 'vc_extend'),
            "description" => __("Title with Icon Separator", 'vc_extend'),
            "base" => "hp_icon_separator",
            "class" => "hr-pro-icon-separator",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/hr-pro.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", TEXTDOMAIN),
                    "param_name" => "title",
                    "admin_label" => true,
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __("Text Color", TEXTDOMAIN),
                    "param_name" => "color",
                    "admin_label" => true,
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'js_composer' ),
                    'param_name' => 'fa_icon',
                    'value' => 'fa fa-briefcase', // default value to backend editor admin_label
                    'settings' => array(
                        'emptyIcon' => false, // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                    ),
                    'description' => __( 'Select icon from library.', 'js_composer' ),
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __("Icon Color", TEXTDOMAIN),
                    "param_name" => "icon_color",
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __("Icon Background Color", TEXTDOMAIN),
                    "param_name" => "icon_background",
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __("Line Color", TEXTDOMAIN),
                    "param_name" => "line_color",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Width %", TEXTDOMAIN),
                    "param_name" => "width",
                    'description' => __( 'Default 100', 'js_composer' ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", TEXTDOMAIN),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Css', TEXTDOMAIN ),
                    'param_name' => 'css',
                    'group' => __( 'Design options', TEXTDOMAIN ),
                ),
            )
        ) );

    }

    public function render_shortcode( $atts, $content = null ) {
        extract( shortcode_atts(
            array(
                'title' => 'Title',
                'color' => '#FFF',
                'fa_icon' => 'fa fa-briefcase',
                'icon_color' => '#dc8700',
                'icon_background' => '#FFF',
                'line_color' => '#8c5702',
                'width' => '',
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $rand = rand(0, 99999);



        $output = '<div class="hp-separator" >
                    '.(empty($title) ? '' : '<h4 class="sep-title" style="color:'.$color.'; " >' . $title . '</h4>' ).'
                    <div class="sep-container" style="' . ( empty($width) ? '': 'width:'.$width.'%;' ) . '" >
                        <span class="hp_sep_holder hp_sep_holder_l"><span class="hp_sep_line" style="border-color:'.$line_color.'; " ></span></span>
                        <h4><i class="' . $fa_icon . '" style="color:'.$icon_color.'; background-color:'.$icon_background.'; " ></i></h4>
                        <span class="hp_sep_holder hp_sep_holder_r"><span class="hp_sep_line" style="border-color:'.$line_color.'; " ></span></span>
                    </div>
	               </div>';

        return $output;

    }
}

new HP_Icon_Separator();

