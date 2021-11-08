<?php
/*
 * Post Section
*/
$sections[] = array(
  'title' => esc_html__('Post Options', 'adios'),
  'desc' => esc_html__('Change the post section configuration.', 'adios'),
  'icon' => 'el-icon-cog',
  'fields' => array(
    array(
      'id'       => 'post-template',
      'type'     => 'select',
      'title'    => esc_html__('Template', 'adios'),
      'subtitle' => esc_html__('Choose template for post single.', 'adios'),
      'options'  => array(
        'default'     => esc_html__('Default','adios'),
        'alternative' => esc_html__('Alternative','adios'),
      ),
      'default' => 'default',
      'validate' => '',
    ),
  ), // #fields
);

