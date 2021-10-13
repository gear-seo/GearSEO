<?php
/**
 *
 * RS Image Block
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_image_block( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'image' => '',
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $output = '';
  if ( is_numeric( $image ) && !empty( $image ) ) {
    $image_src = wp_get_attachment_image_src( $image, 'full' );
    if(isset($image_src[0])) {
      $output .=  '<div '.$id.' class="image'.$class.'">';
      $output .=  '<img '.$id.' class="resp-img" src="'.esc_url($image_src[0]).'" alt="">';
      $output .=  '</div>';
    }
  }

  return $output;
}

add_shortcode('rs_image_block', 'rs_image_block');
