<?php
/**
 * Before Loop ( page.php )
 *
 * @package adios
 */
$layout    = adios_get_opt('main-layout');
if ($layout == 'left_sidebar'): ?>
  <div class="row">
    <?php get_sidebar(); ?>
    <div class="col-md-8">

<?php elseif ($layout == 'right_sidebar'): ?>
  <div class="row">
    <div class="col-md-8">
<?php else: ?>
  <div class="row">
  	<div class="col-md-12">
<?php endif; ?>
