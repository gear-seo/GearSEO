<?php
/*
 * Portfolio details
*/

$sections[] = array(
  'icon' => 'el-icon-align-justify',
  'title' => esc_html__('Project details', 'adios'),
  'fields' => array(
    array(
        'id'        => 'portfolio-client-title',
        'type'      => 'text',
        'title'     => esc_html__('Client Title', 'adios'),
        'subtitle'  => esc_html__('Your client title.', 'adios'),
        'default'   => 'Client',
      ),
      array(
        'id'        => 'portfolio-client',
        'type'      => 'text',
        'title'     => esc_html__('Client', 'adios'),
        'subtitle'  => esc_html__('Your client name.', 'adios'),
        'default'   => '',
      ),
      array(
        'id'        => 'portfolio-desiginer-title',
        'type'      => 'text',
        'title'     => esc_html__('Desiginer Title', 'adios'),
        'subtitle'  => esc_html__('Your desiginer title.', 'adios'),
        'default'   => 'Sr. Desiginer',
      ),
      array(
        'id'        => 'portfolio-desiginer',
        'type'      => 'text',
        'title'     => esc_html__('Desiginer', 'adios'),
        'subtitle'  => esc_html__('Your desiginer name.', 'adios'),
        'default'   => '',
      ),
    ), // #fields
);
