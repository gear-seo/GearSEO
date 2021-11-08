<?php
/*
 * Title Wrapper Section
*/

$this->sections[] = array(
  'title' => esc_html__('Title Wrapper', 'adios'),
  'desc' => esc_html__('Change the title wrapper section configuration.', 'adios'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'title-wrapper-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Title Wrapper', 'adios'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id' => 'title-wrapper-template',
      'type'   => 'select',
      'title' => esc_html__('Template', 'adios'),
      'subtitle'=> esc_html__('Select page title wrapper template.', 'adios'),
      'options' => array(
        'default'     => 'Default',
        'alternative' => 'Alternative',
      ),
      'default' => 'default',
    ),
    array(
      'id'       => 'title-wrapper-full-width',
      'type'     => 'switch',
      'title'    => esc_html__('Full Width', 'adios'),
      'subtitle' => esc_html__('If on, full width will be enabled.', 'adios'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'required'  => array('title-wrapper-template', 'equals', array('alternative')),
      'default' => '1',
    ),
    array(
      'id'       =>'title-wrapper-background',
      'type'     => 'media',
      'url'      => true,
      'title'    => esc_html__('Background', 'adios'),
      'subtitle' => esc_html__('Title wrapper background, color and other options.', 'adios'),
    ),
    array(
      'id'       =>'bg-attachment',
      'type'     => 'select',
      'title'    => esc_html__( 'Background Attachment', 'adios' ),
      'options'  => array(
        'scroll'  => esc_html__( 'Default', 'adios' ),
        'fixed'   => esc_html__( 'Fixed', 'adios' ),
        'inherit' => esc_html__( 'Inherit', 'adios' ),
      ),
    ),
    array(
      'id'       =>'bg-size',
      'type'     => 'select',
      'title'    => esc_html__( 'Background Size', 'adios' ),
      'options'  => array(
        'cover'   => esc_html__( 'Cover', 'adios' ),
        'contain' => esc_html__( 'Contain', 'adios' ),
        'initial' => esc_html__( 'Initial', 'adios' ),
      ),
    ),
    array(
      'id'       =>'bg-position',
      'type'     => 'select',
      'title'    => esc_html__( 'Background Position', 'adios' ),
      'options'  => array(
        'left top'      => esc_html__( 'Left Top', 'adios' ),
        'left center'   => esc_html__( 'Left Center', 'adios' ),
        'left bottom'   => esc_html__( 'Left Bottom', 'adios' ),
        'right top'     => esc_html__( 'Right Top', 'adios' ),
        'right center'  => esc_html__( 'Right Center', 'adios' ),
        'right bottom'  => esc_html__( 'Right Bottom', 'adios' ),
        'center top'    => esc_html__( 'Center Top', 'adios' ),
        'center center' => esc_html__( 'Center Center', 'adios' ),
        'center bottom' => esc_html__( 'Center Bottom', 'adios' ),
      ),
    ),
    array(
      'id'    =>'title-wrapper-text-color',
      'type'  => 'color',
      'title' => esc_html__('Color', 'adios'),
      'output' => array('color' => '.sub-title .h5, .title-style-1 .h1', 'background' => '.sub-title:before')
    ),
    array(
      'id'    =>'title-wrapper-subtitle',
      'type'  => 'text',
      'title' => esc_html__('Subtitle', 'adios'),
    ),
  ), // #fields
);
