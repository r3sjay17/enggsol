<?php

function get_mata( $post_id, $meta_key )
{
    echo get_post_meta( $post_id, $meta_key, true );
}

/*<----// WX Basic Needs //---->*/

//wx shortcodes
require_once get_template_directory() . '/custom-php/wx_custom-shortcodes.php';

//wx cleanup functions extras
require_once get_template_directory() . '/custom-php/wx_custom-cleanups.php';

//wx login and admins scripts
require_once get_template_directory() . '/custom-php/wx_custom-login_admin.php';

//wx style and jquery scripts
require_once get_template_directory() . '/custom-php/wx_custom-style_scripts.php';
/*<----//  //---->*/




/*<----// WX EXTRA Shortcode posts //---->*/
require_once get_template_directory() . '/custom-php/shortcode-informatiocentre-display.php';
require_once get_template_directory() . '/custom-php/shortcode-careerresources-display.php';
require_once get_template_directory() . '/custom-php/shortcode-accordion.php';
require_once get_template_directory() . '/custom-php/shortcode-related-career.php';
require_once get_template_directory() . '/custom-php/shortcode-related-information.php';

require_once get_template_directory() . '/custom-php/taxonomy-shortcode-information-center.php';
require_once get_template_directory() . '/custom-php/taxonomy-shortcode-career-resources.php';
/*<----//  //---->*/


if (!current_user_can('edit_users')) {
  add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
  add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}


function register_my_menus() {
register_nav_menus(
array(
'main-left-menu' => __( 'Left Main Menu Options' )
)
);
}
add_action( 'init', 'register_my_menus' );

function save_log($title = null, $new_data){
    if(is_array($title)/* && isset($title['file'], $title['line'])*/){
        $title = $title['file'].'::'.$title['line'];
    }
    if(is_array($new_data) || is_object($new_data)){
        $new_data = print_r($new_data, true);
    }
    if(true/*WP_DEBUG*/){
        $file = ABSPATH .'jaf_log.txt';
        //        if(!file_exists($file)) {
        //            $log_file = fopen($file, "w") or die("Unable to open file!");
        //            fclose($log_file);
        //        }
        $current = file_get_contents($file);
        $current .= date('d-m-d h:g:i', current_time( 'timestamp', true ) ).' '. $title .' ' . $new_data . "\n\r\n\r";
        file_put_contents($file, $current);
        //        $log_file = fopen($file, "w") or die("Unable to open file!");
        //        $current = date('d-m-d h:g:i', current_time( 'timestamp', true ) ).' '. $title .' ' . $new_data . "\n\r\n\r";
        //        fwrite($log_file, $current);
        //        fclose($log_file);
    }
}

?>