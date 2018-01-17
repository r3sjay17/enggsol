<?php

class HP_Job_Archive extends WPBakeryShortCode {

    public function __construct() {
        add_action('init', array($this, 'vc_map_shortcode') );
        add_action( 'template_redirect', array( $this, 'fe_loader' ) );
        add_shortcode( 'hp_job_archive', array( $this, 'render_shortcode' ) );
    }

    public function vc_map_shortcode() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        vc_map( array(
            "name" => __("Job Archive", 'vc_extend'),
            "description" => __("Job Archive", 'vc_extend'),
            "base" => "hp_job_archive",
            "controls" => "full",
            "icon" => PLUGIN_URL . 'assets/images/enggsol-logo.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __(VC_CATEGORY, 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", JAFTEXTDOMAIN),
                    "param_name" => "content_heading",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Item Per Page", JAFTEXTDOMAIN),
                    "param_name" => "per_page",
                ),
                //                array(
                //                    "type" => "textfield",
                //                    "heading" => __("Max Item to display", JAFTEXTDOMAIN),
                //                    "param_name" => "max_post",
                //                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", JAFTEXTDOMAIN),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", JAFTEXTDOMAIN)
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Css', JAFTEXTDOMAIN ),
                    'param_name' => 'css',
                    'group' => __( 'Design options', JAFTEXTDOMAIN ),
                ),
            )
        ) );

    }

    public function render_shortcode( $atts, $content = null ) {
        extract( shortcode_atts(
            array(
                'content_heading' => 'Job Available',
                'per_page' => '-1',
                'max_post' => '',
                'el_class' => '',
                'css' => '',
            ), $atts ) );

        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

        $rand = rand(0, 99999);

        $output = "";
        $output .= '<div class="job-archive job-archive-'.$rand.'" >
                        <h4>'.$content_heading.'</h4>
                        <div class="job-archiv-items job-archive-'.$rand.'" data-equalizer-watch>

                        </div>
                        <div class="job-archive-control" data-current-page="1" data-max-page="'.$max_post.'" data-per-page="'.$per_page.'" >
                            <a class="prev"><i class="fa fa-long-arrow-left"></i></a>
                            <a class="next"><i class="fa fa-long-arrow-right"></i></a>
                            <a href="' . get_permalink(20) . '" class="browse-more-job">'.__('Browse more jobs').'</a>
                        </div>
                        <div class="job-loading"><div class="loader"><i class="fa fa-refresh fa-spin"></i></div></div>
                   </div>';


        return $output;

    }

    function fe_loader () {
        /*Load List of jobs*/
        if(isset( $_POST['load']) && $_POST['load'] == 'job_list' ){

            $per_page = isset($_POST['per_page']) ? $_POST['per_page'] : '4';
            $current_page = isset($_POST['current_page']) ? $_POST['current_page'] : '-1';
            $max_job_number = isset($_POST['max_job_number']) ? (int)$_POST['max_job_number'] : 0;


            $key = isset($_POST['key']) ? $_POST['key'] : null;
            $keys = explode(' ', trim($key));
            foreach($keys as &$k){
                if(empty($k)) { unset($k); continue; };
                $k = '%'.trim($k).'%';
            }

            $job_title = isset($_POST['job_title']) ? $_POST['job_title'] : null;
            $job_type = isset($_POST['job_type']) ? (($_POST['job_type'])) : null;
            $job_location = isset($_POST['job_location']) ? $_POST['job_location'] : null;

            $allowed_post_meta_key_search = array(
                //                'job_meta_title',
                //                'job_description',
                //                'job_meta_company_name',
                //                'job_meta_email_address',
            );

            $db_query = " (1=1) ";
            if( $key ) {

                if(count($allowed_post_meta_key_search) > 0) {
                    for($i=0; $i < count($allowed_post_meta_key_search); $i++){
                        $db_query .= ($i == 0 ? 'AND ( ': 'OR ')
                            . "meta_key = '$allowed_post_meta_key_search[$i]' "
                            . ($i == count($allowed_post_meta_key_search)-1 ? ')': '');
                    }
                }

                foreach( $keys as $ky ) {
                    $db_query .= ($ky == $keys[0] ? " AND ( " : " AND " )
                        ."meta_value LIKE '$ky' "
                        .( $ky == end($keys) ? " )" : "" );
                }
            }

            if($job_title){
                $db_query .= " AND ( meta_key = 'job_meta_title' AND ( 1=1 ";
                foreach( $jts = explode(' ', $job_title) as $jt ) {
                    $db_query .= ($jt == $jts[0] ? "AND ( " : " AND " )
                        ."meta_value LIKE '%$jt%' "
                        .( $jt == end($jts) ? " )" : "" );
                }
                $db_query .= " ) ) ";
            }

            //            if($job_type){
            //                $db_query .= " AND ( meta_key = 'job_meta_job_type' AND meta_value LIKE '$job_type' ) ";
            //                $db_query .= " AND ( meta_value = '$job_type' ) ";
            //            }
            //
            //            if($job_location){
            //                $db_query .= " AND ( meta_key = 'job_meta_location' AND meta_value LIKE '%$job_location%' ) ";
            //            }

            global $wpdb;
            $final_query = "SELECT DISTINCT post_id FROM $wpdb->postmeta WHERE $db_query ";
            $job_objs = $wpdb->get_results( $final_query );
            $job_ids = array(count( $job_objs) );
            if( !empty($job_objs) ) {
                foreach( $job_objs as $job_obj ) {
                    $job_ids[] = $job_obj->post_id;
                }
            }

            $args = array(
                'post_type'              => array( 'jobs' ),
                'post_status'            => array( 'publish' ),
                'paged'                  => $current_page,
                'posts_per_page'         => $per_page,
                'post__in'               => $job_ids
            );

            $tax_query = array();
            if($key){
                $tax_query = array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'job_tags',
                        'field'    => 'slug',
                        'terms'    => $keys,
                    ),
                );
            }

            $meta_query['relation'] = 'OR';
            if($job_type){
                $meta_query[] = array (
                    'key'     => 'job_meta_job_type',
                    'value'   => array($job_type),
                    'compare' => 'IN',
                );
            }

            if($job_location){
                $meta_query[] = array(
                    'key'     => 'job_meta_location',
                    'value'   => array($job_location),
                    'compare' => 'IN',
                );
            }

            if($meta_query){
                $args['meta_query'] = $meta_query;
            }
            if($tax_query){
                //$args['tax_query'] = $tax_query;
            }


            // The Query
            $job_query = new WP_Query( $args );

            // The Loop
            $jobs = "";
            if ( $job_query->have_posts() ) {
                //            $paginate = 0;
                $item_ctr = 0;
                while ( $job_query->have_posts() ) {
                    $job_query->the_post();

                    $job = new HP_Job($job_query->id);

                    $image = $job->get_thumbnail();

                    $title = empty($job->title) ? __('N/A') : $job->title ;
                    $link = get_permalink();

                    $ctr = 0;
                    $category_list = '';
                    $categories = get_the_terms( $job_query->id, 'job_category' );
                    if(!empty($categories)){
                        foreach( $categories as $category ){
                            $category_list .= ( (($ctr++) == 0) ? '' : ', ' ) . ($category->name) ;
                        }
                    }
                    $category_list = empty( $category_list ) ? __('N/A') : $category_list ;

                    //                $jobs .= ($paginate % 4) == 0 ? '<div class="featured-job-group">' : '';
                    $jobs .= '<div class="featured-job-item item" data-equalizer>
                <div class="job-image">'.$image.'</div>
                <div class="job-meta" >
                    <div class="job-title" >'.$title.'</div>
                    <div class="job-category" >'.$category_list.'</div>
                </div>
                <div class="job-link"><a class="view-more-job" href="'.$link.'" >'.__('View more').'</a></div>
                </div>';
                    //                $jobs .= ($paginate % 4) == 0 ? '</div>' : '';

                    //                $paginate++;
                }
            } else {
                // no posts found
            }

            // Restore original Post Data max_num_pages
            wp_reset_postdata();
            $data = array(
                'jobs'  =>  $jobs,
                'job_count' =>  $job_query->found_posts,
                'max_page'  => $job_query->max_num_pages,
                'QUERYYYYYYYYYYYYYY'  => print_r($meta_query, true),
            );
            echo json_encode($data, JSON_UNESCAPED_SLASHES );
            exit;
        }
    }
}

new HP_Job_Archive();

