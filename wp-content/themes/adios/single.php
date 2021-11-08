<?php
/**
 * Single.php
 *
 * @package adios
 * @since 1.0
 */
get_header();
adios_blog_single_template(adios_get_post_opt('post-template'));
get_footer();

