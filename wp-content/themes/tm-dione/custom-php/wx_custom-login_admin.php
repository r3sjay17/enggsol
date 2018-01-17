<?php


function custom_enqueue_script()
{
 
  	 
    /***
	 * Wilvyrux customized SCSS Sheet
	 *========================================================================*/
	wp_enqueue_style(
		'wilvyrux-admin',
		get_template_directory_uri() .
		'/css/admin.css',
		array(),
		'all'
	);      
    
}
add_action( 'admin_enqueue_scripts', 'custom_enqueue_script');




function customlogin_enqueue_script()
{
 
  	 
    /***
	 * Wilvyrux customized SCSS Sheet
	 *========================================================================*/
	wp_enqueue_style(
		'wilvyrux-login',
		get_template_directory_uri() .
		'/css/login.css',
		array(),
		'all'
	);      
    
}
add_action( 'login_enqueue_scripts', 'customlogin_enqueue_script');



?>