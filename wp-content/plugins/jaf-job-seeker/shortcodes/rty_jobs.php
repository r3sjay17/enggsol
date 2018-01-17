<?php
class rty_jobs extends WPBakeryShortcode
{

    public function __construct()
    {
        //add_action( 'init', array( $this, 'vc_map_shortcode' ) );
        add_action('wp_enqueue_scripts', array($this, 'rty_enqueue'), 11);
        add_shortcode('rty_jobs_view', array($this, 'jobs_view'));
        add_shortcode('rty_jobs_content', array($this, 'job_content'));
        add_shortcode('rty_job_search', array($this, 'search_job'));
        add_shortcode('rty_preloader', array($this, 'preloader'));
        add_shortcode('rty_filter', array($this, 'filter'));
        add_shortcode('rty_expired_jobs', array($this, 'expired_jobs'));
        add_shortcode('rty_sharer', array($this, 'share'));
        add_shortcode('rty_total_job', array($this, 'job_total'));

        add_action('wp_ajax_reload_job_content', array($this, 'job_content'));
        add_action('wp_ajax_nopriv_reload_job_content', array($this, 'job_content'));
        add_action('wp_ajax_reload_job_view', array($this, 'jobs_view'));
        add_action('wp_ajax_nopriv_reload_job_view', array($this, 'jobs_view'));
        add_action('wp_ajax_save_job', array($this, 'save_jobs'));
    }

