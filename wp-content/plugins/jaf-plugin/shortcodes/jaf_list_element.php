<?php

class VC_hp_list_element extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'hp_list_element', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("List Element", 'vc_extend'),
            "description" => __("List Element", 'vc_extend'),
            "base" => "hp_list_element",
            "class" => "",
            "as_child" => array('only' => 'hp_list'),
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/hr-pro.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
                array(
                    "type" => "attach_image",
                    "heading" => __("Image", TEXTDOMAIN),
                    "param_name" => "image",
                ),
                array(
                    "type" => "textarea",
                    "heading" => __("Text", TEXTDOMAIN),
                    "param_name" => "content_text",
                    'admin_label' => true,
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("alignment", TEXTDOMAIN),
                    "param_name" => "alignment",
                    "value" => array('Left' => 'left', 'Right' => 'right'),
                    'admin_label' => true,
                    'save_always' => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", TEXTDOMAIN),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
                ),
            )
        ) );

    }

    public function render_shortcode( $atts, $content = null ) {
        extract( shortcode_atts(
            array(
                'image' => '',
                'content_text' => '',
                'alignment' => 'left',
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $icon = wp_get_attachment_image( $image, array(40, 40) );
        $icon_html = '<span class="list-image" >'.$icon.'</span>';

        $icon_left = (strtolower($alignment) == 'left') ? true : false;
        $rand = rand(0, 99999);

        $output = "<li data-equalizer-watch class='list-element $el_class list-element-" . $alignment . " ' >".($icon_left ? $icon_html : '')."<span class='list-text' ><div class='content' >$content_text</div></span>".( $icon_left ? '' : $icon_html)."</li>";

        return $output;

    }
}

new VC_hp_list_element();

class WPBakeryShortCode_hp_list_element extends WPBakeryShortCode{}
