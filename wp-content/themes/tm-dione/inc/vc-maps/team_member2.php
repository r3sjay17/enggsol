<?php

class WPBakeryShortCode_Team_Member2 extends WPBakeryShortCode {
}

//Team_Member

$basename = "team_member2";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Team Member 2",
	"base"                      => $basename,
	"category"                  => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	"icon"                      => "tm-shortcode-ico member-icon",
	"allowed_container_element" => 'vc_row',
	"params"                    => array(

		array(
			"type"        => "textfield",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Name",
			"param_name"  => "name",
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Position",
			"param_name"  => "position",
		),
		array(
			"type"        => "textarea_html",
			'admin_label' => true,
			"class"       => "",
			"heading"     => "Description",
			"param_name"  => "content",
			"value"       => "<p>" . esc_html( "About me", 'tm-dione' ) . "</p>",
			"description" => ""
		),
		array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => 'Description Background Color',
            'param_name' => 'desc_background_color',
            'description' => '',
        ),
		array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Image",
			"param_name" => "image",
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Facebook",
			"param_name"  => "facebook",
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Twiter",
			"param_name"  => "twiter",
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Google plus",
			"param_name"  => "google_plus",
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Disable Social Icon', 'tm-dione' ),
			'param_name' => 'disable_social_icon',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => "Target",
			"param_name"  => "target",
			"value"       => array(
				"Self"    => "_self",
				"New tab" => "_blank"
			),
		),
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Enable reverse style', 'tm-dione' ),
			'param_name' => 'reverse_enable',
			'value'      => '',
			'options'    => array(
				'reverse_enable_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),

		array(
			"type"        => "textarea",
			"class"       => "",
			"heading"     => "Twitter text",
			"param_name"  => "twitter_text",
		),

		array(
			"type"        => "textarea",
			"class"       => "",
			"heading"     => "Facebook text",
			"param_name"  => "fb_text",
		),

		array(
			"type"       => "attach_image",
			"class"      => "",
			"heading"    => "Instagram Image",
			"param_name" => "instagram_image",
		),

		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => "Custon class",
			"param_name"  => "el_class",
		),

		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-dione' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	)
) );
