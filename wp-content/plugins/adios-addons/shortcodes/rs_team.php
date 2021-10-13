<?php
/**
 *
 * RS Team
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_team( $atts, $content = '', $id = '' ) {

  global $post;

  extract( shortcode_atts( array(
    'id'               => '',
    'class'            => '',
    'style'            => 'style1',
    'pagination_style' => 'dot',
    'person_id'        => '',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'loop'             => 1,
    'speed'            => 1000,
    'autoplay'         => 5000,
    'limit'            => 4,
    'per_slide'        => 3

  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $person_id = (is_array($person_id)) ? $person_id:explode(',', $person_id);

  $args = array(
    'post_type'      => 'team',
    'orderby'        => $orderby,
    'order'          => $order,
    'posts_per_page' => $limit,
  );

  if(!empty($person_id[0])) {
    $args['post__in'] = $person_id;
  }

  $query   = new WP_Query( $args );

  ob_start();
  echo '<div '.$id.' class="team '.$class.'">';
  echo '<div class="row">';

  switch ($style) {
    case 'style1':
      $delay = 0.2;
      while( $query->have_posts() ) : $query->the_post();
        $position = get_post_meta($post->ID, 'team-position', true);
        $url      = get_post_meta($post->ID, 'team-url', true);
        $item_args = array(
          'style'    => $style,
          'delay'    => $delay,
          'position' => $position,
          'team_url' => $url
        );
        rs_team_item( $item_args );
        $delay += 0.2;
      endwhile;
      wp_reset_postdata();
      break;
    case 'style2':
      wp_enqueue_script('adios-slick');
      wp_enqueue_style( 'adios-slick');
      $delay = 0.2;
      echo '<div class="swiper-container  team-slider" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="'.esc_attr($per_slide).'" data-lg-slides="'.esc_attr($per_slide).'" data-add-slides="'.esc_attr($per_slide).'">';
      echo '<div class="swiper-wrapper">';
      while( $query->have_posts() ) : $query->the_post();
        $position = get_post_meta($post->ID, 'team-position', true);
        $url      = get_post_meta($post->ID, 'team-url', true);
        $item_args = array(
          'style'    => $style,
          'delay'    => $delay,
          'position' => $position,
          'team_url' => $url
        );
        rs_team_item( $item_args );
        $delay += 0.1;
      endwhile;
      wp_reset_postdata();
      echo '</div>';
      echo ($style == 'style2' && $pagination_style == 'dot' ) ? '<div class="pagination point-style alb-point"></div>':'<div class="pagination vertical-point right-align"></div>';
      echo '</div>';
      break;
    default:
      # code...
      break;
  }

  echo '</div>';
  echo '</div>';
  //echo ($style == 'style2' && $pagination_style == 'dot' ) ? '<div class="pagination point-style alb-point"></div>':'<div class="pagination vertical-point right-align"></div>';
  $output = ob_get_clean();
  return $output;

}
add_shortcode('rs_team', 'rs_team');


/**
 * Part of team shortcode
 * @param type $type
 * @return type
 */
if( !function_exists('rs_team_item')) {
  function rs_team_item( $item_args ) {
    extract($item_args);

    switch ($style) {
      case 'style1': ?>
        <div class="col-md-6 col-sm-6">
          <div class="team-item item-hov wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
            <?php the_post_thumbnail('small', array('class' => 'resp-img team-img')); ?>
            <div class="team-desc item-layer">
              <div class="vertical-align w-full">
              <h4 class="h4 team-name"><a href="<?php echo esc_url($team_url); ?>" target="_blank"><?php the_title(); ?></a></h4>
                <span class="team-position"><?php echo esc_html($position); ?></span>
              </div>
            </div>
          </div>
        </div>
        <?php # code...
        break;
      case 'style2': ?>
        <div class="swiper-slide">
          <div class="padd-wrap wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
           <div class="team-item item-hov">
            <?php the_post_thumbnail('small-alt', array('class' => 'resp-img team-img')); ?>
            <div class="team-desc item-layer">
              <div class="vertical-align w-full">
              <h4 class="h4 team-name"><a href="<?php echo esc_url($team_url); ?>" target="_blank"><?php the_title(); ?></a></h4>
                <span class="team-position"><?php echo esc_html($position); ?></span>
              </div>
            </div>
           </div>
          </div>
        </div>
        <?php
        break;

      default:
        # code...
        break;
    }
  }
}
