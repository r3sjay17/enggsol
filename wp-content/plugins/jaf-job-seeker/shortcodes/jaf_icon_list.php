<?php

class Checked_List extends WPBakeryShortCode {

    public function __construct() {
        vc_add_shortcode_param('exploded_textarea_2', array( $this, 'exploded_textarea_render' ), PLUGIN_URL . 'assets/js/exploded_textarea_2.js' );
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'checked_list', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("List with Icon", 'vc_extend'),
            "description" => __("List with Icon", 'vc_extend'),
            "base" => "checked_list",
            "class" => "",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/enggsol-logo.png',
            "category" => __( VC_CATEGORY, 'js_composer'),
            "params" => array(
                // add params same as with any other content element
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'js_composer' ),
                    'param_name' => 'icon_fontawesome',
                    'value' => 'fa fa-adjust', // default value to backend editor admin_label
                    'settings' => array(
                        'emptyIcon' => false, // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                    ),
                    'description' => __( 'Select icon from library.', 'js_composer' ),
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __("Icon Color", 'js_composer'),
                    "param_name" => "icon_color",
                    "description" => __("Color for icons.", TEXTDOMAIN)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Column", 'js_composer'),
                    "param_name" => "column",
                    "value" => array(
                        'Single Column' => 1,
                        'Two Column' => 2
                    ),
                    "admin_label" => true,
                    "description" => __("How many column.", TEXTDOMAIN)
                ),
                array(
                    "type" => "textarea",
                    "delimeter" => "||",
                    "heading" => __("Contents", 'js_composer'),
                    "param_name" => "list_content",
                    "description" => __("List to be displayed separated by \"||\"", TEXTDOMAIN)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", 'js_composer'),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Css', 'js_composer' ),
                    'param_name' => 'css',
                    'group' => __( 'Design options', 'js_composer' ),
                ),
            )
        ) );

    }

    public function render_shortcode( $atts, $content = null ){
        extract( shortcode_atts(
            array(
                'icon_fontawesome' => 'fa fa-adjust',
                'icon_color' => '',
                'column' => '1',
                'list_content' => '',
                'el_class' => '',
                'css' => '',
            ), $atts ) );
        $content = wpb_js_remove_wpautop($content, true);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $list = explode('||', $list_content);
        $icon_color = empty($icon_color) ? '' : 'color:'.$icon_color.';';
        $icon = empty($icon_fontawesome) ? '' : '<i class="'.$icon_fontawesome.'" style="'.$icon_color.'"></i>';

        $output = "<div class='list-icon-wrap {$el_class} {$css_class} ' > {$css_class} ";

        $output .= "<ul class='column-$column' >";
        $ctr = 0;
        foreach($list as $item){
            $class = (++$ctr % $column) == 0 ? 'last-column' : '';
            $output .= "<li class='$class ' >$icon $item</li>";
        }

        $output .= "</ul></div>";
        return $output;

    }

    function exploded_textarea_render($settings, $value){
        $ta_value = str_replace('||', "\n", $value);
        return '<div class="exploded_textarea_2">'
             .'<textarea name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_valueXXX wpb-textarea ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field"  >'.esc_attr( $ta_value ).'</textarea>' .
             '</div><span class="wpb_vc_param_value">'.esc_attr( $value ).'</span>';
    }
}

new Checked_List();
