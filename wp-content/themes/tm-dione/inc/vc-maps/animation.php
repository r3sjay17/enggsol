<?php

class WPBakeryShortCode_Animation extends WPBakeryShortCodesContainer
{
}

/*** Animation ***/

$basename = 'animation';

$group_name = esc_html__('Effect', 'tm-dione');

vc_map(array(
    'name' => 'Animation',
    'base' => $basename,
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico services-icon',
    //'allowed_container_element' => 'vc_row',
	"is_container" => true,
	'params' => array(),
	"js_view"      => 'VcColumnView',
));


global $tm_elements_use_animation;
$tm_elements_use_animation = array(
	'vc_column',
	'vc_row',
	//'vc_tta_pageable',
	'animation',
	'blog',
	'button',
	'call_to_action',
	'carousel',
	'compare_table',
	'countdown',
	'counter',
	'thememove_gmaps',
	'icon_with_text',
	'icons',
	'latest_blog',
	'line',
	'list',
	'message',
	'portfolio_carousel',
	'portfolio_grid',
	'portfolio_list',
	'price_box',
	'process_bar',
	'thememove_services',
	'shop_banner',
	'svg',
	'team_member',
	'team_member2',
	'testimonials',
	'thememove_menu',
	'tm_video',
	'tm_woo_products',
	'vc_column_text',
	'vc_custom_heading',
	'vc_gallery',
	'vc_tta_accordion',
	'vc_tta_tabs',
);

