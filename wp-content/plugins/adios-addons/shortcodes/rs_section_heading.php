<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_section_heading( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'      => '',
    'class'   => '',
    'heading' => '',
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $output  =  '<div '.$id.' class="title-style-2 text-next'.$class.'">';
  $output .=  '<div class="sub-title">';
  $output .=  '<h5 class="h5 section-heading">'.esc_html($heading).'</h5>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_section_heading', 'rs_section_heading');
