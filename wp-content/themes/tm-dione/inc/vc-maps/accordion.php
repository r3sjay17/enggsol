<?php
vc_remove_element( "vc_tta_section" );


$parent_tag = vc_post_param( 'parent_tag', '' );
$include_icon_params = ( 'vc_tta_pageable' !== $parent_tag );

if ( $include_icon_params ) {
	$icon_params = array(
		array(
			'type' => 'checkbox',
			'param_name' => 'add_icon',
			'heading' => esc_html__( 'Add icon?', 'tm-dione' ),
			'description' => esc_html__( 'Add icon next to section title.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'i_position',
			'value' => array(
				__( 'Before title', 'tm-dione' ) => 'left',
				__( 'After title', 'tm-dione' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
			'heading' => esc_html__( 'Icon position', 'tm-dione' ),
			'description' => esc_html__( 'Select icon position.', 'tm-dione' ),
		),
	);

	$icon_params = array_merge( $icon_params, (array) vc_map_integrate_shortcode( 'vc_icon', 'i_', '',
		array(
			// we need only type, icon_fontawesome, icon_.., NOT color and etc
			'include_only_regex' => '/^(type|icon_\w*)/',
		), array(
			'element' => 'add_icon',
			'value' => 'true',
		)
	) );
} else {
	$icon_params = array();
}

$params = array_merge(
	array(
		array(
			'type' => 'textfield',
			'param_name' => 'title',
			'heading' => esc_html__( 'Title', 'tm-dione' ),
			'description' => esc_html__( 'Enter section title (Note: you can leave it empty).', 'tm-dione' ),
		),
		array(
			'type' => 'el_id',
			'param_name' => 'tab_id',
			'settings' => array(
				'auto_generate' => true,
			),
			'heading' => esc_html__( 'Section ID', 'tm-dione' ),
			'description' => esc_html__( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'tm-dione' ),
		),
	),
	$icon_params,
	array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tm-dione' ),
		),
	)
);

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

vc_map( array(
	'name' => esc_html__( 'TM section', 'tm-dione' ),
	'base' => 'vc_tta_section',
	'icon' => 'icon-wpb-ui-tta-section',
	'allowed_container_element' => 'vc_row',
	'is_container' => true,
	'show_settings_on_create' => false,
	'as_child' => array(
		'only' => 'vc_tta_accordion',
	),
	'category' => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	'description' => esc_html__( 'Section for Tabs, Tours, Accordions.', 'tm-dione' ),
	'params' => $params,
	'js_view' => 'VcBackendTtaSectionView',
	'custom_markup' => '
		<div class="vc_tta-panel-heading">
		    <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left"><a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">{{ section_title }}</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
		</div>
		<div class="vc_tta-panel-body">
			{{ editor_controls }}
			<div class="{{ container-class }}">
			{{ content }}
			</div>
		</div>',
	'default_content' => '',
) );

vc_map( array(
	'name' => esc_html__( 'TM Accordion', 'tm-dione' ),
	'base' => 'vc_tta_accordion',
	'icon' => 'icon-wpb-ui-accordion',
	'is_container' => true,
	'show_settings_on_create' => false,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	'category' => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	'description' => esc_html__( 'Collapsible content panels', 'tm-dione' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'param_name' => 'title',
			'heading' => esc_html__( 'Widget title', 'tm-dione' ),
			'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				__( 'Classic', 'tm-dione' ) => 'classic',
				__( 'Modern', 'tm-dione' ) => 'modern',
				__( 'Flat', 'tm-dione' ) => 'flat',
				__( 'Outline', 'tm-dione' ) => 'outline',
			),
			'heading' => esc_html__( 'Style', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion display style.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'shape',
			'value' => array(
				__( 'Rounded', 'tm-dione' ) => 'rounded',
				__( 'Square', 'tm-dione' ) => 'square',
				__( 'Round', 'tm-dione' ) => 'round',
			),
			'heading' => esc_html__( 'Shape', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion shape.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'color',
			'value' => getVcShared( 'colors-dashed' ),
			'std' => 'grey',
			'heading' => esc_html__( 'Color', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion color.', 'tm-dione' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'no_fill',
			'heading' => esc_html__( 'Do not fill content area?', 'tm-dione' ),
			'description' => esc_html__( 'Do not fill content area with color.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'spacing',
			'value' => array(
				__( 'None', 'tm-dione' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => esc_html__( 'Spacing', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion spacing.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'gap',
			'value' => array(
				__( 'None', 'tm-dione' ) => '',
				'1px' => '1',
				'2px' => '2',
				'3px' => '3',
				'4px' => '4',
				'5px' => '5',
				'10px' => '10',
				'15px' => '15',
				'20px' => '20',
				'25px' => '25',
				'30px' => '30',
				'35px' => '35',
			),
			'heading' => esc_html__( 'Gap', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion gap.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'c_align',
			'value' => array(
				__( 'Left', 'tm-dione' ) => 'left',
				__( 'Right', 'tm-dione' ) => 'right',
				__( 'Center', 'tm-dione' ) => 'center',
			),
			'heading' => esc_html__( 'Alignment', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion section title alignment.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'autoplay',
			'value' => array(
				__( 'None', 'tm-dione' ) => 'none',
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'10' => '10',
				'20' => '20',
				'30' => '30',
				'40' => '40',
				'50' => '50',
				'60' => '60',
			),
			'std' => 'none',
			'heading' => esc_html__( 'Autoplay', 'tm-dione' ),
			'description' => esc_html__( 'Select auto rotate for accordion in seconds (Note: disabled by default).', 'tm-dione' ),
		),
		array(
			'type' => 'checkbox',
			'param_name' => 'collapsible_all',
			'heading' => esc_html__( 'Allow collapse all?', 'tm-dione' ),
			'description' => esc_html__( 'Allow collapse all accordion sections.', 'tm-dione' ),
		),
		// Control Icons
		array(
			'type' => 'dropdown',
			'param_name' => 'c_icon',
			'value' => array(
				__( 'None', 'tm-dione' ) => '',
				__( 'Chevron', 'tm-dione' ) => 'chevron',
				__( 'Plus', 'tm-dione' ) => 'plus',
				__( 'Triangle', 'tm-dione' ) => 'triangle',
			),
			'std' => 'plus',
			'heading' => esc_html__( 'Icon', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion navigation icon.', 'tm-dione' ),
		),
		array(
			'type' => 'dropdown',
			'param_name' => 'c_position',
			'value' => array(
				__( 'Left', 'tm-dione' ) => 'left',
				__( 'Right', 'tm-dione' ) => 'right',
			),
			'dependency' => array(
				'element' => 'c_icon',
				'not_empty' => true,
			),
			'heading' => esc_html__( 'Position', 'tm-dione' ),
			'description' => esc_html__( 'Select accordion navigation icon position.', 'tm-dione' ),
		),
		// Control Icons END
		array(
			'type' => 'textfield',
			'param_name' => 'active_section',
			'heading' => esc_html__( 'Active section', 'tm-dione' ),
			'value' => 1,
			'description' => esc_html__( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'tm-dione' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'tm-dione' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'tm-dione' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'tm-dione' ),
		),
	),
	'js_view' => 'VcBackendTtaAccordionView',
	'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapseAll">
	<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
	   <div class="vc_tta-panels vc_clearfix {{container-class}}">
	      {{ content }}
	      <div class="vc_tta-panel vc_tta-section-append">
	         <div class="vc_tta-panel-heading">
	            <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
	               <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
	                   <span class="vc_tta-title-text">' . esc_html__( 'Add Section', 'tm-dione' ) . '</span>
	                    <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
					</a>
	            </h4>
	         </div>
	      </div>
	   </div>
	</div>
</div>',
	'default_content' => '[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Section', 'tm-dione' ), 1 ) . '"][/vc_tta_section][vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Section', 'tm-dione' ), 2 ) . '"][/vc_tta_section]',
) );


vc_map_update('vc_tta_accordion', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico accordion-icon',
));
vc_map_update('vc_tta_section', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico accordion-icon',
));
