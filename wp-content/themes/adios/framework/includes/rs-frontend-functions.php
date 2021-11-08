<?php
/**
 * Frontend Theme Functions.
 *
 * @package adios
 * @subpackage Template
 */
 /**
 * Theme Loader
 * @param string $logo_field
 * @param string $default_url
 * @param string $class
 */
if(!function_exists('adios_loader')) {
  function adios_loader($loader_field = '', $default_url = '') {
    if(class_exists('ReduxFramework') && !adios_get_opt('general-loader-enable-switch')) { return; }
    if (empty($loader_field)) {
      $loader_field = 'general-loader-logo';
    }

    if( adios_get_opt( $loader_field ) != null ) {
      $loader_array = adios_get_opt( $loader_field );
    }

    if( (!isset( $loader_array['url'] ) || empty($loader_array['url'])) && empty($default_url)) {
      return;
    }

    if(empty($class)) {
      $class = ' logo vertical-align';
    }

    if( !isset( $loader_array['url'] ) || empty($loader_array['url']) ) {
      $loader_url = $default_url;
    } else {
      $loader_url = $loader_array['url'];
    }
  ?>
    <div class="loader">
     <div class="load-title">
        <img src="<?php echo esc_url($loader_url); ?>" alt="">
        <div class="load-circle"></div>
     </div>
    </div>
<?php
  }
}

 /**
 * Theme logo
 * @param string $logo_field
 * @param string $default_url
 * @param string $class
 */
 if( !function_exists('adios_logo')) {
  function adios_logo($logo_field = '', $default_url = '', $class = '') {

    if (empty($logo_field)) {
      $logo_field = 'logo';
    }

    $logo = '';

    if( adios_get_opt( $logo_field ) != null ) {
      $logo_array = adios_get_opt( $logo_field );
    }

    if( (!isset( $logo_array['url'] ) || empty($logo_array['url'])) && empty($default_url)) {
      return;
    }

    if(empty($class)) {
      $class = ' logo vertical-align';
    }

    if( !isset( $logo_array['url'] ) || empty($logo_array['url']) ) {
      $logo_url = $default_url;
    } else {
      $logo_url = $logo_array['url'];
    }

    ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo sanitize_html_classes($class); ?>"><img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>"></a>
    <?php
  }
}

/**
 *
 * Main Menu
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( !function_exists('adios_main_menu')) {
  function adios_main_menu($class = '') {
    if ( function_exists('wp_nav_menu') && has_nav_menu( 'primary-menu' ) ) {
      $menu = '';
      if(is_singular()) {
        $menu = adios_get_opt('header-primary-menu');
      }
      wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'container'      => false,
        'menu_id'        => 'nav',
        'menu'           => $menu,
        'menu_class'     => $class,
        'walker'         => new adios_menu_widget_walker_nav_menu()
      ));
    } else {
      echo '<a target="_blank" href="'. admin_url('nav-menus.php') .'" class="nav-list cell-view no-menu">'. esc_html__( 'You can edit your menu content on the Menus screen in the Appearance section.', 'adios' ) .'</a>';
    }
  }
}

/**
 *
 * Pagination
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'adios_paging_nav' ) ) {
  function adios_paging_nav( $max_num_pages = false, $blog_style = 'default' ) {

    if ($max_num_pages === false) {
      global $wp_query;
      $max_num_pages = $wp_query -> max_num_pages;
    }

    $big = 999999999; // need an unlikely integer

    $links = paginate_links( array(
      'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'    => '?paged=%#%',
      'current'   => max( 1, get_query_var('paged') ),
      'total'     => $max_num_pages,
      'prev_next' => true,
      'prev_text' => '<i class="icon-left-open-mini"></i>',
      'next_text' => '<i class="icon-right-open-mini"></i>',
      'end_size'  => 1,
      'mid_size'  => 2,
      'type'      => 'plain',
    ) );


    if (!empty($links)): ?>
      <div class="blog-nav wow zoomIn" data-wow-delay="0.4s">
        <?php echo wp_kses_post($links); ?>
      </div>
    <?php endif;

  }
}

/**
 * Show breadcrumbs
 *
 * @since adios 1.0
 */
