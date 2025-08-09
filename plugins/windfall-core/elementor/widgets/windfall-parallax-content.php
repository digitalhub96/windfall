<?php
/*
 * Elementor Windfall Parallax Content Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Parallax_Content extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_parallax_content';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Parallax Content', 'windfall-core' );
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
	 * Retrieve the list of scripts the Windfall Parallax Content widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_parallax_content'];
	}
	*/
	
	/**
	 * Register Windfall Parallax Content widget controls.
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
			'section_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Parallax Content', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__( 'This is Content text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your content text here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'parallax_image',
			[
				'label' => esc_html__( 'Parallax Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'selectors' => [
					'{{WRAPPER}} .wndfal-reliable' => 'background-image: url({{url}});',
				],
				
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
					'{{WRAPPER}} .wndfal-reliable' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} .wndfal-reliable .container' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_one',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Button One</b></div>',
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
			]
		);
		$this->add_control(
			'button_two',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<div class="elementor-control-raw-html elementor-panel-alert elementor-panel-alert-warning"><b>Button Two</b></div>',
			]
		);
		$this->add_control(
			'border_btn',
			[
				'label' => esc_html__( 'Border Button?', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
			]
		);
		$this->add_control(
			'btn_two_txt',
			[
				'label' => esc_html__( 'Button Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'button_two_link',
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
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_overlay_style',
			[
				'label' => esc_html__( 'Overlay', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-reliable.wndfal-overlay:before' => 'background: {{VALUE}};',
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .reliable-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .reliable-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => esc_html__( 'Title Bottom space', 'windfall-core' ),
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
					'{{WRAPPER}} .reliable-title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
				
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
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .wndfal-reliable p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-reliable p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();// end: Section

		// Button Style
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
				'selector' => '{{WRAPPER}} .wndfal-btn.btn-one',
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
					'{{WRAPPER}} .wndfal-btn.btn-one' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-btn.btn-one .btn-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-btn.btn-one' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wndfal-btn.btn-one' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn.btn-one .btn-text-wrap' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .wndfal-btn.btn-one:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn.btn-one:hover .btn-text-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn.btn-one:before, {{WRAPPER}} .wndfal-btn.btn-one:after, {{WRAPPER}} .wndfal-btn.btn-one .btn-text-wrap:before, {{WRAPPER}} .wndfal-btn.btn-one .btn-text-wrap:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Button Two Style
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
				'selector' => '{{WRAPPER}} .wndfal-btn.btn-two',
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
					'{{WRAPPER}} .wndfal-btn.btn-two' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_two_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-btn.btn-two .btn-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_two_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-btn.btn-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wndfal-btn.btn-two' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn.btn-two .btn-text-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_border_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-border-btn.btn-two .btn-text' => 'border-color: {{VALUE}};',
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
						'{{WRAPPER}} .wndfal-btn.btn-two:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn.btn-two:hover .btn-text-wrap' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_two_border_hover_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn.btn-two:before, {{WRAPPER}} .wndfal-btn.btn-two:after, {{WRAPPER}} .wndfal-btn.btn-two .btn-text-wrap:before, {{WRAPPER}} .wndfal-btn.btn-two .btn-text-wrap:after' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Parallax Content widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$section_title = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
		$section_content = !empty( $settings['section_content'] ) ? $settings['section_content'] : '';
		$section_align = !empty( $settings['section_align'] ) ? $settings['section_align'] : '';

		// Button One
		$btn_text = !empty( $settings['btn_txt'] ) ? $settings['btn_txt'] : '';
		$btn_link = !empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';
		$btn_external = !empty( $settings['button_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		// Button Two
		$border_btn = !empty($settings['border_btn']) ? $settings['border_btn'] : '';
		$btn_two_text = !empty( $settings['btn_two_txt'] ) ? $settings['btn_two_txt'] : '';
		$btn_two_link = !empty( $settings['button_two_link']['url'] ) ? $settings['button_two_link']['url'] : '';
		$btn_external_two = !empty( $settings['button_two_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow_two = !empty( $settings['button_two_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_two_link_attr = !empty( $btn_two_link ) ?  $btn_external_two.' '.$btn_nofollow_two : '';

		if($border_btn) {
			$btn_class = ' wndfal-border-btn';
		} else {
			$btn_class = ' wndfal-white-btn';
		}

		// Button One Styling
		$button_main = $btn_link ? '<a href="'.$btn_link.'" '.$btn_link_attr.' class="wndfal-btn btn-one"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></a>' : '<span class="wndfal-btn btn-one"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></span>';
		$button_actual = $btn_text ? $button_main : '';

		// Button Two Styling
		$button_two_main = $btn_two_link ? '<a href="'.$btn_two_link.'" '.$btn_two_link_attr.' class="wndfal-btn '.$btn_class.' btn-two"><span class="btn-text-wrap"><span class="btn-text">'.$btn_two_text.'</span></span></a>' : '<span class="wndfal-btn '.$btn_class.' btn-two"><span class="btn-text-wrap"><span class="btn-text">'.$btn_two_text.'</span></span></span>';
		$button_two_actual = $btn_two_text ? $button_two_main : '';

		if($button_actual || $button_two_actual) {
			$btn_actual = '<div class="wndfal-btns-group">'.$button_actual.$button_two_actual.'</div>';
		} else {
			$btn_actual = '';
		}

		if($section_align === 'left') {
		  $align_cls = 'section-left-align';
		} elseif($section_align === 'right') {
		  $align_cls = 'section-right-align';
		} else {
		  $align_cls = '';
		}

		$sec_title = $section_title ? '<h2 class="reliable-title">'.$section_title.'</h2>' : '';
		$sec_content = $section_content ? '<p>'.$section_content.'</p>' : '';

		$output = '';
		$output .= '<div class="wndfal-reliable wndfal-parallax wndfal-overlay '.$align_cls.'">
								  <div class="container">
								    '.$sec_title.$sec_content.'
								    '.$btn_actual.'
								  </div>
								</div>';

		echo $output;
		
	}

	/**
	 * Render Parallax Content widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Parallax_Content() );
