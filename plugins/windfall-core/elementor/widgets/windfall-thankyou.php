<?php
/*
 * Elementor Windfall About Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Thankyoy extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_thankyou';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Thankyou Message', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-check';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Windfall Special Offer widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_thankyou'];
	}
	*/

	/**
	 * Register Windfall Windfall Special Offer widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){

		$this->start_controls_section(
			'section_thankyou',
			[
				'label' => esc_html__( 'Thankyou Options', 'windfall-core' ),
			]
		);

		$this->add_control(
			'select_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-check',
			]
		);
		$this->add_control(
			'thank_title',
			[
				'label' => esc_html__( 'Thankyou Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Thank You!', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_txt',
			[
				'label' => esc_html__( 'Button Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'link_type',
			[
				'label' => __( 'Button Link Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'history' => esc_html__( 'History Link', 'windfall-core' ),
					'custom' => esc_html__( 'Custom Link', 'windfall-core' ),
				],
				'default' => 'history',
				'description' => esc_html__( 'Select your button link type.', 'windfall-core' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [
					'link_type' => array('custom'),
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->end_controls_section();// end: Section

		// Title Style
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
				'name' => 'offer_title_typography',				
				'selector' => '{{WRAPPER}} h3.wndfal-thank-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h3.wndfal-thank-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-thankyou-wrap span.wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-thankyou-wrap span.wndfal-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Section Style
		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__( 'Section', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-thankyou-wrap' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-thankyou-wrap' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-thankyou-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Button Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-thankyou-wrap a.button',
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
					'{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-thankyou-wrap a.button' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-btn .btn-text, {{WRAPPER}} .wndfal-thankyou-wrap a.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-thankyou-wrap a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-thankyou-wrap a.button' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn .btn-text-wrap, {{WRAPPER}} .wndfal-thankyou-wrap a.button' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .wndfal-btn:hover, {{WRAPPER}} .wndfal-thankyou-wrap a.button:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn:hover .btn-text-wrap, {{WRAPPER}} .wndfal-thankyou-wrap a.button:hover' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn:before, {{WRAPPER}} .wndfal-btn:after, {{WRAPPER}} .wndfal-btn .btn-text-wrap:before, {{WRAPPER}} .wndfal-btn .btn-text-wrap:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

	}

	/**
	 * Render About widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$thank_title = !empty( $settings['thank_title'] ) ? $settings['thank_title'] : [];
		$select_icon = !empty( $settings['select_icon'] ) ? $settings['select_icon'] : [];

	  // Button
		$btn_text = !empty( $settings['btn_txt'] ) ? $settings['btn_txt'] : '';
		$btn_link = !empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';
		$btn_external = !empty( $settings['button_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		$link_type = !empty( $settings['link_type'] ) ? $settings['link_type'] : '';

		// Title
		$title_actual = $thank_title ? '<h3 class="wndfal-thank-title">'.$thank_title.'</h3>' : '';
		$icon_actual = $select_icon ? '<span class="wndfal-icon"><i class="'.$select_icon.'" aria-hidden="true"></i></span>' : '';

		// Button Styling
		if($link_type === 'custom') {
			$button_main = $btn_link ? '<a href="'.$btn_link.'" '.$btn_link_attr.' class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></a>' : '<span class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></span>';
		} else {
			$button_main = '<a href="#" onclick="history.go(-1)" class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></a>';
		}
		$button_actual = $btn_text ? '<div class="wndfal-btns-group">'.$button_main.'</div>' : '';

		$output = '<div class="wndfal-thankyou-wrap">'.$icon_actual.$title_actual.$button_actual.'</div>';

		echo $output;

	}

	/**
	 * Render About widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Thankyoy() );
