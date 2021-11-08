<?php
/*
 * Header Section
*/
$sections[] = array(
  'title' => esc_html__('Header', 'adios'),
  'desc' => esc_html__('Change the header section configuration.', 'adios'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'header-enable-switch-local',
      'type' => 'button_set',
      'title' => esc_html__('Enable Header', 'adios'),
      'options' => array(
        '1' => 'On',
        '' => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'adios'),
    ),
    array(
      'id'       => 'header-template-local',
      'type'     => 'select',
      'title'    => esc_html__('Template', 'adios'),
      'subtitle' => esc_html__('Choose template for navigation header.', 'adios'),
      'options'  => array(
        'default'       => esc_html__('Header Style 1','adios'),
        'alternative'   => esc_html__('Header Style 2','adios'),
        'header-style3' => esc_html__('Header Style 3','adios'),
        'header-style4' => esc_html__('Header Style 4','adios'),
        'header-style5' => esc_html__('Header Style 5','adios'),
        'header-style6' => esc_html__('Header Style 6','adios'),
        'header-style7' => esc_html__('Header Style 7','adios'),
        'header-style8' => esc_html__('Header Style 8','adios'),
      ),
      'default' => '',
      'validate' => '',
    ),
    array(
      'id'=>'header-primary-menu-local',
      'type' => 'select',
      'title' => esc_html__('Primary Menu', 'adios'),
      'subtitle' => esc_html__('Select a menu to overwrite the header menu location.', 'adios'),
      'data' => 'menus',
      'default' => '',
    ),

    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => esc_html__('Logo Module Configuration.', 'adios')
    ),

    array(
      'id'=>'logo-local',
      'type' => 'media',
      'url' => true,
      'title' => esc_html__('Logo', 'adios'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'adios'),
    ),
  ), // #fields
);

























