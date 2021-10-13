<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_google_map( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('adios-gmapsensor');
  wp_enqueue_script('adios-cd-google-map');
  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'latidude'  => '34.0151244',
    'longitude' => '-118.4729871',
    'string'    => '',
    'zoom_size' => '16'
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $output  =  '<div '.$id.' class="map-wrapper wow zoomIn'.$class.'" data-wow-delay="0.6s" id="map-canvas" data-lat="'.esc_attr($latidude).'" data-lng="'.esc_attr($longitude).'" data-zoom="'.esc_attr($zoom_size).'" data-style="1"></div>';
  $output .=  '<div class="markers-wrapper addresses-block">';
  $output .=  '<a class="marker" data-rel="map-canvas" data-lat="'.esc_attr($latidude).'" data-lng="'.esc_attr($longitude).'" data-string="'.esc_attr($string).'"></a>';
  $output .=  '</div>';
  return $output;
}

add_shortcode('rs_google_map', 'rs_google_map');
