<?php
/*
 * Elementor Windfall Blog Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Slider extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_slider';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Slider', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sliders';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_slider'];
	}
	 */
	
	/**
	 * Register Windfall Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'Slider Options', 'windfall-core' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'section_alignment',
			[
				'label' => esc_html__( 'Alignment', 'windfall-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'windfall-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'windfall-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'windfall-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',	
				'selectors' => [
					'{{WRAPPER}} caption-wrap-inner' => 'text-align: {{VALUE}};',
				],			
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__( 'Slider Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'content_align',
			[
				'label' => __( 'Content Alignment', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Title - Content', 'windfall-core' ),
					'style-two' => esc_html__( 'Content - Title', 'windfall-core' ),
				],
				'default' => 'style-one',
			]
		);
		$repeater->add_control(
			'slider_title',
			[
				'label' => esc_html__( 'Slider title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide title here', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'slider_content',
			[
				'label' => esc_html__( 'Slider content', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type slide content here', 'windfall-core' ),
			]
		);
		$repeater->start_controls_tabs( 'button_optn' );
		$repeater->start_controls_tab(
			'button_one',
			[
				'label' => esc_html__( 'Button One', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'btn_txt',
			[
				'label' => esc_html__( 'Button One Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button One Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->end_controls_tab();  // end:Button One tab
		$repeater->start_controls_tab(
			'button_two',
			[
				'label' => esc_html__( 'Button Two', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'btn_two_txt',
			[
				'label' => esc_html__( 'Button Two Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'button_two_link',
			[
				'label' => esc_html__( 'Button Two Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->end_controls_tab();  // end:Button Two tab
		$repeater->end_controls_tabs();		

		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__( 'Slider Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slider_title' => esc_html__( 'Item #1', 'windfall-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ slider_title }}}',
			]
		);		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_animation',
			[
				'label' => __( 'Slider Animation', 'windfall-core' ),
			]
		);
		$this->add_control(
			'title_entrance_animation',
			[
				'label' => esc_html__( 'Title Entrance Animation', 'windfall-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'content_entrance_animation',
			[
				'label' => esc_html__( 'Content Entrance Animation', 'windfall-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		$this->add_control(
			'button_entrance_animation',
			[
				'label' => esc_html__( 'Button One Entrance Animation', 'windfall-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);		
		$this->add_control(
			'button_two_entrance_animation',
			[
				'label' => esc_html__( 'Button Two Entrance Animation', 'windfall-core' ),
				'type' => Controls_Manager::ANIMATION,
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__( 'Carousel Options', 'windfall-core' ),
			]
		);
		
		$this->add_control(
			'carousel_autoplay_timeout',
			[
				'label' => __( 'Auto Play Timeout', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
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
			'carousel_autoplay_interaction',
			[
				'label' => esc_html__( 'Disable Autoplay on Interaction', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable autoplay on interaction, enable it.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'clickable_pagi',
			[
				'label' => esc_html__( 'Pagination Dots Clickable?', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want pagination dots clickable, enable it.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'carousel_speed',
			[
				'label' => __( 'Auto Play Speed', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'carousel_effect',
			[
				'label' => __( 'Slider Effect', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'fade' => esc_html__( 'Fade', 'windfall-core' ),
					'slide' => esc_html__( 'Slide', 'windfall-core' ),
					'cube' => esc_html__( 'Cube', 'windfall-core' ),
					'coverflow' => esc_html__( 'Coverflow', 'windfall-core' ),
				],
				'default' => 'fade',
				'description' => esc_html__( 'Select your slider navigation style.', 'windfall-core' ),
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
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'General', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'slider_height',
			[
				'label' => esc_html__( 'Slider Height', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 900,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-container' => 'height: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_btm_space',
			[
				'label' => esc_html__( 'Bottom Space', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .caption-wrap-inner' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Title
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
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .caption-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .caption-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'slider_content_typography',
				'selector' => '{{WRAPPER}} .caption-subtitle',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .caption-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Button One Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button One', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} a.btn-one.wndfal-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__( 'Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .btn-one.wndfal-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn-one.wndfal-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn-one.wndfal-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_style' );
			$this->start_controls_tab(
				'button_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-one.wndfal-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-one.wndfal-btn .btn-text-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'button_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'button_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-one.wndfal-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-one.wndfal-btn:hover .btn-text-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-one.wndfal-btn:before, {{WRAPPER}} .btn-one.wndfal-btn:after, {{WRAPPER}} .btn-one.wndfal-btn .btn-text-wrap:before, {{WRAPPER}} .btn-one.wndfal-btn .btn-text-wrap:after' => 'background: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Button Two
		$this->start_controls_section(
			'section_button_two_style',
			[
				'label' => esc_html__( 'Button Two', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_two_typography',
				'selector' => '{{WRAPPER}} .btn-two.wndfal-btn',
			]
		);
		$this->add_responsive_control(
			'button_two_min_width',
			[
				'label' => esc_html__( 'Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .btn-two.wndfal-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_two_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_two_style' => array('style-one'),
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn-two.wndfal-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_two_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_two_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .btn-two.wndfal-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'button_two_style' );
			$this->start_controls_tab(
				'button_two_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'button_two_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-two.wndfal-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-two.wndfal-btn .btn-text-wrap, {{WRAPPER}} .btn-two.wndfal-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			
			$this->start_controls_tab(
				'button_two_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'button_two_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-two.wndfal-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-two.wndfal-btn:hover .btn-text-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .btn-two.wndfal-btn:before, {{WRAPPER}} .btn-two.wndfal-btn:after, {{WRAPPER}} .btn-two.wndfal-btn .btn-text-wrap:before, {{WRAPPER}} .btn-two.wndfal-btn .btn-text-wrap:after' => 'background: {{VALUE}};',
					],
				]
			);
			
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Dots
		$this->start_controls_section(
			'section_dot_style',
			[
				'label' => esc_html__( 'Dot', 'obira-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_dots' => 'true',
				],
				'frontend_available' => true,
			]
		);
		$this->add_control(
				'dot_color',
				[
					'label' => esc_html__( 'Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet' => 'background: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Nav
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__( 'Navigation', 'obira-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'carousel_nav' => 'true',
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
					'{{WRAPPER}} .swiper-button-prev,
					{{WRAPPER}} .swiper-button-next' => 'top: {{SIZE}}{{UNIT}} !important;',
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
						'{{WRAPPER}} .swiper-container .swiper-button-prev:before,
						{{WRAPPER}} .swiper-container .swiper-button-next:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-button-prev,
						{{WRAPPER}} .swiper-button-next' => 'background-color: {{VALUE}};',
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
					'label' => esc_html__( 'Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-container .swiper-button-prev:hover:before,
						{{WRAPPER}} .swiper-container .swiper-button-next:hover:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'nav_arrow_hover_bg_color',
				[
					'label' => esc_html__( 'Background Hover Color', 'obira-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .swiper-button-prev:hover,
						{{WRAPPER}} .swiper-button-next:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
			
		$this->end_controls_tabs(); // end tabs		
		$this->end_controls_section();// end: Section
	
	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$carousel_effect = !empty( $settings['carousel_effect'] ) ? $settings['carousel_effect'] : '';

		// Carousel Options
		$swipeSliders_groups = !empty( $settings['swipeSliders_groups'] ) ? $settings['swipeSliders_groups'] : [];
		$carousel_autoplay_timeout = !empty( $settings['carousel_autoplay_timeout'] ) ? $settings['carousel_autoplay_timeout'] : '';
		$carousel_speed = !empty( $settings['carousel_speed'] ) ? $settings['carousel_speed'] : '';

		$carousel_loop  = ( isset( $settings['carousel_loop'] ) && ( 'true' == $settings['carousel_loop'] ) ) ? $settings['carousel_loop'] : 'false';
		$carousel_dots  = ( isset( $settings['carousel_dots'] ) && ( 'true' == $settings['carousel_dots'] ) ) ? true : false;
		$carousel_nav  = ( isset( $settings['carousel_nav'] ) && ( 'true' == $settings['carousel_nav'] ) ) ? true : false;
		$carousel_autoplay  = ( isset( $settings['carousel_autoplay'] ) && ( 'true' == $settings['carousel_autoplay'] ) ) ? true : false;
		$carousel_autoplay_interaction = ( isset( $settings['carousel_autoplay_interaction'] ) && ( 'true' == $settings['carousel_autoplay_interaction'] ) ) ? true : false;
		$clickable_pagi = ( isset( $settings['clickable_pagi'] ) && ( 'true' == $settings['clickable_pagi'] ) ) ? true : false;

		$carousel_mousedrag  = ( isset( $settings['carousel_mousedrag'] ) && ( 'true' == $settings['carousel_mousedrag'] ) ) ? $settings['carousel_mousedrag'] : 'false';
		
		// Carousel Data's
		$carousel_loop = $carousel_loop !== 'true' ? ' data-loop="true"' : ' data-loop="false"';	
		$carousel_autoplay_timeout = $carousel_autoplay_timeout ? ' data-swiper-autoplay='. $carousel_autoplay_timeout .'' : ' data-swiper-autoplay=5000';
		$carousel_speed = $carousel_speed ? ' data-speed="'. $carousel_speed .'"' : ' data-speed="1000"';
		$carousel_autoplay = $carousel_autoplay ? ' data-autoplay="true"' : ' data-autoplay="false"';
		$carousel_autoplay_interaction = $carousel_autoplay_interaction ? ' data-interaction="true"' : ' data-interaction="false"';
		$clickable_pagi = $clickable_pagi ? 'data-clickpage="true"' : ' data-clickpage="false"';
		$carousel_effect = (isset($settings['carousel_effect'])) ? ' data-effect="'.$carousel_effect.'"' : '';
		$carousel_mousedrag = $carousel_mousedrag !== 'true' ? ' data-mousedrag="true"' : ' data-mousedrag="false"';		
		

		$label_entrance_animation = !empty( $settings['label_entrance_animation'] ) ? $settings['label_entrance_animation'] : '';
		$title_entrance_animation = !empty( $settings['title_entrance_animation'] ) ? $settings['title_entrance_animation'] : '';
		$content_entrance_animation = !empty( $settings['content_entrance_animation'] ) ? $settings['content_entrance_animation'] : '';
		$button_entrance_animation = !empty( $settings['button_entrance_animation'] ) ? $settings['button_entrance_animation'] : '';
		$button_two_entrance_animation = !empty( $settings['button_two_entrance_animation'] ) ? $settings['button_two_entrance_animation'] : '';

		// Animation
		$label_entrance_animation = $label_entrance_animation ? $label_entrance_animation : 'fadeInUp';
		$title_entrance_animation = $title_entrance_animation ? $title_entrance_animation : 'fadeInUp';
		$content_entrance_animation = $content_entrance_animation ? $content_entrance_animation : 'fadeInUp';
		$button_entrance_animation = $button_entrance_animation ? $button_entrance_animation : 'fadeInUp';
		$button_two_entrance_animation = $button_two_entrance_animation ? $button_two_entrance_animation : 'fadeInUp';

		// Turn output buffer on
		ob_start();

		 ?>
<div class="swiper-container swiper-slides" <?php echo $carousel_loop . $carousel_autoplay . $carousel_effect . $carousel_speed . $carousel_autoplay_interaction . $clickable_pagi . $carousel_mousedrag; ?>>
  <div class="swiper-wrapper">

    <?php
			if( is_array( $swipeSliders_groups ) && !empty( $swipeSliders_groups ) ){
				foreach ( $swipeSliders_groups as $each_item ) {

					$image_url = wp_get_attachment_url( $each_item['slider_image']['id'] );
					$section_alignment = !empty( $each_item['section_alignment'] ) ? $each_item['section_alignment'] : '';
					$content_align = !empty($each_item['content_align']) ? $each_item['content_align'] : '';
					$slider_title = !empty( $each_item['slider_title'] ) ? $each_item['slider_title'] : '';
					$slider_content = !empty( $each_item['slider_content'] ) ? $each_item['slider_content'] : '';

					$button_text = !empty( $each_item['btn_txt'] ) ? $each_item['btn_txt'] : '';
					$button_link = !empty( $each_item['button_link']['url'] ) ? $each_item['button_link']['url'] : '';
					$button_link_external = !empty( $each_item['button_link']['is_external'] ) ? 'target="_blank"' : '';
					$button_link_nofollow = !empty( $each_item['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$button_link_attr = !empty( $button_link ) ?  $button_link_external.' '.$button_link_nofollow : '';

					$button_two_text = !empty( $each_item['btn_two_txt'] ) ? $each_item['btn_two_txt'] : '';
					$button_two_link = !empty( $each_item['button_two_link']['url'] ) ? $each_item['button_two_link']['url'] : '';
					$button_two_link_external = !empty( $each_item['button_two_link']['is_external'] ) ? 'target="_blank"' : '';
					$button_two_link_nofollow = !empty( $each_item['button_two_link']['nofollow'] ) ? 'rel="nofollow"' : '';
					$button_two_link_attr = !empty( $button_two_link ) ?  $button_two_link_external.' '.$button_two_link_nofollow : '';

					$slide_title = $slider_title ? ' <h1 class="caption-title animated" data-animation="'.esc_attr($title_entrance_animation).'">'.esc_attr($slider_title).'</h1>' : '';
					$slide_content = $slider_content ? ' <h4 class="caption-subtitle animated" data-animation="'.esc_attr($content_entrance_animation).'">'.esc_attr($slider_content).'</h4>' : '';

					if($content_align === 'style-two') {
						$content_actual = $slide_content.$slide_title;
					} else {
						$content_actual = $slide_title.$slide_content;
					}

					$button_one = $button_link ? '<a href="'.esc_url($button_link).'" '.$button_link_attr.' class="btn-one wndfal-btn animated" data-animation="'.esc_attr($button_entrance_animation).'"><span class="btn-text-wrap"><span class="btn-text">'. $button_text .'</span></span></a>' : '<span class="btn-one wndfal-btn animated" data-animation="'.esc_attr($button_entrance_animation).'"><span class="btn-text-wrap"><span class="btn-text">'. $button_text .'</span></span></span>';
					$button_one_actual = $button_text ? $button_one : '';
					$button_two = $button_two_link ? '<a href="'.esc_url($button_two_link).'" '.$button_two_link_attr.' class="btn-two wndfal-btn wndfal-white-btn animated" data-animation="'.esc_attr($button_two_entrance_animation).'"><span class="btn-text-wrap"><span class="btn-text">'. $button_two_text .'</span></span></a>' : '<span class="btn-two wndfal-btn wndfal-white-btn animated" data-animation="'.esc_attr($button_two_entrance_animation).'"><span class="btn-text-wrap"><span class="btn-text">'. $button_two_text .'</span></span></span>';
					$button_two_actual = $button_two_text ? $button_two : '';

					$button_actual = ($button_text || $button_two_text) ? '<div class="wndfal-btns-group">'.$button_one_actual.$button_two_actual.'</div>' : '';

					if($section_alignment === 'center') {
						$align_class = ' center-align';
					} elseif ($section_alignment === 'right') {
						$align_class = ' right-align';
					} else {
						$align_class = ' left-align';
					}
					?>
			    <div class="swiper-slide" style="background-image: url(<?php echo $image_url; ?>);" <?php echo esc_attr( $carousel_autoplay_timeout ); ?>>
	          <div class="caption-wrap">
	            <div class="wndfal-table-wrap">
	              <div class="wndfal-align-wrap">
	                <div class="container">
	                  <div class="caption-wrap-inner <?php echo esc_attr($align_class); ?>">
	                    <?php echo $content_actual.$button_actual; ?>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>							
				<?php }
			} ?>
		</div>
		<?php if($carousel_nav){ ?>
			<div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    <?php } if($carousel_dots) { ?>  
    <div class="swiper-pagination"></div>
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
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Slider() );
