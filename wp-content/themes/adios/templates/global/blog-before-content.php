<?php
/**
 * Before Loop ( page.php )
 *
 * @package adios
 */
$layout    = adios_get_opt('main-layout');
$col_class = is_page_template('page-templates/blog-masonry.php') ? 'col-md-12':'col-md-8 col-md-offset-2';
if ($layout == 'left_sidebar'): ?>
  <div class="row">
    <?php get_sidebar(); ?>
    <div class="col-md-8">

<?php elseif ($layout == 'right_sidebar'): ?>
  <div class="row">
    <div class="col-md-8">
<?php else: ?>
  <div class="row">
    <div class="<?php echo esc_attr($col_class); ?>">
<?php endif; ?>
