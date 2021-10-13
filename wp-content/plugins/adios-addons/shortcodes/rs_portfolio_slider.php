<?php
/**
 *
 * RS Portfolio
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_portfolio_slider($atts, $content = '', $id = '') {
  global $post;
  wp_enqueue_script('adios-slick');
  wp_enqueue_style( 'adios-slick');
  extract(shortcode_atts(array(
    'id'             => '',
    'class'          => '',
    'limit'          => 4,
    'cats'           => '',
    'style'          => 'style1',
    'speed'          => '600',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'autoplay'       => 0,
    'loop'           => 0,
    'exclude_posts'  => '',
  ), $atts));

  $class = ( $class ) ? ' ' .$class : '';

  $args = array(
    'posts_per_page' => $limit,
    'meta_query'     => array(array('key' => '_thumbnail_id')),
    'orderby'        => $orderby,
    'order'          => $order,
    'post_type'      => 'portfolio',
  );

  $cats = (is_array($cats)) ? $cats:explode(',', $cats);
  if(!empty($cats[0])) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'portfolio-category',
        'field'    => 'id',
        'terms'    => $cats,
      ),
    );
  }

  if (!empty($exclude_posts)) {

    $exclude_posts_arr = explode(',',$exclude_posts);
    if (is_array($exclude_posts_arr) && count($exclude_posts_arr) > 0) {
      $args['post__not_in'] = array_map('intval',$exclude_posts_arr);
    }
  }

  ob_start();

  $the_query = new WP_Query($args);

  switch ($style) {
    default:
    case 'style1': ?>
      <div class="poind-closest <?php echo esc_attr($class); ?>">
        <div class="top-baner swiper-anime bottom-margin slide-arow wow zoomIn" data-wow-delay="0.2s">
         <div class="swiper-container top-slider" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-center="0" data-slides-per-view="1">
          <div class="swiper-wrapper">

            <?php
              $i = 0;
              while( $the_query->have_posts() ) : $the_query->the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
                $term_name = array();
                if (count($terms) > 0):
                  foreach ($terms as $term):
                    $term_name[] = $term->name;
                  endforeach;
                endif;
                $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-xxl' );
              ?>
               <div class="swiper-slide <?php echo ($i == 0) ? 'first-slide':''; ?>" data-val="<?php echo esc_attr($i); ?>">
                <div class="block-bg">
                  <div class="bg-wrap">
                   <div class="bg portfolio-slider-img" style="background-image:url(<?php echo esc_url($image_src[0]); ?>)"></div>
                     <div class="white-mobile-layer"></div>
                  </div>
                  <div class="title-style-1 vertical-align inside">
                   <div class="sub-title">
                    <h5 class="h5 portfolio-slider-category"><?php echo implode(', ', $term_name); ?></h5>
                   </div>
                  <h2 class="h1 portfolio-slider-title"><?php the_title(); ?></h2>
                  <div class="title-link">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="link-type-1"><?php echo esc_html__('visit portfolio', 'adios-addons'); ?><i class="icon-right-open-mini"></i></a>
                  </div>
                  </div>
                </div>
               </div>
              <?php
                $i++;
                endwhile;
                wp_reset_postdata();
              ?>
            </div>
            <div class="pagination vertical-point"></div>
         </div>
        </div>
      </div>
      <?php
      # code...
      break;
    
    case 'style2': ?>
      <div class="block-bg style2 portfolio-slider <?php echo esc_attr($class); ?>">
        <div class="arrow-closest poind-closest">
          <div class="swiper-container album-slider" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lg-slides="2" data-add-slides="2">
            <div class="swiper-wrapper">
              <?php
                while( $the_query->have_posts() ) : $the_query->the_post();
                  $terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
                  $term_name = array();
                  if (count($terms) > 0):
                    foreach ($terms as $term):
                      $term_name[] = $term->name;
                    endforeach;
                  endif;
                  $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-ver' );
              ?>
              <div class="swiper-slide">
                <div class="album-padd-wrap wow zoomIn" data-wow-delay="0.2s">
                  <div class="album-item text-center">
                    <div class="album-img portfolio-slider-img" style="background-image:url(<?php echo esc_url($image_src[0]); ?>)"></div>
                    <div class="album-desc">
                      <h2 class="h2 portfolio-slider-title">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><?php the_title(); ?></a>
                      </h2>
                      <span class="portfolio-slider-category"><?php echo implode(', ', $term_name); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                endwhile;
                wp_reset_postdata();
              ?>
            </div>
            <div class="pagination hidden point-style"></div>
            <div class="swipe-arrow-type-1 testimonial-pagination">
              <div class="swiper-arrow-left swipe-arrow">
                <i class="icon-left-open-mini"></i>
              </div>
              <div class="swiper-arrow-right swipe-arrow">
                <i class="icon-right-open-mini"></i>
              </div>
            </div>
          </div><!-- .swiper-container -->
        </div>
      </div>
      <?php
      break;

      case 'style3': ?>

        <div class="block-bg style3 portfolio-slider">
          <div class="arrow-closest poind-closest">
            <div class="swiper-container album-slider album-slider-fullscreen" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-center="1" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lg-slides="2" data-add-slides="2">
              <div class="swiper-wrapper">

                <?php
                while( $the_query->have_posts() ) : $the_query->the_post();
                  $terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
                  $term_name = array();
                  if (count($terms) > 0):
                    foreach ($terms as $term):
                      $term_name[] = $term->name;
                    endforeach;
                  endif;
                  $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-ver' );
                ?>
                <div class="swiper-slide">
                  <div class="album-padd-wrap wow zoomIn" data-wow-delay="0.2s">
                    <div class="album-item text-center">
                      <div class="album-img portfolio-slider-img" style="background-image:url(<?php echo esc_url($image_src[0]); ?>)"></div>
                      <div class="album-desc">
                        <h2 class="h2 portfolio-slider-title">
                          <a href="<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><?php the_title(); ?></a>
                        </h2>
                        <span class="portfolio-slider-category"><?php echo implode(', ', $term_name); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
              ?>
              </div>
              <div class="pagination hidden point-style"></div>
            </div><!-- .swiper-container -->
          </div>
        </div>
        <?php
        # code...
        break;
  }
  $output = ob_get_clean();
  return $output;
}

add_shortcode('rs_portfolio_slider', 'rs_portfolio_slider');
