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
class RS_Blockquote_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-blockquote-widget';
  }

  public function get_title() {
    return 'Blockquote';
  }

  public function get_icon() {
    return 'elem_icon blockqoute';
  }

  public function get_categories() {
    return array('adios-elementor');
  }


  protected function _register_controls() {
    $this->start_controls_section(
      'blockquote_general_settings',
      array(
        'label' => esc_html__( 'General Settings' , 'adios-addons' )
      )
    );

    $this->add_control(
      'content',
      array(
        'label'       => esc_html__( 'Content', 'adios-addons' ),
        'type'        => Controls_Manager::TEXTAREA,
        'label_block' => true,
        'default'     => esc_html__('You can choose from hundreds of icons and place it. All icons are pixel-perfect, hand-crafted & perfectly scalable. Awesome, eh?', 'adios-addons'),
      )
    );

    $this->add_control(
      'cite',
      array(
        'label'       => esc_html__( 'Cite', 'adios-addons' ),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('John Doe', 'adios-addons'),
      )
    );

    $this->end_controls_section();
  }

  protected function render() { 
    $settings = $this->get_settings(); 
    echo rs_blockquote($settings, $settings['content']);
  }


}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Blockquote_Widget() );