<?php
$section = 'blog';
$priority = 1;

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Header Blog', 'tm-dione'), $section, $priority++) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'toggle',
	'settings'  => 'homepage_header_content_enable',
	'label'    => esc_html__( 'Header content enable', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
	'partial_refresh' => array(
		'homepage_header_content_enable' => array(
			'selector'        => '.header-blog-wrapper',
			'render_callback' => function () {
				get_template_part('template-parts/header_blog');
			},
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'toggle',
	'settings'  => 'homepage_header_icon_enable',
	'label'    => esc_html__( 'Header icon enable', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
	'transport'   => 'auto',
	'required' => array(
		array(
			'setting'  => 'homepage_header_content_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'partial_refresh' => array(
		'homepage_header_icon_enable' => array(
			'selector'        => '.header-blog-wrapper',
			'render_callback' => function () {
				get_template_part('template-parts/header_blog');
			},
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'toggle',
	'settings'  => 'homepage_header_desc_enable',
	'label'    => esc_html__( 'Header description enable', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
	'transport'   => 'auto',
	'required' => array(
		array(
			'setting'  => 'homepage_header_content_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'partial_refresh' => array(
		'homepage_header_desc_enable' => array(
			'selector'        => '.header-blog-wrapper',
			'render_callback' => function () {
				get_template_part('template-parts/header_blog');
			},
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'text',
	'settings'  => 'homepage_header_content_title',
	'label'    => esc_html__( 'Title', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Blog updates', 'tm-dione' ),
	'required' => array(
		array(
			'setting'  => 'homepage_header_content_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.header-blog-wrapper .blog-header-title',
			'function' => 'html',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'textarea',
	'settings'  => 'homepage_header_content_txt',
	'label'    => esc_html__( 'Description', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'transport' => 'postMessage',
	'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis mod tincidunt ut laoreet dolore mag na aliq uam erat volutpat.', 'tm-dione' ),
	'required' => array(
		array(
			'setting'  => 'homepage_header_content_enable',
			'operator' => '==',
			'value'    => 1,
		),
	),
	'js_vars'      => array(
		array(
			'element'  => '.header-blog-wrapper .blog-header-desc',
			'function' => 'html',
		),
	),
) );

Kirki::add_field( 'tm-dione', Insight_Helper::label( esc_html__( 'Single Blog', 'tm-dione'), $section, $priority++) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'toggle',
	'settings'  => 'blog_hide_author',
	'label'    => esc_html__( 'Hide author information in Blog page', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'blog_title_color',
	'label'       => esc_html__( 'Title color', 'tm-dione' ),
	'description' => esc_html__( 'Choose color for title text', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#111',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '.blog-big-title h2',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'number',
	'settings'   => 'blog_title_height',
	'label'     => esc_html__( 'Blog Title Height', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '400',
	'transport'   => 'auto',
	'output'    => array(
		array(
			'element'  => '.blog-big-title',
			'property' => 'height',
			'units'    => 'px',
			'function' => 'css',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'toggle',
	'settings'  => 'homepage_list_boxed_enable',
	'label'    => esc_html__( 'List boxed enable', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'toggle',
	'settings'  => 'post_hide_author',
	'label'    => esc_html__( 'Hide author information in Single post', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

Kirki::add_field( 'tm-dione', array(
	'type'      => 'color',
	'settings'   => 'blog_title_bg_color',
	'label'     => esc_html__( 'Background color', 'tm-dione' ),
	'help'      => esc_html__( 'Setup background color for blog title', 'tm-dione' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '.blog-big-title',
			'property' => 'background-color',
			'function' => 'css',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'     => 'image',
	'settings'  => 'blog_title_bg_image',
	'label'    => esc_html__( 'Background image', 'tm-dione' ),
	'help'     => esc_html__( 'Default background image for your blog title', 'tm-dione' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.blog-big-title',
			'property' => 'background-image',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'typography',
	'settings'    => 'blog_title_font',
	'description' => esc_html__( 'Set up font settings for blog title', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'font-family'    => TM_DIONE_PRIMARY_FONT,
		'font-size'      => '36px',
		'font-weight'    => '300',
		'line-height'    => '1em',
		'letter-spacing' => '0.05em',
	),
	'choices'     => array(
		'font-style'     => true,
		'font-family'    => true,
		'font-size'      => true,
		'font-weight'    => true,
		'line-height'    => true,
		'letter-spacing' => true,
	),
	'output'      => array(
		array(
			'element' => '.blog-big-title h2',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'select',
	'settings'     => 'homepage_layout',
	'description' => esc_html__( 'Homepage layout', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'content-sidebar',
	'choices'     => array(
		'content-sidebar' => esc_html__( 'Content - Sidebar', 'tm-dione' ),
		'sidebar-content' => esc_html__( 'Sidebar - Content', 'tm-dione' ),
		'content'         => esc_html__( 'Content', 'tm-dione' ),
	),
) );

Kirki::add_field('tm-dione', array(
    'type' => 'preset',
    'settings' => 'blog_preset',
    'label' => 'Blog Preset',
    'description' => esc_html__('Choose a blog preset you want', 'tm-dione'),
    'section' => $section,
    'default' => '1',
    'priority' => $priority++,
    'multiple' => 3,
    'choices' => array(
			'1' => array(
			  'label' => esc_html__('Preset Default', 'tm-dione'),
			  'settings' => array(
			  ),
	  		),
         '2' => array(
            'label' => esc_html__('Blog Full-width', 'tm-dione'),
            'settings' => array(
					'homepage_header_content_title' => 'Life isn\'t a matter of milestones but of moments.',
					'homepage_list_boxed_enable' => 0,
					'homepage_header_icon_enable' => 0,
					'homepage_header_desc_enable' => 0,
					'blog_title_height' => '600',
					'blog_title_color' => '#fff',
					'blog_title_bg_image' => get_template_directory_uri().'/assets/images/header-home-full-width.jpg',
					'blog_title_font' => array(
						'font-size'      => '60px',
						'font-weight'    => '700',
						'line-height'    => '1.2em',
						'letter-spacing' => '0.03em',
					),
            ),
        ),
    ),
));
