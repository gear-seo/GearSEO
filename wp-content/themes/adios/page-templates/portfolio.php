<?php
/**
 * Template Name: Portfolio
 *
 * @package adios
*/
get_header();

$portfolio_layout = adios_get_post_opt('portfolio-layout');
switch ($portfolio_layout) {
  default:
  case 'one_column':
    $width_class  = 'wh-100';
    $image_size   = 'large-hor';
    $filter_class = 'left-filter';
    break;

  case 'three_column':
    $width_class  = 'wh-30';
    $image_size   = 'small-alt';
    $filter_class = 'center-filter';
    break;

  case 'four_column':
    $width_class  = 'wh-25';
    $image_size   = 'small';
    $filter_class = 'center-filter';
    break;

  case 'masonry':
    $image_size   = array(
      'wh-25|small-ver',
      'wh-25|small-square',
      'wh-50|medium',
      'wh-25|small-square',
    );
    $filter_class = 'center-filter';
    $width_class  = '';
    break;
}


if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

$posts_per_page = adios_get_post_opt('portfolio-posts-per-page');
if (!$posts_per_page) {
    $posts_per_page = get_option('posts_per_page');
}

$args = array(
  'numberposts'    => '',
  'posts_per_page' => $posts_per_page,
  'meta_query'     => array(array('key' => '_thumbnail_id')),
  'orderby'        => 'date',
  'order'          => 'DESC',
  'post_type'      => 'portfolio',
  'paged'          => $paged,
  'post_status'    => 'publish'
);
$categories = adios_get_post_opt('portfolio-category');
if (is_array($categories)) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'portfolio-category',
      'field'    => 'id',
      'terms'    => $categories,
    ),
  );
}

$exclude_posts = adios_get_post_opt('portfolio-exclude-posts');
if (!empty($exclude_posts)) {

  $exclude_posts_arr = explode(',',$exclude_posts);
  if (is_array($exclude_posts_arr) && count($exclude_posts_arr) > 0) {
    $args['post__not_in'] = array_map('intval',$exclude_posts_arr);
  }
}

$the_query = new WP_Query($args);
$max_num_pages = $the_query -> max_num_pages;
?>


<div class="content <?php echo adios_get_post_opt('page-margin'); ?>">
  <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php
              if(adios_get_post_opt('portfolio-enable-filter')):
                $terms = get_terms('portfolio-category', array('orderby' => 'name', 'include' => $categories));
                if (count($terms) > 0): ?>
                <div class="filters <?php echo sanitize_html_class($filter_class); ?> wow zoomIn" data-wow-delay="0.2s">
                 <div class="drop-filter"><span><?php esc_html_e('All', 'adios'); ?> </span><i class="icon-down-open-mini"></i></div>
                   <ul class="filter-mob-list">
                   <li class="active" data-filter="*"><?php esc_html_e('All', 'adios'); ?></li>
                   <?php foreach ($terms as $term): ?>
                      <li data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></li>
                    <?php endforeach; ?>
                   </ul>
                </div>
              <?php
                endif;
              endif;
            ?>


          </div>
        </div>
        <div class="row">

          <div class="izotope-container lightgallery">
          <div class="grid-sizer"></div>
            <?php
              $count = 0;
              $delay = 0.3;
              while ($the_query -> have_posts()) : $the_query -> the_post();
                $count = ($count > 3) ? 0:$count;
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
                  'posts_per_page' => $posts_per_page,
                  'count'          => $count,
                  'limit'          => $posts_per_page,
                  'delay'          => $delay,
                  'link_to'        => adios_get_post_opt('portfolio-link-to'),
                  'external_url'   => adios_get_post_opt('portfolio-external-link-url'),
                  'style'          => $portfolio_layout
                );
                adios_portfolio_items($args, $image_size, $term_slugs, $term_names);
                $count++;
                $delay += 0.2;
              endwhile;
              wp_reset_postdata();
            ?>
         </div>


       </div>
    </div>
  </section>


</div>
<?php
get_footer();
