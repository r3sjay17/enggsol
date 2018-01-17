<?php
// Remove params
vc_remove_param( "vc_tta_accordion", "title" );
vc_remove_param( "vc_tta_accordion", "style" );
vc_remove_param( "vc_tta_accordion", "shape" );
vc_remove_param( "vc_tta_accordion", "color" );
vc_remove_param( "vc_tta_accordion", "no_fill" );
vc_remove_param( "vc_tta_accordion", "spacing" );
vc_remove_param( "vc_tta_accordion", "gap" );
vc_remove_param( "vc_tta_accordion", "c_align" );

vc_remove_param( "vc_tta_accordion", "autoplay" );
vc_remove_param( "vc_tta_accordion", "c_icon" );
vc_remove_param( "vc_tta_accordion", "c_position" );
vc_remove_param( "vc_tta_accordion", "active_section" );
vc_remove_param( "vc_tta_accordion", "collapsible_all" );
//vc_remove_param( "vc_tta_accordion", "el_class" );
//vc_remove_param( "vc_tta_accordion", "css_editor" );

$group_design = esc_html__( 'Design options', 'tm-dione' );


vc_add_param( "vc_tta_accordion", array(
	'type'       => 'switch',
	'heading'    => esc_html__( 'Allow collapse all?', 'tm-dione' ),
	'param_name' => 'collapsible_all',
	'value'      => '',
	'options'    => array(
		'enable_collapsible_all_value' => array(
			'label' => '',
			'on'    => esc_html__( 'Yes', 'tm-dione' ),
			'off'   => esc_html__( 'No', 'tm-dione' )
		)
	),
	'description' => 'Allow collapse all accordion sections.',
) );

vc_add_param( "vc_tta_accordion", array(
	'type'        => 'textfield',
	'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
	'param_name'  => 'el_class',
	'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'tm-dione' ),
) );

vc_map_update('vc_tta_accordion', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico toggles-icon',
));
