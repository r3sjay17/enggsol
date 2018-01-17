<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

$tm_dione_page_layout_private = get_post_meta( wc_get_page_id( 'shop' ), "infinity_page_layout_private", true );
$tm_dione_header_top          = get_post_meta( wc_get_page_id( 'shop' ), "infinity_header_top", true );
$tm_dione_sticky_menu         = get_post_meta( wc_get_page_id( 'shop' ), "infinity_sticky_menu", true );
$tm_dione_custom_logo         = get_post_meta( wc_get_page_id( 'shop' ), "infinity_custom_logo", true );
$tm_dione_heading_image       = get_post_meta( wc_get_page_id( 'shop' ), "infinity_heading_image", true );

$pages_custom_title = get_post_meta( wc_get_page_id( 'shop' ), "infinity_custom_title", true );
$pages_custom_desc = get_post_meta( wc_get_page_id( 'shop' ), "infinity_custom_desc", true );
$tm_dione_custom_height = get_post_meta( wc_get_page_id( 'shop' ), "infinity_custom_height", true );
$title_margin_bottom = get_post_meta( wc_get_page_id( 'shop' ), "infinity_title_margin_bottom", true );

$tm_dione_bread_crumb_enable = get_post_meta( wc_get_page_id( 'shop' ), "infinity_bread_crumb_enable", true );
$tm_dione_disable_comment    = get_post_meta( wc_get_page_id( 'shop' ), "infinity_disable_comment", true );
$tm_dione_page_title         = get_post_meta( wc_get_page_id( 'shop' ), "infinity_page_title", true );
$tm_polygon_menu_overlay     = get_post_meta( wc_get_page_id( 'shop' ), "infinity_menu_overlay", true );
$tm_dione_custom_class       = get_post_meta( wc_get_page_id( 'shop' ), "infinity_custom_class", true );

$page_breadcrumb = get_post_meta( wc_get_page_id( 'shop' ), "infinity_breadcrumb", true );
if ( $page_breadcrumb == '' ) {
	$page_breadcrumb = Kirki::get_option( 'tm-dione', 'breadcrumb_enable' );
}

if ( $tm_dione_page_layout_private != 'default' && class_exists( 'cmb2_bootstrap_205' ) ) {
	$tm_dione_layout = get_post_meta( wc_get_page_id( 'shop' ), "infinity_page_layout_private", true );
} else {
	$tm_dione_layout = Kirki::get_option( 'tm-dione', 'shop_layout' );
}
$tm_dione_shop_wide_boxed = Kirki::get_option( 'tm-dione', 'shop_wide_boxed' );
if($tm_dione_shop_wide_boxed == 'wide') {
	$container_cl = 'shop-fullwidth container-fluid';
} else {
	$container_cl = 'container';
}

$shop_product_column = Kirki::get_option( 'tm-dione', 'shop_product_column' );

if ( $tm_dione_heading_image ) {
	$tm_dione_heading_image = get_post_meta( wc_get_page_id( 'shop' ), "infinity_heading_image", true );
} else {
	$tm_dione_heading_image = Kirki::get_option( 'tm-dione', 'page_bg_image' );
}

$tm_dione_heading_image = do_shortcode( $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'http://http://', 'http://', $tm_dione_heading_image );
$tm_dione_heading_image = str_replace( 'https://https://', 'https://', $tm_dione_heading_image );

$style = '';
if ( $tm_dione_heading_image ) {
	$style .= 'background-image: url("' . ( $tm_dione_heading_image ) . '");';
}
if ( $tm_dione_custom_height ) {
	$style .= 'height:' . $tm_dione_custom_height . ';';
}
if ( $title_margin_bottom ) {
	$style .= 'margin-bottom:' . $title_margin_bottom . ';';
}

global $woocommerce_loop;
$woocommerce_loop['columns'] = $shop_product_column;

$id_style = uniqid('shop-header-style-');

get_header( 'shop' );

tm_dione_apply_style($style, '#' . $id_style);

