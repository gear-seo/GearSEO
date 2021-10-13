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
class RS_Pricing_Table_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-pricing-table-widget';
  }

  public function get_title() {
    return 'Pricing Table';
  }

  public function get_icon() {
    return 'elem_icon pricing_table';
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
      'pricing_table_price_settings',
      array(
        'label' => esc_html__('Price Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'price',
      array(
        'label'       => esc_html__('Price', 'adios-addons'),
        'default'     => esc_html__('199', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
      )
    );

    $this->add_control(
      'currency',
      array(
        'label'       => esc_html__('Currency', 'adios-addons'),
        'default'     => esc_html__('$', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'pricing_table_features_settings',
      array(
        'label' => esc_html__('Features Settings' , 'adios-addons')
      )
    );


    $repeater = new Repeater();

    $repeater->add_control(
      'feature',
      array(
        'label'       => esc_html__('Feature', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
      )
    );

    $this->add_control(
      'features',
      array(
        'label'  => esc_html__('Items', 'adios-addons'),
        'type'   => Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default'    => array(
          array(
            'feature'      => '10 GB of Space',
          ),
          array(
            'feature'      => '5 Free Widgets',
          ),
        ),
        'title_field' => '<span>{{ feature }}</span>',
      )
    );

    $this->end_controls_section();


    $this->start_controls_section(
      'pricing_btn_settings',
      array(
        'label' => esc_html__('Button Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'btn_text',
      array(
        'label'       => esc_html__('Button Text', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Buy Now', 'adios-addons')
      )
    );

    $this->add_control(
      'btn_link',
      array(
        'label'       => esc_html__('Button Link', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::URL,
        'placeholder' => esc_html__('https://your-link.com', 'adios-addons'),
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
        'label'     => esc_html__('Background', 'adios-addons'),
        'types'     => array('classic', 'gradient'),
        'selector'  => '{{WRAPPER}} .price-item',
      )
    );

    $this->add_responsive_control(
      'margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .price-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .price-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'border',
        'selector' => '{{WRAPPER}} .price-item'
      )
    );

    $this->add_responsive_control(
      'border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .price-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->add_group_control(
      Group_Control_Box_Shadow::get_type(),
      array(
        'name'      => 'box_shadow',
        'label'     => esc_html__('Box Shadow', 'adios-addons'),
        'selector'  => '{{WRAPPER}} .price-item',
      )
    );

    $this->end_controls_section();




    $this->start_controls_section('section_price_style',
      array(
        'label' => esc_html__('Price Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('price_currency_heading', 
      array(
        'label' => esc_html__('Currency', 'adios-addons'),
        'type'  => Controls_Manager::HEADING,
      )
    );

    $this->add_control('currency_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .price-currency' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'currency_typography',
        'selector' => '{{WRAPPER}} .price-currency',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'currency_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'separator'  => 'after',
        'selectors' => array(
          '{{WRAPPER}} .price-currency' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );
    
    $this->add_control('price_price_heading', 
      array(
        'label'     => esc_html__('Price', 'adios-addons'),
        'type'      => Controls_Manager::HEADING,
      )
    );


    $this->add_control('price_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .pricing-price' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'price_typography',
        'selector' => '{{WRAPPER}} .pricing-price',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'price_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'separator'  => 'after',
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .pricing-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );


    $this->add_control('price_seperator_heading', 
      array(
        'label'     => esc_html__('Seperator', 'adios-addons'),
        'type'      => Controls_Manager::HEADING,
      )
    );


    $this->add_control('seperator_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .price-head' => 'border-color: {{VALUE}};',
        ),
      )
    );


    $this->end_controls_section();


    $this->start_controls_section('section_features_style',
      array(
        'label' => esc_html__('Feature Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('feature_text_heading', 
      array(
        'label'     => esc_html__('Text', 'adios-addons'),
        'type'      => Controls_Manager::HEADING,
      )
    );

    $this->add_control('feature_text_color', 
      array(
        'label'     => esc_html__('Color', 'adios-addons'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .pricing-feature' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'      => 'feature_text_typography',
        'selector'  => '{{WRAPPER}} .pricing-feature',
        'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'feature_text_padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .pricing-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
        ),
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
    $settings = $this->get_settings_for_display(); 
    $features = $settings['features'];
    $price    = $settings['price'];
    $currency = $settings['currency'];
    $btn_text = $settings['btn_text'];
    $btn_link = $settings['btn_link'];
    $href     = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
    $target   = ($link_url['is_external'] == 'on') ? '_blank' : '_self';

    $output  =  '<div class="price-item item-hov">';
    $output .=  '<div class="price-head">';
    $output .=  '<span class="price-currency">'.$currency.'</span><b class="pricing-price">'.esc_html($price).'</b>';
    $output .=  '</div>';
    $output .=  '<ul class="features">';
    foreach ($features as $key => $value) {
      $output .=  '<li class="pricing-feature">'.esc_html($value['feature']).'</li>';
    }
    $output .=  '</ul>';
    $output .=  '<a href="'.esc_url($href).'" target="'.esc_html($target).'" class="link-type-2"><span>'.esc_html($btn_text).'</span></a>';
    $output .=  '</div>';

    echo $output;
    
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Pricing_Table_Widget() );