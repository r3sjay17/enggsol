<?php
$section    = 'elements';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html( 'Link', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/elements/_link.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Heading', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/elements/_heading.php';
