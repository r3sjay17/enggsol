<?php
/**
 * Shortcode attributes
 *
 * @var $atts
 * @var $title
 * @var $title_style
 * @var $title_color
 * @var $title_bgcolor
 * @var $title_alignment
 * @var $view
 * @var $compact_mode
 * @var $auto_play
 * @var $auto_play_speed
 * @var $nav_type
 * @var $nav_pos
 * @var $ids
 * @var $number_of_cols_md
 * @var $orderby
 * @var $order
 * @var $responsive
 * @var $slider_responsive
 * @var $el_class
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_Tm_Woo_Products
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$view = $el_class = '';
$css_class = $el_class  = $this->getExtraClass( $el_class );

$col_md = 'col-md-4';

$classes = $col_md;

global $woocommerce_loop;

if ( 'products-slider-list' == $view ) {
	$woocommerce_loop['view'] = 'products-slider list';
} else {
	$woocommerce_loop['el_class'] = 'grid-masonry';
}

echo do_shortcode( '[recent_products per_page="8" columns="4"]' );