if(!function_exists('adios_breadcrumbs')) {
  function adios_breadcrumbs($class = '') {
    $before      = '<li>';
    $after       = '</li>';
    $before_last = '';
    $after_last  = '';
    $separator   = '';
  ?>
    <!-- Breadcrumbs -->
    <ul class="breadcrumbs">
      <?php
      $output = '';
      if (function_exists('is_woocoomerce') && is_woocommerce() || function_exists('is_shop') && is_shop()) {
        $args = array(
          'delimiter'   => '&nbsp;/&nbsp;',
          'wrap_before' => '',
          'wrap_after'  => '',
          'before'      => '<li>',
          'after'       => '</li>',
          'home'        => esc_html_x( 'Home', 'breadcrumb', 'adios' )
        );

        woocommerce_breadcrumb($args);

      } else if (!is_home()) {

        $output .= $before.'<a href="';
        $output .= esc_url(home_url('/'));
        $output .= '">';
        $output .= esc_html__('Home', 'adios');
        $output .= '</a>'.$after. $separator .'';

        if (is_single()) {

          $cats = get_the_category();

          if( isset($cats[0]) ) :
            $output .= $before.'<a href="'. esc_url(get_category_link( $cats[0]->term_id )) .'">'. $cats[0]->cat_name.'</a>' . $after . $separator;
          endif;

          if (is_single()) {
            $output .= $before.$before_last;
            $output .= get_the_title();
            $output .= $after_last.$after;
          }
        } elseif( is_category() ) {

          $cats = get_the_category();

          if( isset($cats[0]) ) :
            $output .= $before.$before_last.single_cat_title('', false).$after_last.$after;
          endif;

        } elseif (is_page()) {
          global $post;

          if($post->post_parent){
            $anc = get_post_ancestors( $post->ID );
            $title = get_the_title();
            foreach ( $anc as $ancestor ) {
              $output_ancestor = $before.'<a href="'.esc_url(get_permalink($ancestor)).'" title="'.esc_attr(get_the_title($ancestor)).'"  rel="v:url" property="v:title">'.get_the_title($ancestor).'</a>'.$after.' ' . $separator;
            }
            $output .= $output_ancestor;
            $output .= $before.$before_last.$title.$after_last.$after;
          } else {
            $output .= $before.$before_last.get_the_title().$after_last.$after;
          }
        }
        elseif (is_tag()) {
          $output .= $before.$before_last.single_cat_title('', false).$after_last.$after;

        } elseif (is_day()) {
          $output .= $before.$before_last. esc_html__('Archive for', 'adios').' ';
          $output .= get_the_time('F jS, Y');
          $output .= $after_last.$after;

        } elseif (is_month()) {
          $output .= $before.$before_last.esc_html__('Archive for', 'adios').' ';
          $output .= get_the_time('F, Y');
          $output .= $after_last.$after;

        } elseif (is_year()) {
          $output .= $before.$before_last. esc_html__('Archive for', 'adios').' ';
          $output .=get_the_time('Y');
          $output .= $after_last.$after;

        } elseif (is_author()) {
          $output .= $before.$before_last. esc_html__('Author Archive', 'adios');
          $output .= $after_last.$after;

        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
          $output .= $before.$before_last.esc_html__('Blog Archives', 'adios').$after_last.$after;

        } elseif (is_search()) {
          $output .= $before.$before_last. esc_html__('Search Results', 'adios').$after_last.$after;

        } elseif (is_404()) {
          $output .= $before.$before_last. esc_html__('Page not Found', 'adios').$after_last.$after;

        }

      } elseif (is_home()) {
        $output .= $before.$before_last. esc_html__('Home', 'adios') .$after_last.$after;
      }

      echo wp_kses_post($output);
      ?>
    </ul>
    <!-- End Breadcrumbs -->
  <?php }

}

