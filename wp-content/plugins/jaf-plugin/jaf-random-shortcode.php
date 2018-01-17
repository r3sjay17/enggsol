<?php
/**
 * @package JAF_Shortcodes
 * @version 1.1
 */
/*
Plugin Name: J@F Random Shortcodes :)
Plugin URI: http://wordpress.org/plugins/JAF-Random-Shortcodes/
Description: This Plugin used by me while developing projects and shared it to you. This shortcode used with Visual Composer :). Please note that I disable the JS and CSS enque for speed loading reasons and include dependencies in the theme.
Author: Jay Aries Flores
Version: 1.1
Author URI: jaries@gmail.com
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

/*Constants*/
define("VC_CATEGORY", 'HR-PRO');
define("PLUGIN_DIR", plugin_dir_path( __FILE__ ) );
define("PLUGIN_URL", plugin_dir_url( __FILE__ ) );
define("JAFTEXTDOMAIN", 'jaf_plugin' );


class JAF_Random_Shortcodes {

    public function __construct(){
        add_action( 'init', array( $this, 'load_shortcodes' ), 5 );
        add_action( 'init', array( $this, 'load_classes' ), 5 );
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
        }
    }

    function load_classes(){
        include 'classes/HP_Job.Class.php';
        include 'classes/HP_Applicant.Class.php';
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
