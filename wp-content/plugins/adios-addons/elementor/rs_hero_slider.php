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
class RS_Hero_Slider_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-hero-slider-widget';
  }

  public function get_title() {
    return 'Hero Slider';
  }

  public function get_icon() {
    return 'elem_icon interactive_slider';
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
      'hero_slider_general_settings',
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
          'style1' => 'Style 1',
          'style2' => 'Style 2',
          'style3' => 'Style 3',
        )
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'hero_slider_slider_settings',
      array(
        'label' => esc_html__('Slider Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'pagination_style',
      array(
        'label'       => esc_html__('Pagination Style', 'adios-addons'),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'number',
        'condition'   => array('style' => array('style1')),
        'label_block' => true,
        'options' => array(
          'number'        => 'Number',
          'vertical_bars' => 'Vertical Bars',
          
        )
      )
    );

    $this->add_control(
      'autoplay',
      array(
        'label'     => esc_html__('Autoplay', 'adios-addons'),
        'type'      => Controls_Manager::SWITCHER,
      )
    );

    $this->add_control(
      'loop',
      array(
        'label'     => esc_html__('Loop', 'adios-addons'),
        'type'      => Controls_Manager::SWITCHER,
        'default'   => 'yes',
      )
    );

    $this->add_control(
      'speed',
      array(
        'label'       => esc_html__('Speed', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'default'     => 600,
      )
    );


    $this->end_controls_section();


    $this->start_controls_section(
      'hero_slider_content_settings',
      array(
        'label' => esc_html__('Content Settings' , 'adios-addons')
      )
    );


    $repeater = new Repeater();

    $repeater->add_control(
      'image',
      array(
        'label'       => esc_html__('Image One', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::MEDIA,
        'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
      )
    );

    $repeater->add_control(
      'image_two',
      array(
        'label'       => esc_html__('Image Two', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::MEDIA,
        'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
      )
    );

    $repeater->add_control(
      'sub_heading',
      array(
        'label'       => esc_html__('Sub Heading', 'adios-addons'),
        'default'     => esc_html__('Intro', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXTAREA,
      )
    );

    $repeater->add_control(
      'heading',
      array(
        'label'       => esc_html__('Heading', 'adios-addons'),
        'default'     => 'Gone<br>are the days.',
        'label_block' => true,
        'type'        => Controls_Manager::TEXTAREA
      )
    );

    $repeater->add_control(
      'btn_text',
      array(
        'label'       => esc_html__('Button Text', 'adios-addons'),
        'label_block' => true,
        'default'     => esc_html__('Button Text', 'adios-addons'),
        'type'        => Controls_Manager::TEXT
      )
    );

    $repeater->add_control(
      'btn_link',
      array(
        'label'       => esc_html__('Button Link', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'adios-addons'),
      )
    );

    $this->add_control(
      'hero_slides',
      array(
        'label'  => esc_html__('Items', 'adios-addons'),
        'type'   => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default'    => array(
          array(
            'sub_heading'      => 'Intro',
            'heading'          => 'Gone<br>are the days.',
            'btn_text'         => 'Button Text',
            'btn_link_primary' => array('url' => '#'),
          ),
          array(
            'sub_heading'      => 'Intro',
            'heading'          => 'Gone<br>are the days.',
            'btn_text'         => 'Button Text',
            'btn_link_primary' => array('url' => '#'),
          ),
        ),
        'title_field' => '<span>{{ heading }}</span>',
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
          '{{WRAPPER}} .small-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('sub_heading_border_color', 
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
        'name'     => 'sub_heading_typography',
        'selector' => '{{WRAPPER}} .small-heading',
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
          '{{WRAPPER}} .big-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .big-heading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();



    $this->start_controls_section('section_button_style',
      array(
        'label'     => esc_html__('Button Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
        'condition' => array('style' => array('style2'))
      )
    );

    $this->start_controls_tabs('btn_style');

    $this->start_controls_tab(
      'btn_style_normal',
      array(
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('btn_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .link-type-3:before, .link-type-3:after' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('btn_text_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .link-type-3' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'btn_typography',
        'selector' => '{{WRAPPER}} .link-type-3',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'btn_style_hover_primary',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );

    $this->add_control('btn_bg_color_hover', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .link-type-3 span:before, .link-type-3 span:after' => 'background-color: {{VALUE}};',
        ),
      )
    );


    $this->add_control('btn_text_color_hover', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .link-type-3:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'btn_typography_hover_primary',
        'selector' => '{{WRAPPER}} .link-type-3:hover',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();

  }

  protected function render() { 
    $settings         = $this->get_settings_for_display(); 
    $hero_slides      = $settings['hero_slides'];
    $style            = $settings['style'];
    $loop             = $settings['loop'];
    $speed            = $settings['speed'];
    $autoplay         = $settings['autoplay'];
    $pagination_style = $settings['pagination_style'];
    $loop             = ($loop == 'yes') ? 1:0;
    $autoplay         = ($autoplay == 'yes') ? 1:0;

    if(is_array($hero_slides) && !empty($hero_slides)):

      switch ($style) {
        case 'style1':
        default:

          $output  =  '<div class="top-baner nvg-margin swiper-anime slide-arow poind-closest">';
          $output .=  '<div class="swiper-container top-slider" data-autoplay="'.esc_attr($autoplay).'" data-pagination-type="fraction" data-loop="1" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
          $output .=  '<div class="swiper-wrapper">';

          foreach ($hero_slides as $key => $slide) {
            $first_slide_class = ($key === 0) ? 'first-slide':'';
            if(!empty($slide['image']['url'])) {
              $output .=  '<div class="swiper-slide '.sanitize_html_classes($first_slide_class).'" data-val="'.esc_attr($key).'">';
              $output .=  '<div class="block-bg">';
              $output .=  '<div class="bg-wrap">';
              $output .=  '<div class="bg" style="background-image:url('.esc_url($slide['image']['url']).')"></div>';
              $output .=  '<div class="white-mobile-layer"></div>';
              $output .=  '</div>';
              $output .=  '<div class="title-style-1 vertical-align">';
              $output .=  '<div class="sub-title">';
              $output .=  '<h5 class="h5 small-heading">'.wp_kses_post($slide['sub_heading']).'</h5>';
              $output .=  '</div>';
              $output .=  '<h1 class="h1 big-heading">'.wp_kses_post($slide['heading']).'</h1>';
              $output .=  '</div>';
              $output .=  '</div>';
              $output .=  '</div>';
            }
          }
          

          $output .=  '</div>';
          if($pagination_style == 'number'):
            $output .=  '<div class="pagination"></div>';
          else:
            $output .=  '<div class="pagination vertical-point"></div>';
          endif;
          $output .=  '</div>';
          if($pagination_style == 'number'):
            $output .=  '<div class="slider-number"><span></span>/<b></b></div>';
          endif;
          $output .=  '</div>';

          # code...
          break;

        case 'style2':

          $output  =  '<div class="top-baner bottom-margin swiper-anime-2 arrow-closest poind-closest">';
          $output .=  '<div class="swiper-container top-slider" data-autoplay="'.esc_attr($autoplay).'" data-pagination-type="fraction" data-loop="1" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
          $output .=  '<div class="swiper-wrapper">';
          foreach ($hero_slides as $key => $slide) {
            $href              = (!empty($slide['btn_link']['url']) ) ? $slide['btn_link']['url'] : '#';
            $target            = ($slide['btn_link']['is_external'] == 'on') ? '_blank' : '_self';
            $first_slide_class = ($key === 0) ? 'first-slide':'';
            if(!empty($slide['image']['url'])) {
              $output .=  '<div class="swiper-slide '.sanitize_html_classes($first_slide_class).'" data-val="'.esc_attr($key).'">';
              $output .=  '<div class="block-bg type-2">';
              $output .=  '<div class="bg-wrap">';
              $output .=  '<div class="bg" style="background-image:url('.esc_url($slide['image']['url']).')"></div>';
              $output .=  '<div class="white-mobile-layer"></div>';
              $output .=  '</div>';
              $output .=  '<div class="title-style-3 vertical-align">';
              $output .=  '<h1 class="h1 big-heading">'.wp_kses_post($slide['heading']).'</h1>';
              $output .=  '<p class="font-type small-heading sub-title-2">'.wp_kses_post($slide['sub_heading']).'</p>';
              $output .=  '<div class="slide-button">';
              $output .=  '<a href="'.esc_url($href).'" target="'.esc_attr($target).'" class="link-type-3"><span></span>'.esc_html($slide['btn_text']).'</a>';
              $output .=  '</div>';
              $output .=  '</div>';
              $output .=  '</div>';
              $output .=  '</div>';
            }
          }

          $output .=  '</div>';
          $output .=  '<div class="pagination hidden"></div>';
          $output .=  '<div class="swipe-arrow-type-1">';
          $output .=  '<div class="swiper-arrow-left swipe-arrow"><i class="icon-left-open-mini"></i></div>';
          $output .=  '<div class="swiper-arrow-right swipe-arrow"><i class="icon-right-open-mini"></i></div>';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '<div class="slider-number"><span></span>/<b></b></div>';
          $output .=  '</div>';
          # code...
          break;

      case 'style3':
        $output  =  '<div class="top-baner swiper-anime-3 arrow-closest poind-closest">';
        $output .=  '<div class="swiper-container top-slider" data-autoplay="'.esc_attr($autoplay).'" data-loop="1" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
        $output .=  '<div class="swiper-wrapper">';

        foreach ($hero_slides as $key => $slide) {
          $first_slide_class = ($key === 0) ? 'first-slide':'';
          if(!empty($slide['image']['url']) && !empty($slide['image_two']['url'])) {

            $output .=  '<div class="swiper-slide '.sanitize_html_classes($first_slide_class).'" data-val="'.esc_attr($key).'">';
            $output .=  '<div class="block-bg type-3">';
            $output .=  '<div class="bg-wrap">';
            $output .=  '<div class="bg" style="background-image:url('.esc_url($slide['image']['url']).')"></div>';
            $output .=  '<div class="white-mobile-layer"></div>';
            $output .=  '</div>';
            $output .=  '<div class="image-front">';
            $output .=  '<img src="'.esc_url($slide['image_two']['url']).'" alt="img">';
            $output .=  '</div>';
            $output .=  '<div class="container">';
            $output .=  '<div class="title-style-4 vertical-align">';
            $output .=  '<h1 class="h1 big-heading">'.wp_kses_post($slide['heading']).'</h1>';
            $output .=  '<p class="font-type small-heading sub-title-2">'.wp_kses_post($slide['sub_heading']).'</p>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
          }
        }
        $output .=  '</div>';
        $output .=  '<div class="pagination hidden"></div>';
        $output .=  '<div class="arrow-container">';
        $output .=  '<div class="container">';
        $output .=  '<div class="swipe-arrow-type-1">';
        $output .=  '<div class="swiper-arrow-left swipe-arrow"><i class="icon-left-open-mini"></i></div>';
        $output .=  '<div class="swiper-arrow-right swipe-arrow"><i class="icon-right-open-mini"></i></div>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '<div class="slider-number"><span></span>/<b></b></div>';
        $output .=  '</div>';
        # code...
        break;
        
      }
      echo $output;
    endif;
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Hero_Slider_Widget() );