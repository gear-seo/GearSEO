<?php
/**
 * Portfolio Details
 *
 * @package adios
 * @since 1.0
 *
 */
?>
<?php
  global $post;
  $client_name    = adios_get_post_opt('portfolio-client');
  $desiginer_name = adios_get_post_opt('portfolio-desiginer');
  $terms          = wp_get_post_terms($post->ID, 'portfolio-category');
  $term_names   = array();
  if (count($terms) > 0):
    foreach ($terms as $term):
      $term_names[] = $term->name;
    endforeach;
  endif;
?>
<section class="section pt-40 pb-100">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12">
        <div class="title-style-2 text-next wow zoomIn" data-wow-delay="0.2s">
          <div class="sub-title">
            <h5 class="h5"><?php echo esc_html__('Project details', 'adios'); ?></h5>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-3 col-xs-4">
        <?php if(!empty($client_name)): ?>
        <div class="case-info wow zoomIn" data-wow-delay="0.4s">
          <h4 class="h4"><?php echo adios_get_post_opt('portfolio-client-title'); ?></h4>
           <div class="simple-text md">
             <p><?php echo esc_html($client_name); ?></p>
           </div>
        </div>
        <?php endif; ?>
        <?php if(!empty($desiginer_name)): ?>
        <div class="case-info wow zoomIn" data-wow-delay="0.5s">
          <h4 class="h4"><?php echo adios_get_post_opt('portfolio-desiginer-title'); ?></h4>
          <div class="simple-text md">
            <p><?php echo esc_html($desiginer_name); ?></p>
          </div>
        </div>
        <?php endif; ?>
        <div class="case-info wow zoomIn" data-wow-delay="0.6s">
          <h4 class="h4"><?php echo esc_html__('Category', 'adios'); ?></h4>
            <div class="simple-text md">
              <p><?php echo implode(', ', $term_names); ?></p>
            </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="simple-text md wow zoomIn" data-wow-delay="0.6s">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
