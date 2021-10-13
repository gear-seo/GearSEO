<?php
/**
 *
 * RS Blog
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function rs_blog( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'cats'          => 0,
    'orderby'       => 'ID',
    'post_per_page' => '1',
    'exclude_posts' => '',
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. $class : '';

  if (get_query_var('paged')) {
    $paged = get_query_var('paged');
  } elseif (get_query_var('page')) {
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }

  // Query args
  $args = array(
    'paged'          => $paged,
    'orderby'        => $orderby,
    'posts_per_page' => $post_per_page,
  );

  if( $cats ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'category',
        'field'    => 'ids',
        'terms'    => explode(',', $cats)
      )
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

  ?>

  <div class="ls-blog <?php echo sanitize_html_classes($class); ?>">
    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
      <div class="twit-item wow zoomIn" data-wow-delay="0.4s">
        <?php the_post_thumbnail('medium-alt', array('class' => 'resp-img')); ?>
        <div class="twit-desc">
         <h2 class="h2 title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
           <div class="twit-author">
            <?php echo get_avatar(get_the_author_meta( 'ID' ),45); ?>
              <div class="post-txt">
                <h6 class="h6"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a></h6>
                <p><?php echo esc_html__('In', 'adios-addons'); ?> <?php echo get_the_category_list( esc_html__( ', ', 'adios-addons' ) );?> <?php echo esc_html__('Posted', 'adios-addons'); ?> <span class="post-date"><?php the_time('F d, Y'); ?></span></p>
              </div>
           </div>
        </div>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>

  <?php
  $output = ob_get_clean();
  return $output;
}
add_shortcode( 'rs_blog', 'rs_blog' );
