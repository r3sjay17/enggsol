<?php

class Client_Slider extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'client_slider', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("Client Slider", 'vc_extend'),
            "description" => __("Client Slider", 'vc_extend'),
            "base" => "client_slider",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/hr-pro.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
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
                'per_page' => '-1',
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $rand = rand(0, 99999);

        // WP_Query arguments
        $args = array (
            'post_type'              => array( 'clients' ),
            'post_status'            => array( 'publish' ),
            'posts_per_page'         => $per_page,
        );

        // The Query
        $client_query = new WP_Query( $args );

        // The Loop
        $clients = "";
        if ( $client_query->have_posts() ) {
            while ( $client_query->have_posts() ) {
                $client_query->the_post();
                $clients .= '<div class="client-slide item" > <div class="description" > '.get_the_content().' </div> </div>';
            }
        } else {
            // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();

        $output = "";
        if($clients) {
            $output .= '<div class="client-slider-container client-slider-container-'.$rand.'" >
                        <div class="client-slider-'.$rand.'"> 
                            '.$clients.'
                        </div>
	               </div>';

            $output .= "<script>
            jQuery(document).ready(function(){
                jQuery('.client-slider-$rand').owlCarousel({      
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    loop:true,
                    singleItem:true,
                    items:1,
                    autoPlay:true,
                    stopOnHover:true
                });
            });
        </script>";
        }else{
            $output = '<div class="no-client" ></div>';
        }


        return $output;

    }
}

new Client_Slider();

