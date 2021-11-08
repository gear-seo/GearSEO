<?php
/**
 * Blog Default
 *
 * @package adios
 * @since 1.0
 */
?>
<?php
global $post;
$img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
if(isset($img_src[0]) && !empty($img_src)):
?>

<div class="top-baner smal-size">
  <div class="block-bg top-image">
    <div class="bg-wrap">
      <div class="bg" style="background-image:url(<?php echo esc_url($img_src[0]); ?>);"></div>
      <div class="white-mobile-layer"></div>
    </div>
    <div class="title-style-1 vertical-align">
      <div class="sub-title">
        <h5 class="h5"><?php echo get_the_category_list('& '); ?></h5>
      </div>
      <h2 class="h1"><?php the_title(); ?></h2>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="content pt-100 pb-100">
  <section class="section">
    <div class="container">

      <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-3">
          <div class="twit-author center-title wow zoomIn" data-wow-delay="0.2s">
            <?php echo get_avatar(get_the_author_meta( 'ID' ),45); ?>
              <div class="post-txt">
                <h6 class="h6"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a></h6>
                <p><?php echo esc_html__('In', 'adios'); ?> <?php echo get_the_category_list( esc_html__( ', ', 'adios' ) );?> <?php echo esc_html__('Posted', 'adios'); ?> <span class="post-date"><?php the_time('F d, Y'); ?></span></p>
              </div>
           </div>
           <?php adios_social_share('style2'); ?>
        </div>

        <div class="col-md-9">
          <article <?php post_class(); ?>>
            <?php the_content(); ?>
            <?php
              wp_link_pages( array(
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'adios' ),
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
              ) );
            ?>
          </article>
          <div class="tag-link border-bottom wow zoomIn" data-wow-delay="0.2s"><?php the_tags( '', '', '<br />' ); ?></div>
          <?php
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>
        </div>

      </div>
      <?php endwhile; ?>
    </div>
    <?php get_template_part('templates/blog/blog-single/next','post');  ?>
  </section>
</div>