    public function rty_enqueue()
    {
        wp_enqueue_style('rty-job-style', PLUGIN_URL . 'assets/css/rty_job_style.css');
        wp_enqueue_style('rty-multiselect-css', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.0.2/sumoselect.min.css');
        wp_enqueue_script('rty-job-script', PLUGIN_URL . 'assets/js/rty_job_script.js', array());
        wp_enqueue_script('rty-mulitselect-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.0.2/jquery.sumoselect.min.js', array());
    }

    /*public function vc_map_shortcode() {
    //Check if Visual Comporser is installed
    if( ! defined( 'wPB_VC_VERSION' ) ) {
    add_action( 'admin_notices', array( $this, 'showVcVersionNotice' ) );
    return;
    }

    vc_map( array(
    'name' => _( 'Job Archive', 'vc_extend' ),
    'description' => __( 'Job Archive', 'vc_extend' ),
    'base' => 'rty_jobs',
    'controls' => 'full',
    'icon' => PLUGIN_URL . 'assets/images/enggsol-logo.png',
    'category' => __( VC_CATEGORY, 'js_composer' ),
    'params' => array(
    array(
    'type' => 'textfield',
    'heading' => __( 'Extra class name', TEXTDOMAIN ),
    'param_name' => 'el_class',
    'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', TEXTDOMAIN )
    ),
    array(
    'type' => 'css_editor',
    'heading' => __( 'CSS Box', TEXTDOMAIN ),
    'param_name' => 'css',
    'group' => __( 'Design options', TEXTDOMAIN )
    )
    )
    )
    );
    }*/

    public function save_jobs()
    {
        $job = array();
        $jid = empty($_REQUEST['job_id']) ? '' : $_REQUEST['job_id'];
        $sj  = get_user_meta(get_current_user_id(), 'saved_jobs', true);

        if ($sj) {
            foreach ($sj as $s) {
                $job[] = $s;
            }
            foreach ($jid as $b) {
                $job[] = $b;
            }
            $j      = array_unique($job);
            $result = update_user_meta(get_current_user_id(), 'saved_jobs', $j);
        } else {
            $result = add_user_meta(get_current_user_id(), 'saved_jobs', $jid);
        }
        if ($result) {
            echo 'Job saved!';
        } else {
            echo 'Job already saved!';
        }
        exit;
    }

    public function category_ext($cat, $curr)
    {
        $terms = get_terms($cat, array('parent' => 0));
        $output .= '<select class="rty-filter-' . $cat . '" >';
        $text = ($cat == 'job_locations') ? 'Location' : 'Function';
        $output .= '<option value="">Choose Job By ' . $text . '</option>';
        foreach ($terms as $term) {
            $output .= '<option value="' . $term->slug . '" ' . selected(is_array($curr) && in_array($term->slug, $curr), true, false) . '>' . $term->name . '</option>';
        }
        $output .= '</select>';

        return $output;
    }

    public function get_post_meta_value($key, $curr)
    {
        global $wpdb;
        $result = $wpdb->get_results("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='" . $key . "' GROUP BY meta_value");
        $output .= '<select class="rty-filter-' . $key . '" >';
        $text = ($key == 'location') ? 'Locations' : 'Roles';
        $output .= '<option value="">All Job ' . $text . '</option>';
        foreach ($result as $row) {
            $output .= '<option value="' . $row->meta_value . '" ' . selected(is_array($curr) && in_array($row->meta_value, $curr), true, false) . '>' . $row->meta_value . '</option>';
        }
        $output .= '</select>';

        return $output;
    }

    public function search_job()
    {
        $cat  = array();
        $loc  = array();
        $loc1 = empty($_GET['location']) ? '' : $_GET['location'];
        $cat1 = empty($_GET['category']) ? '' : $_GET['category'];
        foreach (explode(',', $cat1) as $c) {
            $cat[] = $c;
        }
        foreach (explode(',', $loc1) as $l) {
            $loc[] = $l;
        }
        $output .= '<div class="count-results">SEARCH ' . $this->job_total() . ' JOBS</div>';
        $output .= '<div class="rty-search-wrapper">
                        <form class="rty-search-form" action="#" method="post" data-ajax_url="' . admin_url('admin-ajax.php') . '">
                            <input type="hidden" class="rty-last-days" value="0">
                            <input type="hidden" class="page_number" name="page_number" value="1">
                            <div class="col-sm-12">
                                <div class="col-xs-12 col-md-6">
                                    <input type="text" class="rty-text-search" value="' . $_GET['search'] . '" placeholder="Enter Job title, Keywords">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    ' . $this->get_post_meta_value('location', $loc) . '
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-xs-12 col-md-6">
                                    ' . $this->get_post_meta_value('industry', $cat) . '
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <button type="submit" class="rty-filter-button submit" >SEARCH</button>
                                </div>
                            </div>
                        </form>
                    </div>';

        echo $output;
    }

    public function expired_jobs()
    {
        $date = date('Y-m-d');
        $args = array(
            'post_type'      => 'jobs',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'post_parent'    => 0,
            'meta_query'     => array(
                array(
                    'key'     => 'end_date',
                    'value'   => $date,
                    'compare' => '<=',
                    'type'    => 'DATE'),
            ),
        );
        $rty = new WP_Query($args);
        if ($rty->have_posts()) {
            while ($rty->have_posts()) {
                $rty->the_post();
                $update                = get_post(get_the_ID(), 'ARRAY_A');
                $update['post_status'] = 'expired';
                wp_update_post($update);
            }
        }
    }

    public function jobs_view()
    {
        /*date_default_timezone_set( 'Asia/Singapore' );
        $date1 = new DateTime( date( "Y-m-d H:i:s" ) );
        $d1 = date( 'j' );*/

        $title    = empty($_REQUEST['title']) ? '' : $_REQUEST['title'];
        $loc      = empty($_REQUEST['location']) ? '' : $_REQUEST['location'];
        $category = empty($_REQUEST['category']) ? '' : $_REQUEST['category'];
        $is_ajax  = empty($_REQUEST['is_ajax']) ? 0 : $_REQUEST['is_ajax'];
        $last_day = empty($_REQUEST['last_day']) ? 0 : $_REQUEST['last_day'];
        $page_number = empty($_REQUEST['page_number']) ? 1 : $_REQUEST['page_number'];

        $date = date('Y-m-d');
        $args = array(
            'post_type'      => 'jobs',
            'post_status'    => 'publish',
            'posts_per_page' => 5,
            'paged'          => (int)$page_number,
            'post_parent'    => 0,
            'meta_key'       => 'start_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'meta_query'     => array(
                array(
                    'key'     => 'start_date',
                    'value'   => $date,
                    'compare' => '<=',
                    'type'    => 'DATE'),
            ),
        );

        /*$title1 = empty( $_GET['search'] ) ? '' : $_GET['search'];
        $loc1 = empty( $_GET['location'] ) ? false : $_GET['location'];
        $category1 = empty( $_GET['category'] ) ? false : $_GET['category'];*/

        $sj = get_user_meta(get_current_user_id(), 'saved_jobs');

        $tax_query = array();
        if ($title && $title != '') {
            $args['s'] = $title;
        }
        if ($loc != '') {
            //$tax_query[] = array( 'taxonomy' => 'job_locations', 'field' => 'slug', 'terms' => $loc );
            $args['meta_query'] = array(array('key' => 'location', 'value' => $loc, 'compare' => '='));
        }
        if ($category != '') {
            //$tax_query[] = array( 'taxonomy' => 'job_category', 'field' => 'slug', 'terms' => $category );
            $args['meta_query'] = array(array('key' => 'industry', 'value' => $category, 'compare' => '='));
        }
        if ($last_day && $last_day != '') {
            $t                  = current_time('timestamp', 0);
            $d                  = date('Y-m-d', strtotime($last_day, $t));
            $args['meta_query'] = array(array('key' => 'start_date', 'value' => $d, 'compare' => '>=', 'type' => 'DATE'));
        }
        if ($tax_query) {
            $args['tax_query'] = $tax_query;
        }

        $rty = new WP_Query($args);
        if ($rty->have_posts()) {
            if ($is_ajax == 0) {$output .= '<div class="job-lists-wrapper" data-ajax_url="' . admin_url('admin-ajax.php') . '">';}
            while ($rty->have_posts()) {
                $rty->the_post();
                $location    = get_field('location', get_the_ID());
                $companyID   = get_field('company_name', get_the_ID());
                $company     = get_the_title($companyID);
                $salary      = get_field('salary', get_the_ID());
                $requirement = get_field('job_requirements', get_the_ID());

                $dw = date('F j, Y', strtotime(get_field('start_date', get_the_ID())));

                /*$date = new DateTime( get_the_date( 'Y-m-d H:i:s' ) );
                $d2 = get_the_date( 'j' );
                $d3 = $d1 - $d2;
                $interval = $date1->diff($date);
                $elapsed = "";
                $diff = $interval->format('%i');
                $diff2 = $interval->format( '%h' );

                if( $diff == 0 && $diff2 == 0 && $d3 == 0 ) {
                $elapsed = $interval->format( '%s' ) . ' seconds ago';
                } elseif( $diff < 60 && $diff2 == 0 && $d3 == 0 ) {
                $elapsed = $diff . ' minutes ago';
                } else {
                if( $diff2 < 24 && $d3 == 0 ) {
                $elapsed = $diff2 . ' hours ago';
                } else {
                $elapsed = get_the_date( 'F j, Y' );
                }
                }*/

                $output .= '<div class="jobs" data-job="' . get_the_ID() . '">
                                <ul>';
                if ($sj) {
                    foreach ($sj as $s) {
                        foreach ($s as $j) {
                            if ($j == get_the_ID()) {
                                $output .= '<li class="text-right">
                                                <div class="star-rate">
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                            </li>';
                            }
                        }
                    }
                }
                /*$output .= '        <li>
                                        <h1>' . get_the_title() . '</h1>
                                    </li>
                                    <li><i class="fa fa-building" aria-hidden="true"></i>' . $company . '</li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>' . $location . '</li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>' . $dw . '</li>
                                    <li class="rty-requirement">' . $requirement . '</li>
                                    <li class="text-right">' . $salary . '</li>
                                </ul>
                            </div>';*/
                            $output .= '        <li>
                                        <h1>' . get_the_title() . '</h1>
                                    </li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>' . $dw . '</li>
                                    <li class="rty-requirement">' . $requirement . '</li>
                                    <li class="text-right">' . $salary . '</li>
                                </ul>
                            </div>';
            }
            $output .= '<div class="rty-pagination-wrapper">';
                $output .= '<ul class="rty-pagination">';
                    $prev_disabled = ( $page_number == 1 ) ? "rty-disabled": "";
                    $prev_val = ( $page_number == 1 ) ? 1 : ( $page_number - 1 );
                    if( $page_number == 1 ) {
                        $output .= '<li class="rty-page page-beginning '.$prev_disabled.'"><i class="fa fa-angle-double-left"></i></li>';
                        $output .= '<li class="rty-page page-prev '.$prev_disabled.'"><i class="fa fa-angle-left"></i></li>';
                    } else {
                        $output .= '<li class="rty-page page-beginning '.$prev_disabled.'"><a href="#" data-page="1"><i class="fa fa-angle-double-left"></i></a></li>';
                        $output .= '<li class="rty-page page-prev '.$prev_disabled.'"><a href="#" data-page="'.$prev_val.'"><i class="fa fa-angle-left"></i></a></li>';
                    }

                    $i = 1;
                    for( $i = 1; $i <= $rty->max_num_pages; $i++ ) {
                        $active = ( $i == $page_number ) ? 'active' : '';
                        if( $rty->max_num_pages < 6 ) {
                            $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                        } else {
                            if( $page_number == 1 ) {
                                if( $page_number == $i || ( $page_number + 1 ) == $i || ( $page_number + 2 ) == $i || ( $page_number + 4 ) == $i || ( $page_number + 5 ) == $i || ( $page_number + 6 ) == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } elseif( ( $page_number + 3 ) == $i ) {
                                    $output .= '<li class="rty-page page-'.$i.'"><i class="fa fa-ellipsis-h"></i></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            } elseif( $page_number > 1 && $page_number < ( $rty->max_num_pages - 2 ) ) {
                                if( ( $page_number - 1 ) == $i || $page_number == $i || ( $page_number + 1 ) == $i || ( $page_number + 3 ) == $i || ( $page_number + 4 ) == $i || ( $page_number + 5 ) == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } elseif( ( $page_number + 2 ) == $i ) {
                                    $output .= '<li class="rty-page page-'.$i.'"><i class="fa fa-ellipsis-h"></i></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            } elseif( $page_number == $rty->max_num_pages ) {
                                if( $i == 1 || $i == 2 || $i == 3 || ( $page_number - 2 ) == $i || ( $page_number - 1 ) == $i || $rty->max_num_pages == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } elseif( $i == 4 ) {
                                    $output .= '<li class="rty-page page-'.$i.'"><i class="fa fa-ellipsis-h"></i></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            } else {
                                if( $page_number == $i || ( $page_number - 1 ) == $i || ( $page_number - 2 ) == $i || ( $page_number + 1 ) == $i || ( $page_number + 2 ) == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            }
                        }
                    }
                    $next_disabled = ( $page_number == $rty->max_num_pages ) ? "rty-disabled" : "";
                    $next_val = ( $page_number == $rty->max_num_pages ) ? $rty->max_num_pages : ( $page_number + 1 );
                    if( $page_number == $rty->max_num_pages ) {
                        $output .= '<li class="rty-page page-next '.$next_disabled.'"><i class="fa fa-angle-right"></i></li>';
                        $output .= '<li class="rty-page page-ending '.$next_disabled.'"><i class="fa fa-angle-double-right"></i></li>';
                    } else {
                        $output .= '<li class="rty-page page-next '.$next_disabled.'"><a href="#" data-page="'.$next_val.'"><i class="fa fa-angle-right"></i></a></li>';
                        $output .= '<li class="rty-page page-ending '.$next_disabled.'"><a href="#" data-page="'.$rty->max_num_pages.'"><i class="fa fa-angle-double-right"></i></a></li>';
                    }

                $output .= '</ul>';
            $output .= '</div>';
            if ($is_ajax == 0) {$output .= '</div>';}
        } else {
            $date1 = date('Y-m-d');
            $args1 = array(
                'post_type'      => 'jobs',
                'post_status'    => 'publish',
                'posts_per_page' => 7,
                'paged'          => (int)$page_number,
                'post_parent'    => 0,
                'meta_key'       => 'start_date',
                'orderby'        => 'meta_value',
                'order'          => 'DESC',
                'meta_query'     => array(
                    array(
                        'key'     => 'start_date',
                        'value'   => $date1,
                        'compare' => '<=',
                        'type'    => 'DATE'),
                ),
            );
            $output .= '<div class="rty-no-results">
                            <h5 class="alert alert-danger" ><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i> No Results Found!</h5>
                        </div>';

            $rty1 = new WP_Query($args1);
            if ($rty1->have_posts()) {
                if ($is_ajax == 0) {$output .= '<div class="job-lists-wrapper" data-ajax_url="' . admin_url('admin-ajax.php') . '">';}
                $output .= '<h4 class="rty-recommended">Recommendations:</h4>';
                while ($rty1->have_posts()) {
                    $rty1->the_post();
                    $location1    = get_field('location', get_the_ID());
                    $companyID1   = get_field('company_name', get_the_ID());
                    $company1     = get_the_title($companyID);
                    $salary1      = get_field('salary', get_the_ID());
                    $requirement1 = get_field('job_requirements', get_the_ID());
                    $dw1          = date('F j, Y', strtotime(get_field('start_date', get_the_ID())));

                    $output .= '<div class="jobs" data-job="' . get_the_ID() . '">
                                    <ul>';
                    if ($sj) {
                        foreach ($sj as $s) {
                            foreach ($s as $j) {
                                if ($j == get_the_ID()) {
                                    $output .= '<li class="text-right">
                                                                        <div class="star-rate">
                                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                        </div>
                                                                    </li>';
                                }
                            }
                        }
                    }
                    /*$output .= '        <li>
                    <h1>'.get_the_title().'</h1>
                    </li>
                    <li><i class="fa fa-building" aria-hidden="true"></i>'.$company1.'</li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>'.$location1.'</li>
                    <li><i class="fa fa-clock-o" aria-hidden="true"></i>'.$dw1.'</li>
                    <li class="rty-requirement">'.$requirement1.'</li>
                    <li class="text-right">'.$salary1.'</li>
                    </ul>
                    </div>';*/
                    $output .= '<li>
                                            <h1>' . get_the_title() . '</h1>
                                        </li>
                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i>' . $dw1 . '</li>
                                        <li class="rty-requirement">' . $requirement1 . '</li>
                                        <li class="text-right">' . $salary1 . '</li>
                                    </ul>
                                </div>';
                }
                $output .= '<div class="rty-pagination-wrapper">';
                $output .= '<ul class="rty-pagination">';
                    $prev_disabled = ( $page_number == 1 ) ? "rty-disabled": "";
                    $prev_val = ( $page_number == 1 ) ? 1 : ( $page_number - 1 );
                    if( $page_number == 1 ) {
                        $output .= '<li class="rty-page page-beginning '.$prev_disabled.'"><i class="fa fa-angle-double-left"></i></li>';
                        $output .= '<li class="rty-page page-prev '.$prev_disabled.'"><i class="fa fa-angle-left"></i></li>';
                    } else {
                        $output .= '<li class="rty-page page-beginning '.$prev_disabled.'"><a href="#" data-page="1"><i class="fa fa-angle-double-left"></i></a></li>';
                        $output .= '<li class="rty-page page-prev '.$prev_disabled.'"><a href="#" data-page="'.$prev_val.'"><i class="fa fa-angle-left"></i></a></li>';
                    }

                    $i = 1;
                    for( $i = 1; $i <= $rty->max_num_pages; $i++ ) {
                        $active = ( $i == $page_number ) ? 'active' : '';
                        if( $rty->max_num_pages < 6 ) {
                            $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                        } else {
                            if( $page_number == 1 ) {
                                if( $page_number == $i || ( $page_number + 1 ) == $i || ( $page_number + 2 ) == $i || ( $page_number + 4 ) == $i || ( $page_number + 5 ) == $i || ( $page_number + 6 ) == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } elseif( ( $page_number + 3 ) == $i ) {
                                    $output .= '<li class="rty-page page-'.$i.'"><i class="fa fa-ellipsis-h"></i></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            } elseif( $page_number > 1 && $page_number < ( $rty->max_num_pages - 2 ) ) {
                                if( ( $page_number - 1 ) == $i || $page_number == $i || ( $page_number + 1 ) == $i || ( $page_number + 3 ) == $i || ( $page_number + 4 ) == $i || ( $page_number + 5 ) == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } elseif( ( $page_number + 2 ) == $i ) {
                                    $output .= '<li class="rty-page page-'.$i.'"><i class="fa fa-ellipsis-h"></i></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            } elseif( $page_number == $rty->max_num_pages ) {
                                if( $i == 1 || $i == 2 || $i == 3 || ( $page_number - 2 ) == $i || ( $page_number - 1 ) == $i || $rty->max_num_pages == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } elseif( $i == 4 ) {
                                    $output .= '<li class="rty-page page-'.$i.'"><i class="fa fa-ellipsis-h"></i></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            } else {
                                if( $page_number == $i || ( $page_number - 1 ) == $i || ( $page_number - 2 ) == $i || ( $page_number + 1 ) == $i || ( $page_number + 2 ) == $i ) {
                                    $output .= '<li class="rty-page '.$active.' page-'.$i.'"><a href="#" data-page="'.$i.'">'.$i.'</a></li>';
                                } else {
                                    $output .= '<li class="rty-page hide page-'.$i.'"></li>';
                                }
                            }
                        }
                    }
                    $next_disabled = ( $page_number == $rty->max_num_pages ) ? "rty-disabled" : "";
                    $next_val = ( $page_number == $rty->max_num_pages ) ? $rty->max_num_pages : ( $page_number + 1 );
                    if( $page_number == $rty->max_num_pages ) {
                        $output .= '<li class="rty-page page-next '.$next_disabled.'"><i class="fa fa-angle-right"></i></li>';
                        $output .= '<li class="rty-page page-ending '.$next_disabled.'"><i class="fa fa-angle-double-right"></i></li>';
                    } else {
                        $output .= '<li class="rty-page page-next '.$next_disabled.'"><a href="#" data-page="'.$next_val.'"><i class="fa fa-angle-right"></i></a></li>';
                        $output .= '<li class="rty-page page-ending '.$next_disabled.'"><a href="#" data-page="'.$rty->max_num_pages.'"><i class="fa fa-angle-double-right"></i></a></li>';
                    }

                $output .= '</ul>';
            $output .= '</div>';
                if ($is_ajax == 0) {$output .= '</div>';}
            }
        }
        echo $output;
        if ($is_ajax == 1) {
            exit;
        }
    }

    public function job_content()
    {
        $id      = (empty($_REQUEST['job_id'])) ? '' : $_REQUEST['job_id'];
        $is_ajax = empty($_REQUEST['is_ajax']) ? 0 : $_REQUEST['is_ajax'];

        $latest_cpt     = get_posts("post_type=jobs&numberposts=1");
        $postID         = empty($id) ? $latest_cpt[0]->ID : $id;
        $job            = get_page($postID);
        $company        = get_post_meta($postID, 'company_name');
        $responsibility = get_post_meta($postID, 'job_responsibilities');
        $benefits       = get_post_meta($postID, 'benefits');
        $salary         = get_post_meta($postID, 'salary');
        $industry       = get_post_meta($postID, 'industry');
        $qualifications = get_post_meta($postID, 'qualifications');
        $experience     = get_post_meta($postID, 'years_of_experience');
        $zonal          = get_post_meta($postID, 'zonal_segregation');
        $type           = get_post_meta($postID, 'employment_type');
        //$level = implode(', ', wp_get_post_terms( $postID, array( 'job_levels' ), array('fields' => 'names') ) );
        //$type = implode(', ', wp_get_post_terms( $postID, array( 'job_types' ), array('fields' => 'names') ) );
        //$func = implode(', ', wp_get_post_terms( $postID, array( 'job_category' ), array('fields' => 'names') ) );
        $tags = implode(', ', wp_get_post_terms($postID, array('job_tags'), array('fields' => 'names')));

        if ($is_ajax == 0) {$output .= '<div class="job-content-page-wrapper"">';}
        $output .= '  <input type="hidden" class="rty-current-job" value="' . get_the_permalink($postID) . '" data-id="' . $postID . '" data-ajax_url="' . admin_url('admin-ajax.php') . '">
                        <h1 class="job-heading"><a href="' . get_the_permalink($postID) . '">' . $job->post_title . '</a></h1>

                        <div class="content-wrapper">
                            ' . do_shortcode($job->post_content) . '
                        </div>';

        /*$output .= '<div class="button-apply-wrapper">
                            <a href="' . get_the_permalink($postID) . '" class="button-apply">READ MORE</a>
                            <div class="small-text">
                                Enggsol will send your application for reviews directly to
                                <span>' . get_the_title($company[0]) . '</span>
                            </div>
                        </div>';*/
                        $output .= '<div class="button-apply-wrapper">
                            <a href="' . get_the_permalink($postID) . '" class="button-apply">READ MORE</a>
                        </div>';

        $output .= '    <div class="job-details">
                            <ul>
                                <li><strong>Yr(s) Exp:</strong>' . $experience[0] . '</li>
                                <li><strong>Qualifications:</strong>' . $qualifications[0] . '</li>
                                <li><strong>Industry:</strong>' . $industry[0] . '</li>
                                <li><strong>Salary:</strong>' . $salary[0] . '</li>
                                <li><strong>Employment Type:</strong>' . $type[0] . '</li>
                            </ul>

                            <div class="keywords-job">
                                <span> Keywords: </span>
                                ' . $tags . '
                            </div>
                        </div>';

        //Company Related Jobs
        global $wpdb;
        $table     = $wpdb->prefix . 'posts';
        $tablemeta = $wpdb->prefix . 'postmeta';
        $companies = $wpdb->get_results("SELECT * FROM $tablemeta INNER JOIN $table ON $tablemeta.post_id = $table.ID WHERE $tablemeta.meta_value = $company[0] AND $table.ID != $postID LIMIT 3");

        //Related Jobs
        //$cat = implode(', ', wp_get_post_terms( $postID, array( 'job_category' ), array('fields' => 'slugs') ) );
        /*$args = array( 'post_type' => 'jobs', 'post_status' => 'publish', 'posts_per_page' => 3, 'post__not_in' => array($postID), 'tax_query' => array( array( 'taxonomy' => 'job_category', 'terms' => array($cat), 'field' => 'slug')) );*/
        $args     = array('post_type' => 'jobs', 'post_status' => 'publish', 'posts_per_page' => 3, 'post__not_in' => array($postID), 'meta_query' => array(array('key' => 'industry', 'value' => $industry[0])));
        $relateds = get_posts($args);

        $output .= '<div class="job-related-wrapper row">';
        if ($companies) {
            $output .= '<div class="company-related">';
            $output .= '<h1 class="related-heading"><strong>More Jobs from this company</strong> </h1>';
            $output .= '<ul class="col-md-12">';
            foreach ($companies as $comp) {
                $cdate = date('F j, Y', strtotime(get_field('start_date', $comp->ID)));
                $output .= '<li class="col-md-4"><a href="#" class="rty-related-company-jobs" data-id="' . $comp->ID . '">' . $comp->post_title . '</a><div class="dates">' . $cdate . '</div></li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
        }

        if ($relateds) {
            $output .= '<div class="job-related">';
            $output .= '<h1 class="related-heading"><strong>Related Job</strong></h1>';
            $output .= '<ul class="col-md-12 clearfix">';
            foreach ($relateds as $related) {
                $rdate = date('F j, Y', strtotime(get_field('start_date', $related->ID)));
                $output .= '<li class="col-md-4"><a href="#" class="rty-related-company-jobs" data-id="' . $related->ID . '">' . $related->post_title . '</a><div class="dates">' . $rdate . '</div></li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
        }

        $output .= '</div>';

        if ($is_ajax == 0) {$output .= '</div>';}

        echo $output;
        if ($is_ajax == 1) {
            exit;
        }
    }

    public function preloader($atts)
    {
        extract(shortcode_atts(array(
            'class' => '',
        ), $atts));
        echo '<div class="cssload-preloader ' . $class . '">
                <div class="cssload-preloader-box">
                    <div>L</div>
                    <div>o</div>
                    <div>a</div>
                    <div>d</div>
                    <div>i</div>
                    <div>n</div>
                    <div>g</div>
                </div>
            </div>';
    }

    public function filter()
    {
        echo '<div class="rty-saved-job-alert">
                <h5 class="alert alert-success" ><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i> Job saved!</h5>
            </div>';
        echo '<div id="filter-buttons">
                <div class="col-md-4">
                    <ul>
                        <li class="rty-last-days">
                            <a href="#" class="rty-text"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 30 Days</a>
                            <ul>
                                <li><a href="#" data-last="-1 day"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 24 Hours</a></li>
                                <li><a href="#" data-last="-3 day"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 3 Days</a></li>
                                <li><a href="#" data-last="-7 day"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 7 Days</a></li>
                                <li><a href="#" data-last="-14 day"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 14 Days</a></li>
                                <li><a href="#" data-last="-30 day"><i class="fa fa-clock-o" aria-hidden="true"></i> Last 30 Days</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="rty-btn-show-hide"><i class="fa fa-list" aria-hidden="true"></i> <span>Show</span></a></li>';

        if (is_user_logged_in()) {echo '<li><a href="#" class="rty-btn-save-jobs"><i class="fa fa-floppy-o" aria-hidden="true"></i> save jobs</a></li>';}

        echo '</ul>
                </div>

                <div class="col-md-8 text-right">
                    <span>
                        <ul>';

        if (is_user_logged_in()) {echo '<li><a href="#" class="rty-btn-save-job"><i class="fa fa-star" aria-hidden="true"></i>Save Job</a></li>';}

        echo '<li><a href="#" class="rty-btn-print"><i class="fa fa-print" aria-hidden="true"></i>Print</a></li>
                            <li><a href="#" class="rty-btn-share"><i class="fa fa-print" aria-hidden="true"></i>Share</a></li>
                            <li><a href="#" class="rty-btn-view-new-tab"> <i class="fa fa-file-text" aria-hidden="true"></i> View in new tab</a></li>
                        </ul>
                    </span>
                    <span>
                        <ul>
                            <li>View </li>
                            <li><a href="#" class="rty-btn-view-list"><i class="fa fa-align-left" aria-hidden="true"></i></a> </li>
                            <li><a href="#" class="rty-btn-view-side-list"><i class="fa fa-list" aria-hidden="true"></i></a> </li>
                        </ul>
                    </span>
                </div>
            </div>';
    }

    public function share()
    {
        echo '<div class="rty-share-wrapper">
                <div class="rty-share-holder">
                    <a href="#" class="rty-close"><i class="fa fa-times"></i></a>
                    <div class="rty-title-holder">
                        <h4>Share</h4>
                        <p>You can share the job with your friends in multiple ways.</p>
                    </div>
                    <div class="rty-url-holder">
                        <h4>The URL you are sharing</h4>
                        <input type="text" class="rty-url" readonly>
                    </div>
                    <div class="rty-social-media-holder">
                        <h4>Share by social media</h4>
                        <a href="#" class="rty-fb" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="rty-twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="rty-gplus" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>';
    }

    public function testimonials()
    {
        $args = array('post_type' => 'enggsol_testimonials', 'post_status' => 'publish', 'post_per_page' => -1, 'post_parent' => 0);
        $rty  = new WP_Query($args);
        if ($rty->have_posts()) {
            $output .= '<div class="rty-testimonial-holder">';

            while ($rty->have_posts()) {
                $output .= '<div class="vc_col-md-4 vc_col-sm-6">
                                ' . get_post_meta(get_the_ID(), 'message_content') . '
                                ' . get_the_title() . '
                                ' . get_post_meta(get_the_ID(), 'position') . '
                                ' . get_post_meta(get_the_ID(), 'company') . '
                            </div>';
            }

            $output .= '</div>';
        }
    }

    public function job_total()
    {
        /*global $wpdb;
        $result = $wpdb->get_row( "SELECT COUNT(*) as total FROM $wpdb->posts INNER JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id WHERE post_type='jobs' AND " );*/
        $date = date('Y-m-d');
        $args = array(
            'post_type'      => 'jobs',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'post_parent'    => 0,
            'meta_query'     => array(
                array(
                    'key'     => 'start_date',
                    'value'   => $date,
                    'compare' => '<=',
                    'type'    => 'DATE'),
            ),
        );
        $rty = new WP_Query($args);
        $x   = 0;
        if ($rty->have_posts()) {
            while ($rty->have_posts()) {
                $rty->the_post();
                $x++;
            }
        }
        return $x;
    }

}

$jobs = new rty_jobs();
