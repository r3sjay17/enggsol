<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$gal_images = '';
$link_start = '';
$link_end   = '';
$el_start   = '';
$el_end     = '';

$el_class = $this->getExtraClass( $el_class );

?>

<div class="row gallery-with-lightbox grid-masonry lightgallery">
	<?php
	if ($images == '') {
		return;
	}
	$images = explode( ',', $images );
	$i      = - 1;
	foreach ( $images as $attach_id ) {
		$i ++;
		if ( $attach_id > 0 ) {
			$bfi_img_size = explode('x', $img_size);
			$post_thumbnail = wp_get_attachment_image_src($attach_id, 'full');

			$p_img_large = $post_thumbnail = $post_thumbnail[0];
			if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
			   $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
			}
		} else {
			continue;
		}

		$thumbnail   = '<img src="'.esc_attr($post_thumbnail) .'" alt="" />';
		$link_start  = $link_end = '';
		$hover_image = '';

		$column_number_class = array( 'col-md-3', 'col-md-12', 'col-md-6', 'col-md-4', 'col-md-3', 'col-md-2' );
		if(array_key_exists( $column_number, $column_number_class )) {
			$column_class = $column_number_class[ $column_number ];
		} else {
			$column_class = 'col-md-4';
		}

		if ( $onclick == 'img_link_large' ) {
			$link_start = '<a class="' . $column_class . ' grid-item" href="' . esc_attr($p_img_large) . '" target="' . $custom_links_target . '">' . $hover_image;
		} else if ( $onclick == 'custom_link' && isset( $custom_links[ $i ] ) && $custom_links[ $i ] != '' ) {
			$link_start = '<a class="' . $column_class . ' grid-item" href="' . esc_attr($custom_links[ $i ]) . '"' . ( ! empty( $custom_links_target ) ? ' target="' . $custom_links_target . '"' : '' ) . '>' . $hover_image;
		}

		$link_start = '<a class="' . $column_class . ' grid-item" href="' . esc_attr($p_img_large) . '">' . $hover_image;
		$link_end   = '</a>';
		$inner_link = '<div class="overlay-gallery-item"><span class="icon pe-7s-search"></span></div>';

		echo '' . $link_start . $inner_link . $thumbnail . $link_end;
	}
	?>
</div>
