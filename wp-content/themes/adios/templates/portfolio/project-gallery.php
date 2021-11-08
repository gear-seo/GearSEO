<?php
/**
 * Portfolio Details
 *
 * @package adios
 * @since 1.0
 *
 */
?>
<?php
  wp_enqueue_script('adios-slick');
  wp_enqueue_style( 'adios-slick');
  $gallery_images = adios_get_post_opt('portfolio-gallery');
  $attachment_id = '';
  if(!empty($gallery_images) && is_array($gallery_images)):
    $attachment_id = $gallery_images[0]['attachment_id'];
  endif;
?>
<section class="section no-padd arrow-closest">
  <div class="container">
    <?php if(is_array($gallery_images) && !empty($attachment_id)): ?>
    <div class="case-slider wow zoomIn" data-wow-delay="0.2s">
      <div class="swiper-container poind-closest" data-autoplay="0" data-loop="0" data-speed="800" data-center="0" data-slides-per-view="1">
        <div class="swiper-wrapper">
          <?php foreach ($gallery_images as $item): ?>
          <div class="swiper-slide">
            <?php if (isset($item['attachment_id'])):
              $image_src  = wp_get_attachment_image_src($item['attachment_id'], 'full'); ?>
              <img src="<?php echo esc_url($image_src[0]); ?>" class="resp-img" alt="" />
              <span class="gallery-caption"><?php echo esc_html($item['title']); ?></span>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="pagination hidden point-style"></div>
        <div class="swiper-arrow-left nav-arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow_left.png" alt=""></div>
        <div class="swiper-arrow-right nav-arrow"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow_right.png" alt=""></div>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <div class="case-folow wow zoomIn" data-wow-delay="0.4s">
    <div class="folow-icon caption">
      <span><?php echo esc_html__('Share on', 'adios'); ?></span>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>"><i class="icon-facebook"></i></a>
      <a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>"><i class="icon-twitter"></i></a>
      <a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="icon-gplus"></i></a>
    </div>
  </div>
</section>

