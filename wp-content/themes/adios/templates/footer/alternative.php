<?php
/**
 * Part of footer file ( alternative style )
 *
 * @package adios
 * @since 1.0
 */
$copyright = adios_get_opt('footer-copyright-enable-switch');
?>
<div class="main-footer">
  <section class="section section-bg padd-xs">
    <div class="container">
     <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="footer-item">
          <?php if (is_active_sidebar( adios_get_custom_sidebar('footer-1', 'footer-sidebar-1') )): ?>
            <?php dynamic_sidebar( adios_get_custom_sidebar('footer-1', 'footer-sidebar-1') ); ?>
          <?php endif; ?>
        </div>
     </div>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <?php adios_logo('footer-logo', get_template_directory_uri().'/img/logo.png', 'footer-logo'); ?>
      <div class="folow-icon">
        <?php adios_social_links('%s', adios_get_opt('footer-social-icons-category')); ?>
      </div>
     </div>
     <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="footer-item fr">
        <?php if (is_active_sidebar( adios_get_custom_sidebar('footer-2', 'footer-sidebar-2') )): ?>
          <?php dynamic_sidebar( adios_get_custom_sidebar('footer-2', 'footer-sidebar-2') ); ?>
        <?php endif; ?>
      </div>
     </div>
   </div>
  </section>
  <?php if($copyright): ?>
    <footer>
      <div class="copyright">
      <span><?php echo wp_kses_data(adios_get_opt('footer-copyright-text')); ?></span>
      </div>
    </footer>
  <?php endif; ?>
</div>
