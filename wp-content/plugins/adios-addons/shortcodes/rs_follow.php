<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_follow( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'author_img'      => '',
    'author_name'     => '',
    'post_count'      => '',
    'following_count' => '',
    'follow_count'    => '',
    'btn_text'        => '',
    'btn_link'        => ''
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($btn_link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $title      = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  $output  =  '<div '.$id.' class="folow-item col-white wow zoomIn'.$class.'" data-wow-delay="0.4s">';
  if(is_numeric($author_img) && !empty($author_img)) {
    $image_src = wp_get_attachment_image_src( $author_img, 'full' );
    if(isset($image_src[0])) {
      $output .=  '<img src="'.esc_url($image_src[0]).'" alt="">';
    }
  }
  $output .=  '<h6 class="h7 title">'.esc_html($author_name).'</h6>';
  $output .=  '<div class="simple-text">';
  $output .=  rs_set_wpautop($content);
  $output .=  '</div>';
  $output .=  '<div class="folow-info">';
  $output .=  '<b>'.esc_html($post_count).'</b>';
  $output .=  '<span>'.esc_html__('posts', 'adios-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<div class="folow-info">';
  $output .=  '<b>'.esc_html($follow_count).'</b>';
  $output .=  '<span>'.esc_html__('followers', 'adios-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<div class="folow-info">';
  $output .=  '<b>'.esc_html($following_count).'</b>';
  $output .=  '<span>'.esc_html__('following', 'adios-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<div class="clear"></div>';
  $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($title).'" target="'.esc_attr($target).'" class="link-type-2"><span>'.esc_html($btn_text).'</span></a>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_follow', 'rs_follow');
