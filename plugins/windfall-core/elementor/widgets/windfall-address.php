<?php
/*
 * Elementor Windfall Address Info Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_AddressInfo extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_address_info';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Address Info', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-address-book';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Address Info widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_list'];
	}
	*/

	/**
	 * Register Windfall Address Info widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){

		$this->start_controls_section(
			'section_address_info',
			[
				'label' => esc_html__( 'Address Info Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'address_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'address_text',
			[
				'label' => esc_html__( 'Address', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter address text here', 'windfall-core' ),
				'label_block' => true,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'list_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'ti-location-pin',
			]
		);
		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'List Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item title here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_text',
			[
				'label' => esc_html__( 'Link Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter item link text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_title_link',
			[
				'label' => esc_html__( 'Text Link', 'windfall-core' ),
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
			'listItems_groups',
			[
				'label' => esc_html__( 'Mail Info', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'list_title' => esc_html__( 'Item #1', 'windfall-core' ),
					],

				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_address_info_title_style',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasadd_title_typography',				
				'selector' => '{{WRAPPER}} .contact-info .section-title',
			]
		);
		$this->add_control(
			'list_title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info .section-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_address_info_cont_style',
			[
				'label' => esc_html__( 'Content', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_content_typography',
				'selector' => '{{WRAPPER}} .contact-info .section-title-wrap p',
			]
		);
		$this->add_control(
			'list_content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info .section-title-wrap p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Icon
		$this->start_controls_section(
			'section_address_info_icon_style',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_icon_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info ul li i' => 'color: {{VALUE}};',
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
						'min' => 33,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .contact-info ul li .wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_width',
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
					'{{WRAPPER}} .contact-info ul li .wndfal-icon' => 'width: calc({{SIZE}}{{UNIT}} + 15px);',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_text_link_style',
			[
				'label' => esc_html__( 'Links', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_text_typography',
				'selector' => '{{WRAPPER}} .contact-info ul li',
			]
		);
		$this->add_control(
			'link_title_color',
			[
				'label' => esc_html__( 'Title Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-inner-info span.list-title' => 'color: {{VALUE}};',
				],
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
			'link_text_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-inner-info a, {{WRAPPER}} .contact-inner-info' => 'color: {{VALUE}};',
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
			'link_text_color_hov',
			[
				'label' => esc_html__( 'Hover Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-inner-info a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Address Info widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$address_title = !empty( $settings['address_title'] ) ? $settings['address_title'] : [];
		$address_text = !empty( $settings['address_text'] ) ? $settings['address_text'] : [];
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];

		$address_title = $address_title ? '<h2 class="section-title">'.$address_title.'</h2>' : '';
		$address_text = $address_text ? '<p>'.$address_text.'</p>' : '';

	  $output = '<div class="wndfal-contact">
				        <div class="contact-info">
				          <div class="section-title-wrap title-style-two">
				            '.$address_title.$address_text.'
				          </div>
				          <ul>';
                    // Group Param Output
										if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
										  foreach ( $listItems_groups as $each_list ) {

										  $list_title = !empty( $each_list['list_title'] ) ? $each_list['list_title'] : '';
										  $icon = !empty( $each_list['list_icon'] ) ? $each_list['list_icon'] : '';
										  $list_text = !empty( $each_list['list_text'] ) ? $each_list['list_text'] : '';
										  $list_title_link = !empty( $each_list['list_title_link']['url'] ) ? $each_list['list_title_link']['url'] : '';
											$list_title_link_external = !empty( $each_list['list_title_link']['is_external'] ) ? 'target="_blank"' : '';
											$list_title_link_nofollow = !empty( $each_list['list_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
											$list_title_link_attr = !empty( $list_title_link ) ?  $list_title_link_external.' '.$list_title_link_nofollow : '';

											$list_icon = $icon ? ' <div class="wndfal-icon"><i class="'.$icon.'" aria-hidden="true"></i></div>' : '';
											$list_title_actual = $list_title ? '<span class="list-title">'.$list_title.'</span>' : '';
											$list_txt = $list_title_link ? '<a href="'.$list_title_link.'" '.$list_title_link_attr.'>'.$list_text.'</a>' : $list_text;

										  $output .= '<li>'.$list_icon.'<div class="contact-inner-info">'.$list_title_actual.$list_txt.'</div></li>';
										  }
										}

      $output .= '</ul></div></div>';

		echo $output;

	}

	/**
	 * Render Address Info widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_AddressInfo() );
