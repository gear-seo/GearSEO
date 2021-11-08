<?php
/**
 * Backend Theme Functions.
 *
 * @package make
 * @subpackage Template
 */

/**
 * Get theme option value
 * @param string $option
 * @return mix|boolean
 */
function adios_get_opt($option) {
  global $adios_theme_options;

  $local = false;

  //get local from main shop page
  if (class_exists( 'WooCommerce' ) && (is_shop() || is_product_category() || is_product_tag())) {

    $shop_page = wc_get_page_id( 'shop' );

    if (!empty($shop_page)) {
      $value = adios_get_post_opt( $option.'-local', (int)$shop_page);
      $local = true;
    }

    //echo $option.'from singular';

  //get local from metaboxes for the post value and override if not empty
  } else if (is_singular()) {
    $value = adios_get_post_opt( $option.'-local' );
    //print_r($value);
    $local = true;
  }

  //return local value if exists
  if ($local === true) {
    //if $value is an array we need to check if first element is not empty before we return $value
    $first_element = null;
    if (is_array($value)) {
      $first_element = reset($value);
    }
    if (is_string($value) && (strlen($value) > 0 || !empty($value)) || is_array($value) && !empty($first_element)) {
      return $value;
    }
  }

  if (isset($adios_theme_options[$option])) {
    return $adios_theme_options[$option];
  }
  return false;
}

/**
 * Get next page URL
 * @param int $max_num_pages
 * @return string/boolean
 */
if(!function_exists('adios_next_page_url')) {
  function adios_next_page_url($max_num_pages = 0) {

    if ($max_num_pages === false) {
      global $wp_query;
      $max_num_pages = $wp_query->max_num_pages;
    }

    if ($max_num_pages > max(1, get_query_var('paged'))) {

      return get_pagenum_link(max(1, get_query_var('paged')) + 1);
    }
    return false;
  }
}

/**
 * Get single post option value
 * @param unknown $option
 * @param string $id
 * @return NULL|mixed
 */
function adios_get_post_opt( $option, $id = '' ) {

  global $post;

  if (!empty($id)) {
    $local_id = $id;
  } else {
    if(!isset($post->ID)) {
      return null;
    }
    $local_id = get_the_ID();

  }

  //echo $option;

  if(function_exists('redux_post_meta')) {
    $options = redux_post_meta(REDUX_OPT_NAME, $local_id);
  } else {
    $options = get_post_meta( $local_id, REDUX_OPT_NAME, true );
  }

  if( isset( $options[$option] ) ) {
    return $options[$option];
  } else {
    return null;
  }
}

/**
 * Check if wordpress importer is activated
 * @return boolean
 */
function adios_check_if_wordpress_importer_activated() {

  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if( is_plugin_active( 'wordpress-importer/wordpress-importer.php' ) ) {
    return true;
  }
  return false;
}

/**
 * Adding inline styles
 * @param string $style
 * @return void
 *
 * Usage:
 * adios_add_inline_style(".className { color: #FF0000; }")
 */
if(!function_exists('adios_add_inline_style')) {
  function adios_add_inline_style( $style ) {

    $oArgs = ThemeArguments::getInstance('inline_style');
    $inline_styles = $oArgs -> get('inline_styles');
    if (!is_array($inline_styles)) {
      $inline_styles = array();
    }
    array_push( $inline_styles, $style );
    $oArgs -> set('inline_styles', $inline_styles);
  }
}

/**
 * Inline styles
 * @param type $css
 * @return type
 */
function adios_css_compress($css) {
  $css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
  $css = str_replace( ': ', ':', $css );
  $css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
  return $css;
}



/**
 * Get custom sidebars list
 * @return array
 */
function adios_get_custom_sidebars_list($add_default = true) {

  $sidebars = array();
  if ($add_default) {
    $sidebars['default'] = esc_html__('Default', 'adios');
  }

  $options = get_option('adios_theme_options');

  if (!isset($options['custom-sidebars']) || !is_array($options['custom-sidebars'])) {
    return $sidebars;
  }

  if (is_array($options['custom-sidebars'])) {
    foreach ($options['custom-sidebars'] as $sidebar) {
      $sidebars[sanitize_title ( $sidebar )] = $sidebar;
    }
  }

  return $sidebars;
}

