<?php

class jaf_iconed_heading extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'iconed_heading', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("Heading with icon", 'vc_extend'),
            "description" => __("Heading with icon", 'vc_extend'),
            "base" => "iconed_heading",
            "class" => "",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/hr-pro.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", TEXTDOMAIN),
                    "param_name" => "title",
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'js_composer' ),
                    'param_name' => 'icon_fontawesome',
                    'value' => 'fa fa-adjust', // default value to backend editor admin_label
                    'admin_label' => true,
                    'settings' => array(
                        'emptyIcon' => false, // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                    ),
                    'description' => __( 'Select icon from library.', 'js_composer' ),
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
                'title' => 'Contact Details',
                'icon_fontawesome' => '',
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $icon_class = $icon_fontawesome;

        $html = '<div class="iconized-heading-container '.$css_class.'" >';

        $html .= '<h2 class="iconized-heading" ><i class="'.$icon_class.'" ></i><span class="iconized-heading-text" >'.$title.'</span></h2>';

        $html .= '</div>';
        return $html;

    }
}

new jaf_iconed_heading();
