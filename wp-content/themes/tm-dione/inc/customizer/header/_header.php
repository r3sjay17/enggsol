<?php
$section    = 'header';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Header base config', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/header/_config.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Layout', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/header/_layout.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Background', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/header/_style.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Sticky Header', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/header/_header-sticky.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Mobile Header', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/header/_header-mobile.php';
