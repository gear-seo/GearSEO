<?php
/**
 * Action Hooks.
 *
 * @package adios
 * @since 1.0
 */

/**
* @return null
* @param none
* showing style tags on footer
**/
if(!function_exists('adios_enqueue_inline_styles')) {
  function adios_enqueue_inline_styles() {
    $oArgs = ThemeArguments::getInstance('inline_style');
    $inline_styles = $oArgs -> get('inline_styles');
    if (is_array($inline_styles) && count($inline_styles) > 0) {
      echo '<style id="custom-shortcode-css" type="text/css">'. adios_css_compress( htmlspecialchars_decode( wp_kses_data( join( '', $inline_styles ) ) ) ) .'</style>';
    }
    $oArgs -> reset();
  }
  add_action( 'wp_footer', 'adios_enqueue_inline_styles' );
}

/**
 * Set up homepage and menu
 *
 * @package adios
 * @since 1.0
 */
if(!function_exists('adios_set_homepage_menu')) {
  function adios_set_homepage_menu($demo_active_import, $demo_directory_path) {
    reset( $demo_active_import );
    $current_key = key( $demo_active_import );
    // set menu
    $wbc_menu_array = array( 'demo1');
    if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
      $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
      if ( isset( $main_menu->term_id ) ) {
        set_theme_mod( 'nav_menu_locations', array('primary-menu' => $main_menu->term_id));
      }
    }

    // set homepage
    $wbc_home_pages = array('demo1' => 'Home');
    if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
      $page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
      if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
      }
    }
  }
  add_action( 'wbc_importer_after_content_import', 'adios_set_homepage_menu', 10, 2 );
}


/**
* @return null
* @param none
* register widgets
**/
if( !function_exists('adios_register_sidebar') ) {

  function adios_register_sidebar() {

    // register sidebars
    register_sidebar(array(
      'id'            => 'main',
      'name'          => 'Main Sidebar',
      'before_widget' => '<div id="%1$s" class="sidebar-item wow zoomIn widget %2$s" data-wow-delay="0.4s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h5 class="h5 widget-title">',
      'after_title'   => '</h5>',
      'description'   => 'Drag the widgets for main sidebars.'
    ));

    for($i = 1; $i < 5; $i++) {
      register_sidebar(array(
        'id'            => 'footer-'.$i,
        'name'          => 'Footer Sidebar '.$i,
        'before_widget' => '<div id="%1$s" class="widget footer-item footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="h6 footer-widget-title">',
        'after_title'   => '</h6>',
        'description'   => 'Drag the widgets for footer '.$i.' sidebars.'
      ));
    }

    $custom_sidebars = adios_get_opt('custom-sidebars');
    if (is_array($custom_sidebars)) {
      foreach ($custom_sidebars as $sidebar) {

        if (empty($sidebar)) {
          continue;
        }

        register_sidebar ( array (
          'name'          => $sidebar,
          'id'            => sanitize_title ( $sidebar ),
          'before_widget' => '<div id="%1$s" class="sidebar-item wow zoomIn widget %2$s" data-wow-delay="0.4s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h5 class="h5 widget-title">',
          'after_title'   => '</h5>',
          'description'   => 'Drag the widgets for custom sidebars.'
        ) );
      }
    }
  }
  add_action( 'widgets_init', 'adios_register_sidebar' );
}

