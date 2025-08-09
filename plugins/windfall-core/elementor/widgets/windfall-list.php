<?php
/*
 * Elementor Windfall List Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_List extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_list';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'List', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-list';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall List widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_list'];
	}
	*/
	
	/**
	 * Register Windfall List widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_list',
			[
				'label' => esc_html__( 'List Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'list_style',
			[
				'label' => esc_html__( 'List Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'one' => esc_html__( 'Style One', 'windfall-core' ),
					'two' => esc_html__( 'Style Two (Check List)', 'windfall-core' ),
				],
				'default' => 'one',
				'description' => esc_html__( 'Select your list style.', 'windfall-core' ),
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_text_link',
			[
				'label' => esc_html__( 'List Text Link', 'windfall-core' ),
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
			'listItems_groups',
			[
				'label' => esc_html__( 'Lists', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_text' => esc_html__( 'Item #1', 'windfall-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_text }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_text_title_style',
			[
				'label' => esc_html__( 'List Text', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_text_typography',				
				'selector' => '{{WRAPPER}} .bullet-list li, {{WRAPPER}} .check-list li, {{WRAPPER}} .bullet-list li a, {{WRAPPER}} .check-list li a',
			]
		);
		$this->add_control(
			'list_bullet_color',
			[
				'label' => esc_html__( 'Bullet Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bullet-list li:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .check-list li:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'list_text_style' );
		$this->start_controls_tab(
			'link_normal',
			[
				'label' => esc_html__( 'Normal', 'windfall-core' ),
			]
		);
		$this->add_control(
			'list_text_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bullet-list li, {{WRAPPER}} .check-list li, {{WRAPPER}} .bullet-list li a, {{WRAPPER}} .check-list li a' => 'color: {{VALUE}};',
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
			'list_text_hover_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bullet-list li a:hover, {{WRAPPER}} .check-list li a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render List widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$list_style = !empty( $settings['list_style'] ) ? $settings['list_style'] : '';
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

		if($list_style === 'two') {
		  $style_cls = 'check-list';
		} else {
		  $style_cls = 'bullet-list';
		}
		
	  $output = '<ul class="'.$style_cls.'">';

		// Group Param Output
		if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		  foreach ( $listItems_groups as $each_list ) {
			$list_text = $each_list['list_text'] ? $each_list['list_text'] : '';

			$list_link = !empty( $each_list['list_text_link']['url'] ) ? $each_list['list_text_link']['url'] : '';
			$list_external = !empty( $each_list['list_text_link']['is_external'] ) ? 'target="_blank"' : '';
			$list_nofollow = !empty( $each_list['list_text_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$list_link_attr = $list_external.' '.$list_nofollow;

			$list_link_actual = $list_link ? '<li><a href="'.esc_url($list_link).'" '.$list_link_attr.'>'.$list_text.'</a></li>' : '<li>'.$list_text.'</li>';
			
			$output .= $list_link_actual;

		  }
		}

		$output .= '</ul>';

		echo $output;
		
	}

	/**
	 * Render List widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_List() );
