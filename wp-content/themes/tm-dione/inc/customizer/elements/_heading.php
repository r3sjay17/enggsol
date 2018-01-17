<?php
Kirki::add_field( 'tm-dione', array(
	'type'      => 'color',
	'settings'   => $section . '_heading_color',
	'label'     => esc_html__( 'Color', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '#111',
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => $section . '_heading_1_typo',
	'label'     => esc_html__( 'Heading 1', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		'font-size'      => '48px',
		'font-weight'    => '300',
		'line-height'    => '1.2em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => 'h1',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => $section . '_heading_2_typo',
	'label'     => esc_html__( 'Heading 2', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		'font-size'      => '36px',
		'font-weight'    => '300',
		'line-height'    => '1.2em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => 'h2',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => $section . '_heading_3_typo',
	'label'     => esc_html__( 'Heading 3', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		'font-size'      => '24px',
		'font-weight'    => '400',
		'line-height'    => '1.2em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => 'h3',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => $section . '_heading_4_typo',
	'label'     => esc_html__( 'Heading 4', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		//'font-family'    => TM_DIONE_PRIMARY_FONT,
		'font-size'      => '18px',
		'font-weight'    => '400',
		'line-height'    => '1.4em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		//'font-family'    => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => 'h4',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => $section . '_heading_5_typo',
	'label'     => esc_html__( 'Heading 5', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		//'font-family'    => TM_DIONE_PRIMARY_FONT,
		'font-size'      => '14px',
		'font-weight'    => '500',
		'line-height'    => '1.4em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		//'font-family'    => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => 'h5',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => $section . '_heading_6_typo',
	'label'     => esc_html__( 'Heading 6', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-style'     => array( 'bold', 'italic' ),
		//'font-family'    => TM_DIONE_PRIMARY_FONT,
		'font-size'      => '12px',
		'font-weight'    => '500',
		'line-height'    => '1.4em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		//'font-family'    => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => 'h6',
		),
	),
) );
