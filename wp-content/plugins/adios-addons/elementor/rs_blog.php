<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 * Blockquote Widget.
 *
 * @version       1.0
 * @author        themebubble
 * @category      Classes
 * @author        themebubble
 */
class RS_Blog_Widget extends Widget_Base {

  public function get_name() {
    return 'rs-blog-widget';
  }

  public function get_title() {
    return 'Blog';
  }

  public function get_icon() {
    return 'elem_icon post';
  }

  public function get_script_depends() {
    return array();
  }

  public function get_style_depends() {
    return array();
  }

  public function get_categories() {
    return array('adios-elementor');
  }

  public function get_custom_term_values($type) {
    $items = array();
    $terms = get_terms($type, array('orderby' => 'name'));
    if (is_array($terms) && !is_wp_error($terms)) {
      foreach ($terms as $term) {
        $items[$term ->name] = $term->slug;
      }
    }
    return $items;
  }

  protected function _register_controls() {

    $this->start_controls_section(
      'blog_query_settings',
      array(
        'label' => esc_html__('Query Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'cats',
      array(
        'label'       => esc_html__('Filter By Categories', 'adios-addons'),
        'description' => esc_html__('Specifies a category that you want to show posts from it.', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT2,
        'multiple'    => true,
        'label_block' => true,
        'options'     => array_flip($this->get_custom_term_values('category')),
        'default'     => array(''),
      )
    );

    $this->add_control(
      'tags',
      array(
        'label'       => esc_html__('Filter By Tags', 'adios-addons'),
        'description' => esc_html__('Specifies a tag that you want to show posts from it.', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT2,
        'multiple'    => true,
        'label_block' => true,
        'options'     => array_flip($this->get_custom_term_values('post_tag')),
        'default'     => array(''),
      )
    );

    $this->add_control(
      'limit',
      array(
        'label'       => esc_html__('Limit', 'adios-addons'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => 8,
      )
    );

    $this->add_control(
      'orderby',
      array(
        'label'       => esc_html__( 'Order By', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'ID',
        'options'     => array_flip(array(
          'ID'            => 'ID',
          'Author'        => 'author',
          'Post Title'    => 'title',
          'Date'          => 'date',
          'Last Modified' => 'modified',
          'Random Order'  => 'rand',
          'Comment Count' => 'comment_count',
          'Menu Order'    => 'menu_order',
        )),
        'label_block' => true,
      )
    );

    $this->add_control(
      'order',
      array(
        'label'       => esc_html__('Order', 'adios-addons' ),
        'type'        => Controls_Manager::SELECT,
        'options'     => array(
          'DESC' => esc_html__('Descending', 'adios-addons'),
          'ASC'  => esc_html__('Ascending', 'adios-addons'),
        ),
        'default' => 'DESC',
        'label_block' => true,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'blog_meta_settings',
      array(
        'label' => esc_html__('Meta Settings' , 'adios-addons')
      )
    );

    $this->add_control(
      'category',
      array(
        'label'     => esc_html__('Category', 'adios-addons'),
        'type'      => Controls_Manager::SWITCHER,
        'default'   => 'yes',
      )
    );

    $this->add_control(
      'author',
      array(
        'label'     => esc_html__('Author', 'adios-addons'),
        'type'      => Controls_Manager::SWITCHER,
        'default'   => 'yes',
      )
    );

    $this->add_control(
      'date',
      array(
        'label'     => esc_html__('Date', 'adios-addons'),
        'type'      => Controls_Manager::SWITCHER,
        'default'   => 'yes',
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_general_style',
      array(
        'label' => esc_html__('General Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_group_control(
      Group_Control_Background::get_type(),
      array(
        'name'      => 'background',
        'label'     => esc_html__('Background', 'adios-addons'),
        'types'     => array('classic', 'gradient'),
        'selector'  => '{{WRAPPER}} .blog-wrapper',
      )
    );

    $this->add_responsive_control(
      'margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'border',
        'selector' => '{{WRAPPER}} .blog-wrapper'
      )
    );

    $this->add_responsive_control(
      'border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->add_group_control(
      Group_Control_Box_Shadow::get_type(),
      array(
        'name'      => 'box_shadow',
        'label'     => esc_html__('Box Shadow', 'adios-addons'),
        'selector'  => '{{WRAPPER}} .blog-wrapper',
      )
    );

    $this->end_controls_section();





    $this->start_controls_section('section_category_style',
      array(
        'label' => esc_html__('Category Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_responsive_control(
      'category_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-category a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'category_padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'category_typography',
        'selector' => '{{WRAPPER}} .blog-category a',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->start_controls_tabs('category_style');

    $this->start_controls_tab(
      'category_color_normal',
      array(
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('category_normal_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-category a' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('category_normal_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-category a' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'category_normal_border',
        'selector' => '{{WRAPPER}} .blog-category a'
      )
    );

    $this->add_responsive_control(
      'category_normal_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-category a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'category_color_hover',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );

    $this->add_control('category_hover_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-category a:hover' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('category_hover_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-category a:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'category_hover_border',
        'selector' => '{{WRAPPER}} .blog-category a:hover'
      )
    );

    $this->add_responsive_control(
      'category_hover_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-category a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );


    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();

    $this->start_controls_section('section_title_style',
      array(
        'label' => esc_html__('Title Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_responsive_control(
      'title_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .blog-title a',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->start_controls_tabs('title_style');

    $this->start_controls_tab(
      'title_color_normal',
      array(
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('title_normal_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-title a' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'title_color_hover',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );


    $this->add_control('title_hover_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-title a:hover' => 'color: {{VALUE}};',
        ),
      )
    );


    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();


    $this->start_controls_section('section_author_style',
      array(
        'label' => esc_html__('Author Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_responsive_control(
      'author_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-author a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'author_padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-author a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'author_typography',
        'selector' => '{{WRAPPER}} .blog-author a',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->start_controls_tabs('author_style');

    $this->start_controls_tab(
      'author_color_normal',
      array(
        'label' => esc_html__('Normal', 'adios-addons'),
      )
    );

    $this->add_control('author_normal_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-author a' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('author_normal_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-author a' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'author_normal_border',
        'selector' => '{{WRAPPER}} .blog-author a'
      )
    );

    $this->add_responsive_control(
      'author_normal_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-author a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'author_color_hover',
      array(
        'label' => esc_html__('Hover', 'adios-addons'),
      )
    );

    $this->add_control('author_hover_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-author a:hover' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('author_hover_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-author a:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'author_hover_border',
        'selector' => '{{WRAPPER}} .blog-author a:hover'
      )
    );

    $this->add_responsive_control(
      'author_hover_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-author a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );


    $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->end_controls_section();


    $this->start_controls_section('section_date_style',
      array(
        'label' => esc_html__('Date Style', 'adios-addons'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_responsive_control(
      'date_margin',
      array(
        'label'      => esc_html__('Margin', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_responsive_control(
      'date_padding',
      array(
        'label'      => esc_html__('Padding', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'date_typography',
        'selector' => '{{WRAPPER}} .blog-date',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );


    $this->add_control('date_normal_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-date' => 'background-color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('date_normal_text_color', 
      array(
        'label'       => esc_html__('Text Color', 'adios-addons'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .blog-date' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Border::get_type(),
      array(
        'name'     => 'date_normal_border',
        'selector' => '{{WRAPPER}} .blog-date'
      )
    );

    $this->add_responsive_control(
      'date_normal_border_radius',
      array(
        'label'      => esc_html__('Border Raidus', 'adios-addons'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .blog-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        
      )
    );

    $this->end_controls_section();



  }

  protected function render() { 

    $settings       = $this->get_settings();
    $cats           = $settings['cats'];
    $tags           = $settings['tags'];
    $limit          = $settings['limit'];
    $orderby        = $settings['orderby'];
    $order          = $settings['order'];
    $category       = $settings['category'];
    $author         = $settings['author'];
    $date           = $settings['date'];

    $args = array(
      'posts_per_page' => $limit,
      'orderby'        => $orderby,
      'order'          => $order,
    );

    if(!empty($tags[0]) && is_array($tags)) {
      $args['tag_slug__in'] = $tags;
    }

    if(!empty($cats[0])) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'category',
          'field'    => 'slug',
          'terms'    => $cats,
        ),
      );
    }
    
    $the_query = new \WP_Query($args); ?>

      <div class="ls-blog">
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
          <div class="twit-item blog-wrapper wow zoomIn" data-wow-delay="0.4s">
            <?php the_post_thumbnail('medium-alt', array('class' => 'resp-img')); ?>
            <div class="twit-desc">
             <h2 class="h2 blog-title title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
               <div class="twit-author">
                  <?php if($author == 'yes'): ?>
                    <?php echo get_avatar(get_the_author_meta( 'ID' ),45); ?>
                  <?php endif; ?>
                  <div class="post-txt">
                    <?php if($author == 'yes'): ?>
                      <h6 class="h6 blog-author"><a class="ilb" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo get_the_author(); ?></a></h6>
                    <?php endif; ?>
                    <p>
                      <?php if($category == 'yes'): ?>
                        <span class="blog-category"><?php echo esc_html__('In', 'adios-addons'); ?> <?php echo get_the_category_list( esc_html__( ', ', 'adios-addons' ) );?> </span>
                      <?php endif; ?>
                      <?php if($date == 'yes'): ?>
                        <?php echo esc_html__('Posted', 'adios-addons'); ?> <span class="blog-date post-date"><?php the_time('F d, Y'); ?></span>
                      <?php endif; ?> 
                    </p>
                  </div>
               </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    <?php

  }
}
Plugin::instance()->widgets_manager->register_widget_type( new RS_Blog_Widget() );