<?php
/*
 * 404
*/

$this->sections[] = array(
  'title' => esc_html__('404 Page', 'adios'),
  'desc' => esc_html__('Change the title wrapper section configuration.', 'adios'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id'=>'page404-content',
      'type' => 'editor',
      'title' => esc_html__('Content', 'adios'),
      'default' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece <br> of classical Latin literature from 45 BC, making it over 2000 years old.',
      'subtitle' => esc_html__('Content for 404 page.', 'adios'),
    ),

  ), // #fields
);
