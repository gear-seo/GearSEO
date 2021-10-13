<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_client( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('adios-slick');
  wp_enqueue_style( 'adios-slick');
  extract( shortcode_atts( array(
    'id'       => '',
    'class'    => '',
    'image'    => '',
    'autoplay' => '0'
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  $output = '';
  $image_array = explode(',', $image);
  if(is_array($image_array)) {
    $output .=  '<div '.$id.' class="swiper-container poind-closest'.$class.'" data-autoplay="'.esc_attr($autoplay).'" data-loop="0" data-speed="1000" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="4" data-md-slides="5" data-lg-slides="5" data-add-slides="5">';
    $output .=  '<div class="swiper-wrapper">';
    $delay = 0.2;
    foreach ($image_array as $single_image) {
      $image_src  = wp_get_attachment_image_src( $single_image, 'full' );
      if(isset($image_src[0])) {
        $output .=  '<div class="swiper-slide">';
        $output .=  '<div class="logo-item wow zoomIn" data-wow-delay="'.esc_attr($delay).'s">';
        $output .=  '<img src="'.esc_url($image_src[0]).'" alt="">';
        $output .=  '</div>';
        $output .=  '</div>';
      }
      $delay += 0.2;
    }
    $output .=  '</div>';
    $output .=  '<div class="pagination hidden"></div>';
    $output .=  '</div>';


  }

  return $output;
}

add_shortcode('rs_client', 'rs_client');
