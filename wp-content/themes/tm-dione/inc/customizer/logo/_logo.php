<?php
$section  = 'logo';
$priority = 1;

// If WP do not support Favicon
if ( ! function_exists( 'has_site_icon' ) ) {

	Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Favicon', 'tm-dione'), $section, $priority++) );
	require_once get_template_directory() . '/inc/customizer/logo/_favicon.php';

}

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Logo images', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/logo/_image.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Logo layout', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/logo/_layout.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Logo size', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/logo/_size.php';
