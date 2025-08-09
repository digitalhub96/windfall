<?php
/*
 * Elementor Windfall Intro Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Intro extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_intro';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Intro', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-shield';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Intro widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-windfall_intro'];
	}
	
	/**
	 * Register Windfall Intro widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_intro',
			[
				'label' => esc_html__( 'Intro Options', 'windfall-core' ),
			]
		);
		
		$repeater = new Repeater();
		$repeater->add_control(
			'intro_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'intro_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
			]
		);
		$repeater->add_control(
			'intro_link',
			[
				'label' => esc_html__( 'Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'intros_groups',
			[
				'label' => esc_html__( 'Intro Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'intro_title' => esc_html__( 'Item #1', 'windfall-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ intro_title }}}',
			]
		);
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
				'name' => 'sasfea_title_typography',
				'selector' => '{{WRAPPER}} .intro-title',
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
						'{{WRAPPER}} .intro-title' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .wndfal-hover .intro-title' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Background Style
		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__( 'Background', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'bg_style' );
			$this->start_controls_tab(
					'bg_normal',
					[
						'label' => esc_html__( 'Normal', 'windfall-core' ),
					]
				);
			$this->add_control(
				'bg_color',
				[
					'label' => esc_html__( 'Background', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-intro' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'bg_hover',
					[
						'label' => esc_html__( 'Hover', 'windfall-core' ),
					]
				);
			$this->add_control(
				'bg_hover_color',
				[
					'label' => esc_html__( 'Background', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item.wndfal-hover' => 'background: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
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
					'{{WRAPPER}} .wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 33,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-icon' => 'width: calc({{SIZE}}{{UNIT}} + 15px);height: calc({{SIZE}}{{UNIT}} + 15px);',
				],
			]
		);
		$this->start_controls_tabs( 'iconn_style' );
			$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'windfall-core' ),
					]
				);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-icon i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'windfall-core' ),
					]
				);
			$this->add_control(
				'icon_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .intro-item.wndfal-hover .wndfal-icon i' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	

		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Intro widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$intros_groups = !empty( $settings['intros_groups'] ) ? $settings['intros_groups'] : [];

		$output = '<div class="wndfal-intro"><div class="container"><div class="row align-items-center">';

		// Group Param Output
		if( is_array( $intros_groups ) && !empty( $intros_groups ) ){
			foreach ( $intros_groups as $each_item ) {
				$intro_title = !empty( $each_item['intro_title'] ) ? $each_item['intro_title'] : '';
				$intro_link = !empty( $each_item['intro_link']['url'] ) ? $each_item['intro_link']['url'] : '';
				$icon = !empty( $each_item['intro_icon'] ) ? $each_item['intro_icon'] : '';
				$intro_link_external = !empty( $each_item['intro_link']['is_external'] ) ? 'target="_blank"' : '';
				$intro_link_nofollow = !empty( $each_item['intro_link']['nofollow'] ) ? 'rel="nofollow"' : '';
				$intro_link_attr = !empty( $intro_link ) ?  $intro_link_external.' '.$intro_link_nofollow : '';

        $intro_icon = $icon ? '<span class="wndfal-icon"><i class="'.$icon.'" aria-hidden="true"></i></span>' : '';
        $title = $intro_title ? '<span class="intro-title">'.$intro_title.'</span>' : '';

			  if ($each_item['intro_link']['url']) {
				$output .= '<div class="col-lg-4"><a href="'. $each_item['intro_link']['url'] .'" class="intro-item">'.$intro_icon.$title.'</a></div>';
			  } else {
				$output .= '<div class="col-lg-4"><div class="intro-item">'.$intro_icon.$title.'</div></div>';
			  }
			}
		}
		$output .= '</div></div></div>';

		echo $output;
		
	}

	/**
	 * Render Intro widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Intro() );
