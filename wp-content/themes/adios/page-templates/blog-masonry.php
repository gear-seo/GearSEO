<?php
/**
 * Template Name: Blog Masonry
 *
 * @package adios
*/
get_header();

if (get_query_var('paged')) {
  $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
  $paged = get_query_var('page');
} else {
  $paged = 1;
}
$post_per_page = adios_get_post_opt('blog-posts-per-page');
if (!$post_per_page) {
  $post_per_page = get_option('posts_per_page');
}

$post_args = array(
  'posts_per_page' => $post_per_page,
  'orderby'        => 'date',
  'paged'          => $paged,
  'order'          => 'DESC',
  'post_type'      => 'post',
  'post_status'    => 'publish'
);

$categories = adios_get_post_opt('blog-category');
if (is_array($categories)) {
  $post_args['category__in'] =  $categories;
}

$query = new WP_Query( $post_args );
if(is_page()) {
  $max_num_pages = $query -> max_num_pages;
} else {
  global $wp_query;
  $query = $wp_query;
  $max_num_pages = false;
}

?>

<div class="content pt-100 pb-100 <?php echo adios_get_post_opt('page-margin'); ?>">
  <section class="section">
    <div class="container">
      <?php get_template_part('templates/global/blog-before-content'); ?>

      <div <?php post_class('izotope-container padd-15 masonry-blog'); ?>>
        <div class="grid-sizer"></div>
        <?php if($query -> have_posts()):
        $delay = 0.2;
        while ($query -> have_posts()) : $query -> the_post();
        ?>
        <div class="wh-30 item wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
          <div class="blog_item">
            <?php get_template_part('templates/blog/blog-masonry/content', get_post_format()); ?>
            <div class="twit-desc">
               <h4 class="h4 title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
               <div class="twit-author">
                <?php echo get_avatar(get_the_author_meta( 'ID' ),45); ?>
                  <div class="post-txt">
                    <h6 class="h6"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a></h6>
                    <p><?php echo esc_html__('In', 'adios'); ?> <?php echo get_the_category_list( esc_html__( ', ', 'adios' ) );?> <?php echo esc_html__('Posted', 'adios'); ?> <span class="post-date"><?php the_time('F d, Y'); ?></span></p>
                  </div>
               </div>
               <?php if(has_excerpt()): ?>
                <div class="simple-text">
                  <p><?php echo adios_auto_post_excerpt(); ?></p>
                </div>
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="link-type-1"><?php echo esc_html__('Learn More', 'adios'); ?><i class="icon-right-open-mini"></i></a>
              <?php endif; ?>
             </div>
          </div>
        </div>
      <?php $delay += 0.2; endwhile; wp_reset_postdata(); else:
        get_template_part('templates/content', 'none');
      endif; ?>
      </div><!--end of izo-->
      <?php adios_paging_nav($max_num_pages, 'default'); ?>
      <?php get_template_part('templates/global/blog-after-content'); ?>
    </div>
  </section>
</div>

<?php
get_footer();
