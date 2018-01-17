<?php
$args = array(
	"button_link"            => "",
	"desc"=> "",
	"element_tag" => 	"h3",
	"image" => 	"",
	"img_size" => 	"570x240",
	"el_class"               => "",
	"css" => '',
);

extract( shortcode_atts( $args, $atts ) );

$button_link = vc_build_link( $button_link );
$link        = ( isset( $button_link['url'] ) ) ? $button_link['url'] : '';
$text        = ( isset( $button_link['title'] ) ) ? $button_link['title'] : '';
$target      = ( isset( $button_link['target'] ) ) ? $button_link['target'] : '';

$custom_class = 'btn-' . rand();

if ( $target == "" ) {
	$target = "_self";
}
$html = "";

$bfi_img_size = explode('x', $img_size);
$post_thumbnail = wp_get_attachment_image_src($image, 'full');

$post_thumbnail = $post_thumbnail[0];
if (count($bfi_img_size) >= 2 || is_numeric($bfi_img_size[0])) {
   $post_thumbnail = bfi_thumb($post_thumbnail, array('width' => $bfi_img_size[0], 'height' => $bfi_img_size[1]));
}

$element_tag = ( $element_tag != "" ) ? $element_tag : 'h5';
$opentag     = '<' . $element_tag . '>';
$closetag    = '</' . $element_tag . '>';

$text = ( $text != "" ) ? $opentag.  $text .$closetag : '';

?>
<div class="shop-banner">
     <img src="<?php echo esc_attr($post_thumbnail) ?>" alt="dione-shop-banner">
     <a class="shop-banner_link" target="<?php esc_attr($target) ?>" href="<?php echo esc_url($link) ?>"></a>
     <div class="shop-banner_content">
         <?php echo '' . $text; ?>
         <p><?php echo '' . $desc; ?></p>
     </div>
 </div>
