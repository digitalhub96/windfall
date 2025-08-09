<?php
/*
 * Elementor Ceremony Blockquote Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Ceremony_Blockquote extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_blockquote';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Blockquote', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-quote-left';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Ceremony Blockquote widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_blockquote'];
	}
	*/
	
	/**
	 * Register Ceremony Blockquote widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_sect_setting',
			[
				'label' => esc_html__( 'Settings', 'windfall-core' ),
			]
		);
		$this->add_control(
			'blockquote_txt',
			[
				'label' => esc_html__( 'Blockquote Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your blockquote text here', 'windfall-core' ),
			]
		);

		$this->add_responsive_control(
			'section_align',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} blockquote p' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_max_width',
			[
				'label' => esc_html__( 'Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 2,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} blockquote' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'blockquote_style',
			[
				'label' => esc_html__( 'Blockquote', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} blockquote p',
			]
		);
		$this->add_control(
			'left_border_color',
			[
				'label' => esc_html__( 'Left Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} blockquote:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Left Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} blockquote' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} blockquote' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} blockquote p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_bottom_space',
			[
				'label' => esc_html__( 'Section Bottom space', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} blockquote' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_top_space',
			[
				'label' => esc_html__( 'Content Top space', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 2,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} blockquote p' => 'padding-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
	}

	/**
	 * Render Section Title widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$blockquote_txt = !empty( $settings['blockquote_txt'] ) ? $settings['blockquote_txt'] : '';
		$section_align = !empty( $settings['section_align'] ) ? $settings['section_align'] : '';

		$styled_class  = ' wndfal-sectTitleElementor ';

		if($section_align === 'left') {
		  $align_cls = 'section-left-align';
		} elseif($section_align === 'right') {
		  $align_cls = 'section-right-align';
		} else {
		  $align_cls = '';
		}

		$blockquote = $blockquote_txt ? '<p>'.$blockquote_txt.'</p>' : '';

		$output = '';
		$output .= '<blockquote class="'.$align_cls.'">'.$blockquote.'</blockquote>';

		echo $output;
		
	}

	/**
	 * Render Section Title widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Ceremony_Blockquote() );
