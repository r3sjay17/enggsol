<?php
/**
 * @package tm-dione-plugin
 * @version 1.1
 */
/*
Plugin Name: Dione plugin
Plugin URI: http://dione.thememove.com/
Description: This is a plugin of Dione theme
Author: Thememove
Version: 1.1
Author URI: http://dione.thememove.com/
*/

// Support shortcode in widget
add_filter('widget_text', 'do_shortcode');

include plugin_dir_path( __FILE__ ) . 'posttypes/index.php';
include plugin_dir_path( __FILE__ ) . 'shortcodes/index.php';
