<?php
/*
* Visual Composre Map File
*/
function rs_get_current_post_type() {

  $type = false;

  if( isset( $_GET['post'] ) ) {
    $id = $_GET['post'];
    $post = get_post( $id );

    if( is_object( $post ) && $post->post_type == 'portfolio' ) {
      $type = true;
    }

  } elseif ( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'portfolio' ) {
    $type = true;
  }

  return $type;

}

include_once( RS_ROOT .'/includes/params.php' );

if ( ! function_exists( 'is_plugin_active' ) ) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
}

$vc_column_width_list = array(
  '1 column - 1/12'     => '1/12',
  '2 columns - 1/6'     => '1/6',
  '3 columns - 1/4'     => '1/4',
  '4 columns - 1/3'     => '1/3',
  '5 columns - 5/12'    => '5/12',
  '6 columns - 1/2'     => '1/2',
  '7 columns - 7/12'    => '7/12',
  '8 columns - 2/3'     => '2/3',
  '9 columns - 3/4'     => '3/4',
  '10 columns - 5/6'    => '5/6',
  '11 columns - 11/12'  => '11/12',
  '12 columns - 1/1'    => '1/1'
);

$vc_map_extra_id = array(
  'type'        => 'textfield',
  'heading'     => 'Extra ID',
  'param_name'  => 'id',
  'group'       => 'Extras'
);

$vc_map_extra_class = array(
  'type'        => 'textfield',
  'heading'     => 'Extra Class',
  'param_name'  => 'class',
  'group'       => 'Extras'
);

// ==========================================================================================
// VC ROW
// ==========================================================================================
vc_map( array(
  'name'                    => 'Row',
  'base'                    => 'vc_row',
  'icon'                    => 'fa fa-plus-square-o',
  'is_container'            => true,
  'show_settings_on_create' => false,
  'description'             => 'Place content elements inside the section',
  'params'                  => array(
    array(
      'type'                => 'dropdown',
      'value'               => array(
        'No'                         => 'no',
        'Stretch Row Only'           => 'stretch_row_only',
        'Stretch Row & Content'      => 'stretch_row_content',
        'Full Stretch Row & Content' => 'full_stretch_row_content',
      ),
      'heading'             => '100% Full-width, without container',
      'param_name'          => 'fluid',
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'bg_position',
      'heading'             => 'Background Position',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Center Center'                => 'center center',
        'Left Top'                     => 'left top',
        'Left Center'                  => 'left center',
        'Left Bottom'                  => 'left bottom',
        'Right Top'                    => 'right top',
        'Right Center'                 => 'right center',
        'Right Bottom'                 => 'right bottom',
        'Center Top'                   => 'center top',
        'Center Bottom'                => 'center bottom',
      ),
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'bg_attachment',
      'heading'             => 'Background Attachment',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Fixed'                        => 'fixed',
        'Scroll'                       => 'scroll',
      ),
    ),


    //Padding
    array(
      'type'                => 'dropdown',
      'param_name'          => 'padding_top',
      'heading'             => 'Padding Top',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'pt-40',
        'Medium'                       => 'pt-100',
        'Big'                          => 'pt-150',
        'Custom Padding'               => 'custom-padding'
      ),
    ),

    array(
      'type'                => 'textfield',
      'heading'             => 'Custom Padding Top',
      'param_name'          => 'custom_padding_top',
      'dependency'          => array( 'element' => 'padding_top', 'value' => array('custom-padding') ),
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'padding_bottom',
      'heading'             => 'Padding Bottom',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'pb-40',
        'Medium'                       => 'pb-100',
        'Big'                          => 'pb-150',
        'Custom Padding'               => 'custom-padding'
      ),
    ),

    array(
      'type'                => 'textfield',
      'heading'             => 'Custom Padding Bottom',
      'param_name'          => 'custom_padding_bottom',
      'dependency'          => array( 'element' => 'padding_bottom', 'value' => array('custom-padding') ),
    ),

    //Margin
    array(
      'type'                => 'dropdown',
      'param_name'          => 'margin_top',
      'heading'             => 'Margin Top',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'mt-40',
        'Medium'                       => 'mt-100',
        'Big'                          => 'mt-150',
        'Custom Margin'                => 'custom-margin'
      ),
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'margin_bottom',
      'heading'             => 'Margin Bottom',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'mb-40',
        'Medium'                       => 'mb-100',
        'Big'                          => 'mb-150',
        'Custom Margin'                => 'custom-margin'
      ),
    ),

    array(
      'type'                => 'checkbox',
      'param_name'          => 'attributes',
      'heading'             => 'Attributes',
      'value'               => array(
        'Border Top'     => 'border-top',
        'Section Scroll' => 'section-scroll',
        'Poind Closest'  => 'poind-closest'
      ),
    ),

    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'CSS box', 'js_composer' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design Options', 'js_composer' )
    ),
    // Extras
    // ------------------------------------------------------------------------------------------
   $vc_map_extra_id,
   $vc_map_extra_class,

  ),
  'js_view'                 => 'VcRowView'
) );

