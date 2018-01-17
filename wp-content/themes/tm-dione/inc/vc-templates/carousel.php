<?php
extract( shortcode_atts( array(
	'images'         => '',
//	'custom_links'        => '',
//	'custom_links_target' => '',
	'img_size'       => 'full',
	'el_class'       => '',
	'slides_per_row' => '3',
	'hide_images'    => '',
	'show_nav'       => '',
	'nav_style'      => '',
	'show_dots'      => '',
	'show_desc'      => '',
	'show_title'     => '',
	'element_tag'    => '',
	'auto_play'		 => '',
	'autoplay_speed'	 => '2000',
	'css'            => '',
), $atts ) );

if ( $images == '' ) {
	return;
}
$images = explode( ',', $images );
$i      = - 1;

$data_slick = array();

if ( $show_dots == 'enable_show_dots' ) {
	$data_slick['dots'] = true;
}
if ( $show_nav == 'enable_show_nav' ) {
	$data_slick['arrows'] = true;
} else {
	$data_slick['arrows'] = false;
}

if( $auto_play == 'yes' ) {
	$data_slick['autoplay'] = true;
}
if( !empty($autoplay_speed) ) {
	$data_slick['autoplaySpeed'] = $autoplay_speed;
}

$slides_per_row = ( $slides_per_row != '' ) ? $slides_per_row : 3;

$data_slick['slidesToShow']   = (int)$slides_per_row;
$data_slick['slidesToScroll'] = (int)$slides_per_row;
$data_slick['responsive']     = array(
	array(
		'breakpoint' => 480,
		'settings'   => array(
			'slidesToShow'   => 2,
			'slidesToScroll' => 2
		)
	)
);

?>

<div class="awesome-slider <?php echo esc_attr( $nav_style ) ?>" data-slick='<?php echo json_encode( $data_slick ) ?>'>

	<?php

	foreach ( $images as $attach_id ):
		$i ++;
		if ( $attach_id > 0 ) {
			$bfi_img_size   = explode( 'x', $img_size );
			$post_thumbnail = wp_get_attachment_image_src( $attach_id, 'full' );

			$post_thumbnail = $post_thumbnail[0];
			if ( count( $bfi_img_size ) >= 2 || is_numeric( $bfi_img_size[0] ) ) {
				$post_thumbnail = bfi_thumb( $post_thumbnail, array(
					'width'  => $bfi_img_size[0],
					'height' => $bfi_img_size[1]
				) );
			}
		} else {
			continue;
		}

		$attachment = get_post( $attach_id );

		$title = $desc = '';

		if ( $show_title == 'enable_show_title' ) {
			$element_tag = ( $element_tag != "" ) ? $element_tag : 'h4';
			$opentag     = '<' . $element_tag . ' class="slide-title">';
			$closetag    = '</' . $element_tag . '>';
			$title       = $opentag . $attachment->post_title . $closetag;
		}
		if ( $show_desc == 'enable_show_desc' ) {
			$desc = '<div class="slide-desc">' . $attachment->post_content . '</div>';
		}
		?>
		<div>
			<?php if ( $hide_images != 'enable_hide_images' ): ?>
				<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt=""/>
			<?php endif; ?>
			<?php echo '' . $title . $desc; ?>
		</div>
	<?php endforeach; ?>
</div>
