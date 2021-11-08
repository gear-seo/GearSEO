<?php
/**
 * Filter Hooks
 *
 * @package make
 * @since 1.0
 */

/**
 * Title Filter
 *
 * @package make
 * @since 1.0
 */
if (! function_exists('adios_wp_title') ) {
  function adios_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
      return $title;
    } // end if

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title = "$title $sep $site_description";
    } // end if

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
      $title = sprintf( __( 'Page %s', 'adios' ), max( $paged, $page ) ) . " $sep $title";
    } // end if

    return $title;

  } // end rs_wp_title
  add_filter( 'wp_title', 'adios_wp_title', 10, 2 );
}

/**
 * Avatar img class
 *
 * @package make
 * @since 1.0
 */
if( !function_exists('adios_add_gravatar_class')) {
  function adios_add_gravatar_class( $class ) {
    $class = str_replace("class='avatar", "class='media-object img-responsive img-circle", $class);
    return $class;
  }
  add_filter('get_avatar','adios_add_gravatar_class');
}

/**
 * Body Filter Hook
 *
 * @package make
 * @since 1.0
 */
if( !function_exists('adios_body_class')) {
  function adios_body_class($classes) {
    $classes[]  = '';
    $classes[]  = adios_get_opt('header-template');

    return $classes;
  }
  add_filter('body_class', 'adios_body_class');
}

/**
 * Allow svg file to upload
 *
 * @package adios
 * @since 1.0
 */
if(!function_exists('adios_upload_svg')) {
  function adios_upload_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'adios_upload_svg');
}

/**
 * Allow demo name to be changed
 *
 * @package adios
 * @since 1.0
 */
if(!function_exists('adios_importer_filter_title')) {
  function adios_importer_filter_title( $title ) {
    $title = esc_html__('Demo Content', 'adios');
    return trim( ucfirst( str_replace( '-', ' ', $title ) ) );
  }
  add_filter( 'wbc_importer_directory_title', 'adios_importer_filter_title', 10 );
}

