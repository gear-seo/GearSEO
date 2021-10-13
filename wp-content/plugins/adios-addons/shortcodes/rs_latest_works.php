<?php
/**
 *
 * RS Portfolio
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_latest_works($atts, $from_elem = false, $content = '', $id = '') {
  global $post;
  extract(shortcode_atts(array(
    'id'             => '',
    'class'          => '',
    'style'          => 'style1',
    'filter_cats'    => '',
    'heading'        => '',
    'show_heading'   => 'yes',
    'load_more_size' => 'small',
    'limit'          => 4,
    'orderby'        => 'date',
    'cats'           => '',
    'exclude_posts'  => '',
  ), $atts));

  $class = ( $class ) ? ' ' .$class : '';
  $limit = (empty($limit)) ? 4:$limit;

  if (get_query_var('paged')) {
    $paged = get_query_var('paged');
  } elseif (get_query_var('page')) {
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }
  
  switch ($style) {
    case 'style1':
      $image_size = array(
        'wh-25|small-ver',
        'wh-50|medium',
        'wh-25|small-square',
        'wh-25|small-square',
      );
      break;
    default:
      # code...
      break;
  }

  $args = array(
    'posts_per_page' => $limit,
    'meta_query'     => array(array('key' => '_thumbnail_id')),
    'orderby'        => $orderby,
    'post_type'      => 'portfolio',
    'paged'          => $paged,
  );

  $cats = (is_array($cats)) ? $cats:explode(',', $cats);

  if(!empty($cats[0])) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'portfolio-category',
        'field'    => 'id',
        'terms'    => $cats
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

  $max_num_pages = $the_query->max_num_pages;

  switch ($style) {
    case 'style1': ?>
      <div class="pf-wrapper <?php echo sanitize_html_classes($class); ?>">

        <div class="row">
          <?php if($show_heading == 'yes'): ?>
          <div class="col-md-2 col-sm-3">
            <div class="title-style-2 wow zoomIn" data-wow-delay="0.2s">
              <div class="sub-title">
                <h5 class="h5"><?php echo esc_html($heading); ?></h5>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php
            $terms = get_terms('portfolio-category', array('orderby' => 'name', 'include' => $cats));
              if(count($terms) > 0):
          ?>
          <div class="<?php echo ($show_heading == 'yes') ? 'col-md-10 col-sm-9':'col-md-12 col-sm-12'; ?>">
            <div class="<?php echo ($show_heading == 'yes') ? 'xx-filter':'center-filter'; ?> filters wow zoomIn" data-wow-delay="0.3s">
              <div class="drop-filter"><span><?php echo esc_html__('All', 'adios-addons'); ?> </span><i class="icon-down-open-mini"></i></div>
                <ul class="filter-mob-list">
                  <li class="active" data-filter="*"><?php echo esc_html__('All', 'adios-addons'); ?></li>
                  <?php foreach ($terms as $term): ?>
                    <li data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></li>
                  <?php endforeach; ?>
                </ul>
            </div>
          </div>
          <?php endif; ?>

        </div>

        <div class="row ajx-pf-container">
          <div class="izotope-container lightgallery">
            <div class="grid-sizer"></div>
            <?php
              $i     = 0;
              $delay = 0.3;
              while( $the_query->have_posts() ) : $the_query->the_post();
                $i = ($i > 3) ? 0:$i;
                $terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
                $term_slugs = array();
                if (count($terms) > 0):
                  foreach ($terms as $term):
                    $term_slugs[] = $term->slug;
                  endforeach;
                endif;
                $portfolio_item_args = array(
                  'count'        => $i,
                  'style'        => $style,
                  'limit'        => $limit,
                  'delay'        => $delay,
                  'link_to'      => adios_get_post_opt('portfolio-link-to'),
                  'external_url' => adios_get_post_opt('portfolio-external-link-url'),
                );
                rs_latest_works_item($portfolio_item_args, $image_size, $term_slugs);
                $i++;
              endwhile;
              wp_reset_postdata();
            ?>

          </div>
        </div>
        <?php
          $next_page_url = adios_next_page_url($max_num_pages);
          if(!empty($next_page_url)):
        ?>
        <div class="row ajax-load-more">
          <div class="col-md-12">
            <div class="text-center wow zoomIn" data-wow-delay="0.3s">
              <?php if($load_more_size == 'small'): ?>
                <a href="<?php echo esc_url($next_page_url); ?>" data-post-limit="<?php echo esc_attr($limit); ?>" data-total-post="<?php echo esc_attr($the_query->found_posts); ?>" data-loading-text="Loading.." id="portfolio-load-more" class="link-type-2 portfolio-load-more"><span><?php echo esc_html__('View more', 'adios-addons'); ?></span></a>
              <?php else: ?>
                <a href="<?php echo esc_url($next_page_url); ?>" data-post-limit="<?php echo esc_attr($limit); ?>" data-total-post="<?php echo esc_attr($the_query->found_posts); ?>" id="portfolio-load-more" class="big-more portfolio-load-more load-more"><span class="link-wrap"><span></span><span></span></span><b><?php echo esc_html__('load more', 'adios-addons'); ?></b></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>
      <?php
      break;

    case 'style2':
    default: ?>
      <div class="izotope-container lightgallery">
        <div class="grid-sizer"></div>
          <div class="inner-isotope">
        <?php
          $i     = 0;
          $delay = 0.3;
          while( $the_query->have_posts() ) : $the_query->the_post();
            $terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
            $term_slugs = array();
            if (count($terms) > 0):
              foreach ($terms as $term):
                $term_slugs[] = $term->slug;
              endforeach;
            endif;
            $portfolio_item_args = array(
              'count'        => $i,
              'style'        => $style,
              'limit'        => $limit,
              'delay'        => $delay,
              'link_to'      => adios_get_post_opt('portfolio-link-to'),
              'external_url' => adios_get_post_opt('portfolio-external-link-url'),
            );
            rs_latest_works_item($portfolio_item_args, $image_size = '', $term_slugs);
            $i++;
            //$delay += 0.2;
          endwhile;
          wp_reset_postdata();
        ?>
        </div>
      </div>
      <?php
      break;
  }

  $output = ob_get_clean();
  return $output;
}

add_shortcode('rs_latest_works', 'rs_latest_works');


if(!function_exists('rs_latest_works_item')) {
  function rs_latest_works_item($portfolio_item_args, $image_size, $term_slugs) {
    extract($portfolio_item_args);
    global $post;
    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    $link_class = '';
    if($link_to == 'lightbox') {
      wp_enqueue_style('adios-lightgallery');
      wp_enqueue_script('adios-lightgallery');
      $link_class = 'lightbox-item';
      $href = $image_src[0];
    } elseif($link_to == 'external-url' && !empty($external_url)) {
      $href = $external_url;
    } else {
      $href = get_the_permalink();
    }
    switch ($style) {
      case 'style1':
        $count              = ( $count < 4 ) ? $count:0;
        $image_attr         = explode('|', $image_size[$count]);
        $featured_image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $image_attr[1] );
      ?>
      <div class="item masonry-item pf-item <?php echo sanitize_html_classes($image_attr[0]); ?> <?php echo implode(' ', $term_slugs); ?>">
        <div class="item-drid-size">
          <img src="<?php echo esc_url($featured_image_src[0]); ?>" alt="" class="resp-img">
          <a href="<?php echo esc_url($href); ?>" class="link-wrap <?php echo esc_attr($link_class); ?> item-hov"><span></span><span></span></a>
        </div>
      </div>
      <?php
      break;
      case 'style2':
      default:
        $featured_image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-ver' );
      ?>
        <div class="item wh-50 <?php echo implode(' ', $term_slugs); ?> no-gitter">
          <img src="<?php echo esc_url($featured_image_src[0]); ?>" alt="" class="resp-img">
          <a href="<?php echo esc_url($href); ?>" class="link-wrap <?php echo esc_attr($link_class); ?>"><span></span><span></span></a>
        </div>
      <?php break;
    }
  }
}
