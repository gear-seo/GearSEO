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
class RS_Portfolio_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-portfolio-widget';
  }

  public function get_title() {
    return 'Portfolio';
  }

  public function get_icon() {
    return 'elem_icon filterable_gallery';
  }

  public function is_reload_preview_required() {
    return true;
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
        'default'     => 'one_column',
        'label_block' => true,
        'options' => array(
          'one_column'   => esc_html__('One Column', 'adios-addons'),
          'three_column' => esc_html__('Three Column', 'adios-addons'),
          'four_column'  => esc_html__('Four Column', 'adios-addons'),
          'masonry'      => esc_html__('Masonry', 'adios-addons'),
          'masonry_alt'  => esc_html__('Masonry Alternative', 'adios-addons'),
        )
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
        'options'     => array_flip(array(
          'DESC' => 'Descending',
          'ASC'  => 'Ascending',
        )),
        'label_block' => true,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_portfolio_heading_style',
      array(
        'label'     => esc_html__('Heading Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
        'condition' => array('style' => array('style1'))
      )
    );

    $this->add_control('heading_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .sub-title h5' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('heading_border_color', 
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
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .sub-title h5',
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
        'selector' => '{{WRAPPER}} .item img',
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_portfolio_on_hover_style',
      array(
        'label'     => esc_html__('On Hover Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('overlay_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-wrap' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('icon_color', 
      array(
        'label'       => esc_html__('Icon Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-wrap span:before, {{WRAPPER}} .link-wrap span:after' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_filterable_gallery_filter',
      array(
        'label'     => esc_html__('Filter Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
        'condition' => array('style' => array('style1'))
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'filter_typography',
        'selector' => '{{WRAPPER}} .filter-mob-list li',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'filter_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .filter-mob-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->start_controls_tabs('filter_style');

    $this->start_controls_tab(
      'filter_normal',
      array(
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('filter_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .filter-mob-list li' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'filter_hover',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );

    $this->add_control('filter_border_color_hover', 
      array(
        'label'       => esc_html__('Border Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .filter-mob-list li:before' => 'background: {{VALUE}};',
        ),
      )
    );

    $this->add_control('filter_color_hover', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .filter-mob-list li:hover' => 'color: {{VALUE}};',
        ),
      )
    );


    $this->end_controls_tab();

    $this->start_controls_tab(
      'filter_active',
      array(
        'label' => esc_html__('Active', 'adios-addons'),
      )
    );

    $this->add_control('filter_border_color_active', 
      array(
        'label'       => esc_html__('Border Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .filter-mob-list li.active:before' => 'background: {{VALUE}};',
        ),
      )
    );

    $this->add_control('filter_color_active', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .filter-mob-list li.active' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();

    $this->start_controls_section('section_button_style',
      array(
        'label' => esc_html__('Button Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => array('style' => array('style1'))
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'btn_typography',
        'selector' => '{{WRAPPER}} .link-type-2',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->start_controls_tabs('btn_style');

    $this->start_controls_tab(
      'btn_style_normal',
      array(
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('btn_border_color', 
      array(
        'label'       => esc_html__('Border Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-2:before, {{WRAPPER}} .link-type-2:after, {{WRAPPER}} .link-type-2 span:before, {{WRAPPER}} .link-type-2 span:after' => 'background: {{VALUE}};',
        ),
      )
    );

    $this->add_control('btn_text_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-2 span' => 'color: {{VALUE}};',
        ),
      )
    );


    $this->end_controls_tab();


    $this->start_controls_tab(
      'btn_style_hover',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );

    $this->add_control('btn_text_hover_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-2:hover span' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();

  }

  protected function render() { 
    $settings = $this->get_settings(); 
    echo rs_portfolio($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Portfolio_Widget() );