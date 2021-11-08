<?php

$redux_opt_name = REDUX_OPT_NAME;

function adios_redux_add_metaboxes($metaboxes) {

  // Variable used to store the configuration array of metaboxes
  $metaboxes = array();

  $metaboxes[] = adios_redux_get_post_opt_metaboxes();
  $metaboxes[] = adios_redux_get_page_template_blog_metaboxes();
  $metaboxes[] = adios_redux_get_page_template_portfolio_metaboxes();
  $metaboxes[] = adios_redux_get_page_metaboxes();
  $metaboxes[] = adios_redux_get_video_post_metaboxes();
  $metaboxes[] = adios_redux_get_audio_post_metaboxes();
  $metaboxes[] = adios_redux_get_gallery_post_metaboxes();
  $metaboxes[] = adios_redux_get_post_adv_metaboxes();
  $metaboxes[] = adios_redux_get_social_metaboxes();
  // adios
  $metaboxes[] = adios_redux_get_testimonial_metaboxes();
  $metaboxes[] = adios_redux_get_team_metaboxes();
  $metaboxes[] = adios_redux_get_portfolio_post_metaboxes();
  $metaboxes[] = adios_redux_get_page_template_portfolio_horizontal_scroll_metaboxes();

  return $metaboxes;
}
add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'adios_redux_add_metaboxes');


/**
 * Get configuration array for blog template
 * @return type
 */
function adios_redux_get_page_template_blog_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/page-template-blog.php';
  return array(
    'id' => 'adios-template-blog-options',
    'title' => esc_html__('Blog Options', 'adios'),
    'post_types' => array('page'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'page_template' => array(
      'page-templates/blog-list.php',
      'page-templates/blog-masonry.php',
    )
  );
}

/**
 * Get configuration array for blog template
 * @return type
 */
function adios_redux_get_page_template_portfolio_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/page-template-portfolio-horizontal-scroll.php';
  return array(
    'id' => 'adios-template-portfolio-horizontal-scroll-options',
    'title' => esc_html__('Portfolio Horizontal Scroll Options', 'adios'),
    'post_types' => array('page'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'page_template' => array(
      'page-templates/portfolio-horizontal-scroll.php',
    )
  );
}

/**
 * Get configuration array for blog template
 * @return type
 */
function adios_redux_get_page_template_portfolio_horizontal_scroll_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/page-template-portfolio.php';
  return array(
    'id' => 'adios-template-portfolio-options',
    'title' => esc_html__('Portfolio Options', 'adios'),
    'post_types' => array('page'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'page_template' => array(
      'page-templates/portfolio.php',
    )
  );
}

/**
 * Get configuration array for contact template
 * @return type
 */
function adios_redux_get_social_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/social-site.php';

  return array(
    'id' => 'adios-template-social-options',
    'title' => esc_html__('Social Options', 'adios'),
    'post_types' => array('social-site'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
  );
}


/**
 * Get configuration array for page metaboxes
 * @return type
 */
function adios_redux_get_page_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/header.php';
  require get_template_directory() . '/framework/admin/metaboxes/title-wrapper.php';
  require get_template_directory() . '/framework/admin/metaboxes/content.php';
  require get_template_directory() . '/framework/admin/metaboxes/footer.php';
  require get_template_directory() . '/framework/admin/metaboxes/sidebar.php';

  return array(
    'id' => 'adios-page-options',
    'title' => esc_html__('Options', 'adios'),
    'post_types' => array('page'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}


/**
 * Get configuration array for video post metaboxes
 * @return type
 */
function adios_redux_get_video_post_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/post-video.php';

  return array(
    'id' => 'adios-video-post-options',
    'title' => esc_html__('Video Post Options', 'adios'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'post_format' => array('video')
  );
}

/**
 * Get configuration array for video post metaboxes
 * @return type
 */
function adios_redux_get_audio_post_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/post-audio.php';

  return array(
    'id' => 'adios-audio-post-options',
    'title' => esc_html__('Audio Post Options', 'adios'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'post_format' => array('audio')
  );
}

/**
 * Get configuration array for gallery post metaboxes
 * @return type
 */
function adios_redux_get_gallery_post_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/post-gallery.php';

  return array(
    'id' => 'adios-gallery-post-options',
    'title' => esc_html__('Gallery Post Options', 'adios'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'post_format' => array('gallery')
  );
}

/**
 * Get configuration array for gallery post metaboxes
 * @return type
 */
function adios_redux_get_post_opt_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/post.php';

  return array(
    'id' => 'adios-post-options',
    'title' => esc_html__('Post Options', 'adios'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
  );
}

/**
 * Get configuration array for page metaboxes
 * @return type
 */
function adios_redux_get_post_adv_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/header.php';
  require get_template_directory() . '/framework/admin/metaboxes/title-wrapper.php';
  require get_template_directory() . '/framework/admin/metaboxes/sidebar.php';
  require get_template_directory() . '/framework/admin/metaboxes/footer.php';

  return array(
    'id' => 'adios-post-adv-options',
    'title' => esc_html__('Options', 'adios'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}

/**
 * Get configuration array for testimonial metaboxes
 * @return type
 */
function adios_redux_get_testimonial_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/testimonial.php';

  return array(
    'id' => 'adios-testimonial-options',
    'title' => esc_html__('Testimonial', 'adios'),
    'post_types' => array('testimonial'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}

/**
 * Get configuration array for testimonial metaboxes
 * @return type
 */
function adios_redux_get_team_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/team.php';

  return array(
    'id' => 'adios-team-options',
    'title' => esc_html__('Team', 'adios'),
    'post_types' => array('team'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}

/**
 * Get configuration array for portfolio single post
 * @return type
 */
function adios_redux_get_portfolio_post_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/portfolio-general.php';
  require get_template_directory() . '/framework/admin/metaboxes/portfolio-details.php';

  return array(
    'id' => 'adios-portfolio-options',
    'title' => esc_html__('Portfolio Options', 'adios'),
    'post_types' => array('portfolio'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}
