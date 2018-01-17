<?php
$default_args = array(
	"name"            => "",
	"position"        => "",
	"desc"            => "",
	"image"           => "",
	"link"            => "#",
	"facebook"        => "",
	"style"        => "",
	"twiter"          => "",
	"google_plus"     => "",
	"target"          => "",
	"show_all_enable" => '',
	"el_class"        => "",
	'css'             => "",
);
extract( shortcode_atts( $default_args, $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if($show_all_enable == 'show_all_enable_value') {
	$css_class .= ' show-all-information';
}
$img_size = '';
$bfi_img_size = explode('x', $img_size);
$post_thumbnail = wp_get_attachment_image_src($image, 'full');

$post_thumbnail = $post_thumbnail[0];
if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
   $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
}
?>

<?php if($style == 'style02'): ?>
	<div class="our-team_item style-02">
		<a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>">
		  <img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt="" />
	  </a>
		 <div class="our-team_item-content">
			  <a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"><h4><?php echo esc_html($name) ?></h4></a>
			  <p><?php echo esc_html($position) ?></p>
		 </div>
	</div>
<?php else: ?>
<div class="our-team_item <?php echo esc_attr( $css_class ) ?>">
	<a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>">
		<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt="" />
	</a>
	<div class="our-team_item-content">
		<a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"><h5><?php echo esc_html($name) ?></h5></a>

		<p class="pos"><?php echo esc_html($position) ?></p>

		<div class="line"></div>
		<p><?php echo esc_html($desc) ?></p>
		<ul class="list-inline social-link">
			<li><a href="<?php echo esc_url($facebook) ?>" target="<?php echo esc_attr($target) ?>"><i class="fa fa-facebook"></i></a></li>
			<li><a href="<?php echo esc_url($google_plus) ?>" target="<?php echo esc_attr($target) ?>"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="<?php echo esc_url($twiter) ?>" target="<?php echo esc_attr($target) ?>"><i class="fa fa-twitter"></i></a></li>
		</ul>
	</div>
</div>
<?php endif; ?>
