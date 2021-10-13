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
class RS_Follow_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-follow-widget';
  }

  public function get_title() {
    return 'Author Follow';
  }

  public function get_icon() {
    return 'elem_icon team_member';
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
      'follow_avatar_settings',
      array(
        'label' => esc_html__('Avatar Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'author_img',
      array(
        'label'       => esc_html__('Avatar', 'webify-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::MEDIA,
        'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'follow_content_settings',
      array(
        'label' => esc_html__('Content Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'author_name',
      array(
        'label'       => esc_html__('Name', 'adios-addons'),
        'default'     => esc_html__('John Doe', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
      )
    );

    $this->add_control(
      'post_count',
      array(
        'label'       => esc_html__('Post Count', 'adios-addons'),
        'default'     => esc_html__('101', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT
      )
    );

    $this->add_control(
      'follow_count',
      array(
        'label'       => esc_html__('Followers Count', 'adios-addons'),
        'default'     => esc_html__('500', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT
      )
    );

    $this->add_control(
      'following_count',
      array(
        'label'       => esc_html__('Following Count', 'adios-addons'),
        'default'     => esc_html__('1000', 'adios-addons'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'follow_btn_settings',
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
        'default'     => esc_html__('Follow', 'adios-addons')
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




    $this->start_controls_section('section_author_color',
      array(
        'label' => esc_html__('Author Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('author_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .title' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'author_typography',
        'selector' => '{{WRAPPER}} .title',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_count_color',
      array(
        'label' => esc_html__('Count Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('count_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .folow-info b' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'count_typography',
        'selector' => '{{WRAPPER}} .folow-info b',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();



    $this->start_controls_section('section_label_color',
      array(
        'label' => esc_html__('Label Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('count_label_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .folow-info span' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'label_typography',
        'selector' => '{{WRAPPER}} .folow-info span',
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
    $settings = $this->get_settings_for_display();
    $settings['author_img'] = $settings['author_img']['id'];
    echo rs_follow($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Follow_Widget() );