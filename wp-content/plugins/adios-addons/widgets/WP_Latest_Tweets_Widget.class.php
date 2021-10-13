<?php
/**
 * Latest Tweets widget
 *
 * @package adios
 */

class adios_WP_Latest_Tweets_Widget extends WP_Widget
{
	function __construct()
	{
		$widget_ops = array('classname' => 'widget_latest_tweets_widget', 'description' => esc_html__( "Displays the most latest tweets", 'adios-addons' ) );
		parent::__construct('latest-tweets', esc_html__( 'Adios: Latest Tweets', 'adios-addons' ), $widget_ops);

		$this-> alt_option_name = 'widget_latest_tweets';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance)
	{
		global $post;

		$cache = wp_cache_get('widget_latest_tweets', 'widget');

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
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__( 'Latest Tweets', 'adios-addons' ) : $instance['title'], $instance, $this->id_base);
    if ($title):
      echo $before_title.esc_html($title).$after_title;
    endif;
    $consumer_key        = adios_get_opt('twitter-consumer-key');
    $consumer_secret     = adios_get_opt('twitter-consumer-secret');
    $access_token        = adios_get_opt('twitter-access-token');
    $access_token_secret = adios_get_opt('twitter-access-token-secret');
    $username            = $instance['username'];
    $no_tweets           = $instance['number'];

    if (!empty($username)):

    $tweets = rs_get_recent_tweets($username, $consumer_key, $consumer_secret, $access_token, $access_token_secret);

    if ($tweets['is_error'] == 'true'): ?>


    <?php elseif (!empty($tweets['tweets'])):
      $tweets['tweets'] = json_decode($tweets['tweets']);

      if (is_array($tweets['tweets']) && count($tweets['tweets']) > 0):
        $i = 0;
        $delay = 0.7;
        foreach ($tweets['tweets'] as $tweet):

          if ($i >= $no_tweets): // no of tweets
            break;
          endif; ?>
          <div class="site-twit wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
             <img src="<?php echo $tweet->user->profile_image_url; ?>" alt="">
             <div class="site-twit-txt">
                <p><?php echo rs_replace_in_tweets($tweet); ?></p>
                <span><?php echo rs_time_elapsed_string($tweet->created_at);?></span>
              </div>
          </div>
          <?php $delay += 0.1; $i ++; ?>
        <?php endforeach; ?>
        <a href="https://twitter.com/<?php echo esc_attr($username); ?>" class="link-type-2 w-100 wow zoomIn" data-wow-delay="1.1s"><span><?php echo esc_html__('follow', 'adios-addions'); ?></span></a>
      <?php
        endif;
      endif;
    endif;


		echo $after_widget;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_latest_tweets', $cache, 'widget');
	}

	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_latest_tweets']) )
		{
			delete_option('widget_latest_tweets');
		}
		return $instance;
	}

	function flush_widget_cache()
	{
		wp_cache_delete('widget_latest_tweets', 'widget');
	}

	function form( $instance )
	{
		$title = isset($instance['title']) ? $instance['title'] : '';
		$username = isset($instance['username']) ? $instance['username'] : '';
		$number = isset($instance['number']) ? $instance['number'] : 5;


		?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'adios-addons' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php esc_html_e( 'User name:', 'adios-addons' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('username')); ?>" name="<?php echo esc_attr($this->get_field_name('username')); ?>" type="text" value="<?php echo esc_attr($username); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e( 'Number of posts to show:', 'adios-addons' ); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
		<?php
	}
}
