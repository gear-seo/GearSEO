<?php
/*
 * Post
*/
$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'        => 'post-video-url-m4v',
      'type'      => 'text',
      'title'     => esc_html__('Video URL (m4v)', 'adios'),
      'subtitle'  => esc_html__('m4v Video URL', 'adios'),
      'default'   => '',
    ),
    array(
      'id'        => 'post-video-url-webm',
      'type'      => 'text',
      'title'     => esc_html__('Video URL (webm)', 'adios'),
      'subtitle'  => esc_html__('webm Video URL', 'adios'),
      'default'   => '',
    ),
  )
);
