<?php

class WPBakeryShortCode_Thememove_Gmaps extends WPBakeryShortCode {
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsScripts();
	}

	public function jsScripts() {
		wp_enqueue_script( 'thememove-js-maps', '//maps.google.com/maps/api/js?key=AIzaSyAaYLhJA_5UU2UMd7y2rNL82wEbs10vLww&sensor=false&amp;language=en' );
		wp_enqueue_script( 'thememove-js-gmap3', TM_DIONE_THEME_ROOT . '/assets/libs/gmap3/gmap3.min.js' );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Google Maps', 'tm-dione' ),
	'base'     => 'thememove_gmaps',
	'category' => sprintf( esc_html__('by %s', 'tm-dione' ), TM_DIONE_PARENT_THEME_NAME ),
	'description' => esc_html__('Map block', 'tm-dione'),
	'icon' => 'tm-shortcode-ico map-icon',
	'params'   => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Address or Coordinate', 'tm-dione' ),
			'admin_label' => true,
			'param_name'  => 'address',
			'value'       => '48.8566140,2.1000000',
			'description' => esc_html__( 'Enter address or coordinate.', 'tm-dione' ),
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Marker icon', 'tm-dione' ),
			'param_name'  => 'marker_icon',
			'description' => esc_html__( 'Choose a image for marker address', 'tm-dione' ),
		),
		array(
			'type'        => 'textarea_html',
			'heading'     => esc_html__( 'Marker Information', 'tm-dione' ),
			'param_name'  => 'content',
			'description' => esc_html__( 'Content for info window', 'tm-dione' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Height', 'tm-dione' ),
			'param_name'  => 'map_height',
			'value'       => '480',
			'description' => esc_html__( 'Enter map height (in pixels or percentage)', 'tm-dione' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Width', 'tm-dione' ),
			'param_name'  => 'map_width',
			'value'       => '100%',
			'description' => esc_html__( 'Enter map width (in pixels or percentage)', 'tm-dione' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Zoom level', 'tm-dione' ),
			'param_name'  => 'zoom',
			'value'       => '14',
			'description' => esc_html__( 'Map zoom level', 'tm-dione' ),
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Enable Map zoom', 'tm-dione' ),
			'param_name' => 'zoom_enable',
			'value'      => array(
				__( 'Enable', 'tm-dione' ) => 'enable'
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Map type', 'tm-dione' ),
			'admin_label' => true,
			'param_name'  => 'map_type',
			'description' => esc_html__( 'Choose a map type', 'tm-dione' ),
			'value'       => array(
				__( 'Roadmap', 'tm-dione' )   => 'roadmap',
				__( 'Satellite', 'tm-dione' ) => 'satellite',
				__( 'Hybrid', 'tm-dione' )    => 'hybrid',
				__( 'Terrain', 'tm-dione' )   => 'terrain',
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Map style', 'tm-dione' ),
			'admin_label' => true,
			'param_name'  => 'map_style',
			'description' => esc_html__( 'Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules', 'tm-dione' ),
			'value'       => array(
				__( 'Default', 'tm-dione' )          => 'default',
				__( 'Grayscale', 'tm-dione' )        => 'style1',
				__( 'Subtle Grayscale', 'tm-dione' ) => 'style2',
				__( 'Apple Maps-esque', 'tm-dione' ) => 'style3',
				__( 'Pale Dawn', 'tm-dione' )        => 'style4',
				__( 'Muted Blue', 'tm-dione' )       => 'style5',
				__( 'Paper', 'tm-dione' )            => 'style6',
				__( 'Light Dream', 'tm-dione' )      => 'style7',
				__( 'Retro', 'tm-dione' )            => 'style8',
				__( 'Avocado World', 'tm-dione' )    => 'style9',
				__( 'Facebook', 'tm-dione' )         => 'style10',
				__( 'Shades of Grey', 'tm-dione' )   => 'style11',
				__( 'Custom', 'tm-dione' )           => 'custom'
			)
		),
		array(
			'type'       => 'textarea_raw_html',
			'heading'    => esc_html__( 'Map style snippet', 'tm-dione' ),
			'param_name' => 'map_style_snippet',
			'dependency' => array(
				'element' => 'map_style',
				'value'   => 'custom',
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-dione' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you want to use multiple Google Maps in one page, please add a class name for them.', 'tm-dione' ),
		),
	)
) );
