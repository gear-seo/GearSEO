<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_hero_video_banner( $atts, $content = '', $id = '' ) {
  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'style'         => 'html5',
    'small_heading' => '',
    'heading'       => '',
    'mute'          => 'true',
    'data_link'     => '',
    'vimeo_url'     => '',
    'video_mp4'     => '',
    'video_webm'    => '',
    'text_color'    => 'black',
    'poster_img'    => ''
  ), $atts ) );

  $id            = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class         = ( $class ) ? ' '. sanitize_html_classes($class) : '';
  $video_class   = ($style == 'html5') ? 'white-style inside':'not-white';
  $wrapper_class = ($style == 'html5') ? 'overflow-hidden':'overflow-visible';

  $poster = '';
  if(!empty($poster_img) && is_numeric($poster_img)) {
    $image_url  = wp_get_attachment_image_src( $poster_img, 'full' );
    if(isset($image_url[0])) {
      $poster = 'poster="'.esc_url($image_url[0]).'"';
    }
  }

  $output = '';
  if(!empty($data_link) || !empty($vimeo_url) || !empty($video_mp4) || !empty($video_webm)):

    $output .=  '<div class="top-baner video-bg bottom-margin'.$class.'">';
    $output .=  '<div class="block-bg top-image">';
    $output .=  '<div id="home" class="bg-wrap video-bg-wrap '.$wrapper_class.'">';

    if(!empty($video_webm) && !empty($video_mp4) && $style == 'html5'):
      $output .=  '<div class="video-iframe">';
      $output .=  '<video playsinline loop autoplay muted controls '.$poster.' class="bgvid">';
      $output .=  '<source type="video/webm" src="'.esc_url($video_webm).'">';
      $output .=  '<source type="video/mp4" src="'.esc_url($video_mp4).'">';
      $output .=  '</video>';
      $output .=  '</div>';
    endif;

    if(!empty($data_link) && $style == 'youtube'):
      $output .=  '<div class="video-iframe">';
      $output .= '<div id="bgndVideo" class="player yt-player" data-property="{videoURL:\''.$data_link.'\',containment:\'#home\',autoPlay:true, showControls:true, showYTLogo: false, mute:'.$mute.', startAt:0, opacity:1, optimizeDisplay:true}">';
      $output .= '<div class="player-mb yt-player" data-property="{videoURL:\''.$data_link.'\' ,containment:\'self\',autoPlay:true, showControls:true, showYTLogo: false, mute:'.$mute.', startAt:0, opacity:1, optimizeDisplay:false}">';
        $output .= '</div>';
        $output .= '</div>';
    endif;

    if(!empty($vimeo_url) && $style == 'vimeo'):
      $output .=  '<div class="video-iframe">';
      $output .= '<div id="bgndVideo" class="player vm-player" data-property="{videoURL:\''.$vimeo_url.'\',containment:\'#home\',autoplay:true, showControls:true, showYTLogo: false, mute:'.$mute.', startAt:0, opacity:1, optimizeDisplay:true}">';
      $output .= '<div class="player-mb vm-player" data-property="{videoURL:\''.$vimeo_url.'\' ,containment:\'self\',autoPlay:true, showControls:true, showYTLogo: false, mute:'.$mute.', startAt:0, opacity:1, optimizeDisplay:false}">';
        $output .= '</div>';
        $output .= '</div>';
    endif;

    $output .=  '</div>';
    $output .=  '<div class="title-style-1 '.sanitize_html_class($text_color ).' vertical-align '.sanitize_html_classes($video_class).'">';
    $output .=  '<div class="sub-title">';
    $output .=  '<h5 class="h5 hero-subheading">'.wp_kses_post($small_heading).'</h5>';
    $output .=  '</div>';
    $output .=  '<h1 class="h1 hero-title">'.wp_kses_post($heading).'</h1>';
    $output .=  '</div>';
    $output .=  '</div>';
    $output .=  '</div>';

  endif;

  return $output;
}

add_shortcode('rs_hero_video_banner', 'rs_hero_video_banner');