<?php
/*
 * Content Section
*/

$sections[] = array(
	'title' => esc_html__('Content', 'adios'),
	'desc' => esc_html__('Change the content section configuration.', 'adios'),
	'icon' => 'el-icon-lines',
	'fields' => array(
		array(
			'id'        => 'page-margin',
			'type'      => 'select',
			'title'     => esc_html__('Content Margin', 'adios'),
			'subtitle'  => esc_html__('Select desired margin for the content', 'adios'),
			'options'   => array(
        'pt-100 pb-100' => esc_html__('Top & bottom margin', 'adios'),
        'pt-100'        => esc_html__('Only top margin', 'adios'),
        'pb-100'        => esc_html__('Only bottom margin', 'adios'),
        'no-margin'     => esc_html__('No margin', 'adios'),
			),
			'default' => 'pt-100 pb-100',
		),
	),
);
