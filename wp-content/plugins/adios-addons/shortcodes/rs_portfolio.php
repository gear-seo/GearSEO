<?php
/**
 *
 * RS Portfolio
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_portfolio($atts, $content = '', $id = '') {
  global $post;
  extract(shortcode_atts(array(
    'id'             => '',
    'class'          => '',
    'style'          => 'one_column',
    'filter_cats'    => '',
    'orderby'        => 'ID',
    'order'          => 'DESC',
    'show_filter'    => 'yes',
    'limit'          => '',
    'cats'           => '',
    'exclude_posts'  => '',
  ), $atts));

  $class = ( $class ) ? ' ' .$class : '';

  if (get_query_var('paged')) {
    $paged = get_query_var('paged');
  } elseif (get_query_var('page')) {
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }


switch ($style) {
  default:
  case 'one_column':
    $width_class         = 'wh-100';
    $image_size          = 'large-hor';
    $filter_class        = 'left-filter';
    $outer_wrapepr_class = 'portfolio-outer-wrapper';
    $isotope_class       = '';
    break;

  case 'three_column':
    $width_class         = 'wh-30';
    $image_size          = 'small-alt';
    $filter_class        = 'center-filter';
    $outer_wrapepr_class = 'portfolio-outer-wrapper';
    $isotope_class       = '';
    break;

  case 'four_column':
    $width_class         = 'wh-25';
    $image_size          = 'small';
    $filter_class        = 'center-filter';
    $outer_wrapepr_class = 'portfolio-outer-wrapper';
    $isotope_class       = '';
    break;

  case 'masonry':
    $image_size   = array(
    'wh-25|small-ver',
    'wh-25|small-square',
    'wh-50|medium',
    'wh-25|small-square',
    'wh-50|medium',
    'wh-25|small-square',
    'wh-25|small-square',
    'wh-50|medium',
    );
    $filter_class = 'center-filter';
    $isotope_class       = '';
    $width_class  = '';
    break;

  case 'masonry_alt':
    $image_size          = array('medium-hor', 'large-ver-alt', 'large-ver-alt', 'medium-hor');
    $width_class         = 'wh-50';
    $filter_class        = '';
    $show_filter         = 'no';
    $isotope_class       = 'lg-portfolio';
    $outer_wrapepr_class = 'lg-portfolio-wrap';
    break;
}

  $args = array(
    'posts_per_page' => $limit,
    'meta_query'     => array(array('key' => '_thumbnail_id')),
    'orderby'        => $orderby,
    'order'          => $order,
    'post_type'      => 'portfolio',
    'paged'          => $paged,
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
  $max_num_pages = $the_query->max_num_pages; ?>

  <div class="content <?php echo esc_attr($class); ?>">
    <section class="section pt-0">
      <div class="<?php echo esc_attr($outer_wrapepr_class); ?>">
          <?php if($show_filter =='yes'): ?>
            <div class="row">
              <div class="col-md-12">
                <?php
                    $terms = get_terms('portfolio-category', array('orderby' => 'name', 'include' => $filter_cats));
                    if (count($terms) > 0): ?>
                    <div class="filters <?php echo sanitize_html_class($filter_class); ?> wow zoomIn" data-wow-delay="0.2s">
                     <div class="drop-filter"><span><?php esc_html_e('All', 'adios-addons'); ?> </span><i class="icon-down-open-mini"></i></div>
                       <ul class="filter-mob-list">
                       <li class="active" data-filter="*"><?php esc_html_e('All', 'adios-addons'); ?></li>
                       <?php foreach ($terms as $term): ?>
                          <li data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></li>
                        <?php endforeach; ?>
                       </ul>
                    </div>
                  <?php
                    endif;
                  ?>
              </div>
            </div>
          <?php endif; ?>
          <div class="row">

            <div class="izotope-container lightgallery <?php echo esc_attr($isotope_class); ?>">
            <div class="grid-sizer"></div>
              <?php
                $count = 0;
                $delay = 0.3;
                while ($the_query -> have_posts()) : $the_query -> the_post();
                  $count = ($count > 3 && $style == 'masonry_alt') ? 0:$count;
                  $terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
                  $term_slugs = array();
                  $term_names = array();
                  if (count($terms) > 0):
                    foreach ($terms as $term):
                      $term_slugs[] = $term->slug;
                      $term_names[] = $term->name;
                    endforeach;
                  endif;
                  $args = array(
                    'width_class'    => $width_class,
                    'posts_per_page' => $limit,
                    'count'          => $count,
                    'limit'          => $limit,
                    'delay'          => $delay,
                    'link_to'        => adios_get_post_opt('portfolio-link-to'),
                    'external_url'   => adios_get_post_opt('portfolio-external-link-url'),
                    'style'          => $style
                  );
                  adios_portfolio_items($args, $image_size, $term_slugs, $term_names);
                  $count++;
                  $delay += 0.2;
                endwhile;
                wp_reset_postdata();
              ?>
           </div>
          </div><!--row-->
          <?php
            $next_page_url = adios_next_page_url($max_num_pages);
            if(!empty($next_page_url) && $style == 'masonry_alt'):
          ?>
            <div class="row ajax-load-more">
              <div class="col-md-12">
                <div class="text-center wow zoomIn" data-wow-delay="0.3s">
                  <a href="<?php echo esc_url($next_page_url); ?>" data-loading-text="Loading.." id="portfolio-load-more" class="link-type-2 portfolio-load-more"><span><?php echo esc_html__('View more', 'adios-addons'); ?></span></a>
                </div>
              </div>
            </div>
          <?php endif; ?>


      </div>
    </section>
  </div>
<?php
  $output = ob_get_clean();
  return $output;
}

add_shortcode('rs_portfolio', 'rs_portfolio');

