<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_tweet( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'username'  => 'envato',
    'no_tweets' => '4'
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. sanitize_html_classes($class) : '';

  $consumer_key        = adios_get_opt('twitter-consumer-key');
  $consumer_secret     = adios_get_opt('twitter-consumer-secret');
  $access_token        = adios_get_opt('twitter-access-token');
  $access_token_secret = adios_get_opt('twitter-access-token-secret');

  ob_start();

  if (!empty($username)):

    $tweets = rs_get_recent_tweets($username, $consumer_key, $consumer_secret, $access_token, $access_token_secret);

    if ($tweets['is_error'] == 'true'): ?>


    <?php elseif (!empty($tweets['tweets'])):
      $tweets['tweets'] = json_decode($tweets['tweets']);

      if (is_array($tweets['tweets']) && count($tweets['tweets']) > 0):
      ?>
        <div class="site-twit-top wow zoomIn" data-wow-delay="0.6s">
          <i class="icon-twitter"></i>
           <div class="title">
            <h5 class="h5"><?php echo esc_html($username); ?></h5>
               <a href="#">@<?php echo esc_html($username); ?></a>
           </div>
        </div>
        <?php

        $i = 0;
        $delay = 0.7;
        foreach ($tweets['tweets'] as $tweet):

          if ($i >= $no_tweets): // no of tweets
            break;
          endif; ?>
          <div class="site-twit wow zoomIn" data-wow-delay="<?php echo esc_attr($delay); ?>s">
             <img src="<?php echo $tweet->user->profile_image_url; ?>" alt="">
             <div class="site-twit-txt tweet-content">
                <p><?php echo rs_replace_in_tweets($tweet); ?></p>
                <span class="tweet-time"><?php echo rs_time_elapsed_string($tweet->created_at);?></span>
              </div>
          </div>
          <?php $delay += 0.1; $i ++; ?>
        <?php endforeach; ?>
        <a href="https://twitter.com/<?php echo esc_attr($username); ?>" class="link-type-2 w-100 wow zoomIn" data-wow-delay="1.1s"><span><?php echo esc_html__('follow', 'adios-addions'); ?></span></a>
      <?php
      endif;
    endif;
  endif;

  $output = ob_get_clean();
  return $output;
}

add_shortcode('rs_tweet', 'rs_tweet');
