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
  <div class="container">
    <div class="top-footer">
      <div class="footer-logo"><?php adios_logo('footer-logo', get_template_directory_uri().'/img/logo.png', 'footer-logo'); ?></div>
      <div class="footer-newsletter">
        <h2><?php echo adios_get_opt('footer-newsletter-heading'); ?></h2>
        <p><?php echo adios_get_opt('footer-newsletter-content'); ?></p>
        <form method="post" class="newsletter" action="<?php echo esc_url(home_url('/')); ?>?na=s" onsubmit="return newsletter_check(this)">
          <input type="email" name="ne" required="" placeholder="Enter your email address">
          <button type="submit" class="newsletter-submit"><i class="fa fa-angle-right"></i></button>
        </form>
      </div>
    </div>
    <!-- .footer-top -->
    <div class="footer-separator"></div>
    <div class="footer-widget-wrap">
      <div class="row">
        <?php adios_footer_columns(); ?>
      </div>
      <!-- .row -->
    </div>
  </div>
  <!-- .container -->
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