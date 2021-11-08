<?php
/*
 * Advanced
*/
$this->sections[] = array(
  'title' => esc_html__('Advanced', 'adios'),
  'desc' => esc_html__('Change advanced theme options.', 'adios'),
  'fields' => array(
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 class="highlight-redux">'.esc_html__('Twitter API', 'adios').'</h2>',
      'subtitle' => esc_html__('Go to "https://dev.twitter.com/apps," login with your twitter account and click "Create a new application".', 'adios')
    ),

    array(
      'id' => 'twitter-help',
      'type' => 'raw',
      'desc' => esc_html__('To get required keys please go to "https://dev.twitter.com/apps," login with your twitter account and click "Create a new application".', 'adios')
    ),

    array(
      'id'        => 'twitter-consumer-key',
      'type'      => 'text',
      'title'     => esc_html__('Consumer Key', 'adios'),
      'subtitle'  => '',
      'default'   => '',
    ),

    array(
      'id'        => 'twitter-consumer-secret',
      'type'      => 'text',
      'title'     => esc_html__('Consumer Secret', 'adios'),
      'subtitle'  => '',
      'default'   => '',
    ),

    array(
      'id'        => 'twitter-access-token',
      'type'      => 'text',
      'title'     => esc_html__('Access Token', 'adios'),
      'subtitle'  => '',
      'default'   => '',
    ),

    array(
      'id'        => 'twitter-access-token-secret',
      'type'      => 'text',
      'title'     => esc_html__('Access Token Secret', 'adios'),
      'subtitle'  => '',
      'default'   => '',
    ),


    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 class="highlight-redux">'.esc_html__('Instagram API', 'adios').'</h2>',
      'subtitle' => esc_html__('Go to "https://smashballoon.com/instagram-feed/token/," login with your instagram account and click "Create a new application".', 'adios')
    ),

    array(
      'id'        => 'instagram-userid',
      'type'      => 'text',
      'title'     => esc_html__('User ID', 'adios'),
      'subtitle'  => '',
      'default'   => '',
    ),

    array(
      'id'        => 'instagram-access-token',
      'type'      => 'text',
      'title'     => esc_html__('Access Token', 'adios'),
      'subtitle'  => '',
      'default'   => '',
    ),

  ), // #fields
);
