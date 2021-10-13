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
class RS_Team_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-team-widget';
  }

  public function get_title() {
    return 'Team';
  }

  public function get_icon() {
    return 'elem_icon team_member_slider';
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
      'team_general_settings',
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
          'style1'   => esc_html__('Style 1', 'adios-addons'),
          'style2'   => esc_html__('Style 2', 'adios-addons'),
        )
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'team_slider_settings',
      array(
        'label'     => esc_html__('Slider Settings' , 'adios-addons'),
        'condition' => array('style' => array('style2')),
      )
    );

    $this->add_control(
      'pagination_style',
      array(
        'label'       => esc_html__('Pagination Style', 'adios-addons'),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'dot',
        'label_block' => true,
        'options' => array(
          'dot'           => esc_html__('Dotted', 'adios-addons'),
          'vertical_bars' => esc_html__('Vertical Bars', 'adios-addons'),
        ),
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
        'default'     => 600
      )
    );


    $this->end_controls_section();

    $this->start_controls_section(
      'team_query_settings',
      array(
        'label' => esc_html__('Query Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'person_id',
      array(
        'label'       => esc_html__('Person Name', 'adios-addons'),
        'type'        => Controls_Manager::SELECT2,
        'multiple'    => true,
        'label_block' => true,
        'options'     => array_flip(rs_element_values('post', array('post_type' => 'team', 'posts_per_page' => -1))),
        'default'     => array(''),
      )
    );

    $this->add_control(
      'limit',
      array(
        'label'       => esc_html__('Limit', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => 4,
      )
    );

    $this->add_control(
      'orderby',
      array(
        'label'       => esc_html__( 'Order By', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'ID',
        'options'     => array_flip(array(
          'ID'            => 'ID',
          'Author'        => 'author',
          'Post Title'    => 'title',
          'Date'          => 'date',
          'Last Modified' => 'modified',
          'Random Order'  => 'rand',
          'Comment Count' => 'comment_count',
          'Menu Order'    => 'menu_order',
        )),
        'label_block' => true,
      )
    );

    $this->add_control(
      'order',
      array(
        'label'       => esc_html__('Order', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'DESC',
        'options'     => array(
          'DESC' => 'Descending',
          'ASC'  => 'Ascending',
        ),
        'label_block' => true,
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_team_name_style',
      array(
        'label'     => esc_html__('Name Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('name_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .team-name' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'name_typography',
        'selector' => '{{WRAPPER}} .team-name',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_team_position_style',
      array(
        'label'     => esc_html__('Position Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('position_color', 
      array(
        'label'       => esc_html__('Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .team-position' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'position_typography',
        'selector' => '{{WRAPPER}} .team-position',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->end_controls_section();

    $this->start_controls_section('section_team_image_style',
      array(
        'label'     => esc_html__('Image Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

  
    $this->add_group_control(
      Group_Control_Css_Filter::get_type(),
      array(
        'name'     => 'team_css_filter',
        'selector' => '{{WRAPPER}} .team-img',
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_team_on_hover_style',
      array(
        'label'     => esc_html__('On Hover Style', 'adios-addons'),
        'tab'       => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('overlay_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .item-layer' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_section();


  }

  protected function render() { 
    $settings             = $this->get_settings();
    $settings['loop']     = ($settings['loop'] == 'yes') ? 1:0;
    $settings['autoplay'] = ($settings['autoplay'] == 'yes') ? 500:0;
    echo rs_team($settings);
  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Team_Widget() );