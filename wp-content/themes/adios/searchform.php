<?php
/**
 *
 * Search form.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform search">
  <input type="text" placeholder="Search" value="" type="search" name="s" id="s" required>
  <div class="serch-link">
    <i class="icon-search"></i>
    <input class="search-field" type="search">
    <input type="submit" value="">
  </div>
</form>
