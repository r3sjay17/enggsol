<?php

if(!function_exists('hex2rgbUltParallax')) {
	function hex2rgbUltParallax($hex, $opacity) {
		$hex = str_replace("#", "", $hex);
		if (preg_match("/^([a-f0-9]{3}|[a-f0-9]{6})$/i",$hex)):      // check if input string is a valid hex colour code
			if(strlen($hex) == 3) { // three letters code
				$r = hexdec(substr($hex,0,1).substr($hex,0,1));
				$g = hexdec(substr($hex,1,1).substr($hex,1,1));
				$b = hexdec(substr($hex,2,1).substr($hex,2,1));
			} else { // six letters coode
				$r = hexdec(substr($hex,0,2));
				$g = hexdec(substr($hex,2,2));
				$b = hexdec(substr($hex,4,2));
			}
			return 'rgba('.implode(",", array($r, $g, $b)).','.$opacity.')';         // returns the rgb values separated by commas, ready for usage in a rgba( rr,gg,bb,aa ) CSS rule
		// return array($r, $g, $b); // alternatively, return the code as an array
		else: return "";  // input string is not a valid hex color code - return a blank value; this can be changed to return a default colour code for example
		endif;
	} // hex2rgb()
}
if(!function_exists('rgbaToHexUltimate')) {
	function rgbaToHexUltimate($r, $g, $b) {
		$hex = "#";
		$hex.= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
		$hex.= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
		return $hex;
	}
}

// Include css

// Custom shortcode icons in visual composer
function tm_custom_shortcode_icons() {

	wp_enqueue_style( 'infinity-classygradient-css', TM_DIONE_THEME_ROOT . '/assets/libs/classygradient/dist/jquery-classygradient-min.css' );
	wp_enqueue_style( 'infinity-colorpicker-css', TM_DIONE_THEME_ROOT . '/assets/libs/colorpicker/dist/jquery-colorpicker.css' );

	wp_enqueue_script( 'infinity-colorpicker-jquery', TM_DIONE_THEME_ROOT . '/assets/libs/colorpicker/dist/jquery-colorpicker.js', array( 'jquery' ), TM_DIONE_PARENT_THEME_VERSION, true );
	wp_enqueue_script( 'infinity-classygradient-jquery', TM_DIONE_THEME_ROOT . '/assets/libs/classygradient/dist/jquery-classygradient-min.js', array( 'jquery' ), TM_DIONE_PARENT_THEME_VERSION, true );
	
}

add_action('admin_head', 'tm_custom_shortcode_icons');
