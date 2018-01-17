<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'No direct script access allowed' );
} // Exit if accessed directly

class NSC_Tinymce_Init {

	function __construct() {
		add_action( 'admin_init', array( $this, 'init' ) );
	}

	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return    void
	 */
	function init() {

		add_action( 'admin_print_styles', array( $this, 'print_styles' ) );

		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'add_rich_plugins' ) );
			add_filter( 'mce_buttons', array( $this, 'register_rich_buttons' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_script' ) );
		}

	}

	// --------------------------------------------------------------------------

	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return    void
	 */
	function add_rich_plugins( $plugin_array ) {
		$plugin_array['nscShortcodes'] = plugin_dir_url( __FILE__ ) . '/assets/js/tinymce.js';
		return $plugin_array;
	}

	// --------------------------------------------------------------------------

	/**
	 * Adds TinyMCE rich editor buttons
	 */
	function register_rich_buttons( $buttons ) {
		array_push( $buttons, "|", 'nsc_button' );

		return $buttons;
	}

	function print_styles() {
		echo '<style>
				.mce-container .wp-picker-container {
					display: inline-block;
					margin: 3px 10px 10px 150px;
				}
				.mce-container .wp-picker-input-wrap input.mce-colorpicker {
					width: 65px !important;
					position: static !important;
					float: left;
					margin: 0;
					line-height: 1;
				}
				.mce-container .wp-color-result {
				    background-color: #f7f7f7;
				    border: 1px solid #ccc;
				    border-radius: 3px;
				    box-shadow: 0 1px 0 #ccc;
				    cursor: pointer;
				    display: inline-block;
				    height: 22px;
				    margin: 0 6px 6px 0;
				    padding-left: 30px;
				    position: relative;
				    top: 1px;
				    vertical-align: bottom;
				}
				.mce-container .wp-picker-holder {
					position: relative;
					z-index: 999;
				}
				.ht-style-1 {
				    background-color: #00AEEF;
				    color: #fff;
				}
				.ht-style-2 {
				    background-color: #EEE;
				    color: #999;
				}
				.ht-style-3 {
				    background-color: #111;
				    color: #999;
				}
			</style>';
	}

	function enqueue_script() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
	}

}

new NSC_Tinymce_Init();

// Shortcode
function tm_dione_highlight( $atts, $content = "" ) {
	$atts = shortcode_atts( array(
		'color' => '',
		'bg'    => '',
		'style' => '',
		'class' => '',
	), $atts, 'tm_dione_highlight' );

	$style = '';
	$css_class = 'highlight-text';
	if ( $atts['color'] ) {
		$style .= 'color:' . $atts['color'] . ';';
	}
	if ( $atts['bg'] ) {
		$style .= 'background-color:' . $atts['bg'] . ';';
	}
	if ( $atts['style'] ) {
		$css_class .= ' '.$atts['style'];
	}
	if ( $atts['class'] ) {
		$css_class .= ' '.$atts['class'];
	}

	$htPre = '<span class="'.$css_class.'" style="' . $style . '">';
	$htAft = '</span>';
	$html  = $htPre . $content . $htAft;

	return $html;
}

add_shortcode( 'tm_dione_highlight', 'tm_dione_highlight' );
