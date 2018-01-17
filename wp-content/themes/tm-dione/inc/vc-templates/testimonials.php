<?php
$default_args = array(
	"number"                  => "-1",
	"order_by"                => "date",
	"order"                   => "DESC",
	"category"                => "",
	"author_image"            => "",
	"text_color"              => "",
	"text_font_size"          => "",
	"author_text_font_weight" => "",
	"author_text_color"       => "",
	"author_text_font_size"   => "",
	"show_navigation"         => "",
	"navigation_style"        => "",
	"auto_rotate_slides"      => "",
	"animation_type"          => "",
	"animation_speed"         => "",
	//
	"enable_arrow_icon"       => "",
	"arrow_icon_direction"    => "",
	"only_text"               => "",
	"el_class"                => "",
	'css'                     => "",
);

extract( shortcode_atts( $default_args, $atts ) );

$custom_id = uniqid('testimonials-');

$css_class   = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$slider_class = '';

$css_class .= ' ' . $el_class;

$html                          = "";
$testimonial_text_inner_styles = "";
$testimonial_p_style           = "";
$navigation_button_radius      = "";
$testimonial_name_styles       = "";
$selector_testimonial_p_style  = "";

if ( $enable_arrow_icon == "enable_arrow_icon_value" ) {
	$css_class .= " " . $arrow_icon_direction;
}

if ( $text_font_size != "" || $text_color != "" ) {

	$testimonial_p_style = "";
	if ( $text_font_size != "" ) {
		$testimonial_p_style .= "font-size:" . $text_font_size . ";";
	}
	if ( $text_color != "" ) {
		$testimonial_p_style .= "color:" . $text_color . ";";
	}

}

$selector_testimonial_p_style = uniqid('testimonial_p_style-');
tm_dione_apply_style($testimonial_p_style, '#'.$selector_testimonial_p_style);

if ( $text_color != "" ) {
	$testimonial_text_inner_styles .= "color: " . $text_color . ";";
	$testimonial_name_styles .= "color: " . $text_color . ";";
}

if ( $author_text_font_weight != '' ) {
	$testimonial_name_styles .= 'font-weight: ' . $author_text_font_weight . ';';
}

if ( $author_text_color != "" ) {
	$testimonial_name_styles .= "color: " . $author_text_color . ";";
}

if ( $author_text_font_size != "" ) {
	$testimonial_name_styles .= "font-size: " . $author_text_font_size . ";";
}

$args = array(
	'post_type'      => 'testimonials',
	'orderby'        => $order_by,
	'order'          => $order,
	'posts_per_page' => $number
);

if ( $category != "" ) {
	$args['testimonials_category'] = $category;
}

$animation_type_data = 'fade';
switch ( $animation_type ) {
	case 'fade':
	case 'fade_option' :
		$animation_type_data = 'fade';
		break;
	case 'slide':
	case 'slide_option':
		$animation_type_data = 'slide';
		break;
	default:
		$animation_type_data = 'fade';
}

$loop = new WP_Query( $args );

//$html .= $icon_html;

if ( count($loop->posts) <= 1 ) {
	$slider_class = 'without-slider';
} else {
	$slider_class = 'owl-carousel';
}

$html .= '<div id="' . esc_attr( $custom_id ) . '" class="' . esc_attr( $slider_class ) . ' testimonials' . esc_attr( $css_class ) . '">';

if ( $loop->have_posts() ) :
	while ( $loop->have_posts() ) : $loop->the_post();

		$author                   = get_post_meta( get_the_ID(), "testimonials_author", true );
		$website                  = get_post_meta( get_the_ID(), "testimonials_website", true );
		$company_position         = get_post_meta( get_the_ID(), "testimonials_description", true );
		$text                     = get_post_meta( get_the_ID(), "testimonials_text", true );
		$testimonial_author_image = wp_get_attachment_image_src( get_post_thumbnail_id(), "full" );

		$id_testimonial_text_inner_styles = uniqid('testimonial_text_inner_styles-');
		tm_dione_apply_style($testimonial_text_inner_styles, '#'.$id_testimonial_text_inner_styles);

		$html .= '<div id="' . uniqid('testimonials-') . '" class="quote-item">';
		$html .= '<div class="quote-item_wrapper" id="' . $id_testimonial_text_inner_styles . '">';

		$html .= '<p class="quote-item_text" id="' . $selector_testimonial_p_style . '">' . trim( $text ) . '</p>';

		$id_testimonial_name_styles = uniqid('$testimonial_name_styles-');
		tm_dione_apply_style($testimonial_name_styles, '#'.$id_testimonial_name_styles);

		if($only_text != 'only_text_value') {
			$html .= '<cite class="author"  id="' . $id_testimonial_name_styles . '"><a href="' . esc_url($website) . '"><span>' . $author . '</span>';

			if ( $company_position != "" ) {
				$html .= $company_position;
			}

			$html .= '</a></cite>';
		}
		$html .= '</div>'; //close quote-item_wrapper
		$html .= '</div>'; //close quote-item

	endwhile;
else:
	$html .= esc_html__( 'Sorry, no posts matched your criteria.', 'tm-dione' );
endif;

wp_reset_postdata();

$html .= '</div>';

echo '' . $html;

?>
<script>
	jQuery(document).ready(function ($) {
		'use strict';
		var owl = $("#<?php echo esc_attr($custom_id) ?>");
		var color = owl.css( "background-color" );
		$('head').append('<style> #<?php echo esc_attr($custom_id) ?>.testimonials.arrow.right:before {border-left-color: '+color+'}</style>');
		$('head').append('<style> #<?php echo esc_attr($custom_id) ?>.testimonials.arrow.left:before {border-right-color: '+color+'}</style>');
		$('head').append('<style> #<?php echo esc_attr($custom_id) ?>.testimonials.arrow.up:before {border-right-bottom: '+color+'}</style>');
		$('head').append('<style> #<?php echo esc_attr($custom_id) ?>.testimonials.arrow.down:before {border-right-top: '+color+'}</style>');

		<?php if ( $loop->post_count != 1 ): ?>
			owl.owlCarousel({
				items: 1,
				loop: true,
				margin: 20,
				dots: <?php echo esc_attr( ($show_navigation == "show_navigation_value")?'true':'false' ); ?>,
			});
		<?php endif; ?>
	});
</script>
