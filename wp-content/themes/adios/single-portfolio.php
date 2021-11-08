<?php
/**
 * Portfolio Single Page
 *
 * @package adios
 * @since 1.0
 *
 */
get_header();
global $post;
$terms = wp_get_post_terms(get_the_ID(), 'portfolio-category');
$term_name = array();
if (count($terms) > 0):
  foreach ($terms as $term):
    $term_name[] = $term->name;
  endforeach;
endif;
$portfolio_featured_type = adios_get_post_opt('portfolio-featured-type');
$data_link               = adios_get_post_opt('portfolio-video-url'); 
$img_src                 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
if(isset($img_src[0]) && !empty($img_src) || !empty($data_link)):
?>

<div class="single-portfolio top-baner<?php echo ($portfolio_featured_type != 'image') ? ' video-bg':''; ?>">
  <div class="block-bg top-image">
    <div class="bg-wrap" id="home">

      <?php if($portfolio_featured_type == 'image' && isset($img_src[0]) && !empty($img_src) || empty($data_link)): ?>
        <div class="bg bg-cover" style="background-image:url(<?php echo esc_url($img_src[0]); ?>);"></div>
      <?php elseif($portfolio_featured_type == 'vimeo-video'): wp_enqueue_script('adios-vm-player'); wp_enqueue_style('adios-vmplayer'); ?>
        <div id="bgndVideo" class="player vm-player" data-property="{videoURL:'<?php echo esc_url($data_link); ?>',containment:'#home', useOnMobile:true,autoPlay:true, optimizeDisplay:true, mute:true, startAt:0, opacity:1}"></div>
        <div id="bgndVideo" class="player-mb vm-player" data-property="{videoURL:'<?php echo esc_url($data_link); ?>',containment:'self', useOnMobile:true,autoPlay:true, optimizeDisplay:true, mute:true, startAt:0, opacity:1}"></div>
      <?php else: wp_enqueue_script('adios-ytplayer'); ?>
        <div id="bgndVideo" class="player yt-player" data-property="{videoURL:'<?php echo esc_url($data_link); ?>',containment:'#home', useOnMobile:true,autoPlay:true, optimizeDisplay:true, mute:true, startAt:0, opacity:1}"></div>
        <div id="bgndVideo" class="player-mb yt-player" data-property="{videoURL:'<?php echo esc_url($data_link); ?>',containment:'self', useOnMobile:true,autoPlay:true, optimizeDisplay:true, mute:true, startAt:0, opacity:1}"></div>
      <?php endif; ?>
      <!-- <div class="white-mobile-layer"></div> -->
    </div>
    <div class="title-style-1 vertical-align">
      <div class="sub-title">
        <h5 class="h5"><?php echo implode(', ', $term_name); ?></h5>
      </div>
      <h1 class="h1"><?php the_title(); ?></h1>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="content">
  <?php
    while ( have_posts() ) : the_post();
      get_template_part('templates/portfolio/project-details');
    endwhile;
    get_template_part('templates/portfolio/project-gallery');
    get_template_part('templates/portfolio/project-pagination');
  ?>
</div>
<?php
get_footer();

