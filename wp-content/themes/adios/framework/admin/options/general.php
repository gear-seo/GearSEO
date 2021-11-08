<?php
/*
 * General Section
*/
$this->sections[] = array(
  'title' => esc_html__('General', 'adios'),
  'desc' => esc_html__('Configure general styles.', 'adios'),
  'subsection' => true,
  'fields'  => array(
    array(
      'id' => 'general-loader-enable-switch',
      'type' => 'switch',
      'title' => esc_html__('Enable Loader', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'adios'),
    ),
    array(
      'id'=>'general-loader-logo',
      'type' => 'media',
      'url' => true,
      'title' => esc_html__('Loader Logo', 'adios'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the loader.', 'adios'),
    ),
    array(
      'id'        => 'main-layout',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Main Layout', 'adios'),
      'subtitle'  => esc_html__('Select main content and sidebar alignment. Choose between 1 or 2 column layout.', 'adios'),
      'options'   => array(
        'default'       => esc_html__('1 Column', 'adios'),
        'left_sidebar'  => esc_html__('2 - Columns Left', 'adios'),
        'right_sidebar' => esc_html__('2 - Columns Right', 'adios'),
      ),
      'default'   => 'default',
    ),
    array(
      'id'        => 'sidebar',
      'type'      => 'select',
      'title'     => esc_html__('Sidebar', 'adios'),
      'subtitle'  => esc_html__('Select custom sidebar', 'adios'),
      'options'   => adios_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('main-layout', 'equals', array('left_sidebar', 'right_sidebar')),
    ),
    array(
      'id'       => 'custom-sidebars',
      'type'     => 'multi_text',
      'title'    => esc_html__( 'Custom Sidebars', 'adios' ),
      'subtitle' => esc_html__( 'Custom sidebars can be assigned to any page or post.', 'adios' ),
      'desc'     => esc_html__( 'You can add as many custom sidebars as you need.', 'adios' )
    ),
  ),
);



