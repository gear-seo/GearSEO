<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * Intro Text Widget.
 *
 * @version       1.0
 * @author        themebubble
 * @category      Classes
 * @author        themebubble
 */
class RS_Portfolio_Slider_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-portfolio-slider-widget';
  }

  public function get_title() {
    return 'Portfolio Slider';
  }

  public function get_icon() {
    return 'elem_icon image_slider';
  }

  public function get_script_depends() {
    return array();
  }

  public function get_style_depends() {
    return array();
  }

  public function get_categories() {
    return array('adios-elementor');
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'portfolio_general_settings',
      array(
        'label' => esc_html__('General Settings' , 'adios-addons')
      )
    );
    $this->add_control(
      'style',
      array(
        'label'       => esc_html__('Style', 'adios-addons'),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'style1',
        'label_block' => true,
        'options' => array(
          'style1'   => esc_html__('Style 1', 'adios-addons'),
          'style2'   => esc_html__('Style 2', 'adios-addons'),
          'style3'   => esc_html__('Style 3', 'adios-addons'),
        )
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'image_box_slider_settings',
      array(
        'label' => esc_html__('Slider Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'autoplay',
      array(
        'label' => esc_html__('Autoplay', 'adios-addons'),
        'type'  => Controls_Manager::SWITCHER,
      )
    );

    $this->add_control(
      'loop',
      array(
        'label'   => esc_html__('Loop', 'adios-addons'),
        'type'    => Controls_Manager::SWITCHER,
        'default' => 'yes',
      )
    );

    $this->add_control(
      'speed',
      array(
        'label'       => esc_html__('Speed', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'default'     => 600
      )
    );


    $this->end_controls_section();

    $this->start_controls_section(
      'portfolio_query_settings',
      array(
        'label' => esc_html__('Query Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'cats',
      array(
        'label'       => esc_html__('Categories', 'adios-addons'),
        'description' => esc_html__('Specifies a category that you want to show posts from it.', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT2,
        'multiple'    => true,
        'label_block' => true,
        'options'     => array_flip(rs_get_custom_term_values('portfolio-category')),
        'default'     => array(''),
      )
    );

    $this->add_control(
      'limit',
      array(
        'label'       => esc_html__('Limit', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => 4,
      )
    );

    $this->add_control(
      'orderby',
      array(
        'label'       => esc_html__( 'Order By', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'ID',
        'options'     => array_flip(array(
          'ID'            => 'ID',
          'Author'        => 'author',
          'Post Title'    => 'title',
          'Date'          => 'date',
          'Last Modified' => 'modified',
          'Random Order'  => 'rand',
          'Comment Count' => 'comment_count',
          'Menu Order'    => 'menu_order',
        )),
        'label_block' => true,
      )
    );

    $this->add_control(
      'order',
      array(
        'label'       => esc_html__('Order', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'DESC',
        'options'     => array(
          'DESC' => 'Descending',
          'ASC'  => 'Ascending',
        ),
        'label_block' => true,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_portfolio_heading_style',
      array(
        'label'     => esc_html__('Heading Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('heading_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .portfolio-slider-title a' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .portfolio-slider-title a',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_portfolio_category_style',
      array(
        'label'     => esc_html__('Category Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('category_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .portfolio-slider-category' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'category_typography',
        'selector' => '{{WRAPPER}} .portfolio-slider-category',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_portfolio_image_style',
      array(
        'label'     => esc_html__('Image Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

  
    $this->add_group_control(
      Group_Control_Css_Filter::get_type(),
      array(
        'name'     => 'portfolio_css_filter',
        'selector' => '{{WRAPPER}} .portfolio-slider-img',
      )
    );

    $this->end_controls_section();


  }

  protected function render() { 
    $settings = $this->get_settings();
    $settings['loop'] = ($settings['loop'] == 'yes') ? 1:0;
    $settings['autoplay'] = ($settings['autoplay'] == 'yes') ? 500:0;
    echo rs_portfolio_slider($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Portfolio_Slider_Widget() );