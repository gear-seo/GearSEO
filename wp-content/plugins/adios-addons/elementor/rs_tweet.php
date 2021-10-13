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
class RS_Tweet_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-tweet-widget';
  }

  public function get_title() {
    return 'Tweet';
  }

  public function get_icon() {
    return 'elem_icon twitter';
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
      'tweet_general_settings',
      array(
        'label' => esc_html__('General Settings' , 'adios-addons')
      )
    );
    $this->add_control(
      'username',
      array(
        'label'       => esc_html__('Username', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'default'     => 'envato',
        'label_block' => true,
      )
    );

    $this->add_control(
      'no_tweets',
      array(
        'label'       => esc_html__('Number of Tweets', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'default'     => 4,
        'label_block' => true,
      )
    );

    $this->end_controls_section();



    $this->start_controls_section('section_tweet_content_style',
      array(
        'label'     => esc_html__('Content Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('content_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .tweet-content p, {{WRAPPER}} .tweet-content p a' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'content_typography',
        'selector' => '{{WRAPPER}} .tweet-content p, {{WRAPPER}} .tweet-content p a',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_tweet_time_style',
      array(
        'label'     => esc_html__('Time Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('time_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .tweet-time' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'time_typography',
        'selector' => '{{WRAPPER}} .tweet-time',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    
    $this->start_controls_section('section_button_style',
      array(
        'label' => esc_html__('Button Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
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
    echo rs_tweet($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Tweet_Widget() );