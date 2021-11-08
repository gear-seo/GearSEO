<?php
/**
 * Blog Meta
 *
 * @package adios
 * @since 1.0
 */
?>
<div class="meta">
  <span><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F d, Y'); ?></time></span>
  <span><?php echo adios_getPostViews(get_the_ID()); ?></span>
  <span><a href="#"><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></span>
</div><!-- /meta -->

