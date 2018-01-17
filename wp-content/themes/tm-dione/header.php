<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Infinity
 */
?>
<?php tha_html_before(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php tha_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_attr(bloginfo( 'pingback_url' )); ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
		<link rel="shortcut icon" href="<?php echo esc_attr(Kirki::get_option( 'tm-dione', 'site_favicon' )); ?>">
		<link rel="apple-touch-icon" href="<?php echo esc_attr(Kirki::get_option( 'tm-dione', 'site_apple_touch_icon' )); ?>"/>
	<?php } ?>
	<?php tha_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>

<?php if(Kirki::get_option( 'tm-dione', 'header_type' ) != 'blank'): ?>
<!-- ****************** MOBILE MENU ******************* -->
<div id="menu-slideout" class="slideout-menu hidden-md-up">
	<?php
	$mobileNav = array(
		'theme_location'  => 'primary',
		'menu_id'         => 'mobile-menu',
		'container_class' => 'mobile-menu',
		'after'           => '<i class="sub-menu-toggle fa fa-angle-down"></i>'
	);
	if ( class_exists( 'TM_Walker_Nav_Menu' ) && has_nav_menu( 'primary' ) ) {
		$mobileNav['walker'] = new TM_Walker_Nav_Menu;
	}
	if ( has_nav_menu( 'mobile' ) ) {
		$mobileNav['theme_location'] = 'mobile';
	}
	wp_nav_menu($mobileNav);
	?>
</div>
<!-- // END: MOBILE MENU -->
<?php if(Kirki::get_option( 'tm-dione', 'sidemenu_enable' ) == 1): ?>
<!-- ****************** SIDE MENU ******************* -->
<div id="menu-sidemenu" class="menu-sidemenu hidden-sm-down slideout-menu">
	<svg id="close-sidemenu" viewBox="0 0 64 61" version="1.1"
	xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
	x="0px" y="0px" width="64px" height="61px">
		<g id="close-sidemenu-g">
			<text x="-20" y="44" width="64" fill="#666666"><tspan><![CDATA[]]></tspan></text>
		</g>
	</svg>
	<div class="sidemenu-widgets">
		<?php dynamic_sidebar( 'sidebar-sidemenu' ); ?>
	</div>
</div>
<!-- // END: SIDE MENU -->
<?php endif; ?>

<?php endif; ?>
<!-- // END: BLANK HEADER -->

<div id="page" class="hfeed site">

	<div class="amazing-search-box">
		<div class="container">
			<form method="GET" action="<?php echo esc_url( home_url('/') ) ?>">
				<button type="submit"><span class="pe-7s-search"></span></button>
				<input type="search" name="s"
				       placeholder="<?php echo esc_attr_e( "What are you looking for?", "tm-dione" ) ?>">
				<button type="button" class="show-amazing-search"><span class="pe-7s-close"></span></button>
			</form>
		</div>
	</div>

	<div id="header-wrapper" class="header-wrapper">
		<?php if(! wp_is_mobile()): ?>
			<?php get_template_part('template-parts/header', Kirki::get_option( 'tm-dione', 'header_type' )); ?>
		<?php else: ?>
			<?php get_template_part('template-parts/header-1'); ?>
		<?php endif; ?>
	</div>
	<?php tha_content_before(); ?>
	<div id="content" class="site-content">
		<?php tha_content_top(); ?>
