<?php
/*
 * Elementor Windfall Pricing Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Pricing extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_pricing';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Pricing', 'windfall-core' );
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
	 * Retrieve the list of scripts the Windfall Pricing widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_pricing'];
	}
	*/
	
	/**
	 * Register Windfall Pricing widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_list',
			[
				'label' => esc_html__( 'Pricing Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'service_title',
			[
				'label' => esc_html__( 'Service Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Service', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your service title here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'price_title',
			[
				'label' => esc_html__( 'Price Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Average Price', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your price title here', 'windfall-core' ),
			]
		);
		$this->add_control(
			'duration_title',
			[
				'label' => esc_html__( 'Duration Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Duration', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your duration title here', 'windfall-core' ),
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'service_name',
			[
				'label' => esc_html__( 'Service Name', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'avg_price',
			[
				'label' => esc_html__( 'Price', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'duration',
			[
				'label' => esc_html__( 'Duration', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'select_icon',
			[
				'label' => esc_html__( 'Duration Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-clock-o',
			]
		);
		$this->add_control(
			'pricingItems_groups',
			[
				'label' => esc_html__( 'Pricings', 'windfall-core' ),
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
			'section_pricing_title_style',
			[
				'label' => esc_html__( 'Pricing Table Title', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_title_typography',				
				'selector' => '{{WRAPPER}} .wndfal-pricing .table thead th',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-pricing .table thead th' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-pricing .table thead th' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Pricing Contents
		$this->start_controls_section(
			'section_pricing_items_style',
			[
				'label' => esc_html__( 'Pricing Items', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_text_typography',	
				'selector' => '{{WRAPPER}} .wndfal-pricing .table td',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-pricing .table td, {{WRAPPER}} .wndfal-pricing .table td i' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_odd_bg_color',
			[
				'label' => esc_html__( 'Odd Row Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-pricing .table tbody tr td' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_even_bg_color',
			[
				'label' => esc_html__( 'Even Row Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-pricing .table-striped tbody tr:nth-of-type(2n) td' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Pricing widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$service_title = !empty( $settings['service_title'] ) ? $settings['service_title'] : '';
		$price_title = !empty( $settings['price_title'] ) ? $settings['price_title'] : '';
		$duration_title = !empty( $settings['duration_title'] ) ? $settings['duration_title'] : '';
		$pricingItems_groups = !empty( $settings['pricingItems_groups'] ) ? $settings['pricingItems_groups'] : [];

		$service_title = $service_title ? '<th>'.$service_title.'</th>' : '';
		$price_title = $price_title ? '<th>'.$price_title.'</th>' : '';
		$duration_title = $duration_title ? '<th>'.$duration_title.'</th>' : '';
		
	  $output = '<div class="wndfal-pricing">
							  <div class="container">
							    <div class="wndfal-responsive-table">
							      <table class="table table-striped">
							        <thead>
							          <tr>
							            '.$service_title.$price_title.$duration_title.'
							          </tr>
							        </thead>
							        <tbody>';

		// Group Param Output
		if( is_array( $pricingItems_groups ) && !empty( $pricingItems_groups ) ){
		  foreach ( $pricingItems_groups as $each_item ) {
			$service_name = $each_item['service_name'] ? $each_item['service_name'] : '';
			$avg_price = $each_item['avg_price'] ? $each_item['avg_price'] : '';
			$duration = $each_item['duration'] ? $each_item['duration'] : '';

			$duration_icon = ( $each_item['select_icon'] ) ? $each_item['select_icon'] : '';
			$duration_icon_actual = $duration_icon ? ' <i class="'.$duration_icon.'" aria-hidden="true"></i>' : '';

			$service = $service_name ? '<td>'.$service_name.'</td>' : '';
			$avg_price = $avg_price ? '<td>'.$avg_price.'</td>' : '';
			$duration = $duration ? '<td>'.$duration_icon_actual.$duration.'</td>' : '';
			$pricing_items = '<tr>'.$service.$avg_price.$duration.'</tr>';
			
			$output .= $pricing_items;

		  }
		}

		$output .= '</tbody></table></div></div></div>';

		echo $output;
		
	}

	/**
	 * Render Pricing widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Pricing() );