// ==========================================================================================
// VC ROW INNER
// ==========================================================================================
vc_map( array(
  'name'                    => 'Row',
  'base'                    => 'vc_row_inner',
  'icon'                    => 'fa fa-plus-square-o',
  'is_container'            => true,
  'content_element'         => false,
  'show_settings_on_create' => false,
  'weight'                  => 1000,
  'params'                  => array(
    array(
      'type'                => 'dropdown',
      'value'               => array(
        'No'                         => 'no',
        'Stretch Row Only'           => 'stretch_row_only',
        'Stretch Row & Content'      => 'stretch_row_content',
        'Full Stretch Row & Content' => 'full_stretch_row_content',
      ),
      'heading'             => '100% Full-width, without container',
      'param_name'          => 'fluid',
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'bg_position',
      'heading'             => 'Background Position',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Center Center'                => 'center center',
        'Left Top'                     => 'left top',
        'Left Center'                  => 'left center',
        'Left Bottom'                  => 'left bottom',
        'Right Top'                    => 'right top',
        'Right Center'                 => 'right center',
        'Right Bottom'                 => 'right bottom',
        'Center Top'                   => 'center top',
        'Center Bottom'                => 'center bottom',
      ),
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'bg_attachment',
      'heading'             => 'Background Attachment',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Fixed'                        => 'fixed',
        'Scroll'                       => 'scroll',
      ),
    ),


    //Padding
    array(
      'type'                => 'dropdown',
      'param_name'          => 'padding_top',
      'heading'             => 'Padding Top',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'pt-40',
        'Medium'                       => 'pt-100',
        'Big'                          => 'pt-150',
        'Custom Padding'               => 'custom-padding'
      ),
    ),

    array(
      'type'                => 'textfield',
      'heading'             => 'Custom Padding Top',
      'param_name'          => 'custom_padding_top',
      'dependency'          => array( 'element' => 'padding_top', 'value' => array('custom-padding') ),
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'padding_bottom',
      'heading'             => 'Padding Bottom',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'pb-40',
        'Medium'                       => 'pb-100',
        'Big'                          => 'pb-150',
        'Custom Padding'               => 'custom-padding'
      ),
    ),

    array(
      'type'                => 'textfield',
      'heading'             => 'Custom Padding Bottom',
      'param_name'          => 'custom_padding_bottom',
      'dependency'          => array( 'element' => 'padding_bottom', 'value' => array('custom-padding') ),
    ),

    //Margin
    array(
      'type'                => 'dropdown',
      'param_name'          => 'margin_top',
      'heading'             => 'Margin Top',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'mt-40',
        'Medium'                       => 'mt-100',
        'Big'                          => 'mt-150',
        'Custom Margin'                => 'custom-margin'
      ),
    ),

    array(
      'type'                => 'dropdown',
      'param_name'          => 'margin_bottom',
      'heading'             => 'Margin Bottom',
      'value'               => array(
        'Choose or use Design Options' => '',
        'Small'                        => 'mb-40',
        'Medium'                       => 'mb-100',
        'Big'                          => 'mb-150',
        'Custom Margin'                => 'custom-margin'
      ),
    ),

    array(
      'type'                => 'checkbox',
      'param_name'          => 'attributes',
      'heading'             => 'Attributes',
      'value'               => array(
        'Border Top'     => 'border-top',
        'Section Scroll' => 'section-scroll',
        'Poind Closest'  => 'poind-closest'
      ),
    ),

    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'CSS box', 'js_composer' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design Options', 'js_composer' )
    ),
    // Extras
    // ------------------------------------------------------------------------------------------
   $vc_map_extra_id,
   $vc_map_extra_class,

  ),
  'js_view'                 => 'VcRowView'
) );

