<?php

class JAF_Job_Complex_Search {

    protected $post_type = 'jobs';
    public $search_data = array();

    function __construct(){
        add_shortcode('jaf_job_complex_search', array($this, 'render_shortcode'));
    }

    function render_shortcode($atts = array()){

        extract(shortcode_atts(array(
            'count' => 5,
        ),$atts));
        $html = '';

        $serach_args = array(
            'post_type' => $this->post_type,
            'posts_per_page' => $count,
        );


        ob_start(); include 'parts/shortcode.php'; $html=ob_get_clean();
        return $html;
    }

    function get_top_bar(){
        ob_start(); include 'parts/top-bar.php'; return ob_get_clean();
    }



}


new JAF_Job_Complex_Search();
