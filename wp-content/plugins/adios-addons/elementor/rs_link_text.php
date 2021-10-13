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
class RS_Link_Text_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-link-text-widget';
  }

  public function get_title() {
    return 'Link Text';
  }

  public function get_icon() {
    return 'elem_icon link';
  }

  public function get_categories() {
    return array('adios-elementor');
  }


  protected function _register_controls() {
    $this->start_controls_section(
      'link_settings',
      array(
        'label' => esc_html__('Link Settings' , 'adios-addons' )
      )
    );

    $this->add_control(
      'link_text',
      array(
        'label'       => esc_html__('Link Text', 'adios-addons' ),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Learn More', 'adios-addons'),
      )
    );

    $this->add_control(
      'link_url',
      array(
        'label'       => esc_html__('Link URL', 'webify-addons'),
        'type'        => Controls_Manager::URL,
        'label_block' => true,
        'default'     => array('url' => '#'),
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
    $settings  = $this->get_settings();
    $link_text = $settings['link_text'];
    $link_url  = $settings['link_url'];
    $href      = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
    $target    = ($link_url['is_external'] == 'on') ? '_blank' : '_self'; 
    echo '<a class="link-type-1" href="'.esc_url($href).'" target="'.esc_attr($target).'">'.esc_html($link_text).'<i class="icon-right-open-mini"></i></a>';
  }

}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Link_Text_Widget() );