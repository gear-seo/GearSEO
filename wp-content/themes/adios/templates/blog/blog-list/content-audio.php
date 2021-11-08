<?php
/**
 * Audio Post Format
 *
 * @package adios
 * @since 1.0
 */
?>
<?php
  $audio_id  = adios_get_post_opt('post-audio-id');
  if(!empty($audio_id)):
?>
<div class="sound-item">
  <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo esc_attr($audio_id); ?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
</div>
<?php endif; ?>


