<?php
/*
 * Elementor Windfall Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Gallery extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_gallery';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Gallery', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-file-image-o';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Gallery widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_gallery'];
	}
	 */
	
	/**
	 * Register Windfall Gallery widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		$posts = get_posts( 'post_type="gallery"&numberposts=-1' );
    $PostID = array();
    if ( $posts ) {
      foreach ( $posts as $post ) {
        $PostID[ $post->ID ] = $post->ID;
      }
    } else {
      $PostID[ __( 'No ID\'s found', 'windfall-core' ) ] = 0;
    }
		
		$this->start_controls_section(
			'section_gallery',
			[
				'label' => __( 'Gallery Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_style',
			[
				'label' => __( 'Gallery Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One(Grid)', 'windfall-core' ),
					'two' => esc_html__( 'Style Two(Slider)', 'windfall-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your gallery style.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_caption_style',
			[
				'label' => __( 'Gallery Caption', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'gallery_style' => 'one',
				],
				'frontend_available' => true,
				'options' => [
					'without_caption' => esc_html__( 'Without Caption', 'windfall-core' ),
					'with_caption' => esc_html__( 'With Caption', 'windfall-core' ),
				],
				'default' => 'Select Gallery Caption',
				'description' => esc_html__( 'Select Gallery Caption Type.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_column',
			[
				'label' => __( 'Columns', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'gallery_style' => 'one',
				],
				'frontend_available' => true,
				'options' => [
					'glry-col-3' => esc_html__( 'Three Column', 'windfall-core' ),
					'glry-col-2' => esc_html__( 'Two Column', 'windfall-core' ),
					'glry-col-4' => esc_html__( 'Four Column', 'windfall-core' ),
				],
				'default' => 'Select gallery column',
				'description' => esc_html__( 'Select your gallery column.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_limit',
			[
				'label' => esc_html__( 'Number Control', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'windfall-core' ),
			]
		);
		$this->end_controls_section();// end: Section

		
		$this->start_controls_section(
			'section_enable_disable',
			[
				'label' => esc_html__( 'Enable/Disable Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_filter',
			[
				'label' => esc_html__( 'Filter', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'gallery_style' => 'one',
				],
			]
		);
		$this->add_control(
			'filter_type',
			[
				'label' => __( 'Filter Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'normal' => esc_html__( 'Normal Filter', 'windfall-core' ),
					'ajax' => esc_html__( 'Ajax Filter', 'windfall-core' ),
				],
				'default' => 'one',
				'condition' => [
					'gallery_filter' => 'true',
				],
				'description' => esc_html__( 'Select your filter type.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_pagination',
			[
				'label' => esc_html__( 'Pagination', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'windfall-core' ),
				'label_off' => esc_html__( 'Hide', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'gallery_style' => 'one',
				],
			]
		);
		$this->add_control(
			'hide_resizer',
			[
				'label' => esc_html__( 'Disable Image Resizer', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable image resize, enable it.(Only for style one and three)', 'windfall-core' ),
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_gallery_listing',
			[
				'label' => esc_html__( 'Listing Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gallery_order',
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
			'gallery_orderby',
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
			'gallery_show_category',
			[
				'label' => __( 'Certain Categories?', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'gallery_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'gallery_show_id',
			[
				'label' => __( 'Specific ID?', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'multiple' => true,
				'options' => $PostID,
				'multiple' => true,
			// 'description' => esc_html__( '"Enter your portfolio ID, (Seperated by comma) to show them only by your choice.', 'windfall-core' ),
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'windfall-core' ),
				'condition' => [
					'gallery_style' => 'two',
				],
			]
		);
		
		$this->add_responsive_control(
			'carousel_items',
			[
				'label' => esc_html__( 'How many items?', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'windfall-core' ),
			]
		);
		$this->add_responsive_control(
			'carousel_margin',
			[
				'label' => __( 'Space Between Items', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' =>0,
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
			]
		);
		$this->add_control(
			'carousel_loop',
			[
				'label' => esc_html__( 'Disable Loop?', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Continuously moving carousel, if enabled.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_dots',
			[
				'label' => esc_html__( 'Dots', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Dots, enable it.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__( 'Navigation', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want Carousel Navigation, enable it.', 'windfall-core' ),
			]
		);
		
		$this->add_control(
			'carousel_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to start Carousel automatically, enable it.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_animate_in',
			[
				'label' => esc_html__( 'Animate In', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'CSS3 animation in.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_animate_out',
			[
				'label' => esc_html__( 'Animate Out', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'CSS3 animation out.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_mousedrag',
			[
				'label' => esc_html__( 'Disable Mouse Drag?', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable Mouse Drag, check it.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_autowidth',
			[
				'label' => esc_html__( 'Auto Width', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Width automatically for each carousel items.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_autoheight',
			[
				'label' => esc_html__( 'Auto Height', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'Adjust Auto Height automatically for each carousel items.', 'windfall-core' ),
			]
		);
		$this->end_controls_section();// end: Section
		

		// Filter
		$this->start_controls_section(
			'section_filter_style',
			[
				'label' => esc_html__( 'Filter', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'gallery_style' => 'one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',				
				'selector' => '{{WRAPPER}} .masonry-filters ul li a',
			]
		);
		$this->add_control(
			'filter_border_color',
			[
				'label' => esc_html__( 'Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .masonry-filters' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'filter_border_active_color',
			[
				'label' => esc_html__( 'Active Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .masonry-filters ul li a:after' => 'background: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'filter_style' );
			$this->start_controls_tab(
				'filter_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'filter_txt_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters ul li a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'filter_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'filter_txt_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .masonry-filters ul li a:hover' => 'color: {{VALUE}};',
						'{{WRAPPER}} .masonry-filters ul li a.active' => 'color: {{VALUE}};',
						'{{WRAPPER}} .masonry-filters ul li a.active:before' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab 
			
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

		// Overlay
		$this->start_controls_section(
			'overlay_style',
			[
				'label' => esc_html__( 'Overlay', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'gallery_style' => 'one',
				],
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gallery-info' => 'background: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'over_icon_style' );
			$this->start_controls_tab(
				'over_icon_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Icon Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .gallery-info a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'over_icon_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'icon_hover_color',
				[
					'label' => esc_html__( 'Icon Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .gallery-info a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();// end: Section

		// Nav
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'obira-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'gallery_style' => 'two',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'arrow_position',
			[
				'label' => esc_html__( 'Position', 'obira-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px','%' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev,
					{{WRAPPER}} .owl-carousel .owl-nav button.owl-next' => 'top: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
		$this->start_controls_tabs( 'nav_arrow_style' );
			$this->start_controls_tab(
				'nav_arrow_normal',
				[
					'label' => esc_html__( 'Normal', 'obira-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_color',
				[
					'label' => esc_html__( 'Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav button.owl-next,
						{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav button.owl-next,
						{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'nav_arrow_hover',
				[
					'label' => esc_html__( 'Hover', 'obira-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_hover_color',
				[
					'label' => esc_html__( 'Hover Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav button.owl-next:hover,
						{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_hover_bg_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav button.owl-next:hover,
						{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			
			$this->end_controls_tab();  // end:Hover tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__( 'Dots', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'gallery_style' => 'two',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'dots_size',
			[
				'label' => esc_html__( 'Size', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 70,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_responsive_control(
			'dots_margin',
			[
				'label' => __( 'Margin', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'dots_style' );
			$this->start_controls_tab(
				'dots_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'dots_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_border',
					'label' => esc_html__( 'Border', 'windfall-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'dots_active',
				[
					'label' => esc_html__( 'Active', 'windfall-core' ),
				]
			);
			$this->add_control(
				'dots_active_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-dot.active' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'dots_active_border',
					'label' => esc_html__( 'Border', 'windfall-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-dot.active',
				]
			);
			$this->end_controls_tab();  // end:Active tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
			
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$windfall_gallery_style = !empty( $settings['gallery_style'] ) ? $settings['gallery_style'] : '';
		$gallery_caption_style = !empty($settings['gallery_caption_style']) ? $settings['gallery_caption_style'] : '';
		$windfall_gallery_column = !empty( $settings['gallery_column'] ) ? $settings['gallery_column'] : '3';
		$gallery_limit = !empty( $settings['gallery_limit'] ) ? $settings['gallery_limit'] : '';
		$windfall_gallery_filter  = ( isset( $settings['gallery_filter'] ) && ( 'true' == $settings['gallery_filter'] ) ) ? true : false;
		$filter_type = !empty( $settings['filter_type'] ) ? $settings['filter_type'] : '';
		$windfall_gallery_order = !empty( $settings['gallery_order'] ) ? $settings['gallery_order'] : '';
		$windfall_gallery_orderby = !empty( $settings['gallery_orderby'] ) ? $settings['gallery_orderby'] : '';
		$windfall_gallery_show_category = !empty( $settings['gallery_show_category'] ) ? $settings['gallery_show_category'] : [];
		$windfall_gallery_show_id = !empty( $settings['gallery_show_id'] ) ? $settings['gallery_show_id'] : [];
		$windfall_gallery_pagination  = ( isset( $settings['gallery_pagination'] ) && ( 'true' == $settings['gallery_pagination'] ) ) ? true : false;

		$hide_resizer = !empty( $settings['hide_resizer'] ) ? $settings['hide_resizer'] : '';

		$carousel_items = !empty( $settings['carousel_items'] ) ? $settings['carousel_items'] : '';
		$carousel_items_tablet = !empty( $settings['carousel_items_tablet'] ) ? $settings['carousel_items_tablet'] : '';
		$carousel_items_mobile = !empty( $settings['carousel_items_mobile'] ) ? $settings['carousel_items_mobile'] : '';
		$carousel_margin = !empty( $settings['carousel_margin']['size'] ) ? $settings['carousel_margin']['size'] : '';
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? $settings['carousel_loop'] : 'false';
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_animate_in  = ( isset( $settings['carousel_animate_in'] ) && ( 'true' == $settings['carousel_animate_in'] ) ) ? true : false;
		$carousel_animate_out  = ( isset( $settings['carousel_animate_out'] ) && ( 'true' == $settings['carousel_animate_out'] ) ) ? true : false;
		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		$carousel_autowidth  = ( isset( $settings['carousel_autowidth'] ) && ( 'true' == $settings['carousel_autowidth'] ) ) ? true : false;
		$carousel_autoheight  = ( isset( $settings['carousel_autoheight'] ) && ( 'true' == $settings['carousel_autoheight'] ) ) ? true : false;
		
		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="5"';
		$carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="0"';
		$carousel_dots = $carousel_dots ? ' data-dots="true"' : ' data-dots="false"';
		$carousel_nav = $carousel_nav ? ' data-nav="true"' : ' data-nav="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_animate_in = $carousel_animate_in ? ' data-animatein="FadeIn"' : '';
		$carousel_animate_out = $carousel_animate_out ? ' data-animateout="FadeOut"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
		$carousel_autowidth = $carousel_autowidth ? ' data-auto-width="true"' : '';
		$carousel_autoheight = $carousel_autoheight ? ' data-auto-height="true"' : '';
		$carousel_tablet = $carousel_items_tablet ? ' data-items-tablet="'. $carousel_items_tablet .'"' : ' data-items-tablet="3"';
		$carousel_mobile = $carousel_items_mobile ? ' data-items-mobile-landscape="'. $carousel_items_mobile .'"' : ' data-items-mobile-landscape="2"';
		$carousel_small_mobile = $carousel_items_mobile ? ' data-items-mobile-portrait="'. $carousel_items_mobile .'"' : ' data-items-mobile-portrait="1"';
		
		if ($windfall_gallery_style === 'two') {
			$style_class = 'gallery-style-two';
		} elseif ($windfall_gallery_style === 'three') {
			$style_class = 'gallery-style-three gallery-style-four';
		} else {
		  $style_class = ' gallery-style-three';
		}

		if($filter_type === 'ajax') {
			$filter_class = ' ajax-filter';
		} else {
			$filter_class = ' normal-filter';
		}

		$all_text = (windfall_framework_active()) ? cs_get_option('all_text') : '';
		$all_text_actual = $all_text ? $all_text : esc_html__('All', 'windfall');

		if($gallery_caption_style === 'with_caption') {
			$gallery_cap_style = 'with';
		} else {
			$gallery_cap_style = 'without';
		}

		// Turn output buffer on
		ob_start(); ?>

    <?php
    // Gallery Filter
    if ($windfall_gallery_style != 'two' && $windfall_gallery_filter) {
    ?>
    <div class="container">
      <div class="masonry-filters <?php echo esc_attr($filter_class); ?>">
        <ul>
          <li><a href="javascript:void(0);" data-style="<?php echo esc_attr($windfall_gallery_style);?>" data-limit="<?php echo esc_attr($gallery_limit); ?>" class="active" data-loader="ball-pulse"  data-caption="<?php echo esc_attr($gallery_cap_style); ?>" data-filter="*"><?php echo esc_html__( 'Show All', 'groppe' ); ?></a></li>
          <?php
          if ($windfall_gallery_show_category) {
	            $terms = $windfall_gallery_show_category;
	            $count = count($terms);
	            if ($count > 0) {
	              foreach ($terms as $term) {
	                echo '<li class="cat-'. preg_replace('/\s+/', "", strtolower($term)) .'"><a href="javascript:void(0);" class="filter cat-'. preg_replace('/\s+/', "", strtolower($term)) .'" data-style="one" data-limit="'.esc_attr($gallery_limit).'" data-filter=".'. preg_replace('/\s+/', "", strtolower($term)) .'-item" data-cat="'. preg_replace('/\s+/', "", strtolower($term)) .'" data-loader="ball-pulse" data-caption="'.$gallery_cap_style.'" title="' . str_replace('-', " ", strtolower($term)) . '">' . str_replace('-', " ", strtolower($term)) . '</a></li>';
	               }
	            }
	          } else {
	            $terms = get_terms('gallery_category');
	            $count = count($terms);
	            $i=0;
	            $term_list = '';
	            if ($count > 0) {
	              foreach ($terms as $term) {
	                $i++;
	                $term_list .= '<li><a href="javascript:void(0);" data-filter=".'. $term->slug .'-item" data-limit="'.esc_attr($gallery_limit).'" data-filter=".'. esc_attr($term->slug) .'-item" data-caption="'.$gallery_cap_style.'" data-loader="ball-pulse" data-style="'.esc_attr($windfall_gallery_style).'" data-cat="'. esc_attr($term->slug) .'">' . $term->name . '</a></li>';
	                if ($count != $i) {
	                  $term_list .= '';
	                } else {
	                  $term_list .= '';
	                }
	              }
	              echo $term_list;
	            } 
          	}
          ?>
        </ul>
      </div>
    </div>
    <?php
    }

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

        if ($windfall_gallery_show_id) {
					$windfall_gallery_show_id = json_encode( $windfall_gallery_show_id );
					$windfall_gallery_show_id = str_replace(array( '[', ']' ), '', $windfall_gallery_show_id);
					$windfall_gallery_show_id = str_replace(array( '"', '"' ), '', $windfall_gallery_show_id);
		      $windfall_gallery_show_id = explode(',',$windfall_gallery_show_id);
		    } else {
		      $windfall_gallery_show_id = '';
		    }

		    // RTL
		    if ( is_rtl() ) {
		      $switch_rtl = ' data-rtl="true"';
		    } else {
		      $switch_rtl = ' data-rtl="false"';
		    }

      $args = array(
        // other query params here,
        'paged' => $my_page,
        'post_type' => 'gallery',
        'posts_per_page' => (int)$gallery_limit,
        'gallery_category' => $windfall_gallery_show_category,
        'orderby' => $windfall_gallery_orderby,
        'order' => $windfall_gallery_order,
        'post__in' => $windfall_gallery_show_id
      );

      $windfall_galry = new \WP_Query( $args ); ?>

      <?php if($windfall_gallery_style === 'two') { ?>
        <div class="wndfal-gallery gallery-style-three">
          <div class="owl-carousel" <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_animate_in . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight  . $carousel_tablet . $carousel_mobile . $carousel_small_mobile .$switch_rtl; ?>>
      <?php } else { ?>
        <div class="container">
        <div class="wndfal-masonry <?php echo esc_attr($windfall_gallery_column); ?>">
      <?php } ?>

        <!-- Gallery Start -->
        <?php
        if ($windfall_galry->have_posts()) : while ($windfall_galry->have_posts()) : $windfall_galry->the_post();

        if($windfall_gallery_style === 'two') { 
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          $alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
          if(!$hide_resizer) {
            if(function_exists('windfall_secure_resize')) {
              $galry_img = windfall_secure_resize( $large_image, '380', '317', true );
            } else {$galry_img = $large_image;}
            $featured_img = ( $galry_img ) ? $galry_img : WINDFALL_IMAGES . '/holders/380x317.png';
          } else {
            $featured_img = $large_image;
          }
          
          ?>
          <div class="item">
            <div class="gallery-item">
              <div class="wndfal-image wndfal-popup">
                <a href="<?php echo esc_url($large_image); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
              </div>
            </div>
          </div>
        <?php } else {

          // Category
          global $post;
          $terms = wp_get_post_terms($post->ID,'gallery_category');
          foreach ($terms as $term) {
            $cat_class = $term->slug.'-item';
          }
          $count = count($terms);
          $i=0;
          $cat_class = '';
          if ($count > 0) {
            foreach ($terms as $term) {
              $i++;
              $cat_class .= $term->slug .'-item ';
              if ($count != $i) {
                $cat_class .= '';
              } else {
                $cat_class .= '';
              }
            }
          }
          // Featured Image
          $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
          $large_image = $large_image[0];
          if(!$hide_resizer) {
            if(function_exists('windfall_secure_resize')) {
              $galry_img = windfall_secure_resize( $large_image, '370', '260', true );
            } else {$galry_img = $large_image;}
            $featured_img = ( $galry_img ) ? $galry_img : WINDFALL_IMAGES . '/holders/370x260.png';
          } else {
            $featured_img = $large_image;
          }

          $gallery_metabox = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_gallery', true );
          if ($gallery_metabox ) {
            $gallery_type = $gallery_metabox['gallery_type'];
            $video_post = $gallery_metabox['video_post'];
            $gallery_post_format = $gallery_metabox['gallery_post_images'];
            $link_post = $gallery_metabox['link_post'];
          } else {
            $gallery_type = '';
            $video_post = '';
            $gallery_post_format = array();
            $link_post = '';
          }

          // Link Post
          $link_post = $link_post ? $link_post : get_the_permalink();
          ?>
          <div class="masonry-item <?php echo esc_attr($cat_class ); ?>" data-category="<?php echo esc_attr($cat_class ); ?>">
            <?php if ( $gallery_type == 'gallery' ) { ?>
            <div class="gallery-item">
              <div class="owl-carousel" data-items="1" data-margin="0" data-loop="true" data-nav="true" data-dots="true" data-autoplay="true" <?php echo $switch_rtl; ?>>
                <?php $images = explode( ',', $gallery_post_format );
                foreach ($images as $imagee) {
                  $image = wp_get_attachment_image_src( $imagee, 'full' );
                  $image_alt = get_post_meta($imagee, '_wp_attachment_image_alt', true);
                  $g_img = $image[0];
                  if(!$hide_resizer) {
                    if(function_exists('windfall_secure_resize')) {
                      $slider_img = windfall_secure_resize( $g_img, '370', '260', true );
                    } else {$slider_img = $g_img;}
                    $slider_actual_img = ( $slider_img ) ? $slider_img : WINDFALL_IMAGES . '/holders/370x260.png';
                  } else {
                    $slider_actual_img = $g_img;
                  }
                  ?>
                  <div class="item">
                    <div class="wndfal-image">
                      <img src="<?php echo esc_url($slider_actual_img); ?>" alt="<?php esc_attr( $image_alt ); ?>" />
                    </div>
                  </div>
                <?php } ?>
              </div>
              <?php if($gallery_caption_style === 'with_caption') { ?>
                <h5 class="gallery-title"><?php echo esc_html(get_the_title()); ?></h5>
              <?php } ?>
            </div>

            <?php } elseif( $gallery_type == 'video' ) {
              preg_match(
                '/[\\?\\&]v=([^\\?\\&]+)/',
                $video_post,
                $matches
              );
              $id = $matches[1];
             ?>
              <div class="gallery-item">
              <a href="<?php echo esc_url($video_post); ?>" id="myUrl" class="wndfal-popup-video">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url( $featured_img ); ?>" alt="<?php echo the_title_attribute(get_the_title()); ?>" />
                  <div class="play-btn-wrap">
                    <div class="wndfal-table-wrap">
                      <div class="wndfal-align-wrap">
                        <div class="play-btn">
                          <i class="fa fa-play" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <?php if($gallery_caption_style === 'with_caption') { ?>
                  <h5 class="gallery-title"><?php echo esc_html(get_the_title()); ?></h5>
                <?php } ?>
              </div>

            <?php } elseif( $gallery_type == 'link' ) { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo the_title_attribute(get_the_title()); ?>">
	                <div class="wndfal-popup">
	                  <a href="<?php echo esc_url($large_image); ?>">
		                  <div class="gallery-info">
		                    <div class="wndfal-table-wrap">
		                      <div class="wndfal-align-wrap">
		                          <i class="fa fa-search" aria-hidden="true"></i>
		                      </div>
		                    </div>
		                  </div>
	                  </a>
	                </div>
                </div>
                <?php if($gallery_caption_style === 'with_caption') { ?>
                  <h5 class="gallery-title"><a href="<?php echo esc_url($link_post); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
                <?php } ?>
              </div>
            <?php } else { ?>
              <div class="gallery-item">
                <div class="wndfal-image">
                  <img src="<?php echo esc_url($featured_img); ?>" alt="<?php echo the_title_attribute(get_the_title()); ?>">
                  <div class="wndfal-popup">
	                  <a href="<?php echo esc_url($large_image); ?>">
		                  <div class="gallery-info">
		                    <div class="wndfal-table-wrap">
		                      <div class="wndfal-align-wrap">
		                          <i class="fa fa-search" aria-hidden="true"></i>
		                      </div>
		                    </div>
		                  </div>
		                </a>
                  </div>
                </div>
                <?php if($gallery_caption_style === 'with_caption') { ?>
                  <h5 class="gallery-title"><?php echo esc_html(get_the_title()); ?></h5>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        <?php }
          endwhile;
          endif;
        ?>
      
       </div>
       </div>
    <?php
    if($windfall_galry->max_num_pages > 1) { 
	    if ($windfall_gallery_pagination) {
	    	echo '<div class="wndfal-pagi">';
	      windfall_custom_paging_nav($windfall_galry->max_num_pages,"",$paged);
	    	echo '</div>';
	    } 
    } wp_reset_postdata();
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Gallery() );
