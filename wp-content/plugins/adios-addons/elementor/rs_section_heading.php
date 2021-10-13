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
class RS_Section_Heading_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-section-heading-widget';
  }

  public function get_title() {
    return 'Section Heading';
  }

  public function get_icon() {
    return 'elem_icon heading';
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
      'section_heading_settings',
      array(
        'label' => esc_html__('Heading Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'heading',
      array(
        'label'       => esc_html__('Heading', 'adios-addons'),
        'default'     => esc_html__('Intro', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_heading_color',
      array(
        'label' => esc_html__('Heading Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('heading_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .section-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('heading_border_color', 
      array(
        'label'       => esc_html__('Border Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .sub-title:before' => 'background: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .section-heading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

  }

  protected function render() { 
    $settings = $this->get_settings_for_display(); 
    $this->add_inline_editing_attributes('heading');
    $this->add_render_attribute('heading', 'class', 'h5 section-heading');
  ?>
    <div class="title-style-2 text-next">
      <div class="sub-title">
        <h5 <?php echo $this->get_render_attribute_string('heading'); ?> class="h5 section-heading"><?php echo esc_html($settings['heading']); ?>
      </div>
    </div>

  <?php

  }

  protected function _content_template() { ?>

    <#
      var heading = settings.heading;
      view.addInlineEditingAttributes('heading');
      view.addRenderAttribute('heading', 'class', 'h5 section-heading');

    #>
    <div class="title-style-2 text-next">
      <div class="sub-title">
        <h5 {{{ view.getRenderAttributeString('heading') }}}>{{{heading}}}</h5>
      </div>
    </div>
    <?php 
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Section_Heading_Widget() );