<?php

if(!class_exists('HP_Job')){
    class HP_Job {

        //public $categories = null;

        public function __construct($job_id = null){

            if(!$job_id) {
                $job_id = get_the_ID();
            }

            $this->id = $job_id;
            $this->ID = $job_id;
            $this->init();
        }

        private function init(){

            $this->thumbnail = get_the_post_thumbnail() ? null : get_the_post_thumbnail() ;
            $this->categories = get_the_terms( $this->id, 'job_category' );
            $this->post_date = get_the_date('m/d/Y', $this->id );

            $this->title = get_post_meta( $this->id, 'job_meta_title', true );
            $this->description = get_post_meta( $this->id, 'job_description', true );
            $this->job_type = get_post_meta( $this->id, 'job_meta_job_type', true );
            $this->location = get_post_meta( $this->id, 'job_meta_location', true );
            $this->company_name = get_post_meta( $this->id, 'job_meta_company_name', true );
            $this->designation = get_post_meta( $this->id, 'job_meta_designation', true );
            $this->slot_available = get_post_meta( $this->id, 'job_meta_no_candidates', true );
            $this->sender = get_post_meta( $this->id, 'job_meta_job_sender', true );
            $this->sender_contact = get_post_meta( $this->id, 'job_meta_contact_number', true );
            $this->sender_email = get_post_meta( $this->id, 'job_meta_email_address', true );

            $this->hiring_start_date = intval( get_post_meta( $this->id, 'job_meta_start_date', true ) );
            $this->hiring_end_date = intval( get_post_meta( $this->id, 'job_meta_end_date', true ) );

            $this->hiring_date = array(
                'start' => date('F j Y', $this->hiring_start_date ? $this->hiring_start_date : '01 01 2000' ),
                'end' => date('F j Y', $this->hiring_end_date  ? $this->hiring_end_date : '01 01 2000')
            );

            $this->post = get_post( $this->id );
        }

        function get_thumbnail(){
            return empty( $this->thumbnail ) ? '<img width="51" height="51" src="'.get_template_directory_uri().'/assets/images/job-placeholder.png">' : get_the_post_thumbnail() ;
        }

        function get_categories(){
            if($this->categories){
                return $this->categories;
            }else{
                return array();
            }
        }

        function get_title(){
            return ($this->title) ? $this->title : 'NA' ;
        }
        function get_description(){
            return do_shortcode(html_entity_decode($this->description));
        }

        function get_job_type(){
            return $this->job_type;
        }

        function get_location(){
            return $this->location;
        }

        function get_hiring_date(){
            return $this->hiring_date;
        }
        function get_hiring_start_date($format = null){
            $format = ($format) ? $format : 'F j Y';
            return date($format, $this->hiring_start_date );
        }
        function get_hiring_end_date($format = null){
            $format = ($format) ? $format : 'F j Y';
            return date($format, $this->hiring_end_date );
        }

        function is_still_posted(){
            $start = $this->hiring_start_date;
            $end = $this->hiring_end_date;
            $today = current_time('timestamp', 1);

            return $today >= $start && $today <= $end;
        }

        function is_still_available(){
            return $this->slot_available ? true : false;
        }

        function get_hiring_scope(){
            $start = $this->hiring_start_date;
            $end = $this->hiring_end_date;

            $date_range = array();
            if(date('d.m.Y', $start) == date('d.m.Y', $end)) {
                $date_range = array( date('d M Y', $end) );
            }else{
                $date_range = array( date('d M', $start), date('d M Y', $end) );
            }


            return implode(' - ', $date_range);
        }

    }
}

//$HP_Job = new HP_Job();

/*var_dump_pre($HP_Job->get_value());*/
