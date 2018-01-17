<?php
/**
 * Shortcode attributes
 * @var $url
 * @var $player_scale
 * @var $player_color
 * @var $player_color_hover
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Tm_Video
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

global $tm_video_player_id;
$tm_video_player_id = uniqid();

$bfi_img_size = explode('x', $img_size);
$post_thumbnail = wp_get_attachment_image_src($poster, 'full');

$post_thumbnail = $post_thumbnail[0];
if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
   $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
}
?>

<div class="video-gallery">
  <a href="<?php echo esc_url( $url ); ?>" data-poster="<?php echo esc_attr($post_thumbnail) ?>" >
	  	<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt="" />
		<i class="play-icon fa fa-play" aria-hidden="true"></i>
  </a>
</div>


<?php
echo "" . $this->endBlockComment( 'thememove_video_player' );
?>
