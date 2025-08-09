<?php
/*
 * Elementor Windfall Testimonial Carousel Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_testimonial_post = (windfall_framework_active()) ? cs_get_option('noneed_testimonial_post') : '';

if (!$noneed_testimonial_post) {
class Windfall_Testimonial_Carousel extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_testimonial_carousel';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Testimonial Carousel', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-comments';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Testimonial Carousel widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-windfall_testimonial_carousel'];
	}
	
	/**
	 * Register Windfall Testimonial Carousel widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__( 'Testimonial Options', 'windfall-core' ),
			]
		);
		
		$this->add_control(
			'testimonial_style',
			[
				'label' => esc_html__( 'Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'testimonial_one' => esc_html__( 'Style One', 'windfall-core' ),
					'testimonial_two' => esc_html__( 'Style Two', 'windfall-core' ),
					'testimonial_three' => esc_html__( 'Style Three', 'windfall-core' ),
				],
				'default' => 'testimonial_one',
				'description' => esc_html__( 'Select testimonial Style', 'windfall-core' ),
			]
		);
		$this->add_control(
			'testi_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'testimonial_style!' => 'testimonial_three',
				],
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .wndfal-testimonials' => 'background-image: url({{url}});',
				],
				'condition' => [
					'testimonial_style' => 'testimonial_one',
				],
				
			]
		);
		$this->add_control(
			'testimonial_list_heading',
			[
				'label' => __( 'Listing', 'windfall-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'testimonial_limit',
			[
				'label' => esc_html__( 'Limit', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
			]
		);
		$this->add_control(
			'testimonial_order',
			[
				'label' => esc_html__( 'Order', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('DESC', 'windfall-core'),
					'ASC' => esc_html__('ASC', 'windfall-core'),
				],
			]
		);
		$this->add_control(
			'testimonial_orderby',
			[
				'label' => esc_html__( 'Order By', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'options' => [
					'none' => esc_html__('None', 'windfall-core'),
					'ID' => esc_html__('ID', 'windfall-core'),
					'author' => esc_html__('Author', 'windfall-core'),
					'title' => esc_html__('Name', 'windfall-core'),
					'date' => esc_html__('Date', 'windfall-core'),
					'rand' => esc_html__('Rand', 'windfall-core'),
					'menu_order' => esc_html__('Menu Order', 'windfall-core'),
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		
		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'windfall-core' ),
				'condition' => [
					'testimonial_style!' => 'testimonial_three',
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
					'size' =>30,
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
		
		$this->start_controls_section(
			'section_area_style',
			[
				'label' => esc_html__( 'Area', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style' => 'testimonial_one',
				],
			]
		);
		$this->add_control(
			'area_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-overlay:before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-testimonials' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
				
		$this->end_controls_section();// end: Section

		// Title
		$this->start_controls_section(
			'section_content_title_style',
			[
				'label' => esc_html__( 'Testimonial Title', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style' => 'testimonial_one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_title_typography',
				'selector' => '{{WRAPPER}} .testimonials-title',
			]
		);
		$this->add_control(
			'content_title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Item
		$this->start_controls_section(
			'section_item_style',
			[
				'label' => esc_html__( 'Testimonial Item', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style!' => 'testimonial_one',
				],
			]
		);
		$this->add_control(
			'content_item_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .customer-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_item_border_color',
			[
				'label' => esc_html__( 'Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .customer-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Name', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .author-name, {{WRAPPER}} .customer-name',
			]
		);
		$this->start_controls_tabs( 'name_style' );
		$this->start_controls_tab(
			'name_normal',
			[
				'label' => esc_html__( 'Normal', 'windfall-core' ),
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-name, {{WRAPPER}} .author-name a, {{WRAPPER}} .customer-name, {{WRAPPER}} .customer-name a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .owl-carousel .customer-name a:before, {{WRAPPER}} .owl-carousel .customer-name a:after' => 'Background: {{VALUE}};'
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab
		$this->start_controls_tab(
			'name_hover',
			[
				'label' => esc_html__( 'Hover', 'windfall-core' ),
			]
		);
		$this->add_control(
			'name_hover_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author-name a:hover,{{WRAPPER}} .customer-name a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

		// Location
		$this->start_controls_section(
			'section_location_style',
			[
				'label' => esc_html__( 'Location Text', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_style!' => 'testimonial_one',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_location_typography',
				'selector' => '{{WRAPPER}} .customer-item .customer-inner-info p',
			]
		);
		$this->add_control(
			'content_location_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .customer-item .customer-inner-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_content_text_style',
			[
				'label' => esc_html__( 'Content Text', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_text_typography',
				'selector' => '{{WRAPPER}} .testimonial-item p, {{WRAPPER}} .customer-item p',
			]
		);
		$this->add_control(
			'content_text_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-item p, {{WRAPPER}} .customer-item p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_nav' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Size', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 16,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:before,
					{{WRAPPER}} .owl-carousel .owl-nav .owl-next:before' => 'font-size: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .owl-carousel .owl-nav button.owl-prev, {{WRAPPER}} .owl-carousel .owl-nav button.owl-next' => 'width: calc({{SIZE}}{{UNIT}} + 24px);height: calc({{SIZE}}{{UNIT}} + 24px);',
				],
			]
		);
		$this->start_controls_tabs( 'nav_arrow_style' );
			$this->start_controls_tab(
				'nav_arrow_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:before,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next,
						{{WRAPPER}} .testimonials-style-three .owl-carousel .owl-nav' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'nav_border',
					'label' => esc_html__( 'Border', 'windfall-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-nav .owl-prev,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next',
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'nav_arrow_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'nav_arrow_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover:before,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover' => 'background: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'nav_active_border',
					'label' => esc_html__( 'Border', 'windfall-core' ),
					'selector' => '{{WRAPPER}} .owl-carousel .owl-nav .owl-prev:hover,
						{{WRAPPER}} .owl-carousel .owl-nav .owl-next:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
		
		// Dots
		$this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__( 'Dots', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_dots' => 'true',
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
						'max' => 1000,
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
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
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
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
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
	 * Render Testimonial Carousel widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$testimonial_style = !empty( $settings['testimonial_style'] ) ? $settings['testimonial_style'] : '';
		$testimonial_limit = !empty( $settings['testimonial_limit'] ) ? $settings['testimonial_limit'] : '-1';
		$testimonial_order = !empty( $settings['testimonial_order'] ) ? $settings['testimonial_order'] : '';
		$testimonial_orderby = !empty( $settings['testimonial_orderby'] ) ? $settings['testimonial_orderby'] : '';
		$testi_title = !empty( $settings['testi_title'] ) ? $settings['testi_title'] : '';	
		
		// Carousel Options
		$carousel_items = !empty( $settings['carousel_items'] ) ? $settings['carousel_items'] : '';
		$carousel_items_tablet = !empty( $settings['carousel_items_tablet'] ) ? $settings['carousel_items_tablet'] : '';
		$carousel_items_mobile = !empty( $settings['carousel_items_mobile'] ) ? $settings['carousel_items_mobile'] : '';
		$carousel_margin = !empty( $settings['carousel_margin']['size'] ) ? $settings['carousel_margin']['size'] : '';
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? true : false;
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_animate_out  = ( isset( $settings['carousel_animate_out'] ) && ( 'true' == $settings['carousel_animate_out'] ) ) ? true : false;
		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		$carousel_autowidth  = ( isset( $settings['carousel_autowidth'] ) && ( 'true' == $settings['carousel_autowidth'] ) ) ? true : false;
		$carousel_autoheight  = ( isset( $settings['carousel_autoheight'] ) && ( 'true' == $settings['carousel_autoheight'] ) ) ? true : false;

		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';
		$carousel_items = $carousel_items ? ' data-items="'. $carousel_items .'"' : ' data-items="5"';
		$carousel_margin = $carousel_margin ? ' data-margin="'. $carousel_margin .'"' : ' data-margin="30"';
		$carousel_dots = $carousel_dots ? ' data-dots="true"' : ' data-dots="false"';
		$carousel_nav = $carousel_nav ? ' data-nav="true"' : ' data-nav="false"';
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-autoplay-timeout="'. $carousel_autoplay_timeout .'"' : '';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : '';
		$carousel_animate_out = $carousel_animate_out ? ' data-animateout="true"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mouse-drag="true"' : ' data-mouse-drag="false"';
		$carousel_autowidth = $carousel_autowidth ? ' data-auto-width="true"' : '';
		$carousel_autoheight = $carousel_autoheight ? ' data-auto-height="true"' : '';
		$carousel_tablet = $carousel_items_tablet ? ' data-items-tablet="'. $carousel_items_tablet .'"' : ' data-items-tablet="3"';
		$carousel_mobile = $carousel_items_mobile ? ' data-items-mobile-landscape="'. $carousel_items_mobile .'"' : ' data-items-mobile-landscape="2"';
		$carousel_small_mobile = $carousel_items_mobile ? ' data-items-mobile-portrait="'. $carousel_items_mobile .'"' : ' data-items-mobile-portrait="1"';

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

		 	// Query Starts Here
		  $args = array(
		    'paged' => $my_page,
		    'post_type' => 'testimonial',
		    'posts_per_page' => (int)$testimonial_limit,
		    'orderby' => $testimonial_orderby,
		    'order' => $testimonial_order,
		  );

		  // Testimonial Style
		  if ($testimonial_style === 'testimonial_two') {
		    $testimonial_style_class = ' testimonials-style-two wndfal-overlay';
		    $title_actual = $testi_title ? '<div class="section-title-wrap title-style-two"><h2 class="section-title">'.$testi_title.'</h2></div>' : '';
		  } else {
		    $testimonial_style_class = '';
		    $title_actual = $testi_title ? '<h2 class="testimonials-title">'.$testi_title.'</h2>' : '';
		  }

		  // RTL
		  if ( is_rtl() ) {
		    $switch_rtl = ' data-rtl="true"';
		  } else {
		    $switch_rtl = ' data-rtl="false"';
		  }

		  $windfall_testi = new \WP_Query( $args );
		  if ($windfall_testi->have_posts()) :

		if($testimonial_style === 'testimonial_three') { ?>
		<div class="wndfal-customers customers-style-two">
		  <div class="container">
		    <div class="row">
		<?php } elseif ($testimonial_style === 'testimonial_two') { ?>
		<div class="wndfal-customers">
		  <div class="container">
		  <?php echo $title_actual; ?>
		    <div class="owl-carousel carousel-style-two" <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight  . $carousel_tablet . $carousel_mobile . $carousel_small_mobile .$switch_rtl; ?>>
		<?php } else { ?>
		<div class="wndfal-testimonials wndfal-parallax">
		<div class="wndfal-overlay"></div>
		  <div class="container">
		    <div class="testimonials-wrap">
		      <?php echo $title_actual; ?>
		      <div class="owl-carousel" <?php echo $carousel_loop . $carousel_items . $carousel_margin . $carousel_dots . $carousel_nav . $carousel_autoplay_timeout . $carousel_autoplay . $carousel_animate_out . $carousel_mousedrag . $carousel_autowidth . $carousel_autoheight  . $carousel_tablet . $carousel_mobile . $carousel_small_mobile .$switch_rtl; ?>>
		<?php } 
		        while ($windfall_testi->have_posts()) : $windfall_testi->the_post();

		        // Get Meta Box Options - windfall_framework_active()
		        $testimonial_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_testi', true );
		        $testi_job = $testimonial_options['testi_location'];

		        // Featured Image
		        $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
		        $large_image = $large_image[0];
		        $windfall_alt = get_post_meta( get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);

		        if ($testimonial_style === 'testimonial_three') { ?>
		          <div class="col-lg-4 col-md-6">
		            <div class="customer-item">
		             <p><?php the_excerpt(); ?></p>
		              <div class="customer-info">
		                <?php if($large_image) { ?>
		                  <div class="wndfal-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($windfall_alt); ?>"></div>
		                <?php } ?>
		                <div class="customer-inner-info">
		                  <h5 class="customer-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
		                  <?php if ($testi_job) { ?><p><?php echo esc_html($testi_job); ?></p><?php } ?>
		                </div>
		              </div>
		            </div>
		          </div>
		        <?php } elseif ($testimonial_style === 'testimonial_two') { // Style Two
		        ?>
		          <div class="item">
		            <div class="customer-item">
		              <p><?php the_excerpt(); ?></p>
		              <div class="customer-info">
		                <?php if($large_image) { ?>
		                  <div class="wndfal-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($windfall_alt); ?>"></div>
		                <?php } ?>
		                <div class="customer-inner-info">
		                  <h5 class="customer-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
		                  <?php if ($testi_job) { ?><p><?php echo esc_html($testi_job); ?></p><?php } ?>
		                </div>
		              </div>
		            </div>
		          </div>
		        <?php } else { ?>
		          <div class="item">
		            <div class="testimonial-item">
		              <p><?php the_excerpt(); ?></p>
		              <h5 class="customer-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
		              <?php if($testi_job) { ?>
		              <h5 class="author-name"><?php echo esc_html($testi_job); ?></h5>
		              <?php } ?>
		            </div>
		          </div>
		        <?php }

		        endwhile;
		        wp_reset_postdata();
		        ?>
		        <?php if ($testimonial_style != 'testimonial_two' && $testimonial_style != 'testimonial_three') { ?>
		          </div>
		        <?php } ?>
		        </div>
		      </div>
		      </div>

		  <?php
		    endif;
			// outbut buffer
			echo ob_get_clean();
		
	}

	/**
	 * Render Testimonial Carousel widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Testimonial_Carousel() );
}
