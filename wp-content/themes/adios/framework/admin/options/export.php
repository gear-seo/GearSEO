<?php
$this->sections[] = array(
  'title' => esc_html__('Import/Export', 'adios'),
  'desc' => esc_html__('Import/Export Options', 'adios'),
  'icon' => 'el-icon-arrow-down',
  'fields' => array(

    array(
      'id'            => 'opt-import-export',
      'type'          => 'import_export',
      'title'         => esc_html__('Import Export', 'adios'),
      'subtitle'      => esc_html__('Save and restore your Redux options', 'adios'),
      'full_width'    => false,
    ),
  ),
);