// ==========================================================================================
// VC COLUMN
// ==========================================================================================
vc_map( array(
  'name'            => 'Column',
  'base'            => 'vc_column',
  'is_container'    => true,
  'content_element' => false,
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Align',
      'param_name'  => 'align',
      'value'       => array(
        'Select Alignment'  => '',
        'Left'              => 'left',
        'Center'            => 'center',
        'Right'             => 'right',
      ),
    ),
    array(
      'type'  => 'dropdown',
      'value' => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
      'heading'    => 'Padding',
      'param_name' => 'is_padding',
      'description' => 'No padding deducts all sides padding i.e left and right both.'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Column Class Type',
      'param_name'  => 'class_type',
      'value'       => array(
        'col-md-x' => 'md',
        'col-sm-x' => 'sm',
      ),
      'description' => 'This is optional, leave default for default settings.'
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Width',
      'param_name' => 'width',
      'value' => $vc_column_width_list,
      'group' => 'Width & Responsiveness',
      'description' => 'Select column width.',
      'std' => '1/1'
    ),
    array(
      'type' => 'column_offset',
      'heading' => 'Responsiveness',
      'param_name' => 'offset',
      'group' => 'Width & Responsiveness',
      'description' => 'Adjust column for different screen sizes. Control width, offset and visibility settings.',
    ),
    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'CSS box', 'js_composer' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design Options', 'js_composer' )
    ),
    rs_get_animation_param('animation', 'Animation'),
    rs_get_animation_delay_param('animation_delay', 'Animation', 'animation'),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
  'js_view'         => 'VcColumnView'
) );


