<?php
/**
 * Follow Us
 *
 * @package adios-addons
 */

class adios_WP_Social_Icons_Widget extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_social_media', 'description' => esc_html__( "Displays list of social icons", 'adios-addons' ) );
        parent::__construct('follow-us', esc_html__( 'adios: Social Icons', 'adios-addons' ), $widget_ops);

        $this-> alt_option_name = 'widget_social_icons';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance)
    {
      global $post;

      $cache = wp_cache_get('widget_social_icons', 'widget');

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

      $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

      if ($title):
        echo $before_title.esc_html($title).$after_title;
      endif; ?>
      <ul class="<?php echo ($instance['style'] == 2 ? 'socials-text' : 'socials' ); ?>">
        <?php adios_social_links('%s', $instance['category'], $instance['style']); ?>
      </ul>
      <?php echo $after_widget;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_social_icons', $cache, 'widget');
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title']    = strip_tags($new_instance['title']);
        $instance['style']    = intval($new_instance['style']);
        $instance['category'] = strip_tags($new_instance['category']);
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_social_icons']) )
        {
          delete_option('widget_social_icons');
        }
        return $instance;
    }

    function flush_widget_cache()
    {
      wp_cache_delete('widget_social_icons', 'widget');
    }

    function form( $instance )
    {
      $title    = isset($instance['title']) ? $instance['title'] : '';
      $style    = isset($instance['style']) ? $instance['style'] : '';
      $category = isset($instance['category']) ? $instance['category'] : '';
    ?>
      <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'adios-addons' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

      <p><label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_html_e( 'Style:', 'adios-addons' ); ?></label>
      <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>">
        <option value="1" <?php selected( '1', $style ); ?>>1</option>
        <option value="2" <?php selected( '2', $style ); ?>>2</option>
      </select>

      <p><label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Category:', 'adios-addons' ); ?></label>
      <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'category' )); ?>">
        <option value=""><?php esc_html_e('Choose', 'adios-addons'); ?></option>
        <?php
        $categories = adios_get_terms_assoc('social-site-category');
        if (is_array($categories)):
          foreach ($categories as $key => $item): ?>
            <option value="<?php echo esc_attr($key); ?>" <?php selected( $key, $category ); ?>><?php echo esc_html($item); ?></option>
          <?php endforeach;
        endif; ?>
    </select>
    <?php
    }
}
