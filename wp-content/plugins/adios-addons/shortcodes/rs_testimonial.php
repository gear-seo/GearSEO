<?php
/**
 *
 * Testimonial
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_testimonial( $atts, $content = '', $id = '' ) {
  global $post;

  extract( shortcode_atts( array(
    'id'       => '',
    'class'    => '',
    'cats'     => 0,
    'style'    => 'style1',
    'limit'    => '2',
    'autoplay' => 0,
    'orderby'  => 'date',
    'order'    => 'DESC',
    'loop'     => 1,
    'speed'    => 600
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. $class : '';
  $limit = ($style == 'style1') ? '1':$limit;

  $args = array(
    'post_type'      => 'testimonial',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => $limit,
  );

  $cats = (is_array($cats)) ? $cats:explode(',', $cats);
  if( !empty($cats[0] )) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'testimonial-category',
        'field'    => 'ids',
        'terms'    => $cats
      )
    );
  }

  $the_query = new WP_Query( $args );

  ob_start();

  switch ($style) {
    default:
    case 'style1':
      while( $the_query->have_posts()) : $the_query->the_post();
        $item_args = array(
          'style'       => $style,
          'author_name' => get_post_meta($post->ID, 'testimonial-author', true),
          'position'    => get_post_meta($post->ID, 'testimonial-position', true),
          'signature'   => get_post_meta($post->ID, 'testimonial-signature', true),
        );
        rs_testimonial_item($item_args);
      endwhile;
      # code...
      break;
    case 'style2':
      wp_enqueue_script('adios-slick');
      wp_enqueue_style('adios-slick');
      echo '<div class="swiper-anime-2 arrow-closest poind-closest">';
      echo '<div class="testimonial-swiper-slider top-slider swiper-container" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1">';
      echo '<div class="swiper-wrapper clearfix">';
        $i = 0;
        while( $the_query->have_posts()) : $the_query->the_post();
          $item_args = array(
            'style'       => $style,
            'author_name' => get_post_meta($post->ID, 'testimonial-author', true),
            'position'    => get_post_meta($post->ID, 'testimonial-position', true),
            'signature'   => get_post_meta($post->ID, 'testimonial-signature', true),
            'count'       => $i
          );
          rs_testimonial_item($item_args);
        $i++;
        endwhile;
        wp_reset_query();
      echo '</div>';
      echo '<div class="pagination hidden"></div>';
      echo '<div class="swipe-arrow-type-1 testimonial-pagination">';
      echo '<div class="swiper-arrow-left swipe-arrow"><i class="icon-left-open-mini"></i></div>';
      echo '<div class="swiper-arrow-right swipe-arrow"><i class="icon-right-open-mini"></i></div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    break;
  }

  $output = ob_get_clean();

  return $output;
}
add_shortcode( 'rs_testimonial', 'rs_testimonial');


if(!function_exists('rs_testimonial_item')) {
  function rs_testimonial_item($item_args) {
    extract($item_args);
    switch ($style) {
      case 'style1': ?>
        <div class="testi-item">
          <?php if(has_post_thumbnail()): ?>
          <div class="image-testi testimonial-img wow slideInUp" data-wow-delay="0.3s">
            <?php the_post_thumbnail('full'); ?>
          </div>
          <?php endif; ?>
          <div class="right-half wow zoomIn" data-wow-delay="0.3s">
            <div class="testi-text testimonial-content">
              <?php the_content(); ?>
            </div>
            <?php if(isset($signature['url'])): ?>
              <img src="<?php echo esc_url($signature['url']); ?>" alt="" class="testi-sign">
            <?php endif; ?>
            <div class="testi-author">
              <span class="testimonial-position"><?php echo esc_html($position); ?></span> <a class="testimonial-name" href="#">@<?php echo esc_html($author_name); ?></a>
            </div>
          </div>
        </div>
        <?php
        break;
      case 'style2': 
      $active_class = ($count == 0) ? ' active':''; 
      ?>
        <div class="swiper-slide <?php echo sanitize_html_class($active_class); ?>" data-val="<?php echo esc_attr($count); ?>">
          <div class="testi-item">
          <?php if(has_post_thumbnail()): ?>
          <div class="image-testi testimonial-img wow slideInUp" data-wow-delay="0.3s">
            <?php the_post_thumbnail('full'); ?>
          </div>
          <?php endif; ?>
          <div class="right-half wow zoomIn" data-wow-delay="0.3s">
            <div class="testi-text testimonial-content">
              <?php the_content(); ?>
            </div>
            <?php if(isset($signature['url'])): ?>
              <img src="<?php echo esc_url($signature['url']); ?>" alt="" class="testi-sign">
            <?php endif; ?>
            <div class="testi-author">
              <span class="testimonial-position"><?php echo esc_html($position); ?></span> <a class="testimonial-name" href="#">@<?php echo esc_html($author_name); ?></a>
            </div>
          </div>
          </div>
        </div>
        <?php
        break;

      case 'style3':
      default: ?>

        <?php
        break;
      case 'style4': ?>

        <?php
        break;
    }
  }
}
