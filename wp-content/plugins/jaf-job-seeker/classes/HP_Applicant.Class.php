<?php

if(!class_exists('HP_Applicant')){
    class HP_Applicant {

        //public $categories = null;

        public function __construct($applicant_id = null){

            if(!$applicant_id) {
                $applicant_id = get_the_ID();
            }

            $this->id = $applicant_id;
            $this->init();
        }

        private function init(){

            $this->title = get_the_title( $this->id );
            $this->thumbnail = get_the_post_thumbnail() ? null : get_the_post_thumbnail() ;
            $this->categories = get_the_terms( $this->id, 'job_category' );
            $this->post_date = get_the_date('m/d/Y', $this->id );

            $this->first_name = get_post_meta($this->id, 'applicant_meta_first_name', true);
            $this->last_name = get_post_meta($this->id, 'applicant_meta_last_name', true);
            $this->email = get_post_meta($this->id, 'applicant_meta_email', true);
            $this->applied_job = get_post_meta($this->id, 'applicant_meta_applied_job', true);
            $this->nationality = get_post_meta($this->id, 'applicant_meta_nationality', true);
            $this->mobile_number = get_post_meta($this->id, 'applicant_meta_mobile', true);
            $this->home_number = get_post_meta($this->id, 'applicant_meta_home', true);
            $this->education_attainment = get_post_meta($this->id, 'applicant_meta_highest_education_attainment', true);
            $this->address = get_post_meta($this->id, 'applicant_meta_current_location', true);
            $this->specialization = get_post_meta($this->id, 'applicant_meta_specialization', true);
            $this->current_monthly_salary = get_post_meta($this->id, 'applicant_meta_monthly_salary', true);
            $this->expected_monthly_salary = get_post_meta($this->id, 'applicant_meta_expected_monthly_salary', true);
            $this->availability = get_post_meta($this->id, 'applicant_meta_availability', true);
            $this->prefered_job_type = get_post_meta($this->id, 'applicant_meta_job_type', true);
            $this->birth_date = get_post_meta($this->id, 'applicant_meta_birth_date', true);
            $this->gender = get_post_meta($this->id, 'applicant_meta_gender', true);
            $this->marital_status = get_post_meta($this->id, 'applicant_meta_marital_status', true);
            $this->resume = get_post_meta($this->id, 'applicant_meta_resume', true);

            $this->name = $this->first_name . ' ' . $this->last_name;

            $this->post = get_post( $this->id );
        }

        function get_thumbnail(){
            return empty( $this->thumbnail ) ? '<img width="51" height="51" src="'.get_template_directory_uri().'/assets/images/job-placeholder.png">' : get_the_post_thumbnail() ;
        }

        function get_categories(){
            return $this->categories;
        }

        function get_name($last_name_first = false){
            if($last_name_first){
                return $this->last_name . ', ' . $this->first_name;
            }else{
                return $this->name;
            }
        }

        function get_birth_date($format = 'F j Y'){
            return date($format, strtotime($this->birth_date ,1));
        }

        function get_expected_monthly_salary(){
            return number_format($this->expected_monthly_salary);
        }

        function get_resume(){
            return $this->resume;
        }

        function get_prefered_job_type(){
            return implode(', ', $this->prefered_job_type);
        }

    }
}

$HP_Applicant = new HP_Applicant();

/*var_dump_pre($HP_Applicant->get_value());*/
