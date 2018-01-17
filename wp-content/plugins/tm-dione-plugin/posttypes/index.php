<?php

add_action('init', 'create_post_type',0);

/* Create Portfolio, Testimonial, Slider and Carousel post type */
if (!function_exists('create_post_type')) {
	function create_post_type() {
		$slug = 'portfolio';
		register_post_type( 'portfolio',
			array(
				'labels' => array(
					'name' => __( 'Portfolio','tm-dione' ),
					'singular_name' => __( 'Portfolio Item','tm-dione' ),
					'add_item' => __('New Portfolio Item','tm-dione'),
					'add_new_item' => __('Add New Portfolio Item','tm-dione'),
					'edit_item' => __('Edit Portfolio Item','tm-dione')
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => $slug),
				'menu_position' => 4,
				'show_ui' => true,
				'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments')
			)
		);

		register_post_type('testimonials',
			array(
				'labels' 		=> array(
					'name' 				=> __('Testimonials','tm-dione' ),
					'singular_name' 	=> __('Testimonial','tm-dione' ),
					'add_item'			=> __('New Testimonial','tm-dione'),
					'add_new_item' 		=> __('Add New Testimonial','tm-dione'),
					'edit_item' 		=> __('Edit Testimonial','tm-dione')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true,
				'rewrite' 		=> 	array('slug' => 'testimonials'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false,
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'thumbnail')
			)
		);

//		register_post_type('slides',
//			array(
//				'labels' 		=> array(
//					'name' 				=> __('tm-dione Slider','tm-dione' ),
//					'menu_name'	=> __('tm-dione Slider','tm-dione' ),
//					'all_items'	=> __('Slides','tm-dione' ),
//					'add_new' =>  __('Add New Slide','tm-dione'),
//					'singular_name' 	=> __('Slide','tm-dione' ),
//					'add_item'			=> __('New Slide','tm-dione'),
//					'add_new_item' 		=> __('Add New Slide','tm-dione'),
//					'edit_item' 		=> __('Edit Slide','tm-dione')
//				),
//				'public'		=>	false,
//				'show_in_menu'	=>	true,
//				'rewrite' 		=> 	array('slug' => 'slides'),
//				'menu_position' => 	4,
//				'show_ui'		=>	true,
//				'has_archive'	=>	false,
//				'hierarchical'	=>	false,
//				'supports'		=>	array('title', 'page-attributes'),
//				'menu_icon'  =>  tm-dione_ROOT.'/img/favicon.ico'
//			)
//		);

//		register_post_type('carousels',
//			array(
//				'labels'    => array(
//					'name'        => __('tm-dione Carousel','tm-dione' ),
//					'menu_name' => __('tm-dione Carousel','tm-dione' ),
//					'all_items' => __('Carousel Items','tm-dione' ),
//					'add_new' =>  __('Add New Carousel Item','tm-dione'),
//					'singular_name'   => __('Carousel Item','tm-dione' ),
//					'add_item'      => __('New Carousel Item','tm-dione'),
//					'add_new_item'    => __('Add New Carousel Item','tm-dione'),
//					'edit_item'     => __('Edit Carousel Item','tm-dione')
//				),
//				'public'    =>  false,
//				'show_in_menu'  =>  true,
//				'rewrite'     =>  array('slug' => 'carousels'),
//				'menu_position' =>  4,
//				'show_ui'   =>  true,
//				'has_archive' =>  false,
//				'hierarchical'  =>  false,
//				'supports'    =>  array('title','page-attributes'),
//				'menu_icon'  =>  tm-dione_ROOT.'/img/favicon.ico'
//			)
//		);

//		register_post_type('masonry_gallery',
//			array(
//				'labels' 		=> array(
//					'name' 				=> __('Masonry Gallery','tm-dione' ),
//					'all_items'			=> __('Masonry Gallery Items','tm-dione'),
//					'singular_name' 	=> __('Masonry Gallery Item','tm-dione' ),
//					'add_item'			=> __('New Masonry Gallery Item','tm-dione'),
//					'add_new_item' 		=> __('Add New Masonry Gallery Item','tm-dione'),
//					'edit_item' 		=> __('Edit Masonry Gallery Item','tm-dione')
//				),
//				'public'		=>	false,
//				'show_in_menu'	=>	true,
//				'rewrite' 		=> 	array('slug' => 'masonry_gallery'),
//				'menu_position' => 	4,
//				'show_ui'		=>	true,
//				'has_archive'	=>	false,
//				'hierarchical'	=>	false,
//				'supports'		=>	array('title', 'thumbnail')
//			)
//		);

		/* Create Portfolio Categories */

		$labels = array(
			'name' => __( 'Portfolio Categories', 'tm-dione' ),
			'singular_name' => __( 'Portfolio Category', 'tm-dione' ),
			'search_items' =>  __( 'Search Portfolio Categories','tm-dione' ),
			'all_items' => __( 'All Portfolio Categories','tm-dione' ),
			'parent_item' => __( 'Parent Portfolio Category','tm-dione' ),
			'parent_item_colon' => __( 'Parent Portfolio Category:','tm-dione' ),
			'edit_item' => __( 'Edit Portfolio Category','tm-dione' ),
			'update_item' => __( 'Update Portfolio Category','tm-dione' ),
			'add_new_item' => __( 'Add New Portfolio Category','tm-dione' ),
			'new_item_name' => __( 'New Portfolio Category Name','tm-dione' ),
			'menu_name' => __( 'Portfolio Categories','tm-dione' ),
		);

		register_taxonomy('portfolio_category',array('portfolio'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-category' ),
		));

		/* Create Portfolio Tags */

		$labels = array(
			'name' => __( 'Portfolio Tags', 'tm-dione' ),
			'singular_name' => __( 'Portfolio Tag', 'tm-dione' ),
			'search_items' =>  __( 'Search Portfolio Tags','tm-dione' ),
			'all_items' => __( 'All Portfolio Tags','tm-dione' ),
			'parent_item' => __( 'Parent Portfolio Tag','tm-dione' ),
			'parent_item_colon' => __( 'Parent Portfolio Tags:','tm-dione' ),
			'edit_item' => __( 'Edit Portfolio Tag','tm-dione' ),
			'update_item' => __( 'Update Portfolio Tag','tm-dione' ),
			'add_new_item' => __( 'Add New Portfolio Tag','tm-dione' ),
			'new_item_name' => __( 'New Portfolio Tag Name','tm-dione' ),
			'menu_name' => __( 'Portfolio Tags','tm-dione' ),
		);

		register_taxonomy('portfolio_tag',array('portfolio'), array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-tag' ),
		));

		/* Create Testimonials Category */

		$labels = array(
			'name' => __( 'Testimonials Categories', 'tm-dione' ),
			'singular_name' => __( 'Testimonial Category', 'tm-dione' ),
			'search_items' =>  __( 'Search Testimonials Categories','tm-dione' ),
			'all_items' => __( 'All Testimonials Categories','tm-dione' ),
			'parent_item' => __( 'Parent Testimonial Category','tm-dione' ),
			'parent_item_colon' => __( 'Parent Testimonial Category:','tm-dione' ),
			'edit_item' => __( 'Edit Testimonials Category','tm-dione' ),
			'update_item' => __( 'Update Testimonials Category','tm-dione' ),
			'add_new_item' => __( 'Add New Testimonials Category','tm-dione' ),
			'new_item_name' => __( 'New Testimonials Category Name','tm-dione' ),
			'menu_name' => __( 'Testimonials Categories','tm-dione' ),
		);

		register_taxonomy('testimonials_category',array('testimonials'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' => 'testimonials-category' ),
		));



		/* Create Slider Category */

//		$labels = array(
//			'name' => __( 'Sliders', 'tm-dione' ),
//			'singular_name' => __( 'Slider', 'tm-dione' ),
//			'search_items' =>  __( 'Search Sliders','tm-dione' ),
//			'all_items' => __( 'All Sliders','tm-dione' ),
//			'parent_item' => __( 'Parent Slider','tm-dione' ),
//			'parent_item_colon' => __( 'Parent Slider:','tm-dione' ),
//			'edit_item' => __( 'Edit Slider','tm-dione' ),
//			'update_item' => __( 'Update Slider','tm-dione' ),
//			'add_new_item' => __( 'Add New Slider','tm-dione' ),
//			'new_item_name' => __( 'New Slider Name','tm-dione' ),
//			'menu_name' => __( 'Sliders','tm-dione' ),
//		);
//
//		register_taxonomy('slides_category',array('slides'), array(
//			'hierarchical' => true,
//			'labels' => $labels,
//			'show_ui' => true,
//			'query_var' => true,
//			'show_admin_column' => true,
//			'rewrite' => array( 'slug' => 'slides-category' ),
//		));

		/* Create Carousel Category */

//		$labels = array(
//			'name' => __( 'Carousels', 'tm-dione' ),
//			'singular_name' => __( 'Carousel', 'tm-dione' ),
//			'search_items' =>  __( 'Search Carousels','tm-dione' ),
//			'all_items' => __( 'All Carousels','tm-dione' ),
//			'parent_item' => __( 'Parent Carousel','tm-dione' ),
//			'parent_item_colon' => __( 'Parent Carousel:','tm-dione' ),
//			'edit_item' => __( 'Edit Carousel','tm-dione' ),
//			'update_item' => __( 'Update Carousel','tm-dione' ),
//			'add_new_item' => __( 'Add New Carousel','tm-dione' ),
//			'new_item_name' => __( 'New Carousel Name','tm-dione' ),
//			'menu_name' => __( 'Carousels','tm-dione' ),
//		);
//
//		register_taxonomy('carousels_category',array('carousels'), array(
//			'hierarchical' => true,
//			'labels' => $labels,
//			'show_ui' => true,
//			'query_var' => true,
//			'show_admin_column' => true,
//			'rewrite' => array( 'slug' => 'carousels-category' ),
//		));


//		$labels = array(
//			'name' => __( 'Masonry Gallery Categories', 'taxonomy general name' ),
//			'singular_name' => __( 'Masonry Gallery Category', 'taxonomy singular name' ),
//			'search_items' =>  __( 'Search Masonry Gallery Categories','tm-dione' ),
//			'all_items' => __( 'All Masonry Gallery Categories','tm-dione' ),
//			'parent_item' => __( 'Parent Masonry Gallery Category','tm-dione' ),
//			'parent_item_colon' => __( 'Parent Masonry Gallery Category:','tm-dione' ),
//			'edit_item' => __( 'Edit Masonry Gallery Category','tm-dione' ),
//			'update_item' => __( 'Update Masonry Gallery Category','tm-dione' ),
//			'add_new_item' => __( 'Add New Masonry Gallery Category','tm-dione' ),
//			'new_item_name' => __( 'New Masonry Gallery Category Name','tm-dione' ),
//			'menu_name' => __( 'Masonry Gallery Categories','tm-dione' ),
//		);
//
//		register_taxonomy('masonry_gallery_category', array('masonry_gallery'), array(
//			'hierarchical' => true,
//			'labels' => $labels,
//			'show_ui' => true,
//			'query_var' => true,
//			'show_admin_column' => true,
//			'rewrite' => array( 'slug' => 'masonry-gallery-category' ),
//		));

	}
}
