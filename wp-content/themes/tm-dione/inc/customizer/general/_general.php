<?php

$section    = 'general';
$priority = 1;

require_once get_template_directory() . '/inc/customizer/general/_common.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Font', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/general/_font.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Color', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/general/_color.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Breadscrumb', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/general/_breadscrumb.php';
