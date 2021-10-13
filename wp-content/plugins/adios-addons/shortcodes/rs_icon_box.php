<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_icon_box( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'img_icon'  => '',
    'heading'   => '',
    'link_text' => '',
    'link_url'  => ''
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($link_url);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $title      = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  $output  =  '<div '.$id.' class="service-item item-hov'.$class.'">';
  if(!empty($img_icon) && is_numeric($img_icon)) {
    $image_src = wp_get_attachment_image_src( $img_icon, 'full' );
    if(isset($image_src[0])) {
      $output .=  '<img src="'.esc_url($image_src[0]).'" alt="">';
    }
  }
  $output .=  '<div class="title">';
  $output .=  '<h4 class="h4">'.esc_html($heading).'</h4>';
  $output .=  '</div>';
  $output .=  '<div class="simple-text">';
  $output .=  rs_set_wpautop($content);
  $output .=  '</div>';
  if(!empty($link_text)):
    $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="link-type-1">'.esc_html($link_text).'<i class="icon-right-open-mini"></i></a>';
  endif;
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_icon_box', 'rs_icon_box');
