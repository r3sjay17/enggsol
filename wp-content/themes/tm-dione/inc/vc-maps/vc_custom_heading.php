<?php

vc_add_params( 'vc_custom_heading', array(
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Font Weight', 'tm-dione' ),
		'param_name' => 'tm_font_weight',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Text Transform', 'tm-dione' ),
		'param_name' => 'tm_text_transform',
		'value'      => array(
			__( 'None', 'tm-dione' )       => 'none',
			__( 'Capitalize', 'tm-dione' ) => 'capitalize',
			__( 'Uppercase', 'tm-dione' )  => 'uppercase',
			__( 'Lowercase', 'tm-dione' )  => 'lowercase',
			__( 'Initial', 'tm-dione' )    => 'initial',
			__( 'Inherit', 'tm-dione' )    => 'inherit',
		),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Letter Spacing', 'tm-dione' ),
		'param_name' => 'tm_letter_spacing',
	),
) );
vc_map_update('vc_custom_heading', array(
    'category' => sprintf(__('by %s', 'tm-dione'), TM_DIONE_PARENT_THEME_NAME),
    'icon' => 'tm-shortcode-ico typography-icon',
));
