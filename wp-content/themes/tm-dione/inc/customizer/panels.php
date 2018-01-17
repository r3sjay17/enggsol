<?php
$section_priority = 1;

// Add sections
Kirki::add_section( 'general', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'General settings', 'tm-dione' ),
	'description' => esc_html__( 'Typo Customize, background, color..', 'tm-dione' ),
	'icon'        => 'dashicons-admin-site',
) );
require_once get_template_directory() . '/inc/customizer/general/_general.php';

Kirki::add_section( 'logo', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Logo', 'tm-dione' ),
	'description' => esc_html__( 'Choose logo for your site', 'tm-dione' ),
	'icon'        => 'dashicons-art',
) );
require_once get_template_directory() . '/inc/customizer/logo/_logo.php';

Kirki::add_section( 'elements', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Elements', 'tm-dione' ),
	'description' => esc_html__( 'Customize a few elements', 'tm-dione' ),
	'icon'        => 'dashicons-images-alt2',
) );
require_once get_template_directory() . '/inc/customizer/elements/_elements.php';

Kirki::add_section( 'header', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Header', 'tm-dione' ),
	'description' => 'Click to <a data-focus="logo" data-type="section">Logo</a>, <a data-focus="nav_menus" data-type="section">Menu style</a>, <a data-focus="minicart_enable">Mini cart</a> if you want to customize them</a>',
	'icon'        => 'dashicons-archive',
) );
require_once get_template_directory() . '/inc/customizer/header/_header.php';

Kirki::add_section( 'footer', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Footer', 'tm-dione' ),
	'description' => esc_html__( 'Customize Footer', 'tm-dione' ),
	'icon'        => 'dashicons-screenoptions',
) );
require_once get_template_directory() . '/inc/customizer/footer/_footer.php';

Kirki::add_section( 'nav_menus', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Navigation', 'tm-dione' ),
	'description' => esc_html__( 'Customize Menu', 'tm-dione' ),
	'icon'        => 'dashicons-screenoptions',
) );
require_once get_template_directory() . '/inc/customizer/navigation/_nav.php';

Kirki::add_section( 'page', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Page', 'tm-dione' ),
	'description' => esc_html__( 'Custom for Pages, Archive, Search', 'tm-dione' ),
	'icon'        => 'dashicons-admin-page',
) );
require_once get_template_directory() . '/inc/customizer/page/_page.php';

Kirki::add_section( 'blog', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Blog', 'tm-dione' ),
	'description' => esc_html__( 'Customize Blog', 'tm-dione' ),
	'icon'        => 'dashicons-edit',
) );
require_once get_template_directory() . '/inc/customizer/blog/_blog.php';

Kirki::add_section( 'portfolio', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Portfolio', 'tm-dione' ),
	'description' => esc_html__( 'Customize Portfolio', 'tm-dione' ),
	'icon'        => 'dashicons-admin-page',
) );
require_once get_template_directory() . '/inc/customizer/portfolio/_portfolio.php';

if ( class_exists( 'WooCommerce' ) ) {
	Kirki::add_section( 'woo', array(
		'priority'    => $section_priority ++,
		'title'       => esc_html__( 'Shop', 'tm-dione' ),
		'description' => esc_html__( 'Setting for Shop', 'tm-dione' ),
		'icon'        => 'dashicons-cart',
	) );
	require_once get_template_directory() . '/inc/customizer/woocommerce/_woo.php';
}

Kirki::add_section( 'custom', array(
	'priority'    => $section_priority ++,
	'title'       => esc_html__( 'Custom code', 'tm-dione' ),
	'description' => esc_html__( 'You can add custom CSS and Javascript here', 'tm-dione' ),
	'icon'        => 'dashicons-admin-generic',
) );
require_once get_template_directory() . '/inc/customizer/custom/_custom.php';
