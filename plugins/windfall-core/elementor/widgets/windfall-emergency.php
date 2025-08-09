<?php
/*
 * Elementor Windfall Emergency Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Emergency extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_emergency';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Emergency', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-header';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Emergency widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_emergency'];
	}
	*/
	
	/**
	 * Register Windfall Emergency widget controls.
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
			'emergency_style',
			[
				'label' => __( 'Emergency Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'windfall-core' ),
					'style-two' => esc_html__( 'Style Two', 'windfall-core' ),
					'style-three' => esc_html__( 'Style Three', 'windfall-core' ),
				],
				'default' => 'style-one',
			]
		);
		$this->add_control(
			'emergency_text',
			[
				'label' => esc_html__( 'Emergency Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Emergency Content', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your emergency text here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'emergency_link_text',
			[
				'label' => esc_html__( 'Emergency Link Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Emergency Link Text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your emergency link text here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'emergency_link',
			[
				'label' => esc_html__( 'Emergency Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$this->add_control(
			'link_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'section_max_width',
			[
				'label' => esc_html__( 'Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 100,
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
					'{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Text', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',				
				'selector' => '{{WRAPPER}} .emergency-title, {{WRAPPER}} .services-emergency-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .emergency-title, {{WRAPPER}} .services-emergency-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Link Style
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .emergency-title a, {{WRAPPER}} .emergency-call-link a, {{WRAPPER}} .services-emergency span a',
			]
		);
		$this->start_controls_tabs( 'title_style' );
			$this->start_controls_tab(
					'link_normal',
					[
						'label' => esc_html__( 'Normal', 'windfall-core' ),
					]
				);
			$this->add_control(
				'link_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .emergency-title a, {{WRAPPER}} .emergency-call-link a, {{WRAPPER}} .services-emergency span a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'link_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services-emergency span' => 'background: {{VALUE}};',
					],
					'condition' => [
						'emergency_style' => 'style-three',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'link_hover',
					[
						'label' => esc_html__( 'Hover', 'windfall-core' ),
					]
				);
			$this->add_control(
				'link_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .emergency-title a:hover, {{WRAPPER}} .emergency-call-link a:hover, {{WRAPPER}} .services-emergency span a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'link_icon!' => '',
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
					'{{WRAPPER}} .wndfal-emergency i, {{WRAPPER}} .services-emergency span i' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .wndfal-emergency i, {{WRAPPER}} .services-emergency span i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
	}

	/**
	 * Render Emergency widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$emergency_style = !empty ($settings['emergency_style']) ? $settings['emergency_style'] : '';
		$emergency_text = !empty( $settings['emergency_text'] ) ? $settings['emergency_text'] : '';
		$emergency_link_text = !empty( $settings['emergency_link_text'] ) ? $settings['emergency_link_text'] : '';
		$icon = !empty( $settings['link_icon'] ) ? $settings['link_icon'] : '';

		$emerg_link = !empty( $settings['emergency_link']['url'] ) ? $settings['emergency_link']['url'] : '';
		$emerg_external = !empty( $settings['emergency_link']['is_external'] ) ? 'target="_blank"' : '';
		$emerg_nofollow = !empty( $settings['emergency_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$emerg_link_attr = $emerg_external.' '.$emerg_nofollow;

		$emerg_link_actual = $emerg_link ? '<a href="'.esc_url($emerg_link).'" '.$emerg_link_attr.'>'.$emergency_link_text.'</a>' : '<span>'.$emergency_link_text.'</span>';

		$link_icon_actual = $icon ? ' <i class="'.$icon.'" aria-hidden="true"></i> ' : '';

		if($emergency_style === 'style-two') {
			$text = $emergency_text ? '<h2 class="emergency-title">'.$emergency_text.'</h2><div class="emergency-call-link">'.$link_icon_actual.$emerg_link_actual.'</div>' : '';
		} else {
			$text = $emergency_text ? '<h2 class="emergency-title">'.$emergency_text.$link_icon_actual.$emerg_link_actual.'</h2>' : '';
		}

		if($emergency_style === 'style-two') {
			$style_class = ' emergency-style-two';
		} else {
			$style_class = '';
		}

		$output = '';
		if($emergency_style === 'style-three') {
			$output .= '<div class="services-emergency"><h3 class="services-emergency-title">'.$emergency_text.'</h3><span>'.$link_icon_actual.$emerg_link_actual.'</span></div>';
		} else {
			$output .= '<div class="wndfal-emergency '.$style_class.'"><div class="container">'.$text.'</div></div>';
		}

		echo $output;
		
	}

	/**
	 * Render Emergency widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Emergency() );
