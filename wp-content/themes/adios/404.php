<?php
/**
 * 404
 *
 * @package adios
 * @since 1.0
 */

get_header(); ?>

<section class="v-align pt-100 pb-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-404-content text-center">
          <h1><?php echo esc_html__('404', 'adios'); ?></h1>
          <p><?php echo wp_kses_post(adios_get_opt('page404-content')); ?></p>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="c-btn"><?php echo esc_html__('Back To Home', 'adios'); ?></a>
        </div><!-- /page-404-content -->
      </div><!-- /col-md-12 -->
    </div><!-- /row -->
  </div><!-- /container -->
</section>

<?php
get_footer();
