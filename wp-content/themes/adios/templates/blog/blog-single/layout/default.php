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
  </div>
</div>
<?php endif; ?>

<div class="content pt-100 pb-100">
  <section class="section">
    <div class="container">


      <?php get_template_part('templates/global/blog-before-content'); ?>

      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <div class="twit-desc border-bottom post-title wow zoomIn" data-wow-delay="0.2s">
           <h1 class="h1 title post_title"><?php the_title(); ?></h1>
           <div class="twit-author">
            <?php echo get_avatar(get_the_author_meta( 'ID' ),45); ?>
              <div class="post-txt">
                <h6 class="h6"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a></h6>
                <p><?php echo esc_html__('In', 'adios'); ?> <?php echo get_the_category_list( esc_html__( ', ', 'adios' ) );?> <?php echo esc_html__('Posted', 'adios'); ?> <span class="post-date"><?php the_time('F d, Y'); ?></span></p>
              </div>
           </div>
          </div>

          <?php adios_social_share('style1'); ?>
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
      <?php endwhile; ?>

      <?php
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>

      <?php get_template_part('templates/global/blog-after-content'); ?>


    </div>
    <?php get_template_part('templates/blog/blog-single/next','post');  ?>
  </section>
</div>
