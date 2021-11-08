<?php
/**
 * Page ( part of layout )
 *
 * @package adios
 * @since 1.0
 */
get_header();

?>

<div class="content <?php echo adios_get_post_opt('page-margin'); ?>">
  <div class="container">
    <?php get_template_part('templates/content/content-page'); ?>
  </div>
</div>

<?php
get_footer();