foreach ($tm_elements_use_animation as $key => $tm_element) {
	vc_add_param($tm_element , array(
		'type'             => 'switch',
		'heading'          => esc_html__( 'Enable Animation', 'tm-dione' ),
		'param_name'       => 'enable_animation',
		'value'            => '',
		'options'          => array(
			'enable_animation_value' => array(
				'label' => '',
				'on'    => esc_html__( 'Yes', 'tm-dione' ),
				'off'   => esc_html__( 'No', 'tm-dione' )
			)
		),
		'group' => $group_name,
	));
	vc_add_param($tm_element , array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__('Animation style', 'tm-dione'),
			'param_name' => 'animation_style',
			'value' => array(
				esc_html__('Default', 'tm-dione') => '',
				esc_html__('bounce', 'tm-dione') => 'bounce',
				esc_html__('flash', 'tm-dione') => 'flash',
				esc_html__('pulse', 'tm-dione') => 'pulse',
				esc_html__('rubberBand', 'tm-dione') => 'rubberBand',
				esc_html__('shake', 'tm-dione') => 'shake',
				esc_html__('swing', 'tm-dione') => 'swing',
				esc_html__('tada', 'tm-dione') => 'tada',
				esc_html__('wobble', 'tm-dione') => 'wobble',
				esc_html__('jello', 'tm-dione') => 'jello',

				esc_html__('bounceIn', 'tm-dione') => 'bounceIn',
				esc_html__('bounceInDown', 'tm-dione') => 'bounceInDown',
				esc_html__('bounceInLeft', 'tm-dione') => 'bounceInLeft',
				esc_html__('bounceInRight', 'tm-dione') => 'bounceInRight',
				esc_html__('bounceInUp', 'tm-dione') => 'bounceInUp',

				esc_html__('bounceOut', 'tm-dione') => 'bounceOut',
				esc_html__('bounceOutDown', 'tm-dione') => 'bounceOutDown',
				esc_html__('bounceOutLeft', 'tm-dione') => 'bounceOutLeft',
				esc_html__('bounceOutRight', 'tm-dione') => 'bounceOutRight',
				esc_html__('bounceOutUp', 'tm-dione') => 'bounceOutUp',

				esc_html__('fadeIn', 'tm-dione') => 'fadeIn',
				esc_html__('fadeInDown', 'tm-dione') => 'fadeInDown',
				esc_html__('fadeInDownBig', 'tm-dione') => 'fadeInDownBig',
				esc_html__('fadeInLeft', 'tm-dione') => 'fadeInLeft',
				esc_html__('fadeInLeftBig', 'tm-dione') => 'fadeInLeftBig',
				esc_html__('fadeInRight', 'tm-dione') => 'fadeInRight',
				esc_html__('fadeInRightBig', 'tm-dione') => 'fadeInRightBig',
				esc_html__('fadeInUp', 'tm-dione') => 'fadeInUp',
				esc_html__('fadeInUpBig', 'tm-dione') => 'fadeInUpBig',

				esc_html__('fadeOut', 'tm-dione') => 'fadeOut',
				esc_html__('fadeOutDown', 'tm-dione') => 'fadeOutDown',
				esc_html__('fadeOutDownBig', 'tm-dione') => 'fadeOutDownBig',
				esc_html__('fadeOutLeft', 'tm-dione') => 'fadeOutLeft',
				esc_html__('fadeOutLeftBig', 'tm-dione') => 'fadeOutLeftBig',
				esc_html__('fadeOutRight', 'tm-dione') => 'fadeOutRight',
				esc_html__('fadeOutRightBig', 'tm-dione') => 'fadeOutRightBig',
				esc_html__('fadeOutUp', 'tm-dione') => 'fadeOutUp',
				esc_html__('fadeOutUpBig', 'tm-dione') => 'fadeOutUpBig',

				esc_html__('flip', 'tm-dione') => 'flip',
				esc_html__('flipInX', 'tm-dione') => 'flipInX',
				esc_html__('flipInY', 'tm-dione') => 'flipInY',
				esc_html__('flipOutX', 'tm-dione') => 'flipOutX',
				esc_html__('flipOutY', 'tm-dione') => 'flipOutY',

				esc_html__('lightSpeedIn', 'tm-dione') => 'lightSpeedIn',
				esc_html__('lightSpeedOut', 'tm-dione') => 'lightSpeedOut',

				esc_html__('rotateIn', 'tm-dione') => 'rotateIn',
				esc_html__('rotateInDownLeft', 'tm-dione') => 'rotateInDownLeft',
				esc_html__('rotateInDownRight', 'tm-dione') => 'rotateInDownRight',
				esc_html__('rotateInUpLeft', 'tm-dione') => 'rotateInUpLeft',
				esc_html__('rotateInUpRight', 'tm-dione') => 'rotateInUpRight',

				esc_html__('rotateOut', 'tm-dione') => 'rotateOut',
				esc_html__('rotateOutDownLeft', 'tm-dione') => 'rotateOutDownLeft',
				esc_html__('rotateOutDownRight', 'tm-dione') => 'rotateOutDownRight',
				esc_html__('rotateOutUpLeft', 'tm-dione') => 'rotateOutUpLeft',
				esc_html__('rotateOutUpRight', 'tm-dione') => 'rotateOutUpRight',

				esc_html__('slideInUp', 'tm-dione') => 'slideInUp',
				esc_html__('slideInDown', 'tm-dione') => 'slideInDown',
				esc_html__('slideInLeft', 'tm-dione') => 'slideInLeft',
				esc_html__('slideInRight', 'tm-dione') => 'slideInRight',

				esc_html__('slideOutUp', 'tm-dione') => 'slideOutUp',
				esc_html__('slideOutDown', 'tm-dione') => 'slideOutDown',
				esc_html__('slideOutLeft', 'tm-dione') => 'slideOutLeft',
				esc_html__('slideOutRight', 'tm-dione') => 'slideOutRight',

				esc_html__('zoomIn', 'tm-dione') => 'zoomIn',
				esc_html__('zoomInDown', 'tm-dione') => 'zoomInDown',
				esc_html__('zoomInLeft', 'tm-dione') => 'zoomInLeft',
				esc_html__('zoomInRight', 'tm-dione') => 'zoomInRight',
				esc_html__('zoomInUp', 'tm-dione') => 'zoomInUp',

				esc_html__('zoomOut', 'tm-dione') => 'zoomOut',
				esc_html__('zoomOutDown', 'tm-dione') => 'zoomOutDown',
				esc_html__('zoomOutLeft', 'tm-dione') => 'zoomOutLeft',
				esc_html__('zoomOutRight', 'tm-dione') => 'zoomOutRight',
				esc_html__('zoomOutUp', 'tm-dione') => 'zoomOutUp',

				esc_html__('hinge', 'tm-dione') => 'hinge',
				esc_html__('rollIn', 'tm-dione') => 'rollIn',
				esc_html__('rollOut', 'tm-dione') => 'rollOut',
			),
			'description' => esc_html__('Pick an animation style in', 'tm-dione')." <a href='".esc_url('http://daneden.github.io/animate.css/')."' target='_blank'>".__('Animate.css', 'tm-dione').'</a>',
			'group' => $group_name,
			"dependency"  => array( "element" => "enable_animation", "value" => array( "enable_animation_value" ) )
		)
	);
}

add_filter('vc_shortcodes_css_class', 'tm_elements_use_animation_class', 10, 3);

function tm_elements_use_animation_class( $class_string, $tag, $atts = null ) {
	global $tm_elements_use_animation;
	if ( in_array( $tag, $tm_elements_use_animation) ) {
		if( !empty( $atts['enable_animation'] ) && $atts['enable_animation'] == 'enable_animation_value') {
			$class_string .= " wow " . $atts['animation_style'];
		}
	}
	return $class_string;
}
