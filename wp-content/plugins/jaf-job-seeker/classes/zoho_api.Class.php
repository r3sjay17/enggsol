<?php

if( !class_exists( 'Zoho_API' ) ) {

    class Zoho_API {

        protected $authentication_key;
        protected $scope;

        public function __construct() {
            $this->authentication_key = '50f06fc7b907ff4716aeb3cd34d9459e';
            $this->scope = 'recruitapi';
            add_action( 'gform_after_submission_2', array( $this, 'post_to_third_party' ), 10, 2 );
        }
        
        public function wp_post_exists( $title, $posttype ) {
            global $wpdb;
            $posttable = $wpdb->prefix . 'posts';
            $return = $wpdb->get_row( "SELECT ID FROM $posttable WHERE post_title = '".$title."' AND post_status='publish' AND post_type='".$posttype."' ", 'ARRAY_N' );
            if( empty($return) ) {
                return false;
            } else {
                return true;
            }
        }

        public function get_job_openings() {
            $response = wp_remote_get( "https://recruit.zoho.com/recruit/private/json/JobOpenings/getRecords?authtoken=$this->authentication_key&scope=$this->scope"  );
            $job_openings = array();
            if( is_array($response) ) {
                $body = wp_remote_retrieve_body( $response );
                $api_response = json_decode( $body );
                $job_openings = $api_response->response->result->JobOpenings->row;
            }
            return $job_openings;
        }

        public function insert_jobs_openings() {
            $job_arr = array();
            $jobs = $this->get_job_openings();
            foreach( $jobs as $job ) {
                foreach ( $job->FL as $f ) {
                    if( $f->val == 'JOBOPENINGID' ) {
                        $job_id_code = $f->content;
                    }
                    if( $f->val == 'Job Opening ID' ) {
                        $job_id = $f->content;
                    }
                    if( $f->val == 'Posting Title' ) {
                        $title = $f->content;
                    }
                    if( $f->val == 'Date Opened' ) {
                        $start_date = str_replace( '-', '', $f->content );
                    }
                    if( $f->val == 'Client Name' ) {
                        $client = $f->content;
                    }
                    if( $f->val == 'Industry' ) {
                        $industry = $f->content;
                    }
                    if( $f->val == 'Work Experience' ) {
                        $work_exp = $f->content;
                    }
                    if( $f->val == 'Salary' ) {
                        $salary = $f->content;
                    }
                    if( $f->val == 'Job Description' ) {
                        $job_description = $f->content;
                    }
                    if( $f->val == 'Minimum Qualification Required' ) {
                        $qualifications = $f->content;
                    }
                    if( $f->val == 'Position Type' ) {
                        $position_type = $f->content;
                    }
                    if( $f->val == 'Job Location' ) {
                        $location = $f->content;
                    }
                    if( $f->val == 'Additional Info' ) {
                        $additional_info = $f->content;
                    }
                    if( $f->val == 'SMOWNERID' ) {
                        $owner_id = $f->content;
                    }
                    if( $f->val == 'Assigned Recruiter' ) {
                        $recruiter = $f->content;
                    }
                    if( $f->val == 'Is Hot Job Opening' ) {
                        $is_hot = $f->content;
                    }
                }
                //$job_arr[] = $job->FL;
                
                
                if( $this->wp_post_exists( $client, 'employer' ) ) {
                    $emp = get_page_by_title( $client, OBJECT, 'employer' );
                    $empID = $emp->ID;
                } else {
                   $employer = array(
                        'post_title'    =>  $client,
                        'post_status'   =>  'publish',
                        'post_type'     =>  'employer'
                    );
                    $empID = wp_insert_post( $employer ); 
                }
                if( $this->wp_post_exists( $title, 'jobs' ) ) {  
                    $page = get_page_by_title( $title, OBJECT, 'jobs' );
                    $post = array(
                        'ID'    =>  $page->ID,
                        'post_content'  =>  $job_description

                    );
                    $postID = wp_update_post( $post );
                    update_post_meta( $postID, 'job_opening_id_number', $job_id );
                    update_post_meta( $postID, 'job_opening_id_code', $job_id_code );
                    update_post_meta( $postID, 'company_name', $empID );
                    update_post_meta( $postID, 'start_date', $start_date );
                    update_post_meta( $postID, 'industry', $industry );
                    update_post_meta( $postID, 'years_of_experience', $work_exp );
                    update_post_meta( $postID, 'salary', $salary );
                    update_post_meta( $postID, 'qualifications', $qualifications );
                    update_post_meta( $postID, 'employment_type', $position_type );
                    update_post_meta( $postID, 'location', $location );
                    update_post_meta( $postID, 'additional_info', $additional_info );
                    update_post_meta( $postID, 'owner_id', $owner_id );
                    update_post_meta( $postID, 'recruiter', $recruiter );
                    update_post_meta( $postID, 'is_hot', $is_hot );
                } else {
                    $post = array(
                        'post_title'    =>  $title,
                        'post_content'  =>  $job_description,
                        'post_status'   =>  'publish',
                        'post_type'     =>  'jobs'

                    );
                    $postID = wp_insert_post( $post );
                    add_post_meta( $postID, 'job_opening_id_number', $job_id );
                    add_post_meta( $postID, 'job_opening_id_code', $job_id_code );
                    add_post_meta( $postID, 'company_name', $empID );
                    add_post_meta( $postID, 'start_date', $start_date );
                    add_post_meta( $postID, 'industry', $industry );
                    add_post_meta( $postID, 'years_of_experience', $work_exp );
                    add_post_meta( $postID, 'salary', $salary );
                    add_post_meta( $postID, 'qualifications', $qualifications );
                    add_post_meta( $postID, 'employment_type', $position_type );
                    add_post_meta( $postID, 'location', $location );
                    add_post_meta( $postID, 'additional_info', $additional_info );
                    add_post_meta( $postID, 'owner_id', $owner_id );
                    add_post_meta( $postID, 'recruiter', $recruiter );
                    add_post_meta( $postID, 'is_hot', $is_hot );

                }
            }
            return true;
        }
        

        function post_to_third_party( $entry, $form ) {
            $post_url = 'https://recruit.zoho.com/recruit/private/json/Candidates/addRecords?';
            //$post_url = 'http://localhost/enggsol/job-search/';
            /*$body = array(
                'salutation' => rgar( $entry, '1' ),
                'fname' => rgar( $entry, '2' ),
                'lname' => rgar( $entry, '3' ),
                'email' => rgar( $entry, '5' ),
                'phone' => rgar( $entry, '7' ),
                'street' => rgar( $entry, '6' ),
                'city' => rgar( $entry, '14' ),
                'state' => rgar( $entry, '15' ),
                'zip_code' => rgar( $entry, '16' ),
                'country' => rgar( $entry, '17' ),
                'jobid' => rgar( $entry, '18' ),
            );*/

            $jobid = rgar( $entry, '18' );
            $comID = get_post_meta( $jobid, 'company_name' );
            $company = get_the_title( $comID[0] );
            $job_code = get_post_meta( $jobid, 'job_opening_id_code' );
            $recruiter = get_post_meta( $jobid, 'recruiter' );
            $is_hot = get_post_meta( $jobid, 'is_hot' );
            $owner_id = get_post_meta( $jobid, 'owner_id' );

            $xml = '<Candidates>
                        <row no="1">
                            <FL val="SMOWNERID">'.$owner_id[0].'</FL>
                            <FL val="Candidate Owner">'.$recruiter[0].'</FL>
                            <FL val="Source">Enggsol</FL>
                            <FL val="Current employer">'.$company.'</FL>
                            <FL val="First Name">'.rgar( $entry, '2' ).'</FL>
                            <FL val="Last Name">'.rgar( $entry, '3' ).'</FL>
                            <FL val="Email">'.rgar( $entry, '5' ).'</FL>
                            <FL val="Phone">'.rgar( $entry, '7' ).'</FL>
                            <FL val="Candidate Status"></FL>
                            <FL val="Is Hot Candidate">'.$is_hot[0].'</FL>
                            <FL val="Salutation">'.rgar( $entry, '1' ).'</FL>
                            <FL val="Street">'.rgar( $entry, '6' ).'</FL>
                            <FL val="City">'.rgar( $entry, '14' ).'</FL>
                            <FL val="State">'.rgar( $entry, '15' ).'</FL>
                            <FL val="Zip Code">'.rgar( $entry, '16' ).'</FL>
                            <FL val="Country">'.rgar( $entry, '17' ).'</FL>
                        </row>
                    </Candidates>';
            
            $body = array(
                'authtoken' => $this->authentication_key,
                'scope' => $this->scope,
                'version' => 2,
                'xmlData' => $xml
            );

            GFCommon::log_debug( 'gform_after_submission: body =>' . print_r( $body, true ) );

            $request = new WP_Http();
            $response = $request->post( $post_url, array( 'body' => $body ) );
            GFCommon::log_debug( 'gform_after_submission: response =>' . print_r( $response, true ) );   
            
            $post_url2 = 'https://recruit.zoho.com/recruit/private/json/Candidates/associateJobOpening?';
            
            $array = json_decode( $response['body'] );              
            foreach( $array as $value ){
                $can_id = $value->result->recorddetail->FL[0]->content;
            }
            
            $body_response = array(
                'authtoken' => $this->authentication_key,
                'scope' => $this->scope,
                'jobIds' => $job_code[0],
                'candidateIds' => $can_id
            );
            $request2 = new WP_Http();
            $response2 = $request2->post( $post_url2, array( 'body' => $body_response ) );
            
            $log = add_query_arg( $body, $post_url );
            save_log('',$log);
            save_log('',$response);
            save_log('',$response2);
        }
    }

    function global_zoho_api() {
        global $zoho_api;
        $zoho_api = new Zoho_API();
    }
    add_action( 'init', 'global_zoho_api' );

}

?>