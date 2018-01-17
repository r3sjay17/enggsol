<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class VC_hp_tabs extends WPBakeryShortCodesContainer {

        public function __construct() {
            add_action('init', array($this, 'vc_map_shortcode') );
            add_shortcode( 'hp_tabs', array( $this, 'render_shortcode' ) );
        }

        function vc_map_shortcode() {
            // Check if Visual Composer is installed
            if ( ! defined( 'WPB_VC_VERSION' ) ) {
                // Display notice that Visual Compser is required
                add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
                return;
            }

            vc_map( array(
                "name" => __("HR Pro Tabs"),
                "base" => "hp_tabs",
                "as_parent" => array('only' => 'hp_tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
                "content_element" => true,
                "show_settings_on_create" => false,
                "is_container" => true,
                "category" => __( VC_CATEGORY, 'js_composer'),
                "params" => array(
                    // add params same as with any other content element
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name"),
                        "param_name" => "el_class",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.")
                    )
                ),
                "js_view" => 'VcColumnView'
            ) );

        }

        function render_shortcode( $atts, $content = null ) {
            extract( shortcode_atts(
                array(
                    'el_class' => '',
                    'css' => '',
                ), $atts ) );

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

            $rand = rand(0,999);
            $output = "<div class='tabs-content hr-pro-tabs hr-pro-tabs-$rand' >";
            $output .= do_shortcode($content);
            $output .= "</div>";

            return $output;
        }
    }
    new VC_hp_tabs();
    class WPBakeryShortCode_hp_tabs extends WPBakeryShortCodesContainer {}
}

