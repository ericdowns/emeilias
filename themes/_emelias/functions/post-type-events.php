<?php
function events_post_type() {

	$labels = array(
		'name'                  => 'Events',
		'singular_name'         => 'Events',
		'menu_name'             => 'Events',
		'name_admin_bar'        => 'Events',
		'archives'              => 'Events Archives',
		'parent_item_colon'     => 'Parent Events:',
		'all_items'             => 'All Events',
		'add_new_item'          => 'Add New Events',
		'add_new'               => 'Add New',
		'new_item'              => 'New Events',
		'edit_item'             => 'Edit Events',
		'update_item'           => 'Update Events',
		'view_item'             => 'View Events',
		'search_items'          => 'Search Events',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Events',
		'uploaded_to_this_item' => 'Uploaded to this Events',
		'items_list'            => 'Events list',
		'items_list_navigation' => 'Events list navigation',
		'filter_items_list'     => 'Filter Events list',
	);
	$rewrite = array(
		'slug'                  => 'events',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Events',
		'description'           => '',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
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
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'events_post_type', 0 );
