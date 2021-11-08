<?php
/**
 * Page Template Blog
 */

$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'=>'testimonial-author',
      'type' => 'text',
      'title' => esc_html__('Author Name', 'adios'),
    ),
    array(
      'id'=>'testimonial-position',
      'type' => 'text',
      'title' => esc_html__('Position', 'adios'),
    ),
    array(
      'id'=>'testimonial-signature',
      'type' => 'media',
      'url' => true,
      'title' => esc_html__('Signature', 'adios'),
    ),
  )
);
