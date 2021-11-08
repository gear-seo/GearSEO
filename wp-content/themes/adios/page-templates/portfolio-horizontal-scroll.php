<?php
/**
 * Template Name: Portfolio Horizontal Scroll
 *
 * @package adios
*/
get_header();

wp_enqueue_style('adios-horizontal-scroll');

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
$style         = adios_get_post_opt('portfolio-horizontal-scroll-style');
if (!empty($exclude_posts)) {

  $exclude_posts_arr = explode(',',$exclude_posts);
  if (is_array($exclude_posts_arr) && count($exclude_posts_arr) > 0) {
    $args['post__not_in'] = array_map('intval',$exclude_posts_arr);
  }
}

$the_query = new WP_Query($args); 

?>
<div class="content <?php echo adios_get_post_opt('page-margin'); ?>">
  <div class="horizontal-scroll-wrap">
    <div class="horizontal-scroll">
      <div class="horizontal-scroll-in">
        <div class="horizontal-scroll-bar <?php echo esc_attr($style); ?> lightgallery">
          <?php 
            while ($the_query -> have_posts()) : $the_query -> the_post();
            $link_class   = '';
            $link_to      = adios_get_post_opt('portfolio-link-to');
            $image_src    = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            $external_url = adios_get_post_opt('portfolio-external-link-url');
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

          ?>
            <div class="horizontal-scroll-item item" style="background-image: url(<?php echo esc_url($image_src[0]); ?>)">
              <a href="<?php echo esc_url($href); ?>" class="link-wrap  item-hov <?php echo esc_attr($link_class); ?>"><span></span><span></span></a>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>

          <div class="hr-right-padd"></div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
