<?php

class VC_hp_tab extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'hp_tab', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("HR Pro Tab", 'vc_extend'),
            "description" => __("HR Pro Tab", 'vc_extend'),
            "base" => "hp_tab",
            "class" => "",
            "as_child" => array('only' => 'hr_tabs'),
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/hr-pro.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Tab Title", TEXTDOMAIN),
                    "param_name" => "title",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Content Title", TEXTDOMAIN),
                    "param_name" => "content_title",
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
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $rand = rand(0, 99999);

        $tab_list = "<ul class='tabs' data-tab role='tablist'>
                      <li class='tab-title' role='presentation'><a href='#panel-$rand' role='tab' tabindex='0' aria-selected='false' aria-controls='panel-$rand'>$title</a></li>
                    </ul>";

        $output = " <section role='tabpanel' aria-hidden='false' class='content $el_class $css_class' id='panel-$rand' > ";

        $output .= "<h2>First panel content goes here...</h2>";

        $output .= "</section>";
        $output .= $tab_list;




        return $output;

    }
}

new VC_hp_tab();
class WPBakeryShortCode_hp_tab extends WPBakeryShortCode {}
