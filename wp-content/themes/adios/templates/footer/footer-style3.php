<?php
/**
 * Footer Template file
 *
 * @package adios
 * @since 1.0
 */
$copyright = adios_get_opt('footer-copyright-enable-switch');
?>
<div class="main-footer common-footer-style site-footer-1">
  <div class="container">
    <div class="footer-widget-wrap">
      <div class="row">
        <?php adios_footer_columns(); ?>
      </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="footer-separator"></div>
      <div class="copyright">
        <?php if($copyright): ?>
          <span><?php echo wp_kses_data(adios_get_opt('footer-copyright-text')); ?></span>
        <?php endif; ?>
        <div class="footer-social-btn">
          <?php adios_social_links('%s', adios_get_opt('footer-social-icons-category')); ?>
        </div>
      </div>
    </div>
  </footer>
</div>