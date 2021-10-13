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
class RS_Client_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-client-widget';
  }

  public function get_title() {
    return 'Client';
  }

  public function get_icon() {
    return 'elem_icon logo_carousel';
  }

  public function get_script_depends() {
    return array('adios-slick');
  }

  public function get_style_depends() {
    return array('adios-slick');
  }

  public function get_categories() {
    return array('adios-elementor');
  }

  protected function _register_controls() {

    $this->start_controls_section(
      'client_slider_settings',
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
        'label_block' => true,
        'default'     => 600
      )
    );

    $this->add_control(
      'lg_slide',
      array(
        'label'   => esc_html__('Desktop Slide', 'dragfy-addons-for-elementor'),
        'type'    => Controls_Manager::NUMBER,
        'min'     => 1,
        'default' => 5,
        'max'     => 5,
      )
    );

    $this->add_control(
      'md_slide',
      array(
        'label'   => esc_html__('Tablet Slide', 'dragfy-addons-for-elementor'),
        'type'    => Controls_Manager::NUMBER,
        'min'     => 1,
        'default' => 4,
        'max'     => 4,
      )
    );

    $this->add_control(
      'xs_slide',
      array(
        'label'   => esc_html__('Mobile Slide', 'dragfy-addons-for-elementor'),
        'type'    => Controls_Manager::NUMBER,
        'min'     => 1,
        'default' => 2,
        'max'     => 2,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'image_settings',
      array(
        'label' => esc_html__('Image Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'images',
      array(
        'label'       => esc_html__('Upload Images', 'adios-addons'),
        'type'        => Controls_Manager::GALLERY,
        'label_block' => true,
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
      Group_Control_Border::get_type(),
      array(
        'name'     => 'client_border',
        'selector' => '{{WRAPPER}} .logo-item'
      )
    );

    $this->add_responsive_control(
      'client_padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .logo-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'client_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .logo-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'client_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .logo-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_section();


  }

  protected function render() { 

    $settings = $this->get_settings(); 
    $images   = $settings['images'];
    $autoplay = $settings['autoplay'];
    $loop     = $settings['loop'];
    $speed    = $settings['speed'];
    $lg_slide = $settings['lg_slide'];
    $md_slide = $settings['md_slide'];
    $xs_slide = $settings['xs_slide'];
    $loop     = ($loop == 'yes') ? 1:0;
    $autoplay = ($autoplay == 'yes') ? 1:0;

    $output = '';
    if(is_array($images)) {
      $output .=  '<div class="swiper-container poind-closest" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="responsive" data-xs-slides="'.esc_attr($xs_slide).'" data-sm-slides="'.esc_attr($md_slide).'" data-md-slides="'.esc_attr($lg_slide).'" data-lg-slides="'.esc_attr($lg_slide).'" data-add-slides="'.esc_attr($lg_slide).'">';
      $output .=  '<div class="swiper-wrapper">';
      $delay = 0.2;
      foreach ($images as $single_image) {
        if(isset($single_image['url'])) {
          $output .=  '<div class="swiper-slide">';
          $output .=  '<div class="logo-item wow zoomIn" data-wow-delay="'.esc_attr($delay).'s">';
          $output .=  '<img src="'.esc_url($single_image['url']).'" alt="logo">';
          $output .=  '</div>';
          $output .=  '</div>';
        }
        $delay += 0.2;
      }
      $output .=  '</div>';
      $output .=  '<div class="pagination hidden"></div>';
      $output .=  '</div>';


    }

    echo $output;
    

  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Client_Widget() );