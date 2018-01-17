<?php
$section  = 'footer';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Footer base config', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_config.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Layout', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_layout.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Footer Style Dark', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_style_dark.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Footer Style Light', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_style_light.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Copyright', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_copyright.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Copyright Style Dark', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_copyright_light.php';

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Copyright Style Light', 'tm-dione'), $section, $priority++) );
require_once get_template_directory() . '/inc/customizer/footer/_copyright_dark.php';
