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
class RS_Icon_Box_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-icon-box-widget';
  }

  public function get_title() {
    return 'Icon Box';
  }

  public function get_icon() {
    return 'elem_icon icon_box';
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
      'icon_box_icon_settings',
      array(
        'label' => esc_html__('Icon Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'selected_icon',
      array(
        'label'            => esc_html__('Icon', 'adios-addons'),
        'type'             => Controls_Manager::ICONS,
        'fa4compatibility' => 'icon',
        'default' => array(
          'value'   => 'fas fa-star',
          'library' => 'fa-solid',
        ),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'icon_box_content_settings',
      array(
        'label' => esc_html__('Content Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'title',
      array(
        'label'       => esc_html__('Title', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'default'     => esc_html__('Super Creative', 'adios-addons'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'description',
      array(
        'label'       => esc_html__('Description', 'adios-addons'),
        'type'        => Controls_Manager::WYSIWYG,
        'default'     => esc_html__('You can choose from 320+ icons and place it. All icons are pixel-perfect, hand-crafted & perfectly scalable. Awesome, eh?', 'adios-addons'),
        'label_block' => true,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'icon_box_link_settings',
      array(
        'label'     => esc_html__('Link Settings' , 'adios-addons'),
      )
    );

    $this->add_control(
      'link_text',
      array(
        'label'       => esc_html__('Link Text', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Learn More', 'adios-addons'),
      )
    );

    $this->add_control(
      'link_url',
      array(
        'label'       => esc_html__('Link URL', 'adios-addons'),
        'type'        => Controls_Manager::URL,
        'label_block' => true,
        'default'     => array('url' => '#'),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_general_style',
      array(
        'label'     => esc_html__('General Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_group_control(
      Group_Control_Background::get_type(),
      array(
        'name'      => 'icon_box_background',
        'label'     => esc_html__('Background', 'adios-addons'),
        'types'     => array('classic', 'gradient'),
        'selector'  => '{{WRAPPER}} .service-item',
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'icon_box_border',
        'selector' => '{{WRAPPER}} .service-item'
      )
    );

    $this->add_responsive_control(
      'icon_box_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .service-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->add_group_control(
      Group_Control_Box_Shadow::get_type(),
      array(
        'name'      => 'icon_box_shadow',
        'label'     => esc_html__('Box Shadow', 'adios-addons'),
        'selector'  => '{{WRAPPER}} .service-item',
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_icon_color',
      array(
        'label' => esc_html__('Icon Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('icon_color', 
      array(
        'label'     => esc_html__('Color', 'adios-addons'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .service-item .icon-wrap' => 'color: {{VALUE}};',
        ),
      )
    );
    
    $this->add_responsive_control(
      'icon_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .service-item .icon-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'icon_padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .service-item .icon-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );


    $this->add_responsive_control(
      'icon_size',
      array(
        'label'       => esc_html__('Size', 'adios-addons'),
        'type'        => Controls_Manager::SLIDER,
        'label_block' => true,
        'range' => array(
          'px' => array(
            'max'  => 80,
            'step' => 1,
          ),
        ),
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .service-item .icon-wrap' => 'font-size: {{SIZE}}{{UNIT}};',
        ),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_title_color',
      array(
        'label' => esc_html__('Title Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('title_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .service-item .title h4' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .service-item .title h4',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'title_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .service-item .title h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_description_color',
      array(
        'label' => esc_html__('Description Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('description_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .description-text p' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'description_typography',
        'selector' => '{{WRAPPER}} .description-text p',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'description_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .description-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_link_style',
      array(
        'label' => esc_html__('Link Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_responsive_control(
      'link_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
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
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('link_text_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .link-type-1' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'link_style_hover',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );

    $this->add_control('link_text_hover_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        
        'selectors' => array(
          '{{WRAPPER}} .link-type-1:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tabs();

    $this->end_controls_section();


  }

  protected function render() { 
    $settings      = $this->get_settings();
    $style         = $settings['style'];
    $selected_icon = $settings['selected_icon'];
    $title         = $settings['title'];
    $description   = $settings['description'];
    $link_url      = $settings['link_url'];
    $link_text     = $settings['link_text'];
    $href          = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
    $target        = ($link_url['is_external'] == 'on') ? '_blank' : '_self';

    $output  =  '<div class="service-item item-hov">';
    $output .= '<div class="icon-wrap">';
    if(is_array($selected_icon) && $selected_icon['library'] == 'svg'):
      $output .=  '<img src="'.esc_url($selected_icon['value']['url']).'" alt="icon">';
    else:
      $output .= '<i class="'.esc_attr($selected_icon['value']).'"></i>';
    endif;
    $output .= '</div>';
    $output .=  '<div class="title">';
    $output .=  '<h4 class="h4">'.esc_html($title).'</h4>';
    $output .=  '</div>';
    $output .=  '<div class="simple-text description-text">';
    $output .=  wp_kses_post($description);
    $output .=  '</div>';
    if(!empty($link_text)):
      $output .=  '<a href="'.esc_url($href).'" target="'.esc_attr($target).'" class="link-type-1">'.esc_html($link_text).'<i class="icon-right-open-mini"></i></a>';
    endif;
    $output .=  '</div>';

    echo $output;
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Icon_Box_Widget() );