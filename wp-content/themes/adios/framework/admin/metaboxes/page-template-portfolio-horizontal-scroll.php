<?php
/**
 * Page Template Portfolio
 */
$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'        => 'portfolio-horizontal-scroll-style',
      'type'      => 'select',
      'title'     => esc_html__('Style', 'adios'),
      'subtitle'  => esc_html__('Select desired categories', 'adios'),
      'options'   => array(
        'style1' => 'Style 1',
        'style2' => 'Style 2',
        'style3' => 'Style 3',
        'style4' => 'Style 4',
        'style5' => 'Style 5'
      ),
      'default' => 'style1',
    ),
    array(
      'id'        => 'portfolio-posts-per-page',
      'type'      => 'text',
      'title'     => esc_html__('Posts per page', 'adios'),
      'subtitle'  => esc_html__('The number of items to show.', 'adios'),
      'default'   => '',
    ),
    array(
      'id'        => 'portfolio-category',
      'type'      => 'select',
      'title'     => esc_html__('Categories', 'adios'),
      'subtitle'  => esc_html__('Select desired categories', 'adios'),
      'options'   => adios_element_values_page( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'portfolio-category',
        'hide_empty'  => false,
      ) ),
      'multi'     => true,
      'default' => '',
    ),
    array(
      'id'        => 'portfolio-exclude-posts',
      'type'      => 'text',
      'title'     => esc_html__('Excluded blog items', 'adios'),
      'subtitle'  => esc_html__('Post IDs you want to exclude, separated by commas eg. 120,123,1005', 'adios'),
      'default'   => '',
    ),
  )
);
