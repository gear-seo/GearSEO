<?php
/**
 * Gallery Post Format
 *
 * @package adios
 * @since 1.0
 */
?>
<?php
  wp_enqueue_script('adios-slick');
  wp_enqueue_style('adios-slick');
  $gallery = adios_get_post_opt('post-gallery');
  if (is_array($gallery)): ?>
  <div class="blog_item_slider arrow-closest">
    <div class="swiper-container poind-closest" data-autoplay="0" data-loop="0" data-speed="800" data-center="0" data-slides-per-view="1">
      <div class="swiper-wrapper">
        <?php
        foreach ($gallery as $item):
          $image_src  = wp_get_attachment_image_src( $item['attachment_id'], 'small-hor' );
        ?>
        <div class="swiper-slide">
          <div class="image">
            <?php if (isset($item['attachment_id'])): ?>
              <img src="<?php echo esc_url($image_src[0]); ?>" alt="" class="resp-img" />
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="pagination hidden point-style"></div>
      <div class="swiper-arrow-left nav-arrow-2"><i class="icon-left-open-mini"></i></div>
      <div class="swiper-arrow-right nav-arrow-2"><i class="icon-right-open-mini"></i></div>
    </div>
  </div>
<?php endif; ?>
