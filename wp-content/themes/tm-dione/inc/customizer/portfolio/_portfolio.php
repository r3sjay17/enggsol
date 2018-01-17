<?php
$section  = 'portfolio';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Single portfolio', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/portfolio/_single_portfolio.php';
