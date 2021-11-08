<?php
/**
 * Portfolio Pagination
 *
 * @package adios
 * @since 1.0
 *
 */
?>

<section class="section pt-100 pb-100  border-top">
  <div class="container">
    <div class="row">
      <?php
        $nextPost  = get_next_post();
        $prevPost  = get_previous_post();
        $col_class = (!$prevPost || !$nextPost) ? 'col-md-12':'col-md-6 col-sm-6 col-xs-6';
        if($prevPost):
          $args = array(
            'posts_per_page' => 1,
            'include'        => $prevPost->ID,
            'post_type'      => 'portfolio'
          );
          $prevPost = get_posts($args);
          foreach ($prevPost as $post):
            setup_postdata($post);
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
      ?>
      <div class="<?php echo sanitize_html_classes($col_class); ?>">
        <div class="case-nav left-case-nav wow zoomIn" data-wow-delay="0.4s">
          <div class="bg" style="background-image:url(<?php echo esc_url($img_src[0]); ?>)"></div>
           <div class="white-mobile-layer"></div>
          <a href="<?php echo esc_url(get_the_permalink()); ?>" class="link-layer"></a>
          <div class="title-style-1">
             <div class="sub-title">
              <h5 class="h5"><?php esc_html_e('Previous', 'adios'); ?></h5>
             </div>
            <h2 class="h2"><?php the_title(); ?></h2>
          </div>
        </div>
      </div>
      <?php wp_reset_postdata(); endforeach; endif; ?>

      <?php
        if($nextPost):
          $args = array(
            'posts_per_page' => 1,
            'include'        => $nextPost->ID,
            'post_type'      => 'portfolio'
          );
          $nextPost = get_posts($args);
          foreach ($nextPost as $post):
            setup_postdata($post);
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
      ?>
      <div class="<?php echo sanitize_html_classes($col_class); ?>">
        <div class="case-nav right-case-nav wow zoomIn" data-wow-delay="0.4s">
          <div class="bg" style="background-image:url(<?php echo esc_url($img_src[0]); ?>)"></div>
           <div class="white-mobile-layer"></div>
          <a href="<?php echo esc_url(get_the_permalink()); ?>" class="link-layer"></a>
          <div class="title-style-1">
             <div class="sub-title">
              <h5 class="h5"><?php esc_html_e('Next', 'adios'); ?></h5>
             </div>
            <h2 class="h2"><?php the_title(); ?></h2>
          </div>
        </div>
      </div>
      <?php wp_reset_postdata(); endforeach; endif; ?>



    </div>
  </div>
</section>

