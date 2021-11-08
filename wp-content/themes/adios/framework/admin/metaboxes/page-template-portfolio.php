<?php
/**
 * Page Template Portfolio
 */
$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'        => 'portfolio-layout',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Layout', 'adios'),
      'subtitle'  => esc_html__('Select portfolio style.', 'adios'),
      'options'   => array(
        'one_column'   => esc_html__('One Column', 'adios'),
        'three_column' => esc_html__('Three Column', 'adios'),
        'four_column'  => esc_html__('Four Column', 'adios'),
        'masonry'      => esc_html__('Masonry', 'adios'),
      ),
      'default'   => 'one_column',
    ),
    array(
      'id'        => 'portfolio-posts-per-page',
      'type'      => 'text',
      'title'     => esc_html__('Posts per page', 'adios'),
      'subtitle'  => esc_html__('The number of items to show.', 'adios'),
      'default'   => '',
    ),
    array(
      'id'       => 'portfolio-enable-filter',
      'type'     => 'button_set',
      'title'    => esc_html__('Enable Filter', 'adios'),
      'subtitle' => esc_html__('If on filter will be enabled.', 'adios'),
      'options'  => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
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
