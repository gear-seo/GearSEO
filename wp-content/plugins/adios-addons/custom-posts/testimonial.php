<?php
/**
 * Testimonial custom posty type
 */
$labels = array(
  'name'               => esc_html__( 'Testimonials', 'adios-addons' ),
  'singular_name'      => esc_html__( 'Testimonial', 'adios-addons' ),
  'add_new'            => esc_html__( 'Add New', 'adios-addons' ),
  'add_new_item'       => esc_html__( 'Add New Testimonials', 'adios-addons' ),
  'edit_item'          => esc_html__( 'Edit Testimonials', 'adios-addons' ),
  'new_item'           => esc_html__( 'New Testimonials', 'adios-addons' ),
  'all_items'          => esc_html__( 'All Testimonials', 'adios-addons' ),
  'view_item'          => esc_html__( 'View Testimonials', 'adios-addons' ),
  'search_items'       => esc_html__( 'Search Testimonials', 'adios-addons' ),
  'not_found'          => esc_html__( 'No Testimonials found', 'adios-addons' ),
  'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash', 'adios-addons' ),
  'parent_item_colon'  => '',
  'menu_name'          => esc_html__( 'Testimonials', 'adios-addons' )
  );

 $args = array(
  'labels'        => $labels,
  'public'        => false,
  'show_ui'       => true,
  'menu_position' => 30,
  'supports'      => array( 'title', 'thumbnail', 'editor' ),
  'has_archive'   => true,
   'rewrite' => array(
    'slug' => 'cpt-testimonial'
  )
);

register_post_type ( 'testimonial', $args);

/**
 * Testimonial category
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
register_taxonomy( 'testimonial-category', 'testimonial', $args );
