<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * Blockquote Widget.
 *
 * @version       1.0
 * @author        themebubble
 * @category      Classes
 * @author        themebubble
 */
class RS_Counter_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-counter-widget';
  }

  public function get_title() {
    return 'Counter';
  }

  public function get_icon() {
    return 'elem_icon counter';
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
      'count_settings',
      array(
        'label' => esc_html__('Count Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'count_no',
      array(
        'label'       => esc_html__('Count No', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
        'default'     => '48'
      )
    );

    $this->add_control(
      'suffix',
      array(
        'label'       => esc_html__('Suffix', 'adios-addons'),
        'default'     => esc_html__('k', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
      )
    );

    $this->add_control(
      'count_text',
      array(
        'label'       => esc_html__('Count Text', 'adios-addons'),
        'default'     => esc_html__('Active Users', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_general_style',
      array(
        'label' => esc_html__('General Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_group_control(
      Group_Control_Background::get_type(),
      array(
        'name'      => 'background',
        'label'     => esc_html__('Background', 'dragfy-addons-for-elementor'),
        'types'     => array('classic', 'gradient'),
        'selector'  => '{{WRAPPER}} .count-item',
      )
    );

    $this->add_responsive_control(
      'margin',
      array(
        'label'      => esc_html__('Margin', 'dragfy-addons-for-elementor'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .count-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'padding',
      array(
        'label'      => esc_html__('Padding', 'dragfy-addons-for-elementor'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .count-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'border',
        'selector' => '{{WRAPPER}} .count-item'
      )
    );

    $this->add_responsive_control(
      'border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'dragfy-addons-for-elementor'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .count-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->add_group_control(
      Group_Control_Box_Shadow::get_type(),
      array(
        'name'      => 'box_shadow',
        'label'     => esc_html__('Box Shadow', 'dragfy-addons-for-elementor'),
        'selector'  => '{{WRAPPER}} .count-item',
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_count_no_color',
      array(
        'label' => esc_html__('Count Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('count_no_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .count-no' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'count_no_typography',
        'selector' => '{{WRAPPER}} .count-no',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'count_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .count-no' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_label_color',
      array(
        'label' => esc_html__('Count Text Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('count_text_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .count-text' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'label_typography',
        'selector' => '{{WRAPPER}} .count-text',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'count_text_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .count-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_section();

  }

  protected function render() { 
    $settings = $this->get_settings_for_display();
    echo rs_counter($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Counter_Widget() );