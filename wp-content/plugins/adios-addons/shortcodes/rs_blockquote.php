<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_blockquote( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'cite'  => '',
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $output  = '<div '.$id.' class="quote'.$class.'">';
  $output .=  rs_set_wpautop($content);
  $output .=  '<h6 class="h6">- '.esc_html($cite).'</h6>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_blockquote', 'rs_blockquote');
