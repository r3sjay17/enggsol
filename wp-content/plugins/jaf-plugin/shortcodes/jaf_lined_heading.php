<?php

class jaf_lined_heading extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'lined_heading', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("Beam Heading", 'vc_extend'),
            "description" => __("Heading with line at the bottom", 'vc_extend'),
            "base" => "lined_heading",
            "class" => "",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/hr-pro.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", TEXTDOMAIN),
                    "param_name" => "title",
                    'description' => __( 'Heading title to be display.', 'js_composer' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Alignment', 'js_composer' ),
                    'param_name' => 'alignment',
                    'value' => array (
                        'left'  => 'Left',
                        'center'  => 'Center',
                        'right'  => 'Right',
                        'full'  => 'Full',
                    )
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
                'title' => 'Heading',
                'alignment' => 'left',
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $alignment = strtolower($alignment);
        
        $html = '<div class="beam-heading-container beam-heading-'.$alignment.' '.$css_class.'" >';

        $html .= '<h4 class="heading-text" >'.$title.'</h4>';

        $html .= '</div>';
        return $html;

    }
}

new jaf_lined_heading();