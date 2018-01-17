<?php
vc_remove_param( "vc_tta_section", "i_position" );
vc_remove_param( "vc_tta_section", "add_icon" );

vc_remove_param( "vc_tta_section", "i_type" );
vc_remove_param( "vc_tta_section", "i_icon_fontawesome" );
vc_remove_param( "vc_tta_section", "i_icon_openiconic" );
vc_remove_param( "vc_tta_section", "i_icon_typicons" );
vc_remove_param( "vc_tta_section", "i_icon_entypo" );
vc_remove_param( "vc_tta_section", "i_icon_linecons" );

$group_design = esc_html__( 'Design options', 'tm-dione' );


vc_add_params( "vc_tta_section", array(
		array(
			'type'       => 'switch',
			'heading'    => esc_html__( 'Use icon', 'tm-dione' ),
			'param_name' => 'use_icon',
			'value'      => '',
			'options'    => array(
				'enable_use_icon' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-dione' ),
					'off'   => esc_html__( 'No', 'tm-dione' )
				)
			),
		),
		// Icons
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Icon library', 'tm-dione' ),
			'value'       => array(
				esc_html__( 'Choose library', 'tm-dione' ) => '',
				esc_html__( 'Font Awesome', 'tm-dione' )   => 'fontawesome',
				esc_html__( 'Open Iconic', 'tm-dione' )    => 'openiconic',
				esc_html__( 'Typicons', 'tm-dione' )       => 'typicons',
				esc_html__( 'Entypo', 'tm-dione' )         => 'entypo',
				esc_html__( 'Linecons', 'tm-dione' )       => 'linecons',
				esc_html__( 'P7 Stroke', 'tm-dione' )      => 'pe7stroke',
			),
			'admin_label' => true,
			'param_name'  => 'icon_type',
			'description' => esc_html__( 'Select icon library.', 'tm-dione' ),
			"dependency"  => Array( 'element' => "use_icon", 'value' => array( 'enable_use_icon' ) )
		),
		$fontawesome,
		$openiconic,
		$typicons,
		$entypo,
		$linecons,
		$pe7stroke,
	)
);

vc_add_param( "vc_tta_section", array(
	'type'        => 'switch',
	'heading'     => esc_html__( 'Active section', 'tm-dione' ),
	'param_name'  => 'active_section',
	'value'       => '',
	'options'     => array(
		'enable_active_section' => array(
			'label' => '',
			'on'    => esc_html__( 'Yes', 'tm-dione' ),
			'off'   => esc_html__( 'No', 'tm-dione' )
		)
	),
	'description' => 'Active this section',
) );

vc_add_param( "vc_tta_section", array(
	'type'       => 'css_editor',
	'heading'    => esc_html__( 'Css', 'tm-dione' ),
	'param_name' => 'css',
	'group'      => $group_design,
) );

vc_map_update('vc_tta_section', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico accordion-icon',
));