/**
* @return null
* @param none
* loads all the js and css script to frontend
**/
if( !function_exists('adios_enqueue_scripts')) {

  function adios_enqueue_scripts() {

    if( ( is_admin() ) ) { return; }

    if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); }


    // enqueue script
    wp_enqueue_script( 'adios-scrollify',        get_template_directory_uri() .'/js/jquery.scrollify.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-wow',              get_template_directory_uri() .'/js/wow.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-count',            get_template_directory_uri() .'/js/jquery.countTo.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-lazyload',         get_template_directory_uri() .'/js/jquery.lazyload.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    
    wp_enqueue_script('adios-form-stone',        get_template_directory_uri() .'/js/jquery.formstone.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    
    wp_enqueue_script( 'adios-isotope',          get_template_directory_uri() .'/js/isotope.pkg.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-lightgallery',     get_template_directory_uri() .'/js/lightgallery.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-img-loaded',       get_template_directory_uri() .'/js/jquery.imageloaded.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-vm-player',         get_template_directory_uri() .'/js/jquery.mb.vimeo_player.min.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-ytplayer',         get_template_directory_uri() .'/js/YT.player.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_enqueue_script( 'adios-all',              get_template_directory_uri() .'/js/all.js',array('jquery'), ADIOS_THEME_VERSION,true);

    // register script
    wp_register_script('adios-gmapsensor',       'https://maps.google.com/maps/api/js?key=AIzaSyDjttDw_zlwsJl27N8shtKX_I2DLydSZSo',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_register_script( 'adios-slick',           get_template_directory_uri() .'/js/slick.js',array('jquery'), ADIOS_THEME_VERSION,true);
    wp_register_script( 'adios-cd-google-map',    get_template_directory_uri() .'/js/map.js',array('adios-gmapsensor'), ADIOS_THEME_VERSION,true);
    
    wp_enqueue_style('woocommerce',               get_template_directory_uri(). '/css/woocommerce.css',null,  ADIOS_THEME_VERSION);
    

    wp_localize_script('adios-cd-google-map', 'get',
      array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'siteurl' => get_template_directory_uri()
      )
    );

    wp_enqueue_style( 'adios-fonts',       adios_fonts_url(), null, ADIOS_THEME_VERSION );
    wp_enqueue_style( 'adios-bootstrap',   get_template_directory_uri(). '/css/bootstrap.min.css',null, ADIOS_THEME_VERSION);
    wp_enqueue_style( 'adios-main-style',  get_template_directory_uri(). '/css/style.css',null, ADIOS_THEME_VERSION);
    wp_enqueue_style( 'adios-fonttello',   get_template_directory_uri(). '/css/fontello.css',null, ADIOS_THEME_VERSION);
    wp_enqueue_style( 'adios-fontawesome', get_template_directory_uri(). '/css/font-awesome.min.css',null, ADIOS_THEME_VERSION);
    wp_enqueue_style( 'adios-animate',     get_template_directory_uri(). '/css/animate.css',null, ADIOS_THEME_VERSION);
    wp_enqueue_style( 'adios-ytplayer',    get_template_directory_uri(). '/css/YT.player.css',null, ADIOS_THEME_VERSION);
    wp_enqueue_style( 'adios-vmplayer',    get_template_directory_uri(). '/css/jquery.mb.vimeo_player.css',null, ADIOS_THEME_VERSION);

    // register
    wp_register_style('adios-slick',                 get_template_directory_uri(). '/css/slick.css',null, ADIOS_THEME_VERSION);
    wp_register_style('adios-horizontal-scroll',      get_template_directory_uri(). '/css/horizontal-scroll.css',null, ADIOS_THEME_VERSION);
    wp_register_style('adios-lightgallery',           get_template_directory_uri(). '/css/lightgallery.min.css',null, ADIOS_THEME_VERSION);


    // Custom CSS
    $css_code   = adios_get_opt('css_editor');
    $custom_css = adios_custom_style();
    $style      = '';
    $style      .= ( !empty($css_code) || !empty($custom_css)) ? $css_code.$custom_css:'';
    wp_add_inline_style('adios-main-style', $style);
  }
  add_action( 'wp_enqueue_scripts', 'adios_enqueue_scripts' );
}

if(!function_exists('adios_admin_enqueue_script')) {
  function adios_admin_enqueue_script() {
    wp_register_style( 'admin-style', get_template_directory_uri() . '/framework/admin/assets/style.css', array(), ADIOS_THEME_VERSION, 'all' );
    wp_enqueue_style('admin-style' );
  }
  add_action('admin_enqueue_scripts', 'adios_admin_enqueue_script');
}


if(! function_exists('adios_include_required_plugins')) {

  function adios_include_required_plugins() {

    $plugins = array(

      array(
        'name'    => 'Redux Framework',
        'slug'    => 'redux-framework',
        'required'  => true,
      ),

      array(
        'name'               => esc_html__('Contact Form 7', 'adios'), // The plugin name
        'slug'               => 'contact-form-7', // The plugin slug (typically the folder name)
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Regenerate Thumbnails', 'adios'), // The plugin name
        'slug'               => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Newsletter', 'adios'), // The plugin name
        'slug'               => 'newsletter', // The plugin slug (typically the folder name)
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Adios Demo Import', 'adios'), // The plugin name
        'slug'               => 'adios-demo-import', // The plugin slug (typically the folder name)
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'source'             =>  get_template_directory_uri().'/plugins/adios-demo-import.zip', // The plugin source
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Elementor', 'adios'), // The plugin name
        'slug'               => 'elementor', // The plugin slug (typically the folder name)
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Dragfy Addons for Elementor', 'adios'), // The plugin name
        'slug'               => 'dragfy-addons-for-elementor', // The plugin slug (typically the folder name)
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Woocommerce', 'adios'), // The plugin name
        'slug'               => 'woocommerce', // The plugin slug (typically the folder name)
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Visual Composer', 'adios'), // The plugin name
        'slug'               => 'js_composer', // The plugin slug (typically the folder name)
        'source'             =>  'http://themebubble.com/demo/plugins/js_composer.zip', // The plugin source
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Adios Addons', 'adios'), // The plugin name
        'slug'               => 'adios-addons', // The plugin slug (typically the folder name)
        'source'             => get_template_directory_uri().'/plugins/adios-addons.zip', // The plugin source
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '3.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
    );

    $config = array(
      'id'           => 'adios',                   // Unique ID for hashing notices for multiple instances of TGMPA.
      'default_path' => '',                      // Default absolute path to bundled plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'parent_slug'  => 'themes.php',            // Parent menu slug.
      'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );

  }
  add_action( 'tgmpa_register', 'adios_include_required_plugins' );
}
