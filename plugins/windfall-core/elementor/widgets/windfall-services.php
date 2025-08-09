<?php
/*
 * Elementor Windfall Services Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Services extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_services';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Services', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-plus-circle';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Windfall Services widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_services'];
	}
	*/
	
	/**
	 * Register Windfall Windfall Services widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_services',
			[
				'label' => esc_html__( 'Services Options', 'windfall-core' ),
			]
		);

		$this->add_control(
			'services_style',
			[
				'label' => __( 'Services Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'windfall-core' ),
					'style-two' => esc_html__( 'Style Two', 'windfall-core' ),
				],
				'default' => 'style-one',
			]
		);
		$this->add_control(
			'col_type',
			[
				'label' => __( 'Column Option', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-3' => esc_html__( '3 Column', 'windfall-core' ),
					'col-2' => esc_html__( '2 Column', 'windfall-core' ),
					'col-4' => esc_html__( '4 Column', 'windfall-core' ),
				],
				'default' => 'col-3',
			]
		);
		$this->add_responsive_control(
			'services_align',
			[
				'label' => esc_html__( 'Alignment', 'windfall-core' ),
				'type' => Controls_Manager::CHOOSE,
				'frontend_available' => true,
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
					'{{WRAPPER}} .service-item' => 'text-align: {{VALUE}};',
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'windfall-core' ),
					'icon' => esc_html__( 'Icon', 'windfall-core' ),
				],
				'default' => 'icon',
			]
		);
		$repeater->add_control(
			'services_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
				'condition' => [
					'icon_type' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'services_icon_image',
			[
				'label' => esc_html__( 'Upload Icon Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'condition' => [
					'icon_type' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your icon image.', 'windfall-core'),
			]
		);
		$repeater->add_control(
			'services_icon_image_hover',
			[
				'label' => esc_html__( 'Upload Hover Icon Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'condition' => [
					'icon_type' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your hover icon image.(It Will apply only for style one)', 'windfall-core'),
			]
		);
		$repeater->add_control(
			'services_title',
			[
				'label' => esc_html__( 'Services Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'windfall-core' ),
				'default' => esc_html__( 'Service Title', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'services_title_link',
			[
				'label' => esc_html__( 'Services Title Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'label_block' => true,
				'show_external' => true,
				'default' => [
					'url' => '',
				],
			]
		);
		$repeater->add_control(
			'services_content',
			[
				'label' => esc_html__( 'Services Content', 'windfall-core' ),
				'default' => esc_html__( 'your content text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type btn text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Button Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'overlay',
			[
				'label' => esc_html__( 'Overlay', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want overlay, enable it.(It will apply for style two only)', 'windfall-core' ),
			]
		);
		
		$this->add_control(
			'services',
			[
				'label' => esc_html__( 'Services Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'services_title' => esc_html__( 'Service Title', 'windfall-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ services_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section
		
		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Box', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'services_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .services-style-three .service-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_margin',
			[
				'label' => __( 'Margin', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .services-style-three .service-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-style-three .service-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__( 'Border', 'windfall-core' ),
				'selector' => '{{WRAPPER}} .feature-item',
			]
		);
		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'condition' => [
					'btn_style' => array('style-one'),
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .services-style-three .service-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				'selector' => '{{WRAPPER}} .service-title',
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
						'{{WRAPPER}} .service-title, {{WRAPPER}} .service-title a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .service-title a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Content Style
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
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .service-item p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item p' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wndfal-services .wndfal-btn',
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
					'{{WRAPPER}} .wndfal-services .wndfal-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-services .wndfal-btn .btn-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-services .wndfal-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wndfal-services .wndfal-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-services .wndfal-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'butn_border_color',
				[
					'label' => esc_html__( 'Border Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-border-btn .btn-text' => 'border-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'windfall-core' ),
					'selector' => '{{WRAPPER}} .wndfal-services .wndfal-btn',
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
						'{{WRAPPER}} .wndfal-services .wndfal-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-services .wndfal-btn:hover' => 'background-color: {{VALUE}};',
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
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'button_hover_border',
					'label' => esc_html__( 'Border', 'windfall-core' ),
					'selector' => '{{WRAPPER}} .wndfal-services .wndfal-btn:hover',
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Services widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$services = !empty( $settings['services'] ) ? $settings['services'] : [];
		$services_style = !empty( $settings['services_style'] ) ? $settings['services_style'] : [];
		$services_align = !empty($settings['services_align']) ? $settings['services_align'] : [];
		$column = !empty( $settings['col_type'] ) ? $settings['col_type'] : [];

		if($services_style === 'style-two') {
		  $style_cls = ' services-style-three';
		} else {
		  $style_cls = '';
		}

		if($column === 'col-2') {
		  $col_cls = 'col-lg-6 col-md-12';
		} elseif ($column === 'col-4') {
		  $col_cls = 'col-lg-3 col-md-12';
		} else {
		  $col_cls = 'col-lg-4 col-md-12';
		}

		if($services_align === 'right') {
			$align_cls = ' service-rigth-align';
		} elseif($services_align === 'center') {
			$align_cls = ' service-center-align';
		} else {
			$align_cls = ' service-left-align';
		}
		
		$output = '<div class="wndfal-services'.$style_cls.$align_cls.'"><div class="container">';
		if($services_style === 'style-two') {
			$output .= '<div class="services-wrap">';
		}
		$output .= '<div class="row">';

		// Group Param Output
		if( is_array( $services ) && !empty( $services ) )
		foreach ( $services as $each_logo ) {

		  $title = !empty( $each_logo['services_title'] ) ? $each_logo['services_title'] : '';
		  $title_link = !empty( $each_logo['services_title_link']['url'] ) ? $each_logo['services_title_link']['url'] : '';
			$title_external = !empty( $each_logo['services_title_link']['is_external'] ) ? 'target="_blank"' : '';
			$title_nofollow = !empty( $each_logo['services_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$title_link_attr = $title_external.' '.$title_nofollow;
			
			// Button One
			$btn_text = !empty( $each_logo['btn_text'] ) ? $each_logo['btn_text'] : '';
			$btn_link = !empty( $each_logo['btn_link']['url'] ) ? $each_logo['btn_link']['url'] : '';
			$btn_external = !empty( $each_logo['btn_link']['is_external'] ) ? 'target="_blank"' : '';
			$btn_nofollow = !empty( $each_logo['btn_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		  $image_url = wp_get_attachment_url( $each_logo['services_icon_image']['id'] );
		  $alt = get_post_meta($each_logo['services_icon_image']['id'], '_wp_attachment_image_alt', true);
		  $hover_image_url = wp_get_attachment_url( $each_logo['services_icon_image_hover']['id'] );
		  $content = !empty( $each_logo['services_content'] ) ? $each_logo['services_content'] : '';
		  $icon_type = !empty( $each_logo['icon_type'] ) ? $each_logo['icon_type'] : '';
		  $icon = !empty( $each_logo['services_icon'] ) ? $each_logo['services_icon'] : '';
		  $overlay = !empty( $each_logo['overlay'] ) ? $each_logo['overlay'] : '';

		  $feature_icon = $icon ? ' <i class="'.$icon.'" aria-hidden="true"></i>' : '';

		  $button_one = $btn_link ? '<a href="'.$btn_link.'" '.$btn_link_attr.' class="wndfal-btn wndfal-border-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></a>' : '<span class="wndfal-btn wndfal-border-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></span>';
			$button_actual = $btn_text ? $button_one : '';

		  $icon_image = $image_url ? '<img src="'.$image_url.'" width="62" alt="'.$alt.'" class="default-image">' : '';
		  $hover_icon_image = $hover_image_url ? '<img src="'.$hover_image_url.'" width="62" alt="'.$alt.'" class="hover-image">' : '';
		  $services_content = $content ? '<p>'.$content.'</p>' : '';

		  if($icon_type === 'icon') {
			  $features_image = $feature_icon;
			} else {
			  $features_image = $icon_image.$hover_icon_image;
			}

			$services_title_link = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a>' : $title;
			$services_title = $title ? '<h3 class="service-title">'.$services_title_link.'</h3>' : '';

			if($overlay) {
				$overlay_cls = ' wndfal-overlay';
			} else {
				$overlay_cls = '';
			}

			if ($services_style === 'style-two') {
				$output .= '<div class="'.$col_cls.' service-item-wrap">
										  <div class="service-item '.$overlay_cls.'">
										    <div class="wndfal-icon">'.$features_image.'</div>
										    <div class="service-info">
										      '.$services_title.'
										      '.$services_content.'
										      <div class="wndfal-btns-group">
										        '.$button_actual.'
										      </div>
										    </div>
										  </div>
										</div>';
			} else {
		  	$output .= '<div class="'.$col_cls.'">
							        <div class="service-item">
							          <div class="wndfal-icon">
							            '.$features_image.'
							          </div>
							          '.$services_title.'
							          '.$services_content.'
							          <div class="wndfal-btns-group">
									        '.$button_actual.'
									      </div>
							        </div>
							      </div>';
			}

		}

		$output .= '</div></div></div>';
		if($services_style === 'style-two') {
			$output .= '</div>';
		}

		echo $output;
		
	}

	/**
	 * Render Services widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Services() );
