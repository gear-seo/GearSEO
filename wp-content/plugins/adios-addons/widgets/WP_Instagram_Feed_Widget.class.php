<?php
/**
 * Instagram widget
 */

class adios_WP_Instagram_Feed_Widget extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_instagram_feed', 'description' => esc_html__( 'Displays Instagram images', 'adios-addons' ) );
    parent::__construct('instagramfeed', esc_html__( 'Adios: Instagram Feed', 'adios-addons' ), $widget_ops);

    $this-> alt_option_name = 'widget_instagram_feed';

    add_action( 'save_post', array(&$this, 'flush_widget_cache') );
    add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
    add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
  }

  function widget($args, $instance)
  {
    $cache = wp_cache_get('widget_instagram_feed', 'widget');

    if ( !is_array($cache) )
    {
      $cache = array();
    }
    if ( ! isset( $args['widget_id'] ) )
    {
      $args['widget_id'] = $this->id;
    }

    if ( isset( $cache[ $args['widget_id'] ] ) )
    {
      echo $cache[ $args['widget_id'] ];
      return;
    }

    ob_start();
    extract($args);
    echo $before_widget;
    $title    = apply_filters('widget_title', empty($instance['title']) ? esc_html__( 'Instagram', 'adios-addons' ) : $instance['title'], $instance, $this->id_base);
    $user_id  = isset($instance['user_id']) ? esc_attr($instance['user_id']) : '';
    $token    = isset($instance['token']) ? esc_attr($instance['token']) : '';
    $limit    = isset($instance['limit']) ? (int)$instance['limit'] : '';

    if (!empty($user_id)) {

      echo $before_title.$title.$after_title; $uniqueid = uniqid(); ?>
      <div class="instagram-feed">
        <ul id="instafeed-gram-<?php echo esc_attr($uniqueid); ?>" class="images-feed" data-token="<?php echo esc_attr($token); ?>" data-limit="<?php echo esc_attr($limit); ?>" data-userid="<?php echo esc_attr($user_id); ?>"></ul>
      </div>
      <?php
    }

    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_instagram_feed', $cache, 'widget');
  }

  function update( $new_instance, $old_instance )
  {
    $instance = $old_instance;
    $instance['title']   = strip_tags($new_instance['title']);
    $instance['user_id'] = strip_tags($new_instance['user_id']);
    $instance['token'] = strip_tags($new_instance['token']);
    $instance['limit']   = (int)$new_instance['limit'];
    return $instance;
  }

  function flush_widget_cache()
  {
    wp_cache_delete('widget_instagram_feed', 'widget');
  }

  function form( $instance )
  {
    $title   = isset($instance['title']) ?  $instance['title'] : '';
    $user_id = isset($instance['user_id']) ? $instance['user_id'] : '';
    $token   = isset($instance['token']) ? $instance['token'] : '';
    $limit   = isset($instance['limit']) ? (int)$instance['limit'] : '';
    ?>
    <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'adios-addons' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'user_id' )); ?>"><?php esc_html_e('User Id:','adios-addons'); ?> <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'clientid' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'user_id' )); ?>" type="text" value="<?php echo esc_attr($user_id); ?>" /></label></p>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'token' )); ?>"><?php esc_html_e('Access Token:','adios-addons'); ?> <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'token' )); ?>" type="text" value="<?php echo esc_attr($token); ?>" /></label></p>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>"><?php esc_html_e("Limit items",'adios-addons'); ?> <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'limit' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'limit' )); ?>"><?php for ( $i = 1; $i <= 20; ++$i ) echo "<option value=\"$i\" ".($limit==$i ? "selected=\"selected\"" : "").">$i</option>"; ?></select></label></p>
    <?php
  }
}
