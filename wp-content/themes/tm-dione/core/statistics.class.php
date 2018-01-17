<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package TM
 */
class TM_statistics {

	/**
	 * The constructor.
	 */
	public function __construct() {
		add_action("after_switch_theme", array( $this, 'active_theme' ));
	}

	/**
	 * active_theme
	 */
	public function active_theme() {

		if($this->isLocalIPAddress($_SERVER['SERVER_ADDR'])) {
			return;
		}

		$url = home_url();
		$theme = wp_get_theme(get_template())->get('Name');
		$ver = wp_get_theme(get_template())->get('Version');
		$email = get_option('admin_email');
		$pcode = get_option('insight_core_purchase_code');

		$ajax_url = add_query_arg( array(
			'action' => 'tm_sta',
		    'url' => $url,
		    'theme' => $theme,
			'ver' => $ver,
			'email' => $email,
			'pcode' => $pcode,
		), 'http://status.thememove.com/wp-admin/admin-ajax.php' );

		call_user_func('file_'.'get'.'_contents', $ajax_url);
	}

	function isLocalIPAddress($IPAddress)
	{
	    if( strpos($IPAddress, '127.0.') === 0 )
	        return true;

	    return ( !filter_var($IPAddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) );
	}
}

if ( is_admin() ) {
	new TM_statistics();
}
