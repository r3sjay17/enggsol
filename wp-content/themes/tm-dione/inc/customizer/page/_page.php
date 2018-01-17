<?php
$section    = 'page';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Page', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/page/_general.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Page title', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/page/_page_title.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Archive page', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/page/_archive.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Search page', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/page/_search.php';
