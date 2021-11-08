<?php
/*
 * Sidebar Section
*/

$sections[] = array(
  'title' => esc_html__('Sidebar', 'adios'),
  'desc' => esc_html__('Change the sidebar and configure it.', 'adios'),
  'icon' => 'el-icon-adjust-alt',
  'fields' => array(
    array(
      'id'        => 'main-layout-local',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Main Layout', 'adios'),
      'subtitle'  => esc_html__('Select main content and sidebar alignment. Choose between 1 or 2 column layout.', 'adios'),
      'options'   => array(
        'default'       => esc_html__('1 Column', 'adios'),
        'left_sidebar'  => esc_html__('2 - Columns Left', 'adios'),
        'right_sidebar' => esc_html__('2 - Columns Right', 'adios'),
      ),
      'default'   => '',
    ),
    array(
      'id'        => 'sidebar-local',
      'type'      => 'select',
      'title'     => esc_html__('Sidebar', 'adios'),
      'subtitle'  => esc_html__('Select custom sidebar', 'adios'),
      'options'   => adios_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('main-layout-local', 'equals', array('left_sidebar', 'right_sidebar')),
    ),

  ),
);
