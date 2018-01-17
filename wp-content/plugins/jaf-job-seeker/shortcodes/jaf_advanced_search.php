<?php

class VC_hp_advanced_search extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_shortcode( 'hp_advanced_search', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("HR-Pro Advanced Search", 'vc_extend'),
            "description" => __("HR-Pro Advanced Search", 'vc_extend'),
            "base" => "hp_advanced_search",
            "class" => "",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/enggsol-logo.png',
            "category" => __( VC_CATEGORY, 'js_composer'),
            "params" => array(
                // add params same as with any other content element
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
                'el_class' => '',
                'css' => '',
            ), $atts ) );
        $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
        $action_lint = get_permalink(20);

        $query_key = null;
        if( isset($_GET['key']) ){
            $query_key = $_GET['key'];
        }
        $title_key = null;
        if( isset($_GET['job_title']) ){
            $title_key = $_GET['job_title'];
        }
        $job_type = null;
        if( isset($_GET['job_type']) ){
            $job_type = $_GET['job_type'];
        }
        $job_location = null;
        if( isset($_GET['location']) ){
            $job_location = $_GET['location'];
        }

        /*get available job type base on job list*/
        $args = array (
            'post_type'              => array( 'jobs' ),
            'post_status'            => array( 'publish' ),
            'posts_per_page'         => '-1'
        );

        $meta_query['relation'] = 'AND';
        $meta_query[] = array(
            'relation' => 'AND',
            array(
                'key'     => 'job_meta_start_date',
                'value'   => current_time('timestamp',1),
                'compare' => '<=',
            ),
            array(
                'key' => 'job_meta_end_date',
                'value' => current_time('timestamp',1),
                'compare' => '>=',
            ),
        );
        if($meta_query){
            $args['meta_query'] = $meta_query;
        }
        $job_query = new WP_Query( $args );

        // The Loop
        $job_types = array();
        $job_locations = array();
        if ( $job_query->have_posts() ) {
            //            $paginate = 0;
            while ( $job_query->have_posts() ) {
                $job_query->the_post();
                $job = new HP_Job($job_query->id);
                if($job->job_type && !in_array($job->job_type, $job_types)){
                    if(is_array($job->job_type)){
                        foreach($job->job_type as $type){
                            if(!in_array($type, $job_types)){
                                $job_types[] = $type;
                            }
                        }
                    }else{
                        $job_types[] = $job->job_type;
                    }
                }
                if($job->location && !in_array($job->location, $job_locations)){
                    $job_locations[] = $job->location;
                }
            }
        }
        wp_reset_postdata();


        /*global $wpdb;
        $job_types = $wpdb->get_results(
            $wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", 'job_meta_job_type')
        );*/
        if(is_array($job_types))
            sort( $job_types );

        $job_types = get_job_types();

        $job_type_options = null;
        if($job_types){
            foreach($job_types as $type){
                if(!$type) continue;
                $job_type_options .= "<option value='$type' ".(( $job_type == $type ) ? "selected" : "") ." >$type</option>";
            }
        }

        /*get available job location base on job list*/
        /*$job_locations = $wpdb->get_results (
            $wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", 'job_meta_location')
        );*/

        if(is_array($job_locations))
            sort($job_locations);

        $job_location_options = null;
        foreach($job_locations as $location){
            if(!$location) continue;
            $job_location_options .= "<option value='$location' ".(( $job_location == $location ) ? "selected" : "") ." >$location</option>";
        }

        $output = "<div class='advanced-search-wrap {$el_class} {$css_class} ' > {$css_class} ";
        $output .= "<div class='advanced-search-inner' >
            <form action='$action_lint' method='GET' class='advanced-search-form'>
            <span class='' ><input type='search' value='$query_key' name='key' title='Keyword/s (Ctrl+F)' placeholder='Keywords job title, etc.' ></span>
            <span class='hide' ><input type='search' value='$title_key' name='job_title' title='Job Title' placeholder='Job Title' ></span>
            <span class='job-type-select-wrap' >
            <button class='job-type-toggle button hide' >Job Type</button>
            <select name='job_type[]' title='Job Type' placeholder='Job Type' multiple=='yes' class='job-type-select' style='display: none;'>
                $job_type_options
            </select></span>
            <span class='' ><select name='job_location' title='Location' placeholder='Location' >
                <option value=''>Location</option>
                $job_location_options
            </select></span>
            <span class='' ><button class='button search-button'>".__('Search')."</button></span>
        </form></div>";
        $output .= "</div>";

        $output .= "<script>
        jQuery( function($){

            $('.job-type-select').multiselect({
                header: 'filter job type',
                noneSelectedText: 'Job type',
                click: function(event, ui){
                    console.log(ui, $(this));
               },
                optgrouptoggle: function(event, ui){
                      //_callback.html('Checkboxes ' + (ui.checked ? 'checked' : 'unchecked') + ': ' + values);
                   }

              });
          } );
          </script>";

        return $output;

    }
}

new VC_hp_advanced_search();
class WPBakeryShortCode_hp_advanced_search extends WPBakeryShortCode {}
