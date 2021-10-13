<?php
/*
Plugin Name: Adios Addons
Plugin URI: http://www.themebubble.com
Description: A part of Adios theme.
Version: 3.0
Author: relstudiosnx
Author URI: http://www.themebubble.com
Text Domain: adios-addons
*/

defined('RS_ROOT') or define('RS_ROOT', plugin_dir_path( __FILE__ ));


if(!class_exists('RS_Shortcode')) {

  class RS_Shortcode {

    private $assets_css;
    private $assets_js;

    public function __construct() {
      if ($this->rs_get_installed_theme() !== 'published') {
        add_action( 'admin_notices', array($this,'rs_activate_theme_notice') );
      } else {
        add_action('setup_theme', array($this,'rs_load_custom_post_types'),40);
        $this->rs_include_helper();
        $this->rs_init_elementor();
        add_action('init', array($this,'rs_init'),50);
        add_action('widgets_init', array($this,'rs_load_widgets'),50);
      }
    }

    public static function activate() {
      flush_rewrite_rules();
    }

    public static function deactivate() {
      flush_rewrite_rules();
    }

    public function rs_get_installed_theme() {
      $theme = wp_get_theme();
      if( $theme->parent() ) {
        $theme_status = $theme->parent()->get('Status');
      } else {
        $theme_status = $theme->get('Status');
      }
      $theme_status = sanitize_key( $theme_status );
      return $theme_status;
    }

    public function rs_init() {

      $this->assets_css = plugins_url('/assets/css', __FILE__);
      $this->assets_js  = plugins_url('/assets/js', __FILE__);
      $this->rs_vc_load_shortcodes();
      if(class_exists('Vc_Manager')) {
        add_action('admin_print_scripts-post.php',   array($this, 'rs_load_vc_scripts'), 99);
        add_action('admin_print_scripts-post-new.php', array($this, 'rs_load_vc_scripts'), 99);
        $this->rs_init_vc();
        $this->rs_vc_integration();
      }
    }

    public function rs_include_helper() {
      include_once( RS_ROOT .'/includes/twitter/twitter.php');
      include_once( RS_ROOT .'/includes/helpers.php');
    }

    public function rs_init_elementor() { 
      if($this->is_plugin_installed('elementor/elementor.php')) {
        add_action('elementor/init',                              array($this, 'rs_init_elementor_widgets_title'));
        add_action('elementor/widgets/widgets_registered',        array($this, 'rs_includes_elementor_widgets'));
        add_action('elementor/editor/before_enqueue_styles',      array($this, 'enqueue_editor_styles'));
        update_option('elementor_disable_typography_schemes',     'yes');
        update_option('elementor_disable_color_schemes',          'yes');
      }
    }

    public function rs_init_elementor_widgets_title() {
      $this->rs_register_elementor_title();
    }

    public function rs_register_elementor_title() {
      Elementor\Plugin::instance()->elements_manager->add_category(
        'adios-elementor',
        array(
          'title' => esc_html__('Adios Widgets', 'adios-addons'),
        ),
      1);
    }

    public function rs_includes_elementor_widgets() {
      require_once(RS_ROOT. '/' . 'elementor/rs_blockquote.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_blog.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_client.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_counter.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_follow.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_hero_slider.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_hero_video_banner.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_icon_box.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_latest_works.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_portfolio.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_portfolio_slider.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_pricing_table.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_section_heading.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_team.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_testimonial.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_tweet.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_text_block.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_link_text.php');
      require_once(RS_ROOT. '/' . 'elementor/rs_blog_slider.php');
    }

    public function enqueue_editor_styles() {
      wp_enqueue_style('addons-icon',  $this->assets_css. '/elementor-style.css',  null, '1.0');
    }

    function rs_activate_theme_notice() { ?>
      <div class="updated">
        <p><strong><?php esc_html_e('Please activate the Adios theme to use Adios Addons plugin.', 'adios-addons'); ?></strong></p>
        <?php
        $screen = get_current_screen();
        if ($screen -> base != 'themes'): ?>
          <p><a href="<?php echo esc_url(admin_url('themes.php')); ?>"><?php esc_html_e('Activate theme', 'adios-addons'); ?></a></p>
        <?php endif; ?>
      </div>
    <?php }

    public function rs_init_vc() {
      global $vc_manager;
      $list = array( 'page', 'post', 'portfolio');
      $vc_manager->setEditorDefaultPostTypes( $list );
    }


    public function rs_load_custom_post_types() {
      require_once(RS_ROOT .'/custom-posts/social-site.php');
      require_once(RS_ROOT .'/custom-posts/team.php');
      require_once(RS_ROOT .'/custom-posts/testimonial.php');
      require_once(RS_ROOT .'/custom-posts/portfolio.php');
    }

    public function rs_load_widgets() {
      if ($this->rs_get_installed_theme() !== 'published') {
        return false;
      }
      $widgets = array(
        'WP_Instagram_Feed_Widget',
        'WP_Latest_Posts_Widget',
        'WP_Latest_Tweets_Widget',
      );
      foreach ($widgets as $widget) {
        if (file_exists(RS_ROOT .'/widgets/'.$widget.'.class.php')) {
          require_once(RS_ROOT .'/widgets/'.$widget.'.class.php');
          register_widget('adios_'.$widget);
        }
      }
    }

    public function rs_vc_load_shortcodes() {
      require_once(RS_ROOT. '/' . 'shortcodes/rs_hero_slider.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_section_heading.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_image_block.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_blockquote.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_icon_box.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_latest_works.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_portfolio.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_team.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_space.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_blog.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_pricing_table.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_client.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_testimonial.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_counter.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_follow.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_hero_video_banner.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_tweet.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_google_map.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_portfolio_slider.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_blog_slider.php');
      require_once(RS_ROOT. '/' . 'shortcodes/rs_special_text.php');


      require_once(RS_ROOT. '/' . 'shortcodes/vc_column.php');
      require_once(RS_ROOT. '/' . 'shortcodes/vc_column_text.php');
      require_once(RS_ROOT. '/' . 'shortcodes/vc_row.php');
    }

    public function rs_vc_integration() {
      require_once( RS_ROOT .'/' .'composer/map.php' );
    }

    public function rs_load_vc_scripts() {
      wp_enqueue_style('rs-vc-custom', $this->assets_css. '/vc-style.css' );
      wp_enqueue_style('rs-font-icon', $this->assets_css. '/font-icon.css' );
      wp_enqueue_style('rs-chosen',    $this->assets_css. '/chosen.css' );
      wp_enqueue_script('vc-script',   $this->assets_js . '/vc-script.js' ,      array('jquery'), '1.0.0', true );
      wp_enqueue_script('vc-chosen',   $this->assets_js . '/jquery.chosen.js' ,  array('jquery'), '1.0.0', true );
    }

    public function rs_reload_vc_js() {
      echo '<script type="text/javascript">(function($){ $(document).ready( function(){ $.reloadPlugins(); }); })(jQuery);</script>';
    }

    public function is_plugin_installed($basename) {
      if (!function_exists('get_plugins')) {
        include_once ABSPATH . '/wp-admin/includes/plugin.php';
      }
      $installed_plugins = get_plugins();
      return isset($installed_plugins[$basename]);
    }

  }

  new RS_Shortcode;

  register_activation_hook( __FILE__, array('RS_Shortcode', 'activate' ) );
  register_deactivation_hook( __FILE__, array('RS_Shortcode', 'deactivate' ) );

} 

