<?php
/*
 * Post
*/
$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'        => 'post-gallery',
      'type'      => 'slides',
      'title'     => esc_html__('Gallery Slider', 'adios'),
      'subtitle'  => esc_html__('Upload images or add from media library.', 'adios'),
      'placeholder'   => array(
        'title'         => esc_html__('Title', 'adios'),
      ),
      'show' => array(
        'title' => true,
        'description' => false,
        'url' => false,
      )
    ),
  )
);
