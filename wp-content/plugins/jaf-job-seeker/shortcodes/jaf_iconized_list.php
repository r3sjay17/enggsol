<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

    class VC_hp_list extends WPBakeryShortCodesContainer {

        public function __construct() {

            add_action('init', array($this, 'vc_map_shortcode') );
            add_shortcode( 'hp_list', array( $this, 'render_shortcode' ) );
        }

        public function vc_map_shortcode() {
            // Check if Visual Composer is installed
            if ( ! defined( 'WPB_VC_VERSION' ) ) {
                // Display notice that Visual Compser is required
                add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
                return;
            }

            vc_map( array(
                "name" => __("List with image icon"),
                "base" => "hp_list",
                "as_parent" => array('only' => 'hp_list_element'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
                "content_element" => true,
                "show_settings_on_create" => false,
                "is_container" => true,
                "category" => __( VC_CATEGORY, 'js_composer'),
                "js_view" => 'VcColumnView',
                "params" => array(
                    // add params same as with any other content element
                    array(
                        "type" => "dropdown",
                        "heading" => __("Column"),
                        "param_name" => "column",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file."),
                        "value" => array(
                            'Single Column' => 1,
                            'Two Column' => 2,
                            'Three Column' => 3
                        ),
                    ),
                    array(
                        "type" => "colorpicker",
                        "heading" => __("Text Color"),
                        "param_name" => "font_color",
                        "description" => __("Text Color."),
                        "value" => ''
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Extra class name"),
                        "param_name" => "el_class",
                        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.")
                    )
                ),
            ) );

        }

        public function render_shortcode( $atts, $content = null ) {
            extract( shortcode_atts(
                array(
                    'column' => 1,
                    'font_color' => '',
                    'el_class' => '',
                    'css' => '',
                ), $atts ) );

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

            $rand = rand(0,999);
            $forecolor = empty($font_color) ? '' : 'color:'.$font_color.';';

            $output = "<div class='list-with-images-container' style='$forecolor' >";
            $output .= "<ul class='column-$column list-with-image list-with-image-$rand'  data-equalizer >";
            $output .= do_shortcode($content);
            $output .= "</ul>";
            $output .= "</div>";

            return $output;
        }
    }

    new VC_hp_list();

    class WPBakeryShortCode_hp_list extends WPBakeryShortCodesContainer{}


}

