<?php
/**
 * Title Wrapper
 *
 * @package adios
 * @since 1.0
 */
?>

<?php $sub_title = adios_get_opt('title-wrapper-subtitle'); ?>
<?php if(!class_exists('ReduxFramework') || adios_get_opt('title-wrapper-enable') == 1 && !is_singular('portfolio')): ?>
<div class="top-baner smal-size">
 <div class="block-bg top-image">
  <div class="bg-wrap">
   <div class="bg"<?php adios_title_wrapper_bg(); ?>></div>
    <div class="white-mobile-layer"></div>
  </div>
  <div class="title-style-1 vertical-align">
    <?php if(!empty($sub_title)): ?>
    <div class="sub-title">
      <h5 class="h5"><?php echo esc_html($sub_title); ?></h5>
    </div>
    <?php endif; ?>
    <h1 class="h1"><?php echo adios_get_the_title(); ?></h1>
  </div>
 </div>
</div>
<?php endif; ?>
