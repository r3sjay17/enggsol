<?php
/**
 * Infinity Theme Customizer
 *
 * @package Infinity
 */

if(!class_exists('Kirki')) {
	return;
}

/**
 * Configuration for the Kirki Customizer
 * ======================================
 */
function tm_dione_config() {
	$args = array(
		'styles_priority' => 999,
		'width'           => '300px',
		'url_path'        => TM_DIONE_THEME_ROOT . '/core/kirki/',
	);

	return $args;
}

add_filter( 'kirki/config', 'tm_dione_config' );

/**
 * Remove Unused Native Sections
 * =============================
 */
function tm_dione_remove_customizer_sections( $wp_customize ) {
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'colors' );
	//$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'header_image' );
	//$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->remove_control( 'blogname' );
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_control( 'page_for_posts' );
	$wp_customize->remove_control( 'display_header_text' );

	//$wp_customize->remove_control( 'nav_menu_locations[primary]' );
	//$wp_customize->remove_control( 'nav_menu_locations[footer]' );
}

add_action( 'customize_register', 'tm_dione_remove_customizer_sections' );

/**
 * General setups
 * ==============
 */
Kirki::add_config( 'tm-dione', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
	'postMessage' => 'auto',
) );

require_once get_template_directory() . '/inc/customizer/panels.php';

/**
 * Add custom css
 * ==============
 */
function tm_dione_customize_preview_css() {
	wp_enqueue_style( 'infinity-kirki-custom-css', TM_DIONE_THEME_ROOT . '/core/custom.css' );
}

add_action( 'customize_controls_init', 'tm_dione_customize_preview_css' );

// Force load all variants and subsets.
add_action( 'after_setup_theme', 'tm_load_all_variants_and_subsets' );
function tm_load_all_variants_and_subsets() {
	if ( class_exists( 'Kirki_Fonts_Google' ) ) {
		Kirki_Fonts_Google::$force_load_all_variants = true;
		//Kirki_Fonts_Google::$force_load_all_subsets = true;
	}
}

// Build URL for customizer
add_filter( 'kirki/values/get_value', 'tm_molly_kirki_db_get_theme_mod_value', 10, 2 );
function tm_molly_kirki_db_get_theme_mod_value( $value, $setting ) {
	static $settings;

	if ( is_page() ) {

		$presets = apply_filters( 'tm_molly_page_meta_box_presets', array() );

		if ( ! empty( $presets ) ) {
			foreach ( $presets as $preset ) {
				$page_preset_value = get_post_meta( get_the_ID(), 'infinity_' . $preset, true );

				if ( $page_preset_value && empty($_GET[$preset]) ) {
					$_GET[ $preset ] = $page_preset_value;
				}
			}

		}

	}


	if ( is_null( $settings ) || ( empty( $settings ) && is_page() ) ) {
		$settings = array();

		if ( ! empty( $_GET ) ) {
			foreach ( $_GET as $key => $query_value ) {
				if ( ! empty( Kirki::$fields[ $key ] ) ) {
					$settings[ $key ] = $query_value;

					if ( is_array( Kirki::$fields[ $key ] ) &&
					     ( 'kirki-preset' == Kirki::$fields[ $key ]['type'] || 'select' == Kirki::$fields[ $key ]['type'] ) &&
					     ! empty( Kirki::$fields[ $key ]['choices'] ) &&
					     ! empty( Kirki::$fields[ $key ]['choices'][ $query_value ] ) &&
					     ! empty( Kirki::$fields[ $key ]['choices'][ $query_value ]['settings'] ) ) {

						foreach ( Kirki::$fields[ $key ]['choices'][ $query_value ]['settings'] as $kirki_setting => $kirki_value ) {
							$settings[ $kirki_setting ] = $kirki_value;
						}
					}
				}
			}
		}
	}

	if ( isset ( $settings[ $setting ] ) ) {
		return $settings[ $setting ];
	}

	return $value;
}
