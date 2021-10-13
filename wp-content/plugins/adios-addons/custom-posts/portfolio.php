<?php
/**
 * Portfolio custom posty type
 */
$labels = array(
	'name'               => _x( 'Portfolio', 'Items','adios-addons' ),
	'singular_name'      => _x( 'Portfolio', 'Item','adios-addons' ),
	'add_new'            => _x( 'Add New', 'Item','adios-addons' ),
	'add_new_item'       => esc_html__( 'Add New Item','adios-addons' ),
	'edit_item'          => esc_html__( 'Edit Item','adios-addons' ),
	'new_item'           => esc_html__( 'New Item','adios-addons' ),
	'all_items'          => esc_html__( 'All Items','adios-addons' ),
	'view_item'          => esc_html__( 'View Item','adios-addons' ),
	'search_items'       => esc_html__( 'Search Items','adios-addons' ),
	'not_found'          => esc_html__( 'No Items found','adios-addons' ),
	'not_found_in_trash' => esc_html__( 'No Items found in the Trash','adios-addons' ),
	'parent_item_colon'  => '',
	'menu_name'          => esc_html__('Portfolio', 'adios-addons')
);
$args = array(
	'labels'        => $labels,
	'description'   => esc_html__('Holds our products and product specific data', 'adios-addons'),
	'public'        => true,
	'menu_position' => 21,
	'supports'      => array( 'title', 'thumbnail','editor' ),
	'has_archive'   => true,

);
register_post_type( 'portfolio', $args );

/**
 * Portflio category
 */
$labels = array(
	'name'              => _x( 'Categories', 'taxonomy general name', 'adios-addons' ),
	'singular_name'     => _x( 'Category', 'taxonomy singular name', 'adios-addons' ),
	'search_items'      => esc_html__( 'Search categories', 'adios-addons' ),
	'all_items'         => esc_html__( 'All Categories', 'adios-addons' ),
	'parent_item'       => esc_html__( 'Parent Category', 'adios-addons' ),
	'parent_item_colon' => esc_html__( 'Parent Category:', 'adios-addons' ),
	'edit_item'         => esc_html__( 'Edit Category', 'adios-addons' ),
	'update_item'       => esc_html__( 'Update Category', 'adios-addons' ),
	'add_new_item'      => esc_html__( 'Add New Category', 'adios-addons' ),
	'new_item_name'     => esc_html__( 'New Category Name', 'adios-addons' ),
	'menu_name'         => esc_html__( 'Categories' ),
);
$args = array(
	'labels' => $labels,
	'hierarchical' => true,
);
register_taxonomy( 'portfolio-category', 'portfolio', $args );
