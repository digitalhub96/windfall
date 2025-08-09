<?php
/*
 * Elementor Windfall Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Blog extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_blog';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Blog', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-newspaper-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Blog widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_blog'];
	}
	 */
	
	/**
	 * Register Windfall Blog widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){

		$posts = get_posts( 'post_type="post"&numberposts=-1' );
    $PostID = array();
    if ( $posts ) {
      foreach ( $posts as $post ) {
        $PostID[ $post->ID ] = $post->ID;
      }
    } else {
      $PostID[ __( 'No ID\'s found', 'windfall' ) ] = 0;
    }
		
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Blog Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_style',
			[
				'label' => __( 'Blog Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One(List)', 'windfall-core' ),
					'style-two' => esc_html__( 'Style Two(Grid)', 'windfall-core' ),
					'style-three' => esc_html__( 'Style Three(Simple List)', 'windfall-core' ),
				],
				'default' => 'style-one',
				'description' => esc_html__( 'Select your blog style.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_column',
			[
				'label' => __( 'Columns', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'blog_style' => 'style-two',
				],
				'frontend_available' => true,
				'options' => [
					'col-2' => esc_html__( 'Column Two', 'windfall-core' ),
					'col-3' => esc_html__( 'Column Three', 'windfall-core' ),
				],
				'default' => 'col-3',
				'description' => esc_html__( 'Select your blog column.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type title text here', 'windfall-core' ),
				'condition' => [
					'blog_style' => 'style-two',
				],
			]
		);	
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'More News Button Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type btn text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);	
		$this->end_controls_section();// end: Section

		
		$this->start_controls_section(
			'section_blog_metas',
			[
				'label' => esc_html__( 'Meta\'s Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_image',
			[
				'label' => esc_html__( 'Image', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'blog_style!' => 'style-three',
				],
			]
		);
		$this->add_control(
			'blog_category',
			[
				'label' => esc_html__( 'Category', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'blog_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'blog_date',
			[
				'label' => esc_html__( 'Date', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_author',
			[
				'label' => esc_html__( 'Author', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'blog_style' => array('style-one','style-two'),
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_blog_listing',
			[
				'label' => esc_html__( 'Listing Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_limit',
			[
				'label' => esc_html__( 'Blog Limit', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_order',
			[
				'label' => __( 'Order', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'windfall-core' ),
					'DESC' => esc_html__( 'Desending', 'windfall-core' ),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'blog_orderby',
			[
				'label' => __( 'Order By', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'windfall-core' ),
					'ID' => esc_html__( 'ID', 'windfall-core' ),
					'author' => esc_html__( 'Author', 'windfall-core' ),
					'title' => esc_html__( 'Title', 'windfall-core' ),
					'date' => esc_html__( 'Date', 'windfall-core' ),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'blog_show_category',
			[
				'label' => __( 'Certain Categories?', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'blog_show_id',
			[
				'label' => __( 'Certain ID\'s?', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->add_control(
			'short_content',
			[
				'label' => esc_html__( 'Excerpt Length', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 25,
				'description' => esc_html__( 'How many words you want in short content paragraph.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blog_aqr',
			[
				'label' => esc_html__( 'Disable Image Resize?', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'blog_pagination',
			[
				'label' => esc_html__( 'Pagination', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'read_more_txt',
			[
				'label' => esc_html__( 'Read More Button Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Read More', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type text here', 'windfall-core' ),
				'condition' => [
					'hide_readmore' => '',
				],
			]
		);
		
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_section_style',
			[
				'label' => esc_html__( 'Section', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'windfall-core' ),
				'selector' => '{{WRAPPER}} .blog-item',
			]
		);
		$this->add_control(
			'section_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sasblo_section_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'windfall-core' ),
				'selector' => '{{WRAPPER}} .blog-item',
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_banner_style',
			[
				'label' => esc_html__( 'Image', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'banner_border',
				'label' => esc_html__( 'Border', 'windfall-core' ),
				'selector' => '{{WRAPPER}} .blog-item .wndfal-image img',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .blog-item .wndfal-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasblo_title_typography',
				'selector' => '{{WRAPPER}} .blog-info h4',
			]
		);
		$this->start_controls_tabs( 'title_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info h4, {{WRAPPER}} .blog-info h4 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'title_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info h4 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_excerpt_style',
			[
				'label' => esc_html__( 'Excerpt', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .blog-info p',
			]
		);
		$this->add_control(
			'excerpt_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_metas_style',
			[
				'label' => esc_html__( 'Meta\'s', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'metas_options',
			[
				'label' => __( 'Meta\'s Options', 'windfall-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'metas_typography',
				'selector' => '{{WRAPPER}} .blog-info a .wndfal-label',
			]
		);
		$this->start_controls_tabs( 'metas_style' );
			$this->start_controls_tab(
				'metas_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'metas_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a .wndfal-label' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'metas_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a .wndfal-label' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'metas_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'metas_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a:hover .wndfal-label' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'metas_bg_hover_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-info a:hover .wndfal-label' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
		$this->end_controls_tabs(); // end tabs

		$this->add_control(
			'author_options',
			[
				'label' => __( 'Author Options', 'windfall-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'selector' => '{{WRAPPER}} .wndfal-meta .author a',
			]
		);
		$this->start_controls_tabs( 'author_style' );
			$this->start_controls_tab(
				'author_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'author_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-meta .author a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'author_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'author_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-meta .author a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
		$this->end_controls_tabs(); // end tabs

		$this->add_control(
			'date_options',
			[
				'label' => __( 'Date & Read Options', 'windfall-core' ),
				'type' => Controls_Manager::HEADING,
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'frontend_available' => true,
				'selector' => '{{WRAPPER}} .blog-date ul',
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'frontend_available' => true,
				'selectors' => [
					'{{WRAPPER}} .blog-date ul' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$blog_style = !empty( $settings['blog_style'] ) ? $settings['blog_style'] : '';
		$blog_column = !empty( $settings['blog_column'] ) ? $settings['blog_column'] : '';
		$blog_title = !empty($settings['blog_title']) ? $settings['blog_title'] : '';
		$blog_limit = !empty( $settings['blog_limit'] ) ? $settings['blog_limit'] : '';
		$blog_image  = ( isset( $settings['blog_image'] ) && ( 'true' == $settings['blog_image'] ) ) ? true : false;
		$blog_category  = ( isset( $settings['blog_category'] ) && ( 'true' == $settings['blog_category'] ) ) ? true : false;
		$blog_date  = ( isset( $settings['blog_date'] ) && ( 'true' == $settings['blog_date'] ) ) ? true : false;
		$blog_author  = ( isset( $settings['blog_author'] ) && ( 'true' == $settings['blog_author'] ) ) ? true : false;
		$blog_order = !empty( $settings['blog_order'] ) ? $settings['blog_order'] : '';
		$blog_orderby = !empty( $settings['blog_orderby'] ) ? $settings['blog_orderby'] : '';
		$blog_show_category = !empty( $settings['blog_show_category'] ) ? $settings['blog_show_category'] : [];
		$blog_show_id = !empty( $settings['blog_show_id'] ) ? $settings['blog_show_id'] : [];
		$short_content = !empty( $settings['short_content'] ) ? $settings['short_content'] : '';
		$blog_pagination  = ( isset( $settings['blog_pagination'] ) && ( 'true' == $settings['blog_pagination'] ) ) ? true : false;
		$blog_aqr  = ( isset( $settings['blog_aqr'] ) && ( 'true' == $settings['blog_aqr'] ) ) ? true : false;
		$read_more_txt = !empty( $settings['read_more_txt'] ) ? $settings['read_more_txt'] : '';

		$btn_text = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
		$btn_link = !empty( $settings['btn_link']['url'] ) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty( $settings['btn_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		$author_by_text = cs_get_option('author_by_text');
		$author_by_text = $author_by_text ? $author_by_text : esc_html__('By ','windfall');

		$blog_title_actual = $blog_title ? '<h2 class="section-title">'.$blog_title.'</h2>' : '';

		$button_main = $btn_link ? '<a href="'.$btn_link.'" '.$btn_link_attr.' class="more-btn">'.$btn_text.'</a>' : '<span class="more-btn">'.$btn_text.'</span>';
		$button_actual = $btn_text ? '<div class="col-sm-4 textright">'.$button_main.'</div>' : '';

		// Column
		if ($blog_column === 'col-2') {
			$windfall_blog_col_class = 'col-md-6 col-sm-12';
		} else {
			$windfall_blog_col_class = 'col-lg-4 col-md-6 col-sm-12';
		}

		if ($blog_style === 'style-two') {
			$layout_class = $windfall_blog_col_class;
		} else {
			$layout_class = 'col-md-12';
		}

		// Excerpt
		if (windfall_framework_active()) {
		  $excerpt_length = cs_get_option('theme_blog_excerpt');
		  $excerpt_length = $excerpt_length ? $excerpt_length : '55';
		  if ($short_content) {
			$short_content = $short_content;
		  } else {
			$short_content = $excerpt_length;
		  }
		} else {
		  $short_content = '55';
		}

		// Style  
		if ($blog_style === 'style-three') {
			$blog_style_cls = ' blog-item-wrap style-three';
		} elseif ($blog_style === 'style-two') {
			$blog_style_cls = ' blog-style-two';
		} else {
			$blog_style_cls = '';
		}

		// Turn output buffer on
		ob_start();

		// Pagination
		global $paged;
		if( get_query_var( 'paged' ) )
		  $my_page = get_query_var( 'paged' );
		else {
		  if( get_query_var( 'page' ) )
			$my_page = get_query_var( 'page' );
		  else
			$my_page = 1;
		  set_query_var( 'paged', $my_page );
		  $paged = $my_page;
		}

    if ($blog_show_id) {
			$blog_show_id = json_encode( $blog_show_id );
			$blog_show_id = str_replace(array( '[', ']' ), '', $blog_show_id);
			$blog_show_id = str_replace(array( '"', '"' ), '', $blog_show_id);
      $blog_show_id = explode(',',$blog_show_id);
    } else {
      $blog_show_id = '';
    }

		$args = array(
		  // other query params here,
		  'paged' => $my_page,
		  'post_type' => 'post',
		  'posts_per_page' => (int)$blog_limit,
		  'category_name' => implode(',', $blog_show_category),
		  'orderby' => $blog_orderby,
		  'order' => $blog_order,
      'post__in' => $blog_show_id,
		);

		$wndfal_post = new \WP_Query( $args ); ?>

		<div class="blog-wrap <?php echo esc_attr($blog_style_cls); ?>">
		<?php if($blog_style != 'style-three') { ?>
			<div class="container">
			<?php if($blog_style === 'style-two') { 
				if($blog_title_actual || $button_actual) { ?>
				<div class="section-title-wrap title-style-two">
          <div class="row align-items-center">
            <div class="col-sm-8">
              <?php echo $blog_title_actual; ?>
            </div>
            <?php echo $button_actual; ?>
          </div>
        </div>
			<?php } }?>
				<div class="row">
			<?php }
			  if ($wndfal_post->have_posts()) : while ($wndfal_post->have_posts()) : $wndfal_post->the_post();
			  $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
			  $large_image = $large_image[0]; 

			  if ($blog_aqr) {
					$featured_img = $large_image;
				} else {
					if ($blog_style === 'style-two') {
						if ($blog_column === 'col-2') {
					    if(function_exists('windfall_secure_resize')) {
					      $blog_img = windfall_secure_resize( $large_image, '570', '370', true );
					    } else {$blog_img = $large_image;}
					    $featured_img = ( $blog_img ) ? $blog_img : WINDFALL_IMAGES . '/holders/570x370.png';
						} else {
						if(function_exists('windfall_secure_resize')) {
								$blog_img = windfall_secure_resize( $large_image, '370', '220', true );
					    } else {$blog_img = $large_image;}
							$featured_img = ( $blog_img ) ? $blog_img : WINDFALL_IMAGES . '/holders/370x220.png';
						}
					} else {
						if(function_exists('windfall_secure_resize')) {
							$blog_img = windfall_secure_resize( $large_image, '828', '490', true );
					   } else {$blog_img = $large_image;}
						$featured_img = ( $blog_img ) ? $blog_img : $large_image;
					}
				}

				if (windfall_framework_active()) {
				  $read_more_to = cs_get_option('read_more_text');
				  if ($read_more_txt) {
					$read_more_txt = $read_more_txt;
				  } elseif($read_more_to) {
					$read_more_txt = $read_more_to;
				  } else {
					$read_more_txt = esc_html__( 'Read More', 'windfall-core' );
				  }
					$date_format_actual = cs_get_option('blog_date_format');
				} else {
				  $read_more_txt = $read_more_txt ? $read_more_txt : esc_html__( 'Read More', 'windfall-core' );
				  $date_format_actual = '';
				}

				if($blog_style === 'style-three') { ?>
            <div class="blog-info">
              <?php if ( $blog_date ) {  ?>
					      <h6 class="blog-date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_html(get_the_date($date_format_actual)); ?></h6>
					    <?php } ?>
              <h4 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
            </div>
				<?php } elseif($blog_style === 'style-two') {
				?>
				<div class="<?php echo esc_attr($windfall_blog_col_class); ?>">
				  <div class="blog-item">
				    <?php if ($large_image && $blog_image) { ?>
						  <div class="wndfal-image">
						    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo the_title_attribute(get_the_title()); ?>"></a>
						  </div>
						<?php } ?>
				    <div class="blog-info">
				    <div class="blog-date">
					    <ul>
				    		<?php if ( $blog_date ) { ?>
						      <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_html(get_the_date($date_format_actual)); ?></li>
						    <?php } if ( $blog_author ) { ?>
						      <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo esc_html($author_by_text); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html(get_the_author()); ?></a></li>
						    <?php } ?>
						  </ul>
						</div>
				      <h3 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
				      <?php
								echo '<p>';
								windfall_excerpt($short_content);
								echo '</p>';
								echo windfall_wp_link_pages();
							?>
				     <a href="<?php echo esc_url( get_permalink() ); ?>" class="wndfal-link"><?php echo esc_html($read_more_txt); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
				    </div>
				  </div>
				</div>
				<?php } else { ?>
				<div class="blog-item">
					<div id="post-<?php the_ID(); ?>" <?php post_class('wndfal-blog-post'); ?>>
					  <?php if ($large_image && $blog_image) { ?>
						  <div class="wndfal-image">
						    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo the_title_attribute(get_the_title()); ?>"></a>
						  </div>
						<?php } ?>
					  <div class="blog-info">
					    <div class="blog-date">
					    <ul>
						    <?php if ( $blog_date ) { ?>
						      <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_html(get_the_date($date_format_actual)); ?></li>
						    <?php } if ( $blog_author ) { ?>
						      <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo esc_html($author_by_text); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html(get_the_author()); ?></a></li>
						    <?php } if ( $blog_category ) {
						    	if (has_category()){
						    	?> <li><i class="fa fa-th" aria-hidden="true"></i> <?php echo the_category(', '); ?></li>
					    	<?php } } ?>
					    </ul>
					    </div>
					    <h2 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
					    <?php
								echo '<p>';
								windfall_excerpt($short_content);
								echo '</p>';
								echo windfall_wp_link_pages();
							?>
					    <div class="blog-meta">
					      <div class="row align-items-center">
					        <div class="col-6">
					        	<a href="<?php echo esc_url( get_permalink() ); ?>" class="wndfal-link"><?php echo esc_html($read_more_txt); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
					        </div>
					        <div class="col-6 textright">
					        <?php if ( $blog_comments ) {
							    	if (get_comments_number()!=0) { ?>
							      <span class="blog-comment"><?php comments_popup_link( esc_html__( '0', 'windfall' ), esc_html__( '1', 'windfall' ), esc_html__( '%', 'windfall' ), '', '' ); ?></span>
							    <?php } } ?>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<?php }

			  endwhile;
			  endif;
			  wp_reset_postdata();
				if ($blog_pagination) { ?>
				  <div class="pagination-wrap">
				  <?php windfall_paging_nav($wndfal_post->max_num_pages,"",$paged); ?>
				  </div>
				<?php } if($blog_style != 'style-three') { ?>
			</div>
			</div>
			<?php } ?>
		</div>
		<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Blog() );
