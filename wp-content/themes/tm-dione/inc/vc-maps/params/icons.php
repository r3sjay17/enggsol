<?php
$fontawesome = array(
	'type'        => 'iconpicker',
	'heading'     => esc_html__( 'Icon', 'tm-dione' ),
	'param_name'  => 'icon_fontawesome',
	'value'       => 'fa fa-adjust', // default value to backend editor admin_label
	'settings'    => array(
		'emptyIcon'    => false,
		// default true, display an "EMPTY" icon?
		'iconsPerPage' => 4000,
		// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
	),
	'dependency'  => array(
		'element' => 'icon_type',
		'value'   => 'fontawesome',
	),
	'description' => esc_html__( 'Select icon from library.', 'tm-dione' ),
);
$openiconic  = array(
	'type'        => 'iconpicker',
	'heading'     => esc_html__( 'Icon', 'tm-dione' ),
	'param_name'  => 'icon_openiconic',
	'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
	'settings'    => array(
		'emptyIcon'    => false, // default true, display an "EMPTY" icon?
		'type'         => 'openiconic',
		'iconsPerPage' => 4000, // default 100, how many icons per/page to display
	),
	'dependency'  => array(
		'element' => 'icon_type',
		'value'   => 'openiconic',
	),
	'description' => esc_html__( 'Select icon from library.', 'tm-dione' ),
);
$typicons    = array(
	'type'        => 'iconpicker',
	'heading'     => esc_html__( 'Icon', 'tm-dione' ),
	'param_name'  => 'icon_typicons',
	'value'       => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
	'settings'    => array(
		'emptyIcon'    => false, // default true, display an "EMPTY" icon?
		'type'         => 'typicons',
		'iconsPerPage' => 4000, // default 100, how many icons per/page to display
	),
	'dependency'  => array(
		'element' => 'icon_type',
		'value'   => 'typicons',
	),
	'description' => esc_html__( 'Select icon from library.', 'tm-dione' ),
);
$entypo    = array(
	'type'       => 'iconpicker',
	'heading'    => esc_html__( 'Icon', 'tm-dione' ),
	'param_name' => 'icon_entypo',
	'value'      => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
	'settings'   => array(
		'emptyIcon'    => false, // default true, display an "EMPTY" icon?
		'type'         => 'entypo',
		'iconsPerPage' => 4000, // default 100, how many icons per/page to display
	),
	'dependency' => array(
		'element' => 'icon_type',
		'value'   => 'entypo',
	),
);
$linecons  = array(
	'type'        => 'iconpicker',
	'heading'     => esc_html__( 'Icon', 'tm-dione' ),
	'param_name'  => 'icon_linecons',
	'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
	'settings'    => array(
		'emptyIcon'    => false, // default true, display an "EMPTY" icon?
		'type'         => 'linecons',
		'iconsPerPage' => 4000, // default 100, how many icons per/page to display
	),
	'dependency'  => array(
		'element' => 'icon_type',
		'value'   => 'linecons',
	),
	'description' => esc_html__( 'Select icon from library.', 'tm-dione' ),
);
$pe7stroke = array(
	'type'        => 'iconpicker',
	'heading'     => esc_html__( 'Icon', 'tm-dione' ),
	'param_name'  => 'icon_pe7stroke',
	'value'       => 'pe-7s-album',
	'settings'    => array(
		'emptyIcon'    => false,
		'type'         => 'pe7stroke',
		'iconsPerPage' => 400,
	),
	'dependency'  => array(
		'element' => 'icon_type',
		'value'   => 'pe7stroke',
	),
	'description' => esc_html__( 'Select icon from library.', 'tm-dione' ),
);