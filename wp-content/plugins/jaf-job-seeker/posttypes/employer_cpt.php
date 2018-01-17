<?php

// Register Custom Post Type
function register_employer_post_type() {

	$labels = array(
		'name'                  => _x( 'Employers', 'Post Type General Name', 'jointswp' ),
		'singular_name'         => _x( 'Employer', 'Post Type Singular Name', 'jointswp' ),
		'menu_name'             => __( 'Employers', 'jointswp' ),
		'name_admin_bar'        => __( 'Employers', 'jointswp' ),
		'archives'              => __( 'Employer Archives', 'jointswp' ),
		'parent_item_colon'     => __( 'Parent Employer:', 'jointswp' ),
		'all_items'             => __( 'All Employers', 'jointswp' ),
		'add_new_item'          => __( 'Add New Employer', 'jointswp' ),
		'add_new'               => __( 'Add New', 'jointswp' ),
		'new_item'              => __( 'New Employer', 'jointswp' ),
		'edit_item'             => __( 'Edit Employer', 'jointswp' ),
		'update_item'           => __( 'Update Employer', 'jointswp' ),
		'view_item'             => __( 'View Employer', 'jointswp' ),
		'search_items'          => __( 'Search Employer', 'jointswp' ),
		'not_found'             => __( 'Not found', 'jointswp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'jointswp' ),
		'featured_image'        => __( 'Featured Image', 'jointswp' ),
		'set_featured_image'    => __( 'Set featured image', 'jointswp' ),
		'remove_featured_image' => __( 'Remove featured image', 'jointswp' ),
		'use_featured_image'    => __( 'Use as featured image', 'jointswp' ),
		'insert_into_item'      => __( 'Insert into Employer', 'jointswp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Employer', 'jointswp' ),
		'items_list'            => __( 'Employers list', 'jointswp' ),
		'items_list_navigation' => __( 'Employers list navigation', 'jointswp' ),
		'filter_items_list'     => __( 'Filter Employers list', 'jointswp' ),
	);
	$capabilities = array(
		'edit_post'             => 'edit_employer',
		'read_post'             => 'read_employer',
		'delete_post'           => 'delete_employer',
		'edit_posts'            => 'edit_employer',
		'edit_others_posts'     => 'edit_others_employer',
		'publish_posts'         => 'publish_employer',
		'read_private_posts'    => 'read_private_employer',
	);
	$args = array(
		'label'                 => __( 'Employer', 'jointswp' ),
		'description'           => __( 'Employer Description', 'jointswp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'            => array( 'employer_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		//'capabilities'          => $capabilities,
	);
	register_post_type( 'employer', $args );

}
add_action( 'init', 'register_employer_post_type', 0 );