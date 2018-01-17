<?php
class WPBakeryShortCode_Thememove_Services extends WPBakeryShortCode {
}
vc_map( array(
	'name'     => esc_html( esc_html__( 'TM Services', 'tm-dione' ) ),
	'base'     => 'thememove_services',
	'category' => esc_html( sprintf( esc_html__( 'by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ) ),
	'icon' => 'tm-shortcode-ico services-icon',
	'params'   => array(
		array(
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Services', 'tm-dione' ),
			'param_name' => 'services',
			'params'     => array(
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Photo', 'tm-dione' ),
					'param_name'  => 'photo',
					'admin_label' => true,
					'description' => esc_html__( 'History photo', 'tm-dione' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'tm-dione' ),
					'param_name'  => 'title',
					'value'       => '',
					'description' => esc_html__( 'Enter title.', 'tm-dione' ),
					'admin_label' => true,
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Content', 'tm-dione' ),
					'param_name'  => 'content',
					'value'       => '',
					'description' => esc_html__( 'Enter content.', 'tm-dione' ),
					'admin_label' => false,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Read more text', 'tm-dione' ),
					'param_name'  => 'rm_text',
					'value'       => 'Read more',
					'admin_label' => false,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Read more link', 'tm-dione' ),
					'param_name'  => 'rm_link',
					'value'       => '',
					'admin_label' => false,
				)
			),
		),
		array(
			"type"       => "checkbox",
			'heading'     => esc_html__( 'Auto play', 'tm-dione' ),
			"param_name" => "autoplay",
			"value"      => array( 'Enable' => "enable" ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html( esc_html__( 'Extra class name', 'tm-dione' ) ),
			'param_name'  => 'el_class',
			'description' => esc_html( esc_html__( 'If you want to use multiple Google Maps in one page, please add a class name for them.', 'tm-dione' ) ),
		)
	),
) );
