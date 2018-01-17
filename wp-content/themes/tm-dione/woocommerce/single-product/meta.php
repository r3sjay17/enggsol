<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product-meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<div><span class="sku_wrapper"><h6><?php esc_html_e( 'SKU:', 'tm-dione' ); ?></h6> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'tm-dione' ); ?></span></span></div>

	<?php endif; ?>

	<?php echo '<div>'.$product->get_categories( ', ', '<span class="posted_in">' . _n( '<h6>Category:</h6>', '<h6>Categories:</h6>', $cat_count, 'tm-dione' ) . ' ', '</span>' ) . '</div>'; ?>

	<?php echo '<div>'.$product->get_tags( ', ', '<span class="tagged_as">' . _n( '<h6>Tag:</h6>', '<h6>Tags:</h6>', $tag_count, 'tm-dione' ) . ' ', '</span>' )  . '</div>' ; ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>