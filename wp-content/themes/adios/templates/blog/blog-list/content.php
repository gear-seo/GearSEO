<?php
/**
 * Blog Meta
 *
 * @package adios
 * @since 1.0
 */
?>
<?php if(has_post_thumbnail()): ?>
  <div class="image">
    <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_post_thumbnail('medium-big'); ?></a>
  </div>
<?php endif; ?>
