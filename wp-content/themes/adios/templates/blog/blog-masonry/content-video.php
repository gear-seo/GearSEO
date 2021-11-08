<?php
/**
 * Video Post Format
 *
 * @package adios
 * @since 1.0
 */
?>
<?php
  //wp_enqueue_style( 'mediaelement' );
  global $post;
  $img_src        = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'small-hor');
  $video_url_m4v  = adios_get_post_opt('post-video-url-m4v');
  $video_url_webm = adios_get_post_opt('post-video-url-webm');
  if(isset($img_src[0]) && !empty($video_url_m4v) && !empty($video_url_webm)):
?>
<div class="video-item">
  <div class="bg" style="background-image:url(<?php echo esc_url($img_src[0]); ?>)"></div>
  <div class="play-button"><i class="icon-play"></i></div>
   <div class="video-wrapper">
   <video loop class="bgvid">
    <source type="video/webm" src="<?php echo esc_url($video_url_webm); ?>" />
    <source type="video/mp4" src="<?php echo esc_url($video_url_m4v); ?>" />
   </video>
   <div class="close-video"><span>+</span></div>
   </div>
</div>
<?php endif; ?>


