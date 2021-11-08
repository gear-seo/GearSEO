<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package adios
 * @since 1.0
 */
/**
 * Theme options variable $rs_theme_options
 */
define ('REDUX_OPT_NAME', 'adios_theme_options');

/**
 * Theme version used for styles,js
 */
define ('ADIOS_THEME_VERSION','3.0');
/**
 * Setting constant to inform the plugin that theme is activated
 */
define ('ADIOS_THEME_ACTIVATED' , true);

require get_template_directory() . '/framework/includes/rs-theme-argument-class.php';
require get_template_directory() . '/framework/includes/rs-actions-config.php';
require get_template_directory() . '/framework/includes/rs-helper-functions.php';
require get_template_directory() . '/framework/includes/rs-frontend-functions.php';
require get_template_directory() . '/framework/includes/rs-woocommerce-config.php';
require get_template_directory() . '/framework/includes/plugins/tgm/class-tgm-plugin-activation.php';
require get_template_directory() . '/framework/includes/rs-filters-config.php';
require get_template_directory() . '/framework/includes/rs-menu-walker-class.php';
require get_template_directory() . '/framework/admin/admin-init.php';

if( !function_exists('adios_after_setup')) {

  function adios_after_setup() {

    add_image_size('small',         270,  270, true );
    add_image_size('small-alt',     370,  370, true );
    add_image_size('small-hor',     350,  242, true );
    add_image_size('small-ver',     270,  570, true );
    add_image_size('small-square',  270,  270, true );
    add_image_size('medium',        570,  570, true );
    add_image_size('medium-hor',    538,  340, true );
    add_image_size('medium-alt',    670,  255, true );
    add_image_size('medium-big',    768,  255, true );
    add_image_size('large-hor',     1170, 270, true );
    add_image_size('large-ver',     900,  900, true );
    add_image_size('large-ver-alt', 538,  625, true );
    add_image_size('large-xxl',     1463, 560, true );
    add_image_size('thumb',         80,   80, true );

    add_theme_support('post-thumbnails');
    add_theme_support('custom-background' );
    add_theme_support('automatic-feed-links' );
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('post-formats',   array('video', 'gallery', 'audio') );
    add_theme_support('title-tag' );
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');

    register_nav_menus (array(
      'primary-menu' => esc_html__( 'Main Menu', 'adios' ),
    ) );
  }
  add_action( 'after_setup_theme', 'adios_after_setup' );
}

if ( ! isset( $content_width ) ) {
  $content_width = 1140;
}

/* Adicionando meta tags ao header */
 function add_meta_tags() {
 echo '<link rel="stylesheet" type="text/css" href="https://gearseo.com.br/wp-content/themes/adios/css/cookieconsent.min.css" />';
 echo '<script src="https://gearseo.com.br/wp-content/themes/adios/js/cookieconsent.min.js" data-cfasync="false"></script>';
 echo '<script>
 window.addEventListener("load", function(){
 window.cookieconsent.initialise({
   "palette": {
     "popup": {
       "background": "#edeff5",
       "text": "#393939"
     },
     "button": {
       "background": "#00adef"	   
     }
   },
   "theme": "classic",
   "position": "bottom-right",
   "content": {
     "message": "Usamos cookies para garantir que você obtenha a melhor experiência no nosso site.",
     "dismiss": "Ok, entendi!",
     "link": "Leia mais…",
     "href": "https://gearseo.com.br/politica-de-cookies"
   }
 })});
 </script>';
 }
 add_action('wp_head', 'add_meta_tags');



?>