/**
 * Get custom sidebar, returns $default if custom sidebar is not defined
 * @param string $default
 * @param string $sidebar_option_field
 * @return string
 */
if( !function_exists('adios_get_custom_sidebar')) {
  function adios_get_custom_sidebar($default = '', $sidebar_option_field = 'sidebar') {

    $sidebar = adios_get_opt($sidebar_option_field);

    if ($sidebar != 'default' && !empty($sidebar)) {
      return $sidebar;
    }
    return $default;
  }
}

/**
 *
 * Blog Excerpt Read More
 * @since 1.7.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'adios_auto_post_excerpt' ) ) {
  function adios_auto_post_excerpt( $limit = '' ) {
    $limit   = ( empty($limit)) ? 20:$limit;
    $content = get_the_excerpt();
    $content = strip_shortcodes( $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    $content = strip_tags( $content );
    $words   = explode( ' ', $content, $limit + 1 );

    if( count( $words ) > $limit ) {

      array_pop( $words );
      $content  = implode( ' ', $words );
      $content .= ' &hellip;';

    }

    return $content;

  }
}

/**
*
* @return none
* @param  class
* multiple class sanitization
*
**/
if ( ! function_exists( 'sanitize_html_classes' ) && function_exists( 'sanitize_html_class' ) ) {
  function sanitize_html_classes( $class, $fallback = null ) {

    // Explode it, if it's a string
    if ( is_string( $class ) ) {
      $class = explode(" ", $class);
    }

    if ( is_array( $class ) && count( $class ) > 0 ) {
      $class = array_map("sanitize_html_class", $class);
      return implode(" ", $class);
    }
    else {
      return sanitize_html_class( $class, $fallback );
    }
  }
}

/**
 *
 * element values post, page, categories
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'adios_element_values_page' ) ) {
  function adios_element_values_page(  $type = '', $query_args = array() ) {

    $options = array();

    switch( $type ) {

      case 'pages':
      case 'page':
      $pages = get_pages( $query_args );

      if ( !empty($pages) ) {
        foreach ( $pages as $page ) {
          $options[$page->post_title] = $page->ID;
        }
      }
      break;

      case 'posts':
      case 'post':
      $posts = get_posts( $query_args );

      if ( !empty($posts) ) {
        foreach ( $posts as $post ) {
          $options[$post->post_title] = lcfirst($post->post_title);
        }
      }
      break;

      case 'tags':
      case 'tag':

      $tags = get_terms( $query_args['taxonomies'], $query_args['args'] );
        if ( !empty($tags) ) {
          foreach ( $tags as $tag ) {
            $options[$tag->term_id] = $tag->name;
        }
      }
      break;

      case 'categories':
      case 'category':

      $categories = get_categories( $query_args );
      if ( !empty($categories) ) {
        foreach ( $categories as $category ) {
          $options[$category->term_id] = $category->name;
        }
      }
      break;

      case 'custom':
      case 'callback':

      if( is_callable( $query_args['function'] ) ) {
        $options = call_user_func( $query_args['function'], $query_args['args'] );
      }

      break;

    }

    return $options;

  }
}

if ( ! function_exists( 'adios_comment' ) ) :
/**
 * Comments and pingbacks. Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since make 1.0
 */
function adios_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
      ?>
      <li <?php comment_class('comment'); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="media-body"><?php esc_html_e( 'Pingback:', 'adios' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'adios' ), ' ' ); ?></div>
      </li>
      <?php
    break;

    default :
      $class = array('comment_wrap');
      if ($depth > 1) {
        $class[] = 'chaild';
      }
      ?>
      <!-- Comment Item -->
      <li <?php comment_class('comment coment-block'); ?> id="comment-<?php comment_ID(); ?>">

        <div class="comment-body">
          <div class="image">
            <?php echo get_avatar( $comment, 45 ); ?>
          </div>

          <div class="comment-content comm-area">
            <div class="comment-meta comm-title">
              <h6 class="h6"><?php comment_author_link();?></h6>
              <span><?php echo comment_date(get_option('date_format')) ?> at <?php echo comment_date(get_option('time_format')) ?></span>
            </div>

            <div class="simple-text">
              <?php if ( $comment->comment_approved == '0' ) : ?>
                <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'adios' ); ?></p>
              <?php endif; ?>

              <?php comment_text(); ?>

            </div>

            <div class="reply">
              <div class="reply-arrow">
               <a href="#" class="icon-down-open-mini"></a>
               <a href="#" class="icon-up-open-mini"></a>
              </div>
              <?php $reply = get_comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => 2 ) ) );
                if (!empty($reply)): ?>
                  <?php echo wp_kses_post($reply); ?>
                <?php endif;
                edit_comment_link( wp_kses_post( 'Edit', 'adios' ), '', '' );
              ?>
              <a href="#"><?php echo esc_html__('Share', 'adios'); ?> <i class="icon-right-open-mini"></i></a>
            </div>

            <!--share comment-->

          </div>
        </div>
      <?php
      break;
  endswitch;
}

