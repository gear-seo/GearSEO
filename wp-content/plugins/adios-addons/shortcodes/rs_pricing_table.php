<?php

/**
 *
 * RS Pricing Table
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_pricing_table($atts, $content = '', $id = '') {

  extract(shortcode_atts(array(
    'id'       => '',
    'class'    => '',
    'feature'  => '',
    'price'    => '',
    'btn_text' => '',
    'currency' => '$',
    'btn_link' => ''
  ), $atts));

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' ' . sanitize_html_classes($class) : '';
  $href = $target = $btn_title = '';
  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($btn_link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  $output  =  '<div '.$id.' class="price-item item-hov'.$class.'">';
  $output .=  '<div class="price-head">';
  $output .=  '<span>'.$currency.'</span><b>'.esc_html($price).'</b>';
  $output .=  '</div>';
  $ex_feature = explode('|', $feature);
  $output .=  '<ul class="features">';
  foreach ($ex_feature as $key => $value) {
    $output .=  '<li>'.esc_html($value).'</li>';
  }
  $output .=  '</ul>';
  $output .=  '<a href="'.esc_url($href).'" title="'.esc_html($btn_title).'" target="'.esc_html($target).'" class="link-type-2"><span>'.esc_html($btn_text).'</span></a>';
  $output .=  '</div>';


  return $output;
}

add_shortcode('rs_pricing_table', 'rs_pricing_table');