?>
<?php if ( $tm_dione_page_title != 'none' ) { ?>
	<div class="page-big-title <?php echo esc_attr( $tm_dione_page_title ) ?>"
	     id="<?php echo esc_attr( $id_style ) ?>">
		<div class="container">
			<div class="row middle-xs middle-sm">
				<?php if ( $tm_dione_page_title == '' ): ?>
					<?php
					if ( $pages_custom_title == '' ) {
						do_action( 'woocommerce_before_main_content' );
						?>
						<h3 class="entry-title media-middle col-md-6"
						    itemprop="headline"><?php woocommerce_page_title(); ?></h3>
					<?php } else {
						echo '<h3 class="entry-title media-middle col-md-6" itemprop="headline">' . do_shortcode( $pages_custom_title ) . '</h3>';
					}
					if ( $pages_custom_desc != '' ) {
						echo "<div class='page-desc'>" . do_shortcode( $pages_custom_desc ) . '</div>';
					} else {
						do_action( 'woocommerce_archive_description' );
					}
					?>
					<?php if ( function_exists( 'tm_bread_crumb' ) && $page_breadcrumb == 1 ) { ?>
						<div class="breadcrumb media-middle col-md-6">
							<?php echo tm_bread_crumb( array( 'home_label' => Kirki::get_option( 'tm-dione', 'breadcrumb_home_text' ) ) ); ?>
						</div>
					<?php } ?>
				<?php elseif ( $tm_dione_page_title == 'center-style' ): ?>
					<div class="col-md-12 media-middle">
						<div class="title-icon">
							<?php echo do_shortcode( '[svg svg_icon="svg01"]' ) ?>
						</div>
						<?php
						if ( $pages_custom_title == '' ) {
							do_action( 'woocommerce_before_main_content' );
							?>
							<h2 class="entry-title" itemprop="headline"><?php woocommerce_page_title(); ?></h2>
						<?php } else {
							echo '<h1 class="entry-title">' . do_shortcode( $pages_custom_title ) . '</h1>';
						}
						if ( $pages_custom_desc != '' ) {
							echo "<div class='page-desc'>" . do_shortcode( $pages_custom_desc ) . '</div>';
						} else {
							do_action( 'woocommerce_archive_description' );
						}
						?>
						<?php if ( function_exists( 'tm_bread_crumb' ) && $page_breadcrumb == 1 ) { ?>
							<div class="breadcrumb">
								<?php echo tm_bread_crumb( array( 'home_label' => Kirki::get_option( 'tm-dione', 'breadcrumb_home_text' ) ) ); ?>
							</div>
						<?php } ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="<?php echo esc_attr($container_cl) ?>">
	<div class="row">
		<?php if ( $tm_dione_layout == 'left-sidebar' ) { ?>
				<?php get_sidebar('shop'); ?>
		<?php } ?>
		<?php if ( $tm_dione_layout == 'left-sidebar' || $tm_dione_layout == 'right-sidebar' ) { ?>
			<?php $class = 'col-md-9'; ?>
		<?php } else { ?>
			<?php $class = 'col-md-12'; ?>
		<?php } ?>
		<div class="<?php echo esc_attr( $class ); ?>">
			<div class="products">
				<?php if ( have_posts() ) : ?>

					<?php do_action( 'woocommerce_before_shop_loop' ); ?>

					<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php do_action( 'woocommerce_after_shop_loop' ); ?>

				<?php elseif ( ! woocommerce_product_subcategories( array(
					'before' => woocommerce_product_loop_start( false ),
					'after'  => woocommerce_product_loop_end( false )
				) )
				) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>

				<?php do_action( 'woocommerce_after_main_content' ); ?>

			</div>
		</div>
		<?php if ( $tm_dione_layout == 'right-sidebar' ) { ?>
				<?php get_sidebar('shop'); ?>
		<?php } ?>
	</div>
</div>

<?php get_footer( 'shop' ); ?>
