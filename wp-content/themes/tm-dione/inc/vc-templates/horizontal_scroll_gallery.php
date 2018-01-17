<?php
extract( shortcode_atts( array(
	'images'   => '',
	'img_size' => 'full',
	'css'      => '',
	'el_class' => '',
), $atts ) );

if ( $images == '' ) {
	return;
}
$images = explode( ',', $images );
$i      = - 1;

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

?>

<div class="gallery-container-wrap gallery-container-wrap-scroll <?php echo esc_attr($css_class) ?>" class="clearfix">
	<ul class="gallery-container">
		<?php
			foreach ( $images as $attach_id ):
			$i ++;
			if ( $attach_id > 0 ) {
				$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
			} else {
				continue;
			}
			$attachment = get_post( $attach_id );

			$title = $desc = $thumbnail = '';

			$thumbnail = $post_thumbnail['thumbnail'];

		?>
			<li class="placeholder">
				<img src="<?php echo esc_attr($post_thumbnail['p_img_large'][0]) ?>" alt="" />
			</li>
		<?php endforeach; ?>
	</ul>
</div>
