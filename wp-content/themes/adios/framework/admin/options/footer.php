<?php
/*
 * Footer Section
*/
$this->sections[] = array(
  'title' => esc_html__('Footer', 'adios'),
  'desc' => esc_html__('Change the footer section configuration.', 'adios'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'footer-enable-switch',
      'type' => 'switch',
      'title' => esc_html__('Enable Footer', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'adios'),
    ),
    array(
      'id'        => 'footer-template',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Footer Template', 'adios'),
      'subtitle'  => esc_html__('Select footer layout.', 'adios'),
      'options'   => array(
        'default'       => esc_html__('Footer Style 1', 'adios'),
        'alternative'   => esc_html__('Footer Style 2', 'adios'),
        'footer-style3' => esc_html__('Footer Style 3', 'adios'),
        'footer-style4' => esc_html__('Footer Style 4', 'adios'),
        'footer-style5' => esc_html__('Footer Style 5', 'adios'),
      ),
      'default'   => 'default',
    ),
    array(
      'id'        => 'footer-column',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Footer Columns', 'adios'),
      'subtitle'  => esc_html__('Select footer column.', 'adios'),
      'options'   => array(
        '4' => esc_html__('Column 4', 'adios'),
        '3' => esc_html__('Column 3', 'adios'),
        '2' => esc_html__('Column 2', 'adios'),
        '1' => esc_html__('Column 1', 'adios'),
      ),
      'default'   => '4',
      'required'  => array('footer-template', 'equals', array('footer-style3', 'footer-style4')),
    ),
    array(
      'id'        => 'footer-sidebar-1',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 1', 'adios'),
      'subtitle'  => esc_html__('Select custom sidebar', 'adios'),
      'options'   => adios_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('footer-template', 'equals', array('alternative', 'footer-style3', 'footer-style4')),
    ),
    array(
      'id'        => 'footer-sidebar-2',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 2', 'adios'),
      'subtitle'  => esc_html__('Select custom sidebar', 'adios'),
      'options'   => adios_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('footer-template', 'equals', array('alternative', 'footer-style3', 'footer-style4')),
    ),
    array(
      'id'        => 'footer-sidebar-3',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 3', 'adios'),
      'subtitle'  => esc_html__('Select custom sidebar', 'adios'),
      'options'   => adios_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('footer-template', 'equals', array('footer-style3', 'footer-style4')),
    ),
    array(
      'id'        => 'footer-sidebar-4',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 4', 'adios'),
      'subtitle'  => esc_html__('Select custom sidebar', 'adios'),
      'options'   => adios_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('footer-template', 'equals', array('footer-style3', 'footer-style4')),
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 class="highlight-redux">'.esc_html__('Footer Logo Module & Social Module', 'adios').'</h2>'
    ),
    array(
      'id'       =>'footer-logo',
      'type'     => 'media',
      'url'      => true,
      'title'    => esc_html__('Logo', 'adios'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the footer.', 'adios'),
    ),
    array(
      'id'      => 'footer-logo-width',
      'type'    => 'text',
      'title'   => esc_html__('Logo Width', 'adios'),
      'default' => '',
      'desc'    => esc_html__('Optional : Enter the logo width in pixel for e.g 150px.', 'adios')
    ),
    array(
      'id'      => 'footer-logo-height',
      'type'    => 'text',
      'title'   => esc_html__('Logo Height', 'adios'),
      'default' => '',
      'desc'    => esc_html__('Optional : Enter the logo width in pixel for e.g 150px.', 'adios')
    ),
    array(
      'id'=>'footer-enable-social-icons',
      'type' => 'switch',
      'title' => esc_html__('Show social icons', 'adios'),
      'subtitle'=> esc_html__('If on, social icons will be displayed.', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'       => 'footer-social-icons-category',
      'type'     => 'select',
      'title'    => esc_html__('Social Icons Category', 'adios'),
      'subtitle' => esc_html__('Select desired category', 'adios'),
      'options'  => adios_get_terms_assoc('social-site-category'),
      'default'  => '',
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 class="highlight-redux">'.esc_html__('Copyright Configuration', 'adios').'</h2>'
    ),
    array(
      'id' => 'footer-copyright-enable-switch',
      'type' => 'switch',
      'title' => esc_html__('Enable Copyright', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'adios'),
    ),
    array(
      'id'    =>'footer-copyright-text',
      'type'  => 'text',
      'title' => esc_html__('Copyright Text', 'adios'),
    ),
  ), // #fields
);
