<?php
/**
 * Customizer Section
 */

$this->sections[] = array(
  'title' => esc_html__('Customizer', 'adios'),
  'desc' => esc_html__('Check child sections to style properly the correct area of the theme.', 'adios'),
  'icon' => 'el-icon-cog',
  'fields' => array(

  ), // #fields
);
/**
* Pagination Section
*/
$this->sections[] = array(
  'title' => esc_html__('Pagination', 'adios'),
  'desc' => esc_html__('Configure pagination styles.', 'adios'),
  'subsection' => true,
  'fields' => array(

    array(
      'id'        => 'customizer-btn-fill-color',
      'type'      => 'color',
      'title'     => esc_html__('Button Fill Color', 'adios'),
      'default'   => '',
      'output'    => array('background-color' => '.blog-nav > span')
    ),
    array(
      'id'        => 'customizer-btn-fill-color-hover',
      'type'      => 'color',
      'title'     => esc_html__('Button Fill Hover Color', 'adios'),
      'default'   => '',
      'output'    => array('background-color' => '.blog-nav > span:hover, .blog-nav > a:hover')
    ),
    array(
      'id'        => 'customizer-btn-text-color',
      'type'      => 'color',
      'title'     => esc_html__('Button Text Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => '.blog-nav a:not(#blog-load-more), .blog-nav > span')
    ),
    array(
      'id'        => 'customizer-btn-text-color-hover',
      'type'      => 'color',
      'title'     => esc_html__('Button Text Hover Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => '.blog-nav a:not(#blog-load-more):hover')
    ),
    array(
      'id'        => 'customizer-btn-border-color',
      'type'      => 'color',
      'title'     => esc_html__('Button Border Color', 'adios'),
      'default'   => '',
      'output'    => array('border-color' => '.blog-nav ul li a, .blog-nav > span, .blog-nav a:not(#blog-load-more)')
    ),
    array(
      'id'        => 'customizer-btn-border-color-hover',
      'type'      => 'color',
      'title'     => esc_html__('Button Border Hover Color', 'adios'),
      'default'   => '',
      'output'    => array('border-color' => '.blog-nav a:not(#blog-load-more):hover')
    ),
  ),
);


/**
* Content Section
*/
$this->sections[] = array(
  'title' => esc_html__('Menu', 'adios'),
  'desc' => esc_html__('Configure menu styles.', 'adios'),
  'subsection' => true,
  'fields' => array(
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 class="highlight-redux">'.esc_html__('Main Header Settings', 'adios').'</h2>'
    ),
    array(
      'id'        => 'customizer-main-menu-item-color',
      'type'      => 'color',
      'title'     => esc_html__('Main Menu Item Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => '.nav-list > li a')
    ),
    array(
      'id'        => 'customizer-main-menu-item-hover-color',
      'type'      => 'color',
      'title'     => esc_html__('Main Menu Item Hover Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => '.nav-list > li a:hover')
    ),
    array(
      'id'        => 'customizer-sub-menu-item-color',
      'type'      => 'color',
      'title'     => esc_html__('Sub Menu Item Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => '.nav-list .drop-menu a, .style-2 .nav-list .drop-menu a')
    ),
    array(
      'id'        => 'customizer-sub-menu-item-hover-color',
      'type'      => 'color',
      'title'     => esc_html__('Sub Menu Item Hover Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => '.nav-list .drop-menu a:hover,.style-2 .nav-list .drop-menu a:hover')
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 class="highlight-redux">'.esc_html__('Header Settings', 'adios').'</h2>'
    ),
    array(
      'id'        => 'customizer-header-bg-color',
      'type'      => 'color',
      'title'     => esc_html__('Header Background Color', 'adios'),
      'default'   => '',
      'output'    => array('background-color' => 'header')
    ),
  ),
);


/**
* Footer Section
*/
$this->sections[] = array(
  'title' => esc_html__('Footer', 'adios'),
  'desc' => esc_html__('Configure footer styles.', 'adios'),
  'subsection' => true,
  'fields' => array(
    array(
      'id'        => 'customizer-footer-bg-color',
      'type'      => 'color',
      'title'     => esc_html__('Background Color', 'adios'),
      'default'   => '',
      'output'    => array('background-color' => '.main-footer .section-bg')
    ),
  ),
);

/**
* Category Section
*/
$this->sections[] = array(
  'title' => esc_html__('Global', 'adios'),
  'desc' => esc_html__('Configure global element styles.', 'adios'),
  'subsection' => true,
  'fields' => array(
    array(
      'id'        => 'customizer-global-link-color',
      'type'      => 'color',
      'title'     => esc_html__('Heading Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => 'h1, h2,h3,h4,h5,h6,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a')
    ),
    array(
      'id'        => 'customizer-global-content-color',
      'type'      => 'color',
      'title'     => esc_html__('Content Color', 'adios'),
      'default'   => '',
      'output'    => array('color' => 'body', '.simple-text p')
    ),
  ),
);
