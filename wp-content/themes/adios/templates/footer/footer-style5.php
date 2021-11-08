<?php
/**
 * Footer Template file
 *
 * @package adios
 * @since 1.0
 */
$copyright = adios_get_opt('footer-copyright-enable-switch');
?>

<div class="main-footer common-footer-style site-footer-2">
  <footer>

    <div class="copyright">
      <span><?php echo wp_kses_data(adios_get_opt('footer-copyright-text')); ?></span>
      <div class="footer-social-btn">
        <?php adios_social_links('%s', adios_get_opt('footer-social-icons-category')); ?>
      </div>
    </div>
  </footer>
</div>