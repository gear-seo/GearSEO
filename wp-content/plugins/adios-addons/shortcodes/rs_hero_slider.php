<?php
/**
 *
 * RS Hero Slider
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_hero_slider( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('adios-slick');
  wp_enqueue_style('adios-slick');
  global $rs_hero_slider;
  $rs_hero_slider = array();

  extract( shortcode_atts( array(
    'id'                  => '',
    'class'               => '',
    'style'               => 'style1',
    'heading_color'       => '',
    'small_heading_color' => '',
    'autoplay'            => '0',
    'speed'               => '600',
    'pagination_style'    => 'number'
  ), $atts ) );

  do_shortcode( $content );

  if( empty( $rs_hero_slider ) ) { return; }

  $output       = '';
  $uniqid_class = '';
  $id           = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class        = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  

  $customize = ($heading_color || $small_heading_color) ? true:false;

  if($customize) {
    $uniqid       = time().'-'.mt_rand();
    $custom_style = '';

    if($heading_color) {
      $custom_style .=  '.custom-color-properties-'.$uniqid.' .big-heading {';
      $custom_style .=  ($heading_color) ? 'color:'.$heading_color.';':'';
      $custom_style .= '}';
    }

    if($small_heading_color) {
      $custom_style .=  '.custom-color-properties-'.$uniqid.' .small-heading {';
      $custom_style .=  ($small_heading_color) ? 'color:'.$small_heading_color.';':'';
      $custom_style .= '}';

      $custom_style .=  '.custom-color-properties-'.$uniqid.' .sub-title:before {';
      $custom_style .=  ($small_heading_color) ? 'background:'.$small_heading_color.';':'';
      $custom_style .= '}';
    }

    adios_add_inline_style( $custom_style );

    $uniqid_class = ' custom-color-properties-'. $uniqid;
  }

  switch ($style) {
    case 'style1':
      $output  =  '<div '.$id.' class="top-baner nvg-margin swiper-anime slide-arow poind-closest'.$class.'">';
      $output .=  '<div class="swiper-container top-slider" data-autoplay="'.esc_attr($autoplay).'" data-loop="1" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
      $output .=  '<div class="swiper-wrapper">';

      foreach ($rs_hero_slider as $key => $slide) {
        $image_id          = (isset($slide['atts']['image'])) ? $slide['atts']['image']:'';
        $small_heading     = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $big_heading       = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';
        $first_slide_class = ($key === 0) ? 'first-slide':'';
        if(!empty($image_id) && is_numeric($image_id)) {
          $image_url  = wp_get_attachment_image_src( $image_id, 'full' );
          if(isset($image_url[0])) {
            $output .=  '<div class="swiper-slide '.sanitize_html_classes($first_slide_class).'" data-val="'.esc_attr($key).'">';
            $output .=  '<div class="block-bg'.$uniqid_class.'">';
            $output .=  '<div class="bg-wrap">';
            $output .=  '<div class="bg" style="background-image:url('.esc_url($image_url[0]).')"></div>';
            $output .=  '<div class="white-mobile-layer"></div>';
            $output .=  '</div>';
            $output .=  '<div class="title-style-1 vertical-align">';
            $output .=  '<div class="sub-title">';
            $output .=  '<h5 class="h5 small-heading">'.wp_kses_post($small_heading).'</h5>';
            $output .=  '</div>';
            $output .=  '<h1 class="h1 big-heading">'.wp_kses_post($big_heading).'</h1>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
          }
        }
      }

      $output .=  '</div>';
      if($pagination_style == 'number'):
        $output .=  '<div class="pagination hidden"></div>';
      else:
        $output .=  '<div class="pagination vertical-point"></div>';
      endif;
      $output .=  '</div>';
      if($pagination_style == 'number'):
        $output .=  '<div class="slider-number"><span></span>/<b></b></div>';
      endif;
      $output .=  '</div>';

      # code...
      break;

    case 'style2':
      $output  =  '<div '.$id.' class="top-baner bottom-margin swiper-anime-2 arrow-closest poind-closest'.$class.'">';
      $output .=  '<div class="swiper-container top-slider" data-autoplay="'.esc_attr($autoplay).'" data-loop="1" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
      $output .=  '<div class="swiper-wrapper">';
      foreach ($rs_hero_slider as $key => $slide) {

        $image_id      = (isset($slide['atts']['image'])) ? $slide['atts']['image']:'';
        $small_heading = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $btn_text      = (isset($slide['atts']['btn_text'])) ? $slide['atts']['btn_text']:'';
        $btn_link      = (isset($slide['atts']['btn_link'])) ? $slide['atts']['btn_link']:'';
        $big_heading   = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';

        if (function_exists('vc_parse_multi_attribute')) {
          $parse_args = vc_parse_multi_attribute($btn_link);
          $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
          $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
          $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
        }

        $first_slide_class = ($key === 0) ? 'first-slide':'';
        if(!empty($image_id) && is_numeric($image_id)) {
          $image_url  = wp_get_attachment_image_src( $image_id, 'full' );
          if(isset($image_url[0])) {
            $output .=  '<div class="swiper-slide '.sanitize_html_classes($first_slide_class).'" data-val="'.esc_attr($key).'">';
            $output .=  '<div class="block-bg type-2'.$uniqid_class.'">';
            $output .=  '<div class="bg-wrap">';
            $output .=  '<div class="bg" style="background-image:url('.esc_url($image_url[0]).')"></div>';
            $output .=  '<div class="white-mobile-layer"></div>';
            $output .=  '</div>';
            $output .=  '<div class="title-style-3 vertical-align">';
            $output .=  '<h1 class="h1 big-heading">'.wp_kses_post($big_heading).'</h1>';
            $output .=  '<p class="font-type small-heading sub-title-2">'.wp_kses_post($small_heading).'</p>';
            $output .=  '<div class="slide-button">';
            $output .=  '<a href="'.esc_url($href).'" title="'.esc_attr($btn_title).'" target="'.esc_attr($target).'" class="link-type-3"><span></span>'.esc_html($btn_text).'</a>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
          }
        }
      }

      $output .=  '</div>';
      $output .=  '<div class="pagination hidden"></div>';
      $output .=  '<div class="swipe-arrow-type-1">';
      $output .=  '<div class="swiper-arrow-left swipe-arrow"><i class="icon-left-open-mini"></i></div>';
      $output .=  '<div class="swiper-arrow-right swipe-arrow"><i class="icon-right-open-mini"></i></div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '<div class="slider-number"><span></span>/<b></b></div>';
      $output .=  '</div>';
      break;

    case 'style3':
      $output  =  '<div '.$id.' class="top-baner swiper-anime-3 arrow-closest poind-closest'.$class.'">';
      $output .=  '<div class="swiper-container top-slider" data-autoplay="'.esc_attr($autoplay).'" data-loop="1" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
      $output .=  '<div class="swiper-wrapper">';

      foreach ($rs_hero_slider as $key => $slide) {

        $image_id      = (isset($slide['atts']['image'])) ? $slide['atts']['image']:'';
        $image_two_id  = (isset($slide['atts']['image_two'])) ? $slide['atts']['image_two']:'';
        $small_heading = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $big_heading   = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';

        $first_slide_class = ($key === 0) ? 'first-slide':'';
        if(!empty($image_id) && is_numeric($image_id) && !empty($image_two_id) && is_numeric($image_two_id)) {
          $image_url     = wp_get_attachment_image_src( $image_id, 'full' );
          $image_two_url = wp_get_attachment_image_src( $image_two_id, 'full' );
          if(isset($image_url[0]) && isset($image_two_url[0])) {

            $output .=  '<div class="swiper-slide '.sanitize_html_classes($first_slide_class).'" data-val="'.esc_attr($key).'">';
            $output .=  '<div class="block-bg type-3'.$uniqid_class.'">';
            $output .=  '<div class="bg-wrap">';
            $output .=  '<div class="bg" style="background-image:url('.esc_url($image_url[0]).')"></div>';
            $output .=  '<div class="white-mobile-layer"></div>';
            $output .=  '</div>';
            $output .=  '<div class="image-front">';
            $output .=  '<img src="'.esc_url($image_two_url[0]).'" alt="">';
            $output .=  '</div>';
            $output .=  '<div class="container">';
            $output .=  '<div class="title-style-4 vertical-align">';
            $output .=  '<h1 class="h1 big-heading">'.wp_kses_post($big_heading).'</h1>';
            $output .=  '<p class="font-type small-heading sub-title-2">'.wp_kses_post($small_heading).'</p>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
            $output .=  '</div>';
          }
        }
      }
      $output .=  '</div>';
      $output .=  '<div class="pagination hidden"></div>';
      $output .=  '<div class="arrow-container">';
      $output .=  '<div class="container">';
      $output .=  '<div class="swipe-arrow-type-1">';
      $output .=  '<div class="swiper-arrow-left swipe-arrow"><i class="icon-left-open-mini"></i></div>';
      $output .=  '<div class="swiper-arrow-right swipe-arrow"><i class="icon-right-open-mini"></i></div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '<div class="slider-number"><span></span>/<b></b></div>';
      $output .=  '</div>';
      break;

    default:
      # code...
      break;
  }


  return $output;

}
add_shortcode('rs_hero_slider', 'rs_hero_slider');

/**
 *
 * RS Hero Slider
 * @version 1.0.0
 * @since 1.0.0
 *
 */
function rs_hero_slider_item( $atts, $content = '', $id = '' ) {
  global $rs_hero_slider;
  $rs_hero_slider[]  = array( 'atts' => $atts, 'content' => $content );
  return;
}
add_shortcode('rs_hero_slider_item', 'rs_hero_slider_item');
