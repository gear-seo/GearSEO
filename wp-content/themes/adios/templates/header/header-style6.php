<?php
/**
 * Header Template file
 *
 * @package adios
 * @since 1.0
 */
?>
<header class="style-2 style-6">
  <div class="header">
    <?php adios_logo('logo', get_template_directory_uri().'/img/logo.png'); ?>
    <a href="#" class="burger-menu vertical-align"><i></i></a>
    <nav class="nav-menu">
      <div class="nav-menu-layer"><span></span></div>
        <div class="table-align">
          <?php adios_main_menu('nav-list cell-view'); ?>
        </div>
    </nav>
    <div class="header-social-icons">
      <?php adios_social_links('%s', adios_get_opt('header-social-icons-category')); ?>
    </div>
  </div>
</header>

