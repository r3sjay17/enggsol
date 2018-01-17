<?php
Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'body_color',
	'label'       => esc_html__( 'Text color', 'tm-dione' ),
	'description' => esc_html__( 'Choose color for body text', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#999',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => 'body, p',
			'property' => 'color',
		),
	),
) );


Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'stColor',
	'label'       => esc_html__( 'First Main Color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#0076A3',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'.stColor',
				'.accordion .panel-title .collapsed .accordion-icon',
			)),
			'property' => 'color',
		),
		array(
			'element' => '.stSvgFill svg rect',
			'property' => 'fill',
		),
		array(
			'element' => implode(',', array(
				'.accordion .panel-title a',
				'.btn-bg-primary-color',
			)),
			'property' => 'border-color',
		),
		array(
			'element' => implode(',', array(
				'.stBg, .drop-caps.style-02:first-letter',
				'.accordion .panel-title a',
				'.btn-bg-primary-color',
				'.packages-pricing-table .pricing-table.style03 .pricing-table-price',
				'.tabs-container.vertical .nav-tabs li:hover a, .tabs-container.vertical .nav-tabs li:active a, .tabs-container.vertical .nav-tabs li.active a',
				'.text-block_bg-secondary-color',
				'.page-big-title',
			)),
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( 'tm-dione', array(
	'type'        => 'color',
	'settings'     => 'ndColor',
	'label'       => esc_html__( 'Second Main Color', 'tm-dione' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#00AEEF',
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => implode(',', array(
				'.ndColor',
				'.drop-caps.style-05:first-letter',
				'.folio-main-filter a.active',
				'.text-link',
				'.countdown',
				'.counter-number',
				'.tabs-container.style-02 .nav-tabs li:hover a, .tabs-container.style-02 .nav-tabs li:active a, .tabs-container.style-02 .nav-tabs li.active a',
				'.our-team_item-content a h5',
				'.our-team_item-content .social-link a:hover',
				'.quote-item .author span',
				'.site-footer *[class*="social-menu"] a:hover',
				'.site-footer a:hover',
				'.menu-sidemenu .sidemenu-widgets .widget.better-menu-widget:first-child .menu li a:hover',
				'.menu-sidemenu .sidemenu-widgets .widget > [class*="social"] ul li a:hover',
				'.latest-blog.no-image .blog-title a:hover',
				'#site-navigation .sub-menu li a:hover, #site-navigation .children li a:hover',
				'#site-navigation .sub-menu li:hover, #site-navigation .children li:hover',
				'#site-navigation .sub-menu li.current-menu-item > a',
				'.header-left-side li.menu-item.current-menu-item > a, .header-left-side li.menu-item.current_page_item > a',
				'.sidebar .widget a:hover',
				'.amount',
				'.star-rating:before',
				'.woocommerce.single #content .product-tab .comment-form-rating .stars a:hover:before',
				'.list-blog-wrapper .blog-entry .post-quote .source-name a',
				'.woo-content-product a:hover',
			)),
			'property' => 'color',
		),
		array(
			'element' => '.ndSvgFill svg rect',
			'property' => 'fill',
		),
		array(
			'element' => implode(',', array(
				'.ndBg',
				'.drop-caps.style-03:first-letter',
				'.btn-bg-secondary-color',
				'.packages-pricing-table .pricing-table.style04 .pricing-table-price',
				'.highlight-text.ht-style-1',
				'.btn-border-black:hover',
				'.our-team_item-content .social-link a:hover',
				'.mini-cart_button:after',
				'.awesome-slider .slick-prev:hover, .awesome-slider .slick-next:hover',
				'.social-link a:hover',
			)),
			'property' => 'background-color',
		),
		array(
			'element' => implode(',', array(
				'.btn-bg-secondary-color',
				'.block-quote_style1',
				'.btn-border-black:hover',
				'.social-link a:hover',
				'.widget_tag_cloud a:hover, .widget_tag_cloud a:focus',
			)),
			'property' => 'border-color',
		),
		array(
			'element' => implode(',', array(
				'.tabs-container .nav-tabs li:hover a',
				'.tabs-container .nav-tabs li:active a',
				'.tabs-container .nav-tabs li.active a',
			)),
			'property' => 'box-shadow',
			'value_pattern' => '0px 2px 0px 0 $ inset',
		),
	),
) );
