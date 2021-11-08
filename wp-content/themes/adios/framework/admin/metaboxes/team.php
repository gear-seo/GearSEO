<?php
/*
 * Social site
*/

$sections[] = array(
  'icon' => 'el-icon-magic',
  'fields' => array(
    array(
      'id'        => 'team-position',
      'type'      => 'text',
      'title'     => esc_html__('Position', 'adios'),
    ),
    array(
      'id'        => 'team-url',
      'type'      => 'text',
      'default'	  => '#',
      'title'     => esc_html__('External URL', 'adios'),
    ),
  )
);
