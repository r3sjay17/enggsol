<?php

if ( ! class_exists( 'VC_Thememove_Parallax' ) ) {
	class VC_Thememove_Parallax {
		function __construct() {
			//add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
			/*add_action('wp_enqueue_scripts',array($this,'front_scripts'),9999); */
			add_action( 'admin_init', array( $this, 'parallax_init' ) );
			//echo WPB_VC_VERSION;
			if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.4', '>=' ) ) {
				add_filter( 'vc_shortcode_output', array( $this, 'execute_ultimate_vc_shortcode' ), 10, 3 );
			}
			//add_filter('parallax_image_video',array($this,'parallax_shortcode'), 10, 2);
		}/* end constructor */

		function execute_ultimate_vc_shortcode( $output, $obj, $attr ) {
			if ( $obj->settings( 'base' ) == 'vc_row' ) {
				$output .= $this->parallax_shortcode( $attr, '' );
			}

			return $output;
		}

		public static function parallax_shortcode( $atts, $content ) {

			$output = $bg_type = $bg_image = $bg_image_new = $bsf_img_repeat = $parallax_style = $video_opts = $video_url = $video_url_2 = $video_poster = $bg_image_size = $bg_image_position = $u_video_url = $parallax_sense = $bg_cstm_size = $bg_override = $bg_img_attach = $u_start_time = $u_stop_time = $layer_image = $css = $animation_type = $horizontal_animation = $vertical_animation = $animation_speed = $animated_bg_color = $fadeout_row = $fadeout_start_effect = $parallax_content = $parallax_content_sense = $disable_on_mobile = $disable_on_mobile_img_parallax = $animation_repeat = $animation_direction = $enable_overlay = $overlay_color = $overlay_pattern = $overlay_pattern_opacity = $overlay_pattern_size = $multi_color_overlay = $overlay = $overlay_style = $overlay_grad = $overlay_opacity = $bg_image_repeat = $pattern_image = $pattern_url = $bg_solid_color = $bg_grad = "";

			$seperator_html = $seperator_svg_bottom = $icon_inline = $seperator_bottom_html = $icon_type = $seperator_svg_height = $seperator_top_html = $seperator_css = $seperator_enable = $seperator_type = $seperator_position = $seperator_shape_size = $seperator_shape_background = $seperator_shape_border = $seperator_shape_border_color = $seperator_shape_border_width = '';

			$ult_hide_row = $ult_hide_row_large_screen = $ult_hide_row_desktop = $ult_hide_row_tablet = $ult_hide_row_tablet_small = $ult_hide_row_mobile = $ult_hide_row_mobile_large = '';

			extract( shortcode_atts( array(
				"bg_type"                      => "",
				"bg_image"                     => "",
				"bg_solid_color"               => "",
				"bg_grad"                      => "",
				"bg_image_new"                 => "",
				"bg_image_repeat"              => "repeat",
				'bg_image_size'                => "cover",
				"bg_cstm_size"                 => "",
				"bg_img_attach"                => "scroll",
				"bg_image_position"            => "",
				"enable_overlay"               => "",
				"overlay_color"                => "",
				"overlay_style"                => "",
				"overlay_grad"                 => "",
				"overlay_opacity"              => "80",
				"pattern_image"                => "",
				"seperator_enable"             => "seperator_enable_value",
				"seperator_type"               => "none_seperator",
				"seperator_position"           => "top_seperator",
				"seperator_svg_bottom"         => "",
				"seperator_shape_size"         => "10",
				"seperator_shape_background"   => "#fff",
				"seperator_shape_border"       => "none",
				"seperator_shape_border_color" => "",
				"seperator_shape_border_width" => "1",
				"seperator_svg_height"         => "60",
				"icon_type"                    => "no_icon",
			), $atts ) );

			if ( $seperator_enable == 'seperator_enable_value' ) {

				$seperator_bottom_html = ' data-seperator="true" ';
				$seperator_bottom_html .= ' data-seperator-type="' . $seperator_type . '" ';
				$seperator_bottom_html .= ' data-seperator-shape-size="' . $seperator_shape_size . '" ';
				$seperator_bottom_html .= ' data-seperator-svg-height="' . $seperator_svg_height . '" ';
				$seperator_bottom_html .= ' data-seperator-full-width="true" ';
				$seperator_bottom_html .= ' data-seperator-position="' . $seperator_position . '" ';
				$seperator_bottom_html .= ' data-seperator-bottom="' . $seperator_svg_bottom . '" ';


				if ( $seperator_shape_background != '' ) {
					if ( $seperator_type == 'multi_triangle_seperator' ) {
						preg_match( '/\(([^)]+)\)/', $seperator_shape_background, $output_temp );
						if ( isset( $output_temp[1] ) ) {
							$rgba                       = explode( ',', $output_temp[1] );
							$seperator_shape_background = rgbaToHexUltimate( $rgba[0], $rgba[1], $rgba[2] );
						}
					}
					$seperator_bottom_html .= ' data-seperator-background-color="' . $seperator_shape_background . '" ';
				}
				if ( $seperator_shape_border != 'none' ) {
					$seperator_bottom_html .= ' data-seperator-border="' . $seperator_shape_border . '" ';
					$bwidth = ( $seperator_shape_border_width == '' ) ? '1' : $seperator_shape_border_width;
					$seperator_bottom_html .= ' data-seperator-border-width="' . $bwidth . '" ';
					$seperator_bottom_html .= ' data-seperator-border-color="' . $seperator_shape_border_color . '" ';
				}

				if ( $icon_type != 'no_icon' ) {
				}
				$seperator_bottom_html .= ' data-icon="' . htmlentities( $icon_inline ) . '" ';
			}

			$seperator_html = $seperator_top_html . ' ' . $seperator_bottom_html;

			// Background
			if ( $bg_type == 'image' ) {
				if ( $bg_image_new != "" ) {

					$bg_img_id = $bg_image_new;
					$bg_img    = wp_get_attachment_image_src( $bg_img_id, 'full' );

					$bg_image = 'data-bg-img="url(\'' . $bg_img[0] . '\')" data-image-id="' . $bg_img_id . '" data-bg-img-repeat="' . $bg_image_repeat . '" data-bg-img-size="' . $bg_image_size . '" data-bg-img-position="' . $bg_image_position . '"   data-bg-img-attach="' . $bg_img_attach . '"    data-bg-img-cstm-size="' . $bg_cstm_size . '" ';
				}
			} else if ( $bg_type == 'grad' ) {
				$bg_grad = 'data-bg-grad="' . $bg_grad . '"';
			} else if ( $bg_type == 'bg_color' ) {
				$bg_solid_color = 'data-bg-color="' . $bg_solid_color . '"';
			}

			// Overlay
			if ( $enable_overlay == 'enable_overlay_value' ) {
				if ( $pattern_image != '' ) {
					$pattern_url = wp_get_attachment_image_src( $pattern_image, 'full' );
					$pattern_url = $pattern_url[0];
					//$overlay_pattern .= 'data-overlay-pattern="' . wp_get_attachment_image_src( $pattern_image, 'full' ) . '"';
				}

				$overlay = ' data-overlay="true" data-overlay-style="' . $overlay_style . '"  data-overlay-color="' . $overlay_color . '" data-overlay-pattern="' . $pattern_url . '" data-overlay-opacity="' . ( $overlay_opacity / 100 ) . '" data-overlay-pattern-size="' . $overlay_pattern_size . '" data-overlay-grad="' . $overlay_grad . '" ';

			} else {
				$overlay = ' data-overlay="false" ';
			}


			$html = "<div class=\"upb_bg_img\"" . $seperator_html . " " . $bg_image . " " . $bg_grad . " " . $bg_solid_color . " " . $overlay . "></div>";
			$output .= $html;

			return $output;

		}

		function tab_background() {
			$group_name = esc_html__( 'Background', 'tm-dione' );

			if ( function_exists( 'vc_add_param' ) ) {
				vc_add_param( 'vc_row', array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => esc_html__( "Background Style", 'tm-dione' ),
						"param_name"  => "bg_type",
						"value"       => array(
							__( "Default", 'tm-dione' )        => "",
							__( "Single Color", 'tm-dione' )   => "bg_color",
							__( "Gradient Color", 'tm-dione' ) => "grad",
							__( "Image", 'tm-dione' )          => "image",
						),
						"description" => esc_html__( "Select the kind of background would you like to set for this row.", 'tm-dione' ),
						"group"       => $group_name,
					)
				);

				vc_add_param( 'vc_row', array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Background Color', 'tm-dione' ),
					'param_name' => 'bg_solid_color',
					'value'      => '',
					'group'      => $group_name,
					"dependency" => array( "element" => "bg_type", "value" => array( "bg_color", ) ),
				) );

				vc_add_param( 'vc_row', array(
						"type"        => "gradient",
						"class"       => "",
						"heading"     => esc_html__( "Gradient Type", "tm-dione" ),
						"param_name"  => "bg_grad",
						"description" => esc_html__( 'At least two color points should be selected.', 'tm-dione' ),
						"dependency"  => array( "element" => "bg_type", "value" => array( "grad", ) ),
						"group"       => $group_name,
					)
				);

				vc_add_param( 'vc_row', array(
						"type"        => "attach_image",
						"class"       => "",
						"heading"     => esc_html__( "Background Image", 'tm-dione' ),
						"param_name"  => "bg_image_new",
						"value"       => "",
						"description" => esc_html__( "Upload or select background image from media gallery.", 'tm-dione' ),
						"dependency"  => array( "element" => "bg_type", "value" => array( "image", ) ),
						"group"       => $group_name,
					)
				);

				vc_add_param( 'vc_row', array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => esc_html__( "Background Image Repeat", 'tm-dione' ),
						"param_name"  => "bg_image_repeat",
						"value"       => array(
							__( "Repeat", 'tm-dione' )    => "",
							__( "Repeat X", 'tm-dione' )  => "repeat-x",
							__( "Repeat Y", 'tm-dione' )  => "repeat-y",
							__( "No Repeat", 'tm-dione' ) => "no-repeat",
						),
						"description" => esc_html__( "Options to control repeatation of the background image.", 'tm-dione' ) . " " . esc_html__( "Learn on", 'tm-dione' ) . " <a href='".esc_url('http://www.w3schools.com/cssref/playit.asp?filename=playcss_background-repeat')."' target='_blank'>" . esc_html__( "W3School", 'tm-dione' ) . "</a>",
						"dependency"  => array( "element" => "bg_type", "value" => array( "image", ) ),
						"group"       => $group_name,
					)
				);
				vc_add_param( 'vc_row', array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => esc_html__( "Background Image Size", 'tm-dione' ),
						"param_name"  => "bg_image_size",
						"value"       => array(
							__( "Cover - Image to be as large as possible", 'tm-dione' )                  => "",
							__( "Contain - Image will try to fit inside the container area", 'tm-dione' ) => "contain",
							__( "Initial", 'tm-dione' )                                                   => "initial",
							__( "Custom", 'tm-dione' )                                                    => "cstm",
						),
						"description" => esc_html__( "Options to control repeatation of the background image.", 'tm-dione' ) . " " . esc_html__( "Learn on", 'tm-dione' ) . " <a href='".esc_url('http://www.w3schools.com/cssref/playit.asp?filename=playcss_background-size&preval=50%25')."' target='_blank'>" . esc_html__( "W3School", 'tm-dione' ) . "</a>",
						"dependency"  => array( "element" => "bg_type", "value" => array( "image", ) ),
						"group"       => $group_name,
					)
				);
				vc_add_param( 'vc_row', array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => esc_html__( "Custom Background Image Size", 'tm-dione' ),
						"param_name"  => "bg_cstm_size",
						"value"       => "",
						"description" => esc_html__( "You can use initial, inherit or any number with px, em, %, etc. Example- 100px 100px", 'tm-dione' ),
						"dependency"  => Array( "element" => "bg_image_size", "value" => array( "cstm" ) ),
						"group"       => $group_name,
					)
				);
				vc_add_param( 'vc_row', array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => esc_html__( "Scroll Effect", 'tm-dione' ),
						"param_name"  => "bg_img_attach",
						"value"       => array(
							__( "Move with the content", 'tm-dione' ) => "",
							__( "Fixed at its position", 'tm-dione' ) => "fixed",
						),
						"description" => esc_html__( "Options to set whether a background image is fixed or scroll with the rest of the page.", 'tm-dione' ),
						"dependency"  => array( "element" => "bg_type", "value" => array( "image", ) ),
						"group"       => $group_name,
					)
				);

				vc_add_param( 'vc_row', array(
						"type"        => "textfield",
						"class"       => "",
						"heading"     => esc_html__( "Background Image Posiiton", 'tm-dione' ),
						"param_name"  => "bg_image_position",
						"value"       => "",
						"description" => esc_html__( "You can use any number with px, em, %, etc. Example- 100px 100px.", 'tm-dione' ),
						"dependency"  => array( "element" => "bg_type", "value" => array( "image", ) ),
						"group"       => $group_name,
					)
				);

			}
		}

		function tab_effect() {
			$group_effects = esc_html__( 'Effect', 'tm-dione' );

			//Seperator
			vc_add_param(
				'vc_row',
				array(
					'type'             => 'switch',
					'heading'          => esc_html__( 'Enable Seperator ', 'tm-dione' ),
					'param_name'       => 'seperator_enable',
					'value'            => '',
					'options'          => array(
						'seperator_enable_value' => array(
							'on'  => esc_html__( 'Yes', 'tm-dione' ),
							'off' => esc_html__( 'No', 'tm-dione' )
						)
					),
					'edit_field_class' => 'uvc-divider last-uvc-divider vc_column vc_col-sm-12',
					'group'            => $group_effects,
				)
			);

			vc_add_param(
				'vc_row',
				array(
					'type'             => 'dropdown',
					'heading'          => esc_html__( 'Type', 'tm-dione' ),
					'param_name'       => 'seperator_type',
					'value'            => array(
						__( 'None', 'tm-dione' )               => '',
						__( 'Triangle', 'tm-dione' )           => 'triangle_svg_seperator',
						__( 'Big Triangle', 'tm-dione' )       => 'xlarge_triangle_seperator',
						__( 'Big Triangle Left', 'tm-dione' )  => 'xlarge_triangle_left_seperator',
						__( 'Big Triangle Right', 'tm-dione' ) => 'xlarge_triangle_right_seperator',
						__( 'Half Circle', 'tm-dione' )        => 'circle_svg_seperator',
						__( 'Curve Center', 'tm-dione' )       => 'xlarge_circle_seperator',
						__( 'Curve Left', 'tm-dione' )         => 'curve_up_seperator',
						__( 'Curve Right', 'tm-dione' )        => 'curve_down_seperator',
						__( 'Tilt Left', 'tm-dione' )          => 'tilt_left_seperator',
						__( 'Tilt Right', 'tm-dione' )         => 'tilt_right_seperator',
						__( 'Round Split', 'tm-dione' )        => 'round_split_seperator',
						__( 'Waves', 'tm-dione' )              => 'waves_seperator',
						__( 'Clouds', 'tm-dione' )             => 'clouds_seperator',
						__( 'Multi Triangle', 'tm-dione' )     => 'multi_triangle_seperator',
					),
					'group'            => $group_effects,
					'dependency'       => Array(
						'element' => 'seperator_enable',
						'value'   => array( 'seperator_enable_value' )
					),
					'edit_field_class' => 'uvc-divider-content-first vc_column vc_col-sm-12',
				)
			);

			vc_add_param(
				'vc_row',
				array(
					'type'             => 'dropdown',
					'heading'          => esc_html__( 'Position', 'tm-dione' ),
					'param_name'       => 'seperator_position',
					'value'            => array(
						__( 'Top', 'tm-dione' )          => '',
						__( 'Bottom', 'tm-dione' )       => 'bottom_seperator',
						__( 'Top & Bottom', 'tm-dione' ) => 'top_bottom_seperator'
					),
					'group'            => $group_effects,
					'dependency'       => Array(
						'element' => 'seperator_enable',
						'value'   => array( 'seperator_enable_value' )
					),
					'edit_field_class' => 'uvc-divider-content-first vc_column vc_col-sm-12',
				)
			);

			vc_add_param(
				'vc_row',
				array(
					'type'        => 'number',
					'heading'     => esc_html__( 'Height', 'tm-dione' ),
					'param_name'  => 'seperator_svg_height',
					'value'       => '',
					'suffix'      => 'px',
					'group'       => $group_effects,
					'dependency'  => Array(
						'element' => 'seperator_type',
						'value'   => array(
							'xlarge_triangle_seperator',
							'curve_up_seperator',
							'curve_down_seperator',
							'waves_seperator',
							'clouds_seperator',
							'xlarge_circle_seperator',
							'triangle_svg_seperator',
							'circle_svg_seperator',
							'xlarge_triangle_left_seperator',
							'xlarge_triangle_right_seperator',
							'tilt_left_seperator',
							'tilt_right_seperator',
							'multi_triangle_seperator'
						)
					),
					'description' => esc_html__( 'Default 60', 'tm-dione' )
				)
			);

			vc_add_param(
				'vc_row',
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Bottom', 'tm-dione' ),
					'param_name' => 'seperator_svg_bottom',
					'value'      => '',
					'group'      => $group_effects,
					'dependency'       => Array(
						'element' => 'seperator_enable',
						'value'   => array( 'seperator_enable_value' )
					),
				)
			);

			vc_add_param(
				'vc_row',
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Background', 'tm-dione' ),
					'param_name'  => 'seperator_shape_background',
					'value'       => '',
					'group'       => $group_effects,
					'dependency'  => Array(
						'element' => 'seperator_type',
						'value'   => array(
							'xlarge_triangle_seperator',
							'triangle_seperator',
							'circle_seperator',
							'curve_up_seperator',
							'curve_down_seperator',
							'round_split_seperator',
							'waves_seperator',
							'clouds_seperator',
							'xlarge_circle_seperator',
							'triangle_svg_seperator',
							'circle_svg_seperator',
							'xlarge_triangle_left_seperator',
							'xlarge_triangle_right_seperator',
							'tilt_left_seperator',
							'tilt_right_seperator',
							'multi_triangle_seperator'
						)
					),
					'description' => esc_html__( 'Mostly, this should be background color of your adjacent row section. (Default - White)', 'tm-dione' )
				)
			);

			// Overlay
			vc_add_param( 'vc_row', array(
				'type'             => 'switch',
				'heading'          => esc_html__( 'Enable Overlay', 'tm-dione' ),
				'param_name'       => 'enable_overlay',
				'value'            => '',
				'options'          => array(
					'enable_overlay_value' => array(
						'label' => '',
						'on'    => esc_html__( 'Yes', 'tm-dione' ),
						'off'   => esc_html__( 'No', 'tm-dione' )
					)
				),
				'edit_field_class' => 'uvc-divider last-uvc-divider vc_column vc_col-sm-12',
				'group'            => $group_effects,
			) );

			vc_add_param( 'vc_row', array(
				"type"       => "dropdown",
				"class"      => "",
				'group'      => $group_effects,
				"heading"    => "Style",
				"param_name" => "overlay_style",
				"value"      => array(
					"Choose"                 => "",
					"Primary Color"          => "stBg",
					"Second Color"           => "ndBg",
					"Primary Color Gradient" => "primary_gradient",
					"Custom Solid Color"     => "custom_solid_color",
					"Custom Gradient"        => "custom_gradient",
				),
				'dependency' => Array( 'element' => 'enable_overlay', 'value' => array( 'enable_overlay_value' ) ),
			) );

			vc_add_param( 'vc_row', array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__( 'Color', 'tm-dione' ),
				'param_name' => 'overlay_color',
				'value'      => '',
				'group'      => $group_effects,
				'dependency' => Array( 'element' => 'overlay_style', 'value' => array( 'custom_solid_color' ) ),
			) );

			vc_add_param( 'vc_row', array(
					"type"        => "gradient",
					"class"       => "",
					"heading"     => esc_html__( "Gradient Type", 'tm-dione' ),
					"param_name"  => "overlay_grad",
					"description" => esc_html__( 'At least two color points should be selected.', 'tm-dione' ),
					"dependency"  => array( "element" => "overlay_style", "value" => array( "custom_gradient" ) ),
					"group"       => $group_effects,
				)
			);

			vc_add_param( 'vc_row', array(
					"type"        => "attach_image",
					"class"       => "",
					"heading"     => esc_html__( "Pattern Image", "tm-dione" ),
					"param_name"  => "pattern_image",
					"value"       => "",
					"description" => esc_html__( "Upload or select pattern image from media gallery.", "tm-dione" ),
					'dependency'  => Array( 'element' => 'enable_overlay', 'value' => array( 'enable_overlay_value' ) ),
					"group"       => $group_effects,
				)
			);

			vc_add_param(
				'vc_row',
				array(
					'type'        => 'number',
					'heading'     => esc_html__( 'Opacity', 'tm-dione' ),
					'param_name'  => 'overlay_opacity',
					'value'       => '',
					'suffix'      => '%',
					'group'       => $group_effects,
					'dependency'  => Array( 'element' => 'enable_overlay', 'value' => array( 'enable_overlay_value' ) ),
					'description' => esc_html__( 'Default 80', 'tm-dione' )
				)
			);
		}

		function parallax_init() {
			$this->tab_background();
			$this->tab_effect();
		}
	}
}
new VC_Thememove_Parallax();