// ==========================================================================================
// VC COLUMN INNER
// ==========================================================================================
vc_map( array(
  'name'                      => 'Column',
  'base'                      => 'vc_column_inner',
  'class'                     => '',
  'icon'                      => '',
  'wrapper_class'             => '',
  'controls'                  => 'full',
  'allowed_container_element' => false,
  'content_element'           => false,
  'is_container'              => true,
  'params'                    => array(
    array(
      'type'  => 'dropdown',
      'value' => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
      'heading'    => 'Padding',
      'param_name' => 'padding',
      'description' => 'No padding deducts all sides padding i.e left and right both.'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Column Class Type',
      'param_name'  => 'class_type',
      'value'       => array(
        'col-md-x' => 'md',
        'col-sm-x' => 'sm',
      ),
      'description' => 'This is optional, leave default for default settings.'
    ),
    array(
      'type' => 'dropdown',
      'heading' => 'Width',
      'param_name' => 'width',
      'value' => $vc_column_width_list,
      'group' => 'Width & Responsiveness',
      'description' => 'Select column width.',
      'std' => '1/1'
    ),
    array(
      'type' => 'column_offset',
      'heading' => 'Responsiveness',
      'param_name' => 'offset',
      'group' => 'Width & Responsiveness',
      'description' => 'Adjust column for different screen sizes. Control width, offset and visibility settings.',
    ),
    rs_get_animation_param('animation', 'Animation'),
    rs_get_animation_delay_param('animation_delay', 'Animation', 'animation'),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
  'js_view'                   => 'VcColumnView'
) );


// ==========================================================================================
// GOOGLE MAP
// ==========================================================================================
vc_map( array(
  'name'          => 'Google Map',
  'base'          => 'rs_google_map',
  'icon'          => 'fa fa-map-marker',
  'description'   => 'Add google map.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Latitude',
      'param_name'  => 'latidude',
      'admin_label' => true
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Longitude',
      'param_name'  => 'longitude',
      'admin_label' => true
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Street Name',
      'param_name'  => 'string',
      'admin_label' => true
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Zoom Size',
      'param_name'  => 'zoom_size',
      'admin_label' => true
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// TESTIMONIAL
// ==========================================================================================
vc_map( array(
  'name'          => 'Testimonial',
  'base'          => 'rs_testimonial',
  'icon'          => 'fa fa-comments',
  'description'   => 'Create a testimonial block.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1'   => 'style1',
        'Style 2'   => 'style2',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Category ID',
      'param_name'  => 'cats',
      'value'       => rs_element_values( 'categories', array('sort_order'  => 'ASC','taxonomy'    => 'testimonial-category','hide_empty'  => false,) ),
      'std'         => '',
      'placeholder' => 'Choose Category',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Limit',
      'param_name'  => 'limit',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// TEAM BLOCK
// ==========================================================================================
$member_name = rs_element_values('post', array('post_type' => 'team', 'posts_per_page' => -1));
vc_map( array(
  'name'          => 'Team member',
  'base'          => 'rs_team',
  'icon'          => 'fa fa-users',
  'description'   => 'Add team block.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1'   => 'style1',
        'Style 2'   => 'style2',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Pagination Style',
      'param_name'  => 'pagination_style',
      'value'       => array(
        'Dotted'        => 'dot',
        'Vertical Bars' => 'vertical_bars',
      ),
      'dependency'  => array( 'element' => 'style', 'value' => array('style2') ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Member',
      'description' => 'Select member name to show.',
      'param_name'  => 'person_id',
      'std'         => '',
      'placeholder' => 'Choose Category',
      'value'       => $member_name,
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Limit',
      'param_name'  => 'limit',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Per Slide',
      'param_name'  => 'per_slide',
      'dependency'  => array( 'element' => 'style', 'value' => array('style2') ),
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// IMAGE BLOCK
// ==========================================================================================
vc_map( array(
  'name'          => 'Image Block',
  'base'          => 'rs_image_block',
  'icon'          => 'fa fa-image',
  'description'   => 'Add image.',
  'params'        => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'admin_label' => true,
      'param_name'  => 'image',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );


// ==========================================================================================
// Blog News
// ==========================================================================================
vc_map( array(
  'name'            => 'Blog News',
  'base'            => 'rs_blog',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a latest news post.',
  'params'          => array(
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Select Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Select category',
      'value'       => rs_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'category',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'You can choose specific categories for blog, default is all categories.',
    ),
    array(
      'type'        => 'dropdown',
      'admin_label' => true,
      'heading'     => 'Order by',
      'param_name'  => 'orderby',
      'value'       => array(
        'ID'            => 'ID',
        'Author'        => 'author',
        'Post Title'    => 'title',
        'Date'          => 'date',
        'Last Modified' => 'modified',
        'Random Order'  => 'rand',
        'Comment Count' => 'comment_count',
        'Menu Order'    => 'menu_order',
      ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Per Page',
      'param_name'  => 'post_per_page',
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// SPECIAL TEXT
// ==========================================================================================
vc_map( array(
  'name'          => 'Special Text',
  'base'          => 'rs_special_text',
  'icon'          => 'fa fa-tint',
  'description'   => 'Create special text.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Font',
      'param_name'  => 'font',
      'admin_label' => true,
      'value'       => array_flip(rs_get_font_choices(true)),
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Tag Name',
      'param_name'  => 'tag',
      'value'       => array(
        'H1'  => 'h1',
        'H2'  => 'h2',
        'H3'  => 'h3',
        'H4'  => 'h4',
        'H5'  => 'h5',
        'H6'  => 'h6',
        'div' => 'div',
      ),
    ),

    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div',
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Align',
      'param_name'  => 'align',
      'value'       => array(
        'Select Align' => '',
        'Left'   => 'left',
        'Center' => 'center',
        'Right'  => 'right',
      ),
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Font Size',
      'param_name'  => 'font_size',
      'description' => 'Enter the size in pixel e.g 45px',
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Line Height',
      'param_name'  => 'line_height',
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Letter Spacing',
      'param_name'  => 'letter_spacing',
      'description' => 'Enter the size in pixel e.g 1px',
      'group'       => 'Custom Font Properties'
    ),

    array(
      'type'        => 'colorpicker',
      'heading'     => 'Font Color',
      'param_name'  => 'font_color',
      'group'       => 'Custom Font Properties'
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Weight',
      'param_name'  => 'font_weight',
      'value'       => array(
        'Light'      => '300',
        'Normal'     => '400',
        'Bold'       => '600',
        'Bold'       => '700',
        'Extra Bold' => '800',
      ),
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Style',
      'param_name'  => 'font_style',
      'value'       => array(
        'Normal' => 'normal',
        'Italic' => 'italic',
      ),
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Text Transform',
      'param_name'  => 'transform',
      'value'       => array(
        'Select Transform' => '',
        'Uppercase'        => 'uppercase',
        'Lowercase'        => 'lowercase',
      ),
      'group'       => 'Custom Font Properties'
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Top',
      'param_name'  => 'margin_top',
      'description' => 'Enter the size in pixel e.g 45px',
      'group'       => 'Custom Margin Properties'
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Bottom',
      'param_name'  => 'margin_bottom',
      'description' => 'Enter the size in pixel e.g 45px',
      'group'       => 'Custom Margin Properties'
    ),
    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'CSS box', 'js_composer' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design Options', 'js_composer' )
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );


// ==========================================================================================
// Portfolio ( Latest Works )
// ==========================================================================================
vc_map( array(
  'name'            => 'Latest Works',
  'base'            => 'rs_latest_works',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a portfolio',
  'params'          => array(
    array(
      'type'       => 'dropdown',
      'heading'    => 'Style',
      'param_name' => 'style',
      'value'      => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2',
      ),
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => 'Show Heading',
      'param_name' => 'show_heading',
      'value'      => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
      'dependency'  => array( 'element' => 'style', 'value' => array('style1') ),
    ),
    array(
      'type'       => 'textfield',
      'heading'    => 'Heading',
      'param_name' => 'heading',
      'dependency'  => array( 'element' => 'show_heading', 'value' => array('yes') ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Categories',
      'description' => 'Show portfolio items only from these categories',
      'param_name'  => 'cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('portfolio-category'),
      'admin_label' => true,
      'std'         => '',
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Filter categories',
      'param_name'  => 'filter_cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('portfolio-category'),
      'admin_label' => true,
      'std'         => '',
      'dependency'  => array( 'element' => 'style', 'value' => array('style1') ),
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => 'Load More Size',
      'param_name' => 'load_more_size',
      'value'      => array(
        'Small' => 'small',
        'Big'   => 'big',
      ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Limit',
      'param_name'  => 'limit',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Exclude posts',
      'description' => 'Post IDs you want to exclude, separated by commas eg. 120,123,1005',
      'param_name'  => 'exclude_posts',
      'admin_label' => true,
      'value'       => ''
    ),
    // Extras
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// Portfolio Slider
// ==========================================================================================
vc_map( array(
  'name'            => 'Portfolio Slider',
  'base'            => 'rs_portfolio_slider',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a portfolio slider',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'admin_label' => true,
      'value'       => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Categories',
      'description' => 'Show portfolio items only from these categories',
      'param_name'  => 'cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('portfolio-category'),
      'admin_label' => true,
      'std'         => '',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Limit',
      'param_name'  => 'limit',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Exclude posts',
      'description' => 'Post IDs you want to exclude, separated by commas eg. 120,123,1005',
      'param_name'  => 'exclude_posts',
      'admin_label' => true,
      'value'       => ''
    ),
    // Extras
    $vc_map_extra_class,
  )

) );


// ==========================================================================================
// Blog Slider
// ==========================================================================================
vc_map( array(
  'name'            => 'Blog Slider',
  'base'            => 'rs_blog_slider',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a blog slider',
  'params'          => array(
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Categories',
      'description' => 'Show blog items only from these categories',
      'param_name'  => 'cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('category'),
      'admin_label' => true,
      'std'         => '',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Limit',
      'param_name'  => 'limit',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Exclude posts',
      'description' => 'Post IDs you want to exclude, separated by commas eg. 120,123,1005',
      'param_name'  => 'exclude_posts',
      'admin_label' => true,
      'value'       => ''
    ),
    // Extras
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// ICON BOX // adios
// ==========================================================================================
vc_map( array(
  'name'          => 'Icon Box',
  'base'          => 'rs_icon_box',
  'icon'          => 'fa fa-dot-circle-o',
  'description'   => 'Create a feature box.',
  'params'        => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Icon',
      'param_name'  => 'img_icon',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heding',
      'param_name'  => 'heading',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Link Text',
      'param_name'  => 'link_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Link URL',
      'param_name'  => 'link_url',
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// Call To Action
// ==========================================================================================
vc_map( array(
  'name'          => 'Call To Action',
  'base'          => 'rs_cta',
  'icon'          => 'fa fa-space-shuttle',
  'description'   => 'Create a cta box.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'admin_label' => true,
      'value'       => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2',
      ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'param_name'  => 'image',
      'dependency'  => array( 'element' => 'style', 'value' => array('style2') ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Background Color',
      'param_name'  => 'bgcolor',
      'admin_label' => true,
      'value'       => array(
        'Celadon'          => 'bg-celadon',
        'Pale Blue'        => 'bg-paleblue',
        'Wood Smoke'       => 'bg-woodsmoke',
        'Boulder'          => 'bg-boulder',
        'White Smoke Dark' => 'bg-whiteSmokeDarker',
        'White Smoke'      => 'bg-whiteSmoke',
      ),
      'dependency'  => array( 'element' => 'style', 'value' => array('style1') ),
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );


// ==========================================================================================
// Space
// ==========================================================================================
vc_map( array(
  'name'          => 'Space',
  'base'          => 'rs_space',
  'icon'          => 'fa fa fa-arrows-v',
  'description'   => 'Add space.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'lg_device',
      'group'       => 'Large Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'md_device',
      'group'       => 'Medium Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'sm_device',
      'group'       => 'Small Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'xs_device',
      'group'       => 'Extra Small Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Twitter
// ==========================================================================================
vc_map( array(
  'name'          => 'Tweet',
  'base'          => 'rs_tweet',
  'icon'          => 'fa fa-twitter',
  'description'   => 'Add twitter tweets.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Username',
      'admin_label' => true,
      'param_name'  => 'username',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Tweets Count',
      'admin_label' => true,
      'param_name'  => 'no_tweets',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );



// ==========================================================================================
// Follow
// ==========================================================================================
vc_map( array(
  'name'          => 'Author Follow',
  'base'          => 'rs_follow',
  'icon'          => 'fa fa fa-arrows-v',
  'description'   => 'Add follow box.',
  'params'        => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Avatar',
      'admin_label' => true,
      'param_name'  => 'author_img',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Name',
      'holder'      => 'h5',
      'param_name'  => 'author_name',
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'holder'      => 'div',
      'param_name'  => 'content',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Count',
      'admin_label' => true,
      'param_name'  => 'post_count',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Follow Count',
      'admin_label' => true,
      'param_name'  => 'follow_count',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Follower Count',
      'admin_label' => true,
      'param_name'  => 'following_count',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );


// ==========================================================================================
// Blockquote
// ==========================================================================================
vc_map( array(
  'name'          => 'Blockquote',
  'base'          => 'rs_blockquote',
  'icon'          => 'fa fa-quote-left',
  'description'   => 'Add blockquote.',
  'params'        => array(
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'holder'      => 'div',
      'param_name'  => 'content',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Cite',
      'admin_label' => true,
      'param_name'  => 'cite',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Section Title
// ==========================================================================================
vc_map( array(
  'name'          => 'Section Heading',
  'base'          => 'rs_section_heading',
  'icon'          => 'fa fa-text-width',
  'description'   => 'Add section heading.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'holder'      => 'h3',
      'param_name'  => 'heading',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Pricing Table ( adios)
// ==========================================================================================
vc_map( array(
  'name'                    => 'Pricing Table',
  'base'                    => 'rs_pricing_table',
  'icon'                    => 'fa fa-dollar',
  'description'             => 'Create a pricing table.',
  'params'  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Currency',
      'param_name'  => 'currency',
      'value'       => '',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Price',
      'param_name'  => 'price',
      'value'       => '',
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Feature',
      'value'       => '',
      'param_name'  => 'feature',
      'description' => 'Add feature seperated with |'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

) );

// ==========================================================================================
// Counter box
// ==========================================================================================
vc_map( array(
  'name'          => 'Counter Box',
  'base'          => 'rs_counter',
  'icon'          => 'fa fa-sort-numeric-asc',
  'description'   => 'Create a counter box.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Count No',
      'param_name'  => 'count_no',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Suffix',
      'param_name'  => 'suffix',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Counter Content',
      'param_name'  => 'count_text',
      'admin_label' => true,
    ),

    // Custom Colors
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Count No Color',
      'param_name'  => 'count_no_color',
      'group'       => 'Custom Colors',
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Content Color',
      'param_name'  => 'content_color',
      'group'       => 'Custom Colors',
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );


// ==========================================================================================
// Clients
// ==========================================================================================
vc_map( array(
  'name'            => 'Client',
  'base'            => 'rs_client',
  'icon'            => 'fa fa-paw',
  'description'     => 'Add client item.',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Autoplay',
      'admin_label' => true,
      'param_name'  => 'autoplay',
      'description' => 'Autoplay 0 means false, for e.g 5000'
    ),
    array(
      'type'        => 'attach_images',
      'heading'     => 'Image',
      'admin_label' => true,
      'param_name'  => 'image',
      'description' => 'Multiple images are supported.'
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )

) );


// ==========================================================================================
// VC TABS
// ==========================================================================================
$tab_unique_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_unique_id_2 = time() . '-2-' . rand( 0, 100 );
$tab_unique_id_3 = time() . '-3-' . rand( 0, 100 );
vc_map( array(
  'name'            => 'Tabs',
  'base'            => 'vc_tabs',
  'is_container'    => true,
  'icon'            => 'fa fa-toggle-right',
  'description'     => 'Tabbed content',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Active Tab',
      'param_name'  => 'active',
      'description' => 'You can active any tab as default. Eg. 1 or 2 or 3'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,

  ),
  'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
  'default_content' => '
    [vc_tab title="Tab 1" tab_id="' . $tab_unique_id_1 . '"][/vc_tab]
    [vc_tab title="Tab 2" tab_id="' . $tab_unique_id_2 . '"][/vc_tab]
    [vc_tab title="Tab 3" tab_id="' . $tab_unique_id_3 . '"][/vc_tab]',
  'js_view'         => 'VcTabViewFix'
) );

// ==========================================================================================
// VC TAB
// ==========================================================================================
vc_map( array(
  'name'                      => 'Tab',
  'base'                      => 'vc_tab',
  'allowed_container_element' => 'vc_row',
  'is_container'              => true,
  'content_element'           => false,
  'params'                    => array(
    array(
      'type'        => 'tab_id',
      'heading'     => 'Tab Unique ID',
      'param_name'  => 'tab_id'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Tab Title',
      'param_name'  => 'title',
    ),
  ),
  'js_view'         => 'VcTabViewFix'
) );


// ==========================================================================================
// VC COLUMN TEXT
// ==========================================================================================
vc_map( array(
  'name'          => 'Text Block',
  'base'          => 'vc_column_text',
  'icon'          => 'fa fa-text-width',
  'description'   => 'A block of text with WYSIWYG editor',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Text Size',
      'param_name'  => 'dp_text_size',
      'value'       => array(
        'Small'  => 'sm',
        'Medium' => 'md',
        'Large'  => 'lg'
      ),
    ),
    array(
      'holder'     => 'div',
      'type'       => 'textarea_html',
      'heading'    => 'Text',
      'param_name' => 'content',
      'value'      => '<p>I am text block. Click edit button to change this text.</p>',
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font',
      'param_name'  => 'font',
      'admin_label' => true,
      'value'       => array_flip(rs_get_font_choices(true)),
      'group'       => 'Font Properties'
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Weight',
      'param_name'  => 'font_weight',
      'value'       => array(
        'Light'      => '300',
        'Normal'     => '400',
        'Bold'       => '600',
        'Bold'       => '700',
        'Extra Bold' => '800',
      ),
      'group'       => 'Font Properties'
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Style',
      'param_name'  => 'font_style',
      'value'       => array(
        'Normal' => 'normal',
        'Italic' => 'italic',
      ),
      'group'       => 'Font Properties'
    ),

    //custom color
    array(
      'type'       => 'colorpicker',
      'heading'    => 'Text Color',
      'param_name' => 'text_color',
      'group'      => 'Custom Color'
    ),

    //size
    array(
      'type'       => 'textfield',
      'heading'    => 'Text Size',
      'param_name' => 'text_size',
      'description' => 'Add in pixel e.g 14px',
      'group'      => 'Font Properties'
    ),
    array(
      'type'       => 'textfield',
      'heading'    => 'Line Height',
      'param_name' => 'line_height',
      'description' => 'Add in pixel e.g 11px',
      'group'      => 'Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Letter Spacing',
      'param_name'  => 'letter_spacing',
      'description' => 'Add in pixel e.g 1px',
      'group'       => 'Font Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Hero Slider
// ==========================================================================================
vc_map( array(
  'name'                    => 'Hero Slider',
  'base'                    => 'rs_hero_slider',
  'icon'                    => 'fa fa-bank',
  'as_parent'               => array('only' => 'rs_hero_slider_item'),
  'show_settings_on_create' => true,
  'js_view'                 => 'VcColumnView',
  'content_element'         => true,
  'description'             => 'Create a hero slider.',
  'params'  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1'   => 'style1',
        'Style 2'   => 'style2',
        'Style 3'   => 'style3',
      ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Autoplay',
      'param_name'  => 'autoplay',
      'admin_label' => true,
      'description' => 'Enter slider autoplay interval 0 to false',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Speed',
      'param_name'  => 'speed',
      'admin_label' => true,
      'description' => 'Enter slider speed e.g 600',
      'value'       => ''
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Pagination Style',
      'param_name'  => 'pagination_style',
      'value'       => array(
        'Slider Number' => 'number',
        'Vertical Bars' => 'vertical_bars',
      ),
      'dependency'  => array( 'element' => 'style', 'value' => array('style1') ),
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Heading Color',
      'param_name'  => 'heading_color',
      'group'       => 'Custom Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Small Heading Color',
      'param_name'  => 'small_heading_color',
      'group'       => 'Custom Properties'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

) );

vc_map( array(
  'name'                    => 'Hero Slider Item',
  'base'                    => 'rs_hero_slider_item',
  'icon'                    => 'fa fa-bank',
  'description'             => 'Add promo item.',
  'as_child'                => array('only' => 'rs_hero_slider'),
  'params'  => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image One',
      'param_name'  => 'image',
      'admin_label' => true,
      'value'       => ''
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image Two',
      'param_name'  => 'image_two',
      'admin_label' => true,
      'value'       => '',
      'description' => 'This option is for Style 3'
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'holder'      => 'h6',
      'value'       => ''
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'h3',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'value'       => '',
      'description' => 'This option is for Style 2'
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
      'value'       => '',
      'dependency'  => array( 'element' => 'btn_text', 'not_empty' => true )
    ),
  )

) );

vc_map( array(
  'name'            => 'Portfolio',
  'base'            => 'rs_portfolio',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a portfolio grid',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'One Column'          => 'one_column',
        'Three Column'        => 'three_column',
        'Four Column'         => 'four_column',
        'Masonry'             => 'masonry',
        'Masonry Alternative' => 'masonry_alt',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Categories',
      'description' => 'Show portfolio items only from these categories',
      'param_name'  => 'cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('portfolio-category'),
      'admin_label' => true,
      'std'         => '',
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Show Filter',
      'param_name'  => 'show_filter',
      'value'       => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
      'dependency'  => array( 'element' => 'style', 'value' => array('one_column', 'three_column', 'four_column', 'masonry') ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Filter Categories',
      'description' => 'Show portfolio filter items only from these categories',
      'param_name'  => 'filter_cats',
      'placeholder' => 'Filter Categories',
      'value'       => rs_get_custom_term_values('portfolio-category'),
      'admin_label' => true,
      'std'         => '',
      'dependency'  => array( 'element' => 'show_filter', 'value' => array('yes') ),
    ),
    array(
      'type'        => 'dropdown',
      'admin_label' => true,
      'heading'     => 'Order by',
      'param_name'  => 'orderby',
      'value'       => array(
        'ID'            => 'ID',
        'Author'        => 'author',
        'Post Title'    => 'title',
        'Date'          => 'date',
        'Last Modified' => 'modified',
        'Random Order'  => 'rand',
        'Comment Count' => 'comment_count',
        'Menu Order'    => 'menu_order',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'admin_label' => true,
      'heading'     => 'Order',
      'param_name'  => 'order',
      'value'       => array(
        'Descending' => 'DESC',
        'Ascending'  => 'ASC',
      ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Limit',
      'param_name'  => 'limit',
      'admin_label' => true,
    ),
    // Extras
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// Hero Video Banner
// ==========================================================================================
vc_map( array(
  'name'          => 'Hero Video Banner',
  'base'          => 'rs_hero_video_banner',
  'icon'          => 'fa fa fa-arrows-v',
  'description'   => 'Add hero video banner.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'HTML5 Video'   => 'html5',
        'Youtube Video' => 'youtube',
        'Youtube Video' => 'youtube',
        'Vimeo Video' => 'vimeo',
      ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Poster',
      'admin_label' => true,
      'param_name'  => 'poster_img',
      'dependency'  => array( 'element' => 'style', 'value' => array('html5') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Youtube URL',
      'admin_label' => true,
      'param_name'  => 'data_link',
      'description' => 'for e.g. https://youtu.be/aPkg2XnEmCQ',
      'dependency'  => array( 'element' => 'style', 'value' => array('youtube') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Vimeo URL',
      'admin_label' => true,
      'param_name'  => 'vimeo_url',
      'description' => 'for e.g. https://vimeo.com/199167955',
      'dependency'  => array( 'element' => 'style', 'value' => array('vimeo') ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Mute',
      'param_name'  => 'mute',
      'value'       => array(
        'Yes' => 'true',
        'No'  => 'false',
      ),
      'dependency'  => array( 'element' => 'style', 'value' => array('youtube') ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Text Color',
      'param_name'  => 'text_color',
      'value'       => array(
        'Black' => 'black',
        'White' => 'white',
      ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Video webm URL',
      'admin_label' => true,
      'param_name'  => 'video_webm',
      'dependency'  => array( 'element' => 'style', 'value' => array('html5') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Video mp4 URL',
      'admin_label' => true,
      'param_name'  => 'video_mp4',
      'dependency'  => array( 'element' => 'style', 'value' => array('html5') ),
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Small Heading',
      'holder'      => 'h5',
      'param_name'  => 'small_heading',
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Big Heading',
      'holder'      => 'h2',
      'param_name'  => 'heading',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

if ( is_plugin_active( 'wysija-newsletters/index.php' ) ) {
  // ==========================================================================================
  // NEWS LETTER
  // ==========================================================================================
  vc_map( array(
    'name'          => 'Newsletter',
    'base'          => 'rs_newsletter',
    'icon'          => 'fa fa-envelope',
    'description'   => 'Add newsletter.',
    'params'        => array(
      array(
        'type'        => 'dropdown',
        'heading'     => 'Text Align',
        'param_name'  => 'align',
        'value'       => array(
          'Select Align' => '',
          'Left'         => 'align-left',
          'Center'       => 'text-center',
          'Right'        => 'align-right',
        ),
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Title',
        'param_name'  => 'title',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Note',
        'param_name'  => 'note',
        'admin_label' => true,
      ),
      array(
        'type'        => 'textarea',
        'heading'     => 'Content',
        'param_name'  => 'content',
        'description' => 'Insert newsletter shortcode.e.g [wysija_form id="1"]'
      ),
      array(
      'type'        => 'dropdown',
      'heading'     => 'Button Color',
      'param_name'  => 'button_color',
      'value'       => array(
        'Blue'       => 'btn-blue',
        'Light Blue' => 'btn-light-blue',
        ),
      ),

      // Extras
      $vc_map_extra_id,
      $vc_map_extra_class,

    )
  ) );
}

require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tab.php' );
require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );
class WPBakeryShortCode_RS_Hero_Slider   extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Hero_Slider_Item  extends WPBakeryShortCode {}
