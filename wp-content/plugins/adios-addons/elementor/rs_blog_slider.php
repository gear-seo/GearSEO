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
class RS_Blog_Slider_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-blog-slider-widget';
  }

  public function get_title() {
    return 'Blog Slider';
  }

  public function get_icon() {
    return 'elem_icon image_box';
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
      'blog_slider_settings',
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
      'blog_query_settings',
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
        'options'     => array_flip(rs_get_custom_term_values('category')),
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

    $this->start_controls_section('section_blog_heading_style',
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
          '{{WRAPPER}} .blog-slider-title' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .blog-slider-title',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_blog_category_style',
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
          '{{WRAPPER}} .blog-slider-category' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('category_border_color', 
      array(
        'label'       => esc_html__('Border Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .sub-title:before' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'category_typography',
        'selector' => '{{WRAPPER}} .blog-slider-category',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_blog_image_style',
      array(
        'label'     => esc_html__('Image Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

  
    $this->add_group_control(
      Group_Control_Css_Filter::get_type(),
      array(
        'name'     => 'blog_css_filter',
        'selector' => '{{WRAPPER}} .blog-slider-img',
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_link_style',
      array(
        'label' => esc_html__('Link Style', 'webify-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'link_typography',
        'selector' => '{{WRAPPER}} .link-type-1',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'link_margin',
      array(
        'label'      => esc_html__('Margin', 'dragfy-addons-for-elementor'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .link-type-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );


    $this->start_controls_tabs('link_style');

    $this->start_controls_tab(
      'link_style_normal',
      array(
        'label' => esc_html__('Normal', 'webify-addons'),
      )
    );

    $this->add_control('link_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'webify-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-1' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('link_icon_color', 
      array(
        'label'       => esc_html__('Icon Color', 'webify-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-1 i' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'link_style_hover',
      array(
        'label' => esc_html__('Hover', 'webify-addons'),
      )
    );

    $this->add_control('link_text_hover_color', 
      array(
        'label'       => esc_html__('Text Color', 'webify-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-1:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('link_icon_color_hover', 
      array(
        'label'       => esc_html__('Icon Color', 'webify-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-1 i' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();


    $this->end_controls_section();


  }

  protected function render() { 
    $settings             = $this->get_settings();
    $settings['loop']     = ($settings['loop'] == 'yes') ? 1:0;
    $settings['autoplay'] = ($settings['autoplay'] == 'yes') ? 500:0;
    echo rs_blog_slider($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Blog_Slider_Widget() );