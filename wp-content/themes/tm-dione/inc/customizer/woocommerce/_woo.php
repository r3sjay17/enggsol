<?php
$section    = 'woo';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Base config', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/woocommerce/_config.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Layout', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/woocommerce/_layout.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Mini cart', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/woocommerce/_cart.php';
