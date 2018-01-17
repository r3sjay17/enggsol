<?php
/**
 * @package JAF_Shortcodes
 * @version 1.1
 */
/*
Plugin Name: J@F Job Seeker
Plugin URI: http://wordpress.org/plugins/JAF-Job-Seeker/
Description: Plugin to manage your jobs as well as employers
Author: Jay Aries Flores, Resty Jay Alejo
Version: 2.1
Author URI: jariesdev@gmail.com
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

/*Constants*/
define("VC_CATEGORY", 'Job Seeker');
define("PLUGIN_DIR", plugin_dir_path( __FILE__ ) );
define("PLUGIN_URL", plugin_dir_url( __FILE__ ) );
define("JAFTEXTDOMAIN", 'job_seeker' );


class JAF_Random_Shortcodes {

    public function __construct(){
        $this->load_post_types();
        add_action( 'init', array( $this, 'load_shortcodes' ), 5 );
        add_action( 'init', array( $this, 'load_classes' ), 5 );
        add_action( 'admin_menu', array( $this, 'add_menus' ) );
    }

    function add_menus(){

    }

    public function load_post_types() {
        require_once 'posttypes/applicant_cpt.php';
        require_once 'posttypes/clients_cpt.php';
        require_once 'posttypes/employer_cpt.php';
        require_once 'posttypes/jobs_cpt.php';
    }

    public function load_shortcodes() {
        if ( defined( 'WPB_VC_VERSION' ) ) {
            /*Load shortcode files here*/
            include 'shortcodes/jaf_advanced_search.php';
            include 'shortcodes/jaf_hr_tabs.php';
            include 'shortcodes/jaf_hr_tab.php';
            include 'shortcodes/jaf_icon_separator.php';
            include 'shortcodes/jaf_iconized_list.php';
            include 'shortcodes/jaf_list_element.php';
            include 'shortcodes/jaf_client_slider.php';
            include 'shortcodes/jaf_job_archive.php';
            include 'shortcodes/jaf_iconed_heading.php';
            include 'shortcodes/jaf_lined_heading.php';
            include 'shortcodes/jaf_icon_list.php';

            include 'complex-search/jaf_complex_search.php';

        }
    }

    function load_classes(){
        include 'classes/HP_Job.Class.php';
        include 'classes/HP_Applicant.Class.php';
        include 'classes/zoho_api.Class.php';
        include 'shortcodes/rty_jobs.php';
    }

}
$JAF_Shortcodes = new JAF_Random_Shortcodes();

//added after JAF_Random_Shortcodes class
function get_gform_choices($name){
    $gform_custom_choices = get_option('gform_custom_choices');
    return $gform_custom_choices[$name];
}
function get_job_types(){
    $gform_custom_choices = (get_option('gform_custom_choices'));
    return $gform_custom_choices['Jobtypes'];
}


