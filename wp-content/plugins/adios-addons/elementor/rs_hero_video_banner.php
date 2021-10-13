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
class RS_Hero_Video_Banner_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-hero-video-banner-widget';
  }

  public function get_title() {
    return 'Hero Video Banner';
  }

  public function get_icon() {
    return 'elem_icon video_box';
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
      'hero_video_banner_general_settings',
      array(
        'label' => esc_html__('General Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'style',
      array(
        'label'       => esc_html__('Video Type', 'adios-addons'),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'html5',
        'label_block' => true,
        'options' => array(
          'html5'   => 'HTML 5',
          'youtube' => 'Youtube',
          'vimeo'   => 'Vimeo',
        )
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'hero_video_banner_video_settings',
      array(
        'label' => esc_html__('Video Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'poster_img',
      array(
        'label'       => esc_html__('Poster Image', 'adios-addons'),
        'label_block' => true,
        'condition'   => array('style' => array('html5')),
        'type'        => Controls_Manager::MEDIA,
        'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
      )
    );

    $this->add_control(
      'mute',
      array(
        'label'     => esc_html__('Mute', 'adios-addons'),
        'type'      => Controls_Manager::SWITCHER,
        'default'   => 'yes',
      )
    );

    $this->add_control(
      'data_link',
      array(
        'label'       => esc_html__('Youtube URL', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'condition'   => array('style' => array('youtube')),
        'default'     => esc_html__('https://youtu.be/aPkg2XnEmCQ', 'adios-addons'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'vimeo_url',
      array(
        'label'       => esc_html__('Vimeo URL', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'condition'   => array('style' => array('vimeo')),
        'default'     => esc_html__('https://vimeo.com/199167955', 'adios-addons'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'video_mp4',
      array(
        'label' => esc_html__('Video MP4 URL', 'adios-addons'),
        'type'  => Controls_Manager::TEXT,
        'condition' => array('style' => array('html5')),
        'placeholder' => esc_html__('Enter your URL', 'adios-addons'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'video_webm',
      array(
        'label' => esc_html__('Video WEBM URL', 'adios-addons'),
        'type'  => Controls_Manager::TEXT,
        'condition' => array('style' => array('html5')),
        'placeholder' => esc_html__('Enter your URL', 'adios-addons'),
        'label_block' => true,
      )
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'hero_video_banner_content_settings',
      array(
        'label' => esc_html__('Content Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'sub_heading',
      array(
        'label'       => esc_html__('Sub Heading', 'adios-addons'),
        'default'     => esc_html__('Intro', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXTAREA,
      )
    );

    $this->add_control(
      'heading',
      array(
        'label'       => esc_html__('Heading', 'adios-addons'),
        'default'     => 'Gone<br>are the days.',
        'label_block' => true,
        'type'        => Controls_Manager::TEXTAREA
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_sub_heading_style',
      array(
        'label' => esc_html__('Sub Heading Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('sub_heading_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .hero-subheading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('sub_heading_border_color', 
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
        'name'     => 'sub_heading_typography',
        'selector' => '{{WRAPPER}} .hero-subheading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_heading_style',
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
          '{{WRAPPER}} .hero-title' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .hero-title',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();



  }

  protected function render() { 
    $settings                  = $this->get_settings_for_display();
    $settings['poster_img']    = $settings['poster_img']['id'];
    $settings['mute']          = ($settings['mute'] == 'yes') ? 'true':'false';  
    $settings['small_heading'] = $settings['sub_heading'];
    echo rs_hero_video_banner($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Hero_Video_Banner_Widget() );