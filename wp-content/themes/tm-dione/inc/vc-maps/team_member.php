<?php

class WPBakeryShortCode_Team_Member extends WPBakeryShortCode {
}

//Team_Member

$basename = "team_member";

$group_design = esc_html__( 'Design options', 'tm-dione' );

vc_map( array(
	"name"                      => "Team Member",
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
			"type"        => "dropdown",
			//'admin_label' => true,
			"class"       => "",
			"heading"     => "Style",
			"param_name"  => "style",
			"value"       => array(
				'' => '',
				'Style 01' => "style01",
				'Style 02' => "style02",
			),
			'save_always' => true,
		),
		array(
			"type"        => "textarea",
			"class"       => "",
			"heading"     => "Description",
			"param_name"  => "desc",
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
			"heading"     => "Link to",
			"param_name"  => "link",
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
			'heading'    => esc_html__( 'Enable show all content', 'tm-dione' ),
			'param_name' => 'show_all_enable',
			'value'      => '',
			'options'    => array(
				'show_all_enable_value' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
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
