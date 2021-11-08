<?php
/*
 * Header Section
*/
$this->sections[] = array(
  'title' => esc_html__('Header', 'adios'),
  'desc' => esc_html__('Change the header section configuration.', 'adios'),
  'fields' => array(
    array(
      'id' => 'header-enable-switch',
      'type' => 'switch',
      'title' => esc_html__('Enable Header', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'adios'),
    ),
    array(
      'id'       => 'header-template',
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
      'default' => 'default',
      'validate' => 'not_empty',
    ),
    array(
      'id'=>'header-primary-menu',
      'type' => 'select',
      'title' => esc_html__('Primary Menu', 'adios'),
      'subtitle' => esc_html__('Select a menu to overwrite the header menu location.', 'adios'),
      'data' => 'menus',
      'default' => '',
    ),
    array(
      'id'       => 'header-social-icons-category',
      'type'     => 'select',
      'title'    => esc_html__('Social Icons Category', 'adios'),
      'subtitle' => esc_html__('Select desired category', 'adios'),
      'options'  => adios_get_terms_assoc('social-site-category'),
      'default'  => '',
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => esc_html__('Logo Module Configuration.', 'adios')
    ),

    array(
      'id'=>'logo',
      'type' => 'media',
      'url' => true,
      'title' => esc_html__('Logo', 'adios'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'adios'),
    ),
    array(
      'id'      => 'logo-width',
      'type'    => 'text',
      'title'   => esc_html__('Logo Width', 'adios'),
      'default' => '',
      'desc'    => esc_html__('Optional : Enter the logo width in pixel for e.g 150px | logo height will be adjust accordiongly.', 'adios')
    ),
  ), // #fields
);