/**
 *
 * Get the Page Title
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( !function_exists('adios_get_the_title')) {
  function adios_get_the_title() {

    $title = '';

    //woocoomerce page
    if (function_exists('is_woocoomerce') && is_woocommerce() || function_exists('is_shop') && is_shop()):
      if (apply_filters( 'woocommerce_show_page_title', true )):
        $title = woocommerce_page_title(false);
      endif;
    // Default Latest Posts page
    elseif( is_home() && !is_singular('page') ) :
      $title = esc_html__('Blog','adios');
    
    elseif(function_exists('is_woocommerce') && is_product_category()):
      $title = single_cat_title('', false);
    
    elseif(function_exists('is_woocommerce') && is_woocommerce()):
      $title = get_the_title();


    elseif( is_single() ) :
      $title = esc_html__('Post Single Page', 'adios');

    // Singular
    elseif( is_singular() ) :
      $title = get_the_title();


    // Search
    elseif( is_search() ) :
      global $wp_query;
      $total_results = $wp_query->found_posts;
      $prefix = '';

      if( $total_results == 1 ){
        $prefix = esc_html__('1 search result for', 'adios');
      }
      else if( $total_results > 1 ) {
        $prefix = $total_results . ' ' . esc_html__('search results for', 'adios');
      }
      else {
        $prefix = esc_html__('Search results for', 'adios');
      }
      $title = get_search_query();

    // Category and other Taxonomies
    elseif ( is_category() ) :
      $title = single_cat_title('', false);

    elseif ( is_tag() ) :
      $title = single_tag_title('', false);

    elseif ( is_author() ) :
      $title = wp_kses_post(sprintf( __( 'Author: %s', 'adios' ), '<span class="vcard">' . get_the_author() . '</span>' ));

    elseif ( is_day() ) :
      $title = wp_kses_post(sprintf( __( 'Day: %s', 'adios' ), '<span>' . get_the_date() . '</span>' ));

    elseif ( is_month() ) :
      $title = wp_kses_post(sprintf( __( 'Month: %s', 'adios' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'adios' ) ) . '</span>' ));

    elseif ( is_year() ) :
      $title = wp_kses_post(sprintf( __( 'Year: %s', 'adios' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'adios' ) ) . '</span>' ));

    elseif( is_tax() ) :
      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      $title = $term->name;

    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
      $title = esc_html__( 'Asides', 'adios' );

    elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
      $title = esc_html__( 'Galleries', 'adios');

    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
      $title = esc_html__( 'Images', 'adios');

    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
      $title = esc_html__( 'Videos', 'adios' );

    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
      $title = esc_html__( 'Quotes', 'adios' );

    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
      $title = esc_html__( 'Links', 'adios' );

    elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
      $title = esc_html__( 'Statuses', 'adios' );

    elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
      $title = esc_html__( 'Audios', 'adios' );

    elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
      $title = esc_html__( 'Chats', 'adios' );

    elseif( is_404() ) :
      $title = esc_html__( '404', 'adios' );

    else :
      $title = esc_html__( 'Archives', 'adios' );
    endif;

    return $title;
  }
}

/**
 *
 * Social Share
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if(!function_exists('adios_social_share')) {
  function adios_social_share($style) {
    switch ($style) {
      case 'style1':
      default: ?>
        <div class="share wow zoomIn" data-wow-delay="0.2s">
          <a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/share_1.png" alt="" class="resp-img"></a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/share_2.png" alt="" class="resp-img"></a>
          <a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/share_3.png" alt="" class="resp-img"></a>
          <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/share_4.png" alt="" class="resp-img"></a>
        </div>
        <?php
        break;

      case 'style2': ?>
        <div class="share share-border wow zoomIn" data-wow-delay="0.4s">
          <div class="title"><b><?php echo esc_html__('345', 'adios'); ?> </b><?php echo esc_html__('recommendations', 'adios'); ?></div>
          <a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/share_1.png" alt="" class="resp-img"></a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/share_2.png" alt="" class="resp-img"></a>
          <a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/share_3.png" alt="" class="resp-img"></a>
          <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/share_4.png" alt="" class="resp-img"></a>
        </div>
      <?php
        break;
    }
  }
}

if(!function_exists('adios_portfolio_items')) {
  function adios_portfolio_items($args, $image_size, $term_slugs, $term_names) {
    extract($args);
    global $post;
    switch ($style) {
      case 'one_column':
      case 'three_column':
      case 'four_column':
      default: ?>

      <?php
        $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $link_class = '';
        if($link_to == 'lightbox') {
          wp_enqueue_style('adios-lightgallery');
          wp_enqueue_script('adios-lightgallery');
          $link_class = 'lightbox-item';
          $href = $image_src[0];
        } elseif($link_to == 'external-url' && !empty($external_url)) {
          $href = $external_url;
        } else {
          $href = get_the_permalink();
        }
      ?>

        <div class="item wow zoomIn <?php echo sanitize_html_classes($width_class); ?> <?php echo sanitize_html_classes(implode(' ', $term_slugs)); ?> wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
          <div class="item-drid-size">
            <?php the_post_thumbnail($image_size, array('class' => 'resp-img')); ?>
            <a href="<?php echo esc_url($href); ?>" class="link-wrap <?php echo esc_attr($link_class); ?> item-hov"><span></span><span></span></a>
          </div>
        </div>
        <?php
        break;
      case 'masonry':
        $count      = ( $count < 4 ) ? $count:0;
        $image_attr = explode('|', $image_size[$count]);
      ?>
        <div class="item wow zoomIn <?php echo sanitize_html_classes($image_attr[0]); ?> <?php echo sanitize_html_classes(implode(' ', $term_slugs)); ?>" data-wow-delay="<?php echo esc_attr($delay); ?>s">
          <div class="item-drid-size">
            <?php the_post_thumbnail($image_attr[1], array('class' => 'resp-img')); ?>
            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="link-wrap item-hov"></a>
             <div class="item-desc">
              <h4 class="h4"><?php the_title(); ?></h4>
                 <span><?php echo implode(', ', $term_names); ?></span>
             </div>
          </div>
        </div>
        <?php
        break;
      case 'masonry_alt': 
        $count      = ( $count < 4 ) ? $count:0;
      ?>
        <div class="item zoomIn <?php echo sanitize_html_classes($width_class); ?> wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
          <div class="item-drid-size">
            <?php the_post_thumbnail($image_size[$count], array('class' => 'resp-img')); ?>
            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="link-wrap item-hov">
              <span></span>
              <span></span>
            </a>
          </div>
          <div class="album-desc text-center">
            <h2 class="h2">
              <a href="<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><?php the_title(); ?></a>
            </h2>
            <span><?php echo implode(', ', $term_names); ?></span>
          </div>
        </div>
        <?php
        # code...
        break;
    }
  }
}


if(!function_exists('adios_title_wrapper_bg')) {
  function adios_title_wrapper_bg() {
    $bg_image      = adios_get_opt('title-wrapper-background');
    $bg_position   = adios_get_opt('bg-position');
    $bg_size       = adios_get_opt('bg-size');
    $bg_attachment = adios_get_opt('bg-attachment');
    $bg_position   = (!empty($bg_position) && isset($bg_position)) ? 'background-position:'.$bg_position.';':'';
    $bg_size       = (!empty($bg_size) && isset($bg_size)) ? 'background-size:'.$bg_size.';':'';
    $bg_attachment = (!empty($bg_attachment) && isset($bg_attachment)) ? 'background-attachment:'.$bg_attachment.';':'';
    $bg_image      = (!empty($bg_image['url']) && isset($bg_image['url'])) ? 'background-image:url('.$bg_image['url'].');':'';

    $style_attr = (!empty($bg_image)) ? ' style="'.$bg_image.$bg_size.$bg_attachment.$bg_position.'"':'';

    echo wp_kses_post($style_attr);
  }
}
