<?php
$default_args = array(
	"name"            => "",
	"position"        => "",
	"image"           => "",
	"facebook"        => "",
	"twiter"          => "",
	"google_plus"     => "",
	"target"          => "",
	'disable_social_icon' => '',
	'desc_background_color' => '',
	"reverse_enable"  => '',
	'twitter_text'    => '',
	'fb_text'         => '',
	'instagram_image' => '',
	"el_class"        => "",
	'css'             => "",
);
extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if ( $reverse_enable == 'reverse_enable_value' ) {
	$css_class .= ' our-team_item-reverse';
}

$img_size = '';
$bfi_img_size = explode('x', $img_size);
$post_thumbnail = wp_get_attachment_image_src($image, 'full');

$post_thumbnail = $post_thumbnail[0];
if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
   $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
}

if ( ! empty( $instagram_image ) ) {
	$instagram_image = wp_get_attachment_image_src( $instagram_image, 'full' );
	$instagram_image = $instagram_image[0];
}

// Get style
$id_style_desc = uniqid('desc-');
if(!empty($desc_background_color)) {
	$style_desc = 'background-color:' . $desc_background_color . ';';
	tm_dione_apply_style($style_desc, '#' . $id_style_desc);
}
?>
<div class="row <?php echo esc_attr( $css_class ) ?>">
	<div class="col-sm-6">
		<div class="our-team_info-wrapper">
			<div class="our-team_info">
				<h3 class="our-team_name"><?php echo "" . $name; ?></h3>
				<span class="our-team_job stColor"><?php echo "" . $position; ?></span>
			</div>
			<div class="our-team_img">
				<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt="" />
			</div>
		</div>
		<?php if ( $twitter_text != '' ): ?>
			<div class="our-team_twitter pull-sm-right">
				<?php if($disable_social_icon != 'yes'): ?>
					<i class="fa fa-twitter"></i>
					<br/>
				<?php endif; ?>
				<?php echo "" . $twitter_text; ?>
			</div>
		<?php endif; ?>
		<?php if ( $fb_text != '' ): ?>
			<div class="our-team_twitter pull-sm-right">
				<?php if($disable_social_icon != 'yes'): ?>
					<i class="fa fa-facebook"></i>
					<br/>
				<?php endif; ?>
				<?php echo "" . $fb_text; ?>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $instagram_image ) ): ?>
			<div class="our-team_instagram">
				<?php if($disable_social_icon != 'yes'): ?>
					<i class="fa fa-instagram"></i>
				<?php endif; ?>
				<img class="img-responsive" src="<?php echo esc_attr( $instagram_image ) ?>" alt="" />
			</div>
		<?php endif; ?>
	</div>
	<div class="col-sm-6">
		<div id="<?php echo esc_attr($id_style_desc) ?>" class="our-team_story">
			<h5 class="ndColor"><?php esc_html_e( 'The story', 'tm-dione' ); ?></h5>

			<?php echo do_shortcode( $content ); ?>
		</div>
		<ul class="list-inline social-link border-gray">
			<li><a href="<?php echo esc_url( $facebook ) ?>" target="<?php echo esc_attr( $target ) ?>"><i
						class="fa fa-facebook"></i></a></li>
			<li><a href="<?php echo esc_url( $google_plus ) ?>" target="<?php echo esc_attr( $target ) ?>"><i
						class="fa fa-google-plus"></i></a></li>
			<li><a href="<?php echo esc_url( $twiter ) ?>" target="<?php echo esc_attr( $target ) ?>"><i
						class="fa fa-twitter"></i></a></li>
		</ul>
	</div>
</div>
