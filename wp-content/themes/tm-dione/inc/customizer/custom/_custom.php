<?php
$section    = 'custom';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Custom CSS', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/custom/_css.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Custom JS', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/custom/_js.php';
