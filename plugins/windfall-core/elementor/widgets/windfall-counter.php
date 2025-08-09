<?php
/*
 * Elementor Windfall Counter Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Counter extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_counter';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Counter', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-sort-numeric-asc';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Counter widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-windfall_counter'];
	}
	
	/**
	 * Register Windfall Counter widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_counter',
			[
				'label' => esc_html__( 'Counter Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'counter_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'counter_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Default title', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your counter title here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'counter_value',
			[
				'label' => esc_html__( 'Value', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 100,
				'description' => esc_html__( 'Type your counter value here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'counter_value_in',
			[
				'label' => esc_html__( 'Value In', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( '+', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your counter value here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'counter_delay',
			[
				'label' => esc_html__( 'Counter Delay', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your counter delay. Eg:1,2,10 etc.,', 'windfall-core' ),
			]
		);
		$this->add_control(
			'counter_time',
			[
				'label' => esc_html__( 'Counter Time', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your counter time. Eg:1000,2000 etc.,', 'windfall-core' ),
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_title!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .wndfal-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_value_style',
			[
				'label' => esc_html__( 'Value', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_value!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_typography',
				'selector' => '{{WRAPPER}} .wndfal-counter',
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-counter' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_value_in_style',
			[
				'label' => esc_html__( 'Value In', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_value_in!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'value_in_typography',
				'selector' => '{{WRAPPER}} .wndfal-counter span',
			]
		);
		$this->add_control(
			'value_in_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-counter span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_icon!' => '',
				],
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stats-item .wndfal-icon i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .stats-item .wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
	}

	/**
	 * Render Counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$icon = !empty( $settings['counter_icon'] ) ? $settings['counter_icon'] : '';
		$counter_title = !empty( $settings['counter_title'] ) ? $settings['counter_title'] : '';
		$counter_value = !empty( $settings['counter_value'] ) ? $settings['counter_value'] : '';
		$counter_value_in = !empty( $settings['counter_value_in'] ) ? $settings['counter_value_in'] : '';
		$need_border  = ( isset( $settings['need_border'] ) && ( 'true' == $settings['need_border'] ) ) ? true : false;
		$counter_delay = !empty( $settings['counter_delay'] ) ? $settings['counter_delay'] : '';
		$counter_time = !empty( $settings['counter_time'] ) ? $settings['counter_time'] : '';

		$counter_icon_actual = $icon ? ' <div class="wndfal-icon"><i class="'.$icon.'"></i></div>' : '';

		// Counter Options
    $counter_delay = $counter_delay ? ' data-delay="'. $counter_delay .'"' : ' data-delay="1"';
    $counter_time = $counter_time ? ' data-time="'. $counter_time .'"' : ' data-time="1000"';
		
		// Counter Title
		$counter_title = $counter_title ? '<h5 class="wndfal-title">'.$counter_title.'</h5>' : '';

		$value_in = $counter_value_in ? '<span>'.$counter_value_in.'</spamn>' : '';

		// Value
		$counter_value = $counter_value ? '<h2 class="wndfal-counter" '.$counter_delay.$counter_time.'>'.$counter_value.$value_in.'</h2>' : '';

		// Counters
		$output = '<div class="wndfal-stats stats-style-two"><div class="stats-wrap"><div class="stats-item">'.$counter_icon_actual.$counter_value.$counter_title.'</div></div></div>';

		// Output
		echo $output;
		
	}

	/**
	 * Render Counter widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	 
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Counter() );
