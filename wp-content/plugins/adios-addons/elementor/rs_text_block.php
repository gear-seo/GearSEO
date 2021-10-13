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
class RS_Text_Block_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-text-block-widget';
  }

  public function get_title() {
    return 'Text Block';
  }

  public function get_icon() {
    return 'elem_icon accordion';
  }

  public function get_categories() {
    return array('adios-elementor');
  }


  protected function _register_controls() {
    $this->start_controls_section(
      'text_block_content_settings',
      array(
        'label' => esc_html__('Content Settings' , 'adios-addons' )
      )
    );

    $this->add_control(
      'text_size',
      array(
        'label'       => esc_html__('Text Size', 'adios-addons'),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'md',
        'label_block' => true,
        'options' => array(
          'sm'   => esc_html__('Small', 'adios-addons'),
          'md'   => esc_html__('Medium', 'adios-addons'),
          'lg'   => esc_html__('Large', 'adios-addons'),
        )
      )
    );

    $this->add_control(
      'content',
      array(
        'label'       => esc_html__('Content', 'adios-addons' ),
        'type'        => Controls_Manager::WYSIWYG,
        'label_block' => true,
        'default'     => esc_html__('You can choose from hundreds of icons and place it. All icons are pixel-perfect, hand-crafted & perfectly scalable. Awesome, eh?', 'adios-addons'),
      )
    );

    $this->add_control(
      'show_link',
      array(
        'label'   => esc_html__('Show Link', 'adios-addons'),
        'type'    => Controls_Manager::SWITCHER,
        'default' => 'yes',
      )
    );

    $this->add_control(
      'link_text',
      array(
        'label'       => esc_html__('Link Text', 'adios-addons' ),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'condition'   => array('show_link' => 'yes'),
        'default'     => esc_html__('Learn More', 'adios-addons'),
      )
    );

    $this->add_control(
      'link_url',
      array(
        'label'       => esc_html__('Link URL', 'webify-addons'),
        'type'        => Controls_Manager::URL,
        'condition'   => array('show_link' => 'yes'),
        'label_block' => true,
        'default'     => array('url' => '#'),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_text_block_content_style',
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
          '{{WRAPPER}} .simple-text p' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'content_typography',
        'selector' => '{{WRAPPER}} .simple-text p',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'content_margin',
      array(
        'label'      => esc_html__('Margin', 'dragfy-addons-for-elementor'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .simple-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
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
    $settings = $this->get_settings();
    $link_url = $settings['link_url'];
    $href     = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
    $target   = ($link_url['is_external'] == 'on') ? '_blank' : '_self'; 

    $this->add_inline_editing_attributes('content');
    $this->add_render_attribute('content', 'class', 'simple-text '.$settings['text_size']);

    $this->add_inline_editing_attributes('link_text');
    $this->add_render_attribute('link_text', 'class', 'link-type-1');
  ?>
    <div class="item-padd-mob section-text text-block">
      <div <?php echo $this->get_render_attribute_string('content'); ?> class="simple-text <?php echo esc_attr($settings['text_size']); ?>"><?php echo wp_kses_post($settings['content']); ?></div>
      <?php if($settings['show_link'] == 'yes'): ?>
        <p><a <?php echo $this->get_render_attribute_string('link_text'); ?> class="link-type-1" target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($settings['link_text']); ?><i class="icon-right-open-mini"></i></a></p>
      <?php endif; ?>
    </div>
  <?php

  }

  protected function _content_template() { ?>

    <#
      var content = settings.content,
      link_text = settings.link_text;
      view.addInlineEditingAttributes('content');
      view.addRenderAttribute('content', 'class', 'simple-text ' + settings.text_size);

      view.addInlineEditingAttributes('link_text');
      view.addRenderAttribute('link_text', 'class', 'link-type-1');
    #>

    <div class="item-padd-mob section-text text-block">
      <div {{{ view.getRenderAttributeString('content') }}}">{{{content}}}</div>
      <# if(settings.show_link == 'yes') { #>
        <p><a {{{ view.getRenderAttributeString('link_text') }}} target="_blank" href="#">{{{link_text}}}<i class="icon-right-open-mini"></i></a></p>
      <# } #>
    </div>
    <?php
  }

}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Text_Block_Widget() );