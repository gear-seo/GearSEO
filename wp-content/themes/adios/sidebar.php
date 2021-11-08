<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package adios
 */
$layout = adios_get_opt('main-layout');
switch ($layout):
  case 'left_sidebar': ?>
    <!-- Sidebar -->
    <div class="col-md-4">
      <div class="sidebar left-sidebar">
        <?php if (is_active_sidebar( adios_get_custom_sidebar('main') )): ?>
          <?php dynamic_sidebar( adios_get_custom_sidebar('main') ); ?>
        <?php endif; ?>
      </div>
    </div>
    <!-- End Sidebar -->
    <?php break;

  case 'right_sidebar': ?>
    <!-- Sidebar -->
    <div class="col-md-4">
      <div class="sidebar">
        <?php if (is_active_sidebar( adios_get_custom_sidebar('main') )): ?>
          <?php dynamic_sidebar( adios_get_custom_sidebar('main') ); ?>
        <?php endif; ?>
      </div>
    </div>
    <!-- End Sidebar -->
    <?php break;
endswitch;
?>