endif; // ends check for make_comment()

if (!function_exists('adios_close_comment')):
/**
 * Close comment
 *
 * @since make 1.0
 */
function adios_close_comment() { ?>
    </li>
    <!-- End Comment Item -->
<?php }

endif; // ends check for make_close_comment()

/**
 * Select adios footer style
 * @since adios 1.0
 */
if(!function_exists('adios_header_template')) {
  function adios_header_template($layout) {
    if(class_exists('ReduxFramework') && !adios_get_opt('header-enable-switch')) { return; }
    switch ($layout) {
      case 'alternative':
      default:
        get_template_part('templates/header/alternative');
        break;
      case 'default':
        get_template_part('templates/header/default');
        break;
      case 'header-style3':
        get_template_part('templates/header/header-style3');
        break;
      case 'header-style4':
        get_template_part('templates/header/header-style4');
        break;
      case 'header-style5':
        get_template_part('templates/header/header-style5');
        break;
      case 'header-style6':
        get_template_part('templates/header/header-style6');
        break;
      case 'header-style7':
        get_template_part('templates/header/header-style7');
        break;
      case 'header-style8':
        get_template_part('templates/header/header-style8');
        break;
    }
  }
}

/**
 * Select adios footer style
 * @since adios 1.0
 */
if(!function_exists('adios_footer_template')) {
  function adios_footer_template($layout) {
    if(class_exists('ReduxFramework') && !adios_get_opt('footer-enable-switch')) { return; }
    switch ($layout) {
      case 'footer-style5':
        get_template_part('templates/footer/footer-style5');
        break;
      case 'footer-style4':
        get_template_part('templates/footer/footer-style4');
        break;
      case 'footer-style3':
        get_template_part('templates/footer/footer-style3');
        break;
      case 'alternative':
        get_template_part('templates/footer/alternative');
        break;
      case 'default':
      default:
        get_template_part('templates/footer/default');
        break;
    }
  }
}

/**
 * Select adios footer style
 * @since adios 1.0
 */
if(!function_exists('adios_title_wrapper_template')) {
  function adios_title_wrapper_template($layout) {
    switch ($layout) {
      case 'alternative':
        get_template_part('templates/title-wrapper/alternative');
        break;
      case 'default':
      default:
        get_template_part('templates/title-wrapper/default');
        break;
    }
  }
}

/**
 * Select adios blog single style
 * @since adios 1.0
 */
if(!function_exists('adios_blog_single_template')) {
  function adios_blog_single_template($layout) {
    switch ($layout) {
      case 'alternative':
        get_template_part('templates/blog/blog-single/layout/alternative');
        break;
      case 'default':
      default:
        get_template_part('templates/blog/blog-single/layout/default');
        break;
    }
  }
}

