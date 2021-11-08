<?php
/**
 * Single template file
 *
 * @package adios
 * @since 1.0
 */
?>

<article>
  <div class="content">
    <header>
      <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F d, Y'); ?></time>
      <h1><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h1>
      <div class="meta">
        <h6 class="author"><a href="<?php echo  get_the_author_link(); ?>"><?php echo get_the_author(); ?></a></h6>
        <ul class="categories">
          <li><?php echo get_the_category_list( __( ' ', 'adios' ) );?></li>
        </ul>
      </div><!-- /meta -->
      <?php get_template_part('templates/blog/blog-single/parts/single', 'media'); ?>
    </header>
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'adios' ),
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
      ) );
    ?>
  </div><!-- /content -->

  <?php if(get_the_tag_list()): ?>
  <div class="article-tags">
    <p><?php esc_html_e('Tags:', 'adios'); ?></p>
    <?php echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>'); ?>
  </div>
  <?php endif; ?>

  <?php adios_social_share(); ?>

  <div class="article-author clearfix">
    <?php
      global $post;
      $curauth = get_userdata($post->post_author);
    ?>
    <figure>
      <?php echo get_avatar( get_the_author_meta('ID'), 128 ); ?>
    </figure>
    <div class="info">
      <h4><?php the_author(); ?></h4>
      <h6>Senior Copywriter</h6>
      <p>
      <?php if(!empty($curauth->description)): ?>
        <?php echo get_the_author_meta('description'); ?>
      <?php else: ?>
        <?php esc_html_e('There is no author description yet.', 'adios'); ?>
      <?php endif; ?>
    </p>
    </div><!-- /info -->
  </div><!-- /article-author -->

  <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
  ?>
</article>
