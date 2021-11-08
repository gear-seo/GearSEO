<style>
.top-baner {
	display:none;
}
.row {
    padding-top: 40px !important;
}
.twit-author{
	display:none;
}
.pb-100 {
	padding-bottom:0px !important;
}
</style>

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
?>
