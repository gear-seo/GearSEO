<?php
/*
 * Portfolio genearal
*/
$sections[] = array(
  'icon'   => 'el-icon-adjust-alt',
  'title'  => esc_html__('General settings', 'adios'),
  'fields' => array(
    array(
      'id'       => 'portfolio-featured-type',
      'type'     => 'select',
      'title'    => esc_html__('Featured Type', 'adios'),
      'options'  => array(
        'image'       => esc_html__('Featured Image','adios'),
        'yt-video'    => esc_html__('Youtube Video','adios'),
        'vimeo-video' => esc_html__('Vimeo Video','adios'),
      ),
      'default' => 'image',
      'validate' => '',
    ),
    array(
      'id'       =>'portfolio-video-url',
      'type'     => 'text',
      'title'    => esc_html__('Video URL', 'adios'),
      'required' => array('portfolio-featured-type', 'equals', array('yt-video', 'vimeo-video')),
      'desc'     => '<span style="color:#b5b5b5; font-style:italic;">For Youtube: Add video url for example http://youtu.be/I6jmZ5plZ3o | For Vimeo: Add video url for example https://vimeo.com/199167955</span>'
    ),
    array(
      'id'        => 'portfolio-gallery',
      'type'      => 'slides',
      'title'     => esc_html__('Gallery', 'adios'),
      'subtitle'  => esc_html__('Upload images or add from media library.', 'adios'),
      'placeholder'   => array(
        'title' => esc_html__('Title', 'adios'),
      ),
      'show' => array(
        'title' => true,
        'description' => false,
        'url' => false,
      ),
    ),
    array(
      'id'       => 'portfolio-link-to',
      'type'     => 'select',
      'title'    => esc_html__('Link To', 'adios'),
      'options'  => array(
        'single-page'  => esc_html__('Single Page','adios'),
        'lightbox'     => esc_html__('Lightbox','adios'),
        'external-url' => esc_html__('External URL','adios'),
      ),
      'default' => 'single-page',
      'validate' => '',
    ),
    array(
      'id'       =>'portfolio-external-link-url',
      'type'     => 'text',
      'title'    => esc_html__('URL', 'adios'),
      'required' => array('portfolio-link-to', 'equals', array('external-url')),
    ),
  ), // #fields
);
