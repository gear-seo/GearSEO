<?php
/**
 *
 * Cta ( adios )
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function rs_counter( $atts, $content = '', $id = '' ) {
  extract( shortcode_atts( array(
    'id'             => '',
    'class'          => '',
    'count_no'       => '',
    'suffix'         => '',
    'count_text'     => '',
    'count_no_color' => '',
    'content_color'  => ''

  ), $atts ) );

  $id             = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class          = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  $count_no_color = ( $count_no_color ) ? ' style="color:'.esc_attr($count_no_color).';"':'';
  $content_color  = ( $content_color ) ? ' style="color:'.esc_attr($content_color).';"':'';
  $suffix         = ( $suffix ) ? $suffix:'';

  $output  =  '<div '.$id.' class="count-item'.$class.'">';
  $output .=  '<span class="timer count-no" data-to="'.esc_attr($count_no).'" data-speed="1000"'.$count_no_color.'>'.esc_html($count_no).'</span>';
  $output .=  '<i class="count-suffix">'.esc_html($suffix).'</i>';
  $output .=  '<h6 class="h6 count-text"'.$content_color.'>'.esc_html($count_text).'</h6>';
  $output .=  '</div>';

  return $output;
}
add_shortcode( 'rs_counter', 'rs_counter' );
