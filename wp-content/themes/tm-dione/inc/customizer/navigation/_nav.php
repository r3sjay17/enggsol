<?php
$section    = 'nav_menus';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Style', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/navigation/_style.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Dark Style', 'tm-dione'), $section, $priority++, esc_html__( 'Style to display for "Light" header skin', 'tm-dione' ) ) );
require_once get_template_directory() . '/inc/customizer/navigation/_style_dark.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Light Style', 'tm-dione'), $section, $priority++, esc_html__( 'Style to display for "Dark" header skin', 'tm-dione' ) ) );
require_once get_template_directory() . '/inc/customizer/navigation/_style_light.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Sticky', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/navigation/_sticky.php';