/**
 * Get associative terms array
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('adios_get_terms_assoc')) {
  function adios_get_terms_assoc($terms) {
    $terms = get_terms( $terms , array('fields' => 'all' ) );

    if (is_array($terms) && !is_wp_error($terms)) {
      $terms_assoc = array();

      foreach ($terms as $term) {
        $terms_assoc[$term -> term_id] = $term -> name;
      }
      return $terms_assoc;
    }
    return false;
  }
}

/**
 * Get Social Icons links
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('adios_social_links')) {
  function adios_social_links($pattern = '%s', $category = '') {
    if(!adios_get_opt('footer-enable-social-icons')) { return; }
    $args = array(
      'posts_per_page' => -1,
      'offset'          => 0,
      'orderby'         => 'menu_order',
      'order'           => 'ASC',
      'post_type'       => 'social-site',
      'post_status'     => 'publish'
    );

    if (!empty($category)) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'social-site-category',
          'field'    => 'id',
          'terms'    => $category,
        ),
      );
    }

    $custom_query = new WP_Query( $args );
    if ( $custom_query->have_posts() ):

      $found_posts = $custom_query->found_posts;
      while ( $custom_query -> have_posts() ) :
        $custom_query -> the_post();
        echo sprintf($pattern, '<a target="_blank" href="'.esc_url(get_the_title()).'"><i class="fa '.esc_attr(adios_get_post_opt('icon')).'"></i></a>');
      endwhile; // end of the loop.
    endif;
    wp_reset_postdata();
  }
}

/**
 * Is one page or not ??
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('adios_is_onepage')) {
  function adios_is_onepage() {
    if(is_page_template('page-templates/onepage.php')) { return true; } else { return false; }
  }
}

/**
 * Load Google Font
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('adios_fonts_url')) {
  function adios_fonts_url() {
    $fonts_url = '';

    $poppins = _x( 'on', 'Poppins font: on or off', 'adios' );

    $droid = _x( 'on', 'Droid font: on or off', 'adios' );

    if ( 'off' !== $poppins || 'off' !== $droid ) {
      $font_families = array();

      if ( 'off' !== $poppins ) {
        $font_families[] = 'Poppins:400,700,300,600,500';
      }

      if ( 'off' !== $droid ) {
        $font_families[] = 'Droid Serif:400,700';
      }

      $query_args = array('family' => urlencode( implode( '|', $font_families ) ), 'subset' => urlencode( 'latin,latin-ext' ));
      $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
  }
}

/* Custom CSS */
if(!function_exists('adios_custom_style')) {
  function adios_custom_style() {

    $header_logo_width  = adios_get_opt('logo-width');
    $footer_logo_width  = adios_get_opt('footer-logo-width');
    $footer_logo_height = adios_get_opt('footer-logo-height');
    $customize = (!empty($header_logo_width) || !empty($header_logo_height) || !empty($footer_logo_height) || !empty($footer_logo_width)) ? true:false;

    $output = '';

    if($customize) {
      $output .= (!empty($header_logo_width)) ? '.header .logo {':'';
      $output .=  ($header_logo_width) ? 'width:'.esc_attr($header_logo_width).';':'';
      $output .= (!empty($header_logo_width)) ? '}':'';

      $output .= (!empty($footer_logo_width) || !empty($footer_logo_height)) ? '.footer-logo {':'';
      $output .=  ($footer_logo_width) ? 'width:'.esc_attr($footer_logo_width).';':'';
      $output .=  ($footer_logo_height) ? 'height:'.esc_attr($footer_logo_height).';':'';
      $output .= (!empty($footer_logo_width) || !empty($header_logo_height)) ? '}':'';
    }

    return $output;
  }
}

if(!function_exists('adios_footer_columns')) {
  /**
   * Footer Columns
   * @param type $type
   * @return array
  */
  function adios_footer_columns() { 
    $footer_columns = adios_get_opt('footer-column');
    switch ($footer_columns) {
      case '1':
        $col_class = 'col-md-12 col-sm-12';
        break;
      case '2':
        $col_class = 'col-md-6 col-sm-6';
        break;
      case '3':
        $col_class = 'col-md-4 col-sm-6';
        break;
      case '4':
      default:
        $col_class = 'col-md-3 col-sm-6';
        break;
    }
    for($i = 1; $i < $footer_columns + 1; $i++) { ?>
      <div class="<?php echo esc_attr($col_class .' col-'.$i); ?>">
        <?php if (is_active_sidebar( adios_get_custom_sidebar('footer-'.$i, 'footer-sidebar-'.$i) )): ?>
          <?php dynamic_sidebar( adios_get_custom_sidebar('footer-'.$i, 'footer-sidebar-'.$i) ); ?>
        <?php endif; ?>
      </div>
    <?php }
  }
}
