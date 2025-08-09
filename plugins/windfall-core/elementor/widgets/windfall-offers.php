<?php
/*
 * Elementor Windfall Offers Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Offer extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_offer';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Offers', 'windfall-core' );
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
	 * Retrieve the list of scripts the Windfall Windfall Offers widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_offer'];
	}
	*/
	
	/**
	 * Register Windfall Windfall Offers widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_offers',
			[
				'label' => esc_html__( 'Offers Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'offers_style',
			[
				'label' => __( 'Offers Style', 'windfall-core' ),
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
				'condition' => [
					'offers_style' => array('style-two'),
				],
				'default' => 'col-3',
			]
		);
	
		$repeater = new Repeater();

		$repeater->add_control(
			'offers_image',
			[
				'label' => esc_html__( 'Upload Service Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Set your offer featured image.', 'windfall-core'),
			]
		);
		$repeater->add_control(
			'offer_icon_type',
			[
				'label' => __( 'Icon Image Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'image' => esc_html__( 'Image', 'windfall-core' ),
					'icon' => esc_html__( 'Icon', 'windfall-core' ),
				],
				'default' => 'icon',
			]
		);
		$repeater->add_control(
			'offers_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
				'condition' => [
					'offer_icon_type' => 'icon',
				],
				'description' => esc_html__( 'Icon will display only in style one.', 'windfall-core'),
			]
		);
		$repeater->add_control(
			'offers_icon_image',
			[
				'label' => esc_html__( 'Upload Icon Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'condition' => [
					'offer_icon_type' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Icon will display only in style one.', 'windfall-core'),
			]
		);
		$repeater->add_control(
			'offers_title',
			[
				'label' => esc_html__( 'Offers Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'windfall-core' ),
				'default' => esc_html__( 'Access Conversations', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'offers_title_link',
			[
				'label' => esc_html__( 'Offers Title Link', 'windfall-core' ),
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
			'offer_content',
			[
				'label' => esc_html__( 'Offers Content', 'windfall-core' ),
				'default' => esc_html__( 'your content text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'offer_more_text',
			[
				'label' => esc_html__( 'Read More Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type read more text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'offer_more_link',
			[
				'label' => esc_html__( 'Read More Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'offers',
			[
				'label' => esc_html__( 'Offers Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'offers_title' => esc_html__( 'Service Item', 'windfall-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ offers_title }}}',
			]
		);
		$this->add_control(
			'explore_more_text',
			[
				'label' => esc_html__( 'All Service Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Discover All Service', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type read more text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'explore_more_link',
			[
				'label' => esc_html__( 'All Service Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'disable_resizer',
			[
				'label' => esc_html__( 'Disable Image Resizer', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'description' => esc_html__( 'If you want to disable image resize, enable it.', 'windfall-core' ),
			]
		);
		
		$this->end_controls_section();// end: Section

		// Title
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
				'selector' => '{{WRAPPER}} .offer-title, {{WRAPPER}} .offer-title a',
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
					'{{WRAPPER}} .offer-title, {{WRAPPER}} .offer-title a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .offer-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		$this->end_controls_section();// end: Section

		// Offers		
		$this->start_controls_section(
			'section_offer_style',
			[
				'label' => esc_html__( 'Offer Item Option', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offers_style' => array('style-two'),
				],
			]
		);
		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Image Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .offer-style-two .offer-item .wndfal-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_image_style',
			[
				'label' => esc_html__( 'Icon Image', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offers_style' => array('style-one'),
				],
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Icon Image Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 100,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .offer-item .wndfal-icon img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .offer-item .wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Section Content
		$this->start_controls_section(
			'section_cnt_style',
			[
				'label' => esc_html__( 'Section Content', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'sec_content_typography',
				'selector' => '{{WRAPPER}} .offer-info p',
			]
		);
		$this->add_control(
			'sec_content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-info .wndfal-table-wrap' => 'background: {{VALUE}};',
				],
				'condition' => [
					'offers_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'sec_border_color',
			[
				'label' => esc_html__( 'Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-item' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'offers_style' => array('style-one'),
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Read More Link', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offers_style' => array('style-two'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .offer-info .wndfal-link',
			]
		);
		$this->start_controls_tabs( 'link_style' );
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
						'{{WRAPPER}} .offer-info .wndfal-link' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .offer-info .wndfal-link:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section

		// Button Style
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__( 'Button', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offers_style' => array('style-one'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .wndfal-offers .wndfal-btn',
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
					'{{WRAPPER}} .wndfal-offers .wndfal-btn' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-offers .wndfal-btn .btn-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-offers .wndfal-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wndfal-offers .wndfal-btn' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-offers .wndfal-btn .btn-text-wrap' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .wndfal-offers .wndfal-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-offers .wndfal-btn:hover .btn-text-wrap' => 'background-color: {{VALUE}};',
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
	 * Render Offers widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$offers = !empty( $settings['offers'] ) ? $settings['offers'] : [];
		$offers_style = !empty( $settings['offers_style'] ) ? $settings['offers_style'] : '';
		$column = !empty( $settings['col_type'] ) ? $settings['col_type'] : [];
		$explore_more_text = !empty( $settings['explore_more_text'] ) ? $settings['explore_more_text'] : '';	
		$explore_more_link = !empty( $settings['explore_more_link']['url'] ) ? $settings['explore_more_link']['url'] : '';
		$explore_more_link_external = !empty( $settings['explore_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$explore_more_link_nofollow = !empty( $settings['explore_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$explore_more_link_attr = !empty( $explore_more_link ) ?  $explore_more_link_external.' '.$explore_more_link_nofollow : '';

		$explore_link = $explore_more_link ? '<a href="'.$explore_more_link.'" '.$explore_more_link_attr.' class="wndfal-link">'.$explore_more_text.'<i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '<span class="wndfal-link">'.$explore_more_text.'<i class="fa fa-angle-right" aria-hidden="true"></i></span>';
		$explore_link_actual = $explore_more_text ? '<div class="wndfal-link-wrap">'.$explore_link.'</div>' : '';

		$disable_resizer = !empty( $settings['disable_resizer'] ) ? $settings['disable_resizer'] : '';
		if($offers_style === 'style-two') {
	  	$style_cls = ' offer-style-two';
	  } else {
	  	$style_cls = '';
	  }

		$output = '<div class="wndfal-offers '.$style_cls.'">
  <div class="container">
    <div class="row">';

		// Group Param Output
		if( is_array( $offers ) && !empty( $offers ) )
		foreach ( $offers as $each_logo ) {

		  
		  $content = !empty( $each_logo['offer_content'] ) ? $each_logo['offer_content'] : '';
		  $title = !empty( $each_logo['offers_title'] ) ? $each_logo['offers_title'] : '';
		  $title_link = !empty( $each_logo['offers_title_link']['url'] ) ? $each_logo['offers_title_link']['url'] : '';
			$title_external = !empty( $each_logo['offers_title_link']['is_external'] ) ? 'target="_blank"' : '';
			$title_nofollow = !empty( $each_logo['offers_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$title_link_attr = $title_external.' '.$title_nofollow;

			$offer_more_text = !empty( $each_logo['offer_more_text'] ) ? $each_logo['offer_more_text'] : '';	
			$offer_more_link = !empty( $each_logo['offer_more_link']['url'] ) ? $each_logo['offer_more_link']['url'] : '';
			$offer_more_link_external = !empty( $each_logo['offer_more_link']['is_external'] ) ? 'target="_blank"' : '';
			$offer_more_link_nofollow = !empty( $each_logo['offer_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$offer_more_link_attr = !empty( $offer_more_link ) ?  $offer_more_link_external.' '.$offer_more_link_nofollow : '';

		  $image_url = wp_get_attachment_url( $each_logo['offers_image']['id'] );
		  $alt = get_post_meta($each_logo['offers_image']['id'], '_wp_attachment_image_alt', true);

		  $icon_image_url = wp_get_attachment_url( $each_logo['offers_icon_image']['id'] );
		  $icon_img_alt = get_post_meta($each_logo['offers_icon_image']['id'], '_wp_attachment_image_alt', true);
		  $icon_type = !empty( $each_logo['offer_icon_type'] ) ? $each_logo['offer_icon_type'] : '';
		  $icon = !empty( $each_logo['offers_icon'] ) ? $each_logo['offers_icon'] : '';

		  $icon_img = $icon_image_url ? '<div class="wndfal-icon"><img src="'.$icon_image_url.'" width="55" alt="'.$icon_img_alt.'"></div>' : '';
		  $icon_main = $icon ? ' <div class="wndfal-icon"><i class="'.$icon.'" aria-hidden="true"></i></div>' : ''; 

		  if($icon_type === 'icon') {
			  $icon_image_actual = $icon_main;
			} else {
			  $icon_image_actual = $icon_img;
			}

		  if($disable_resizer) {
		  	$featured_img_actual = $image_url;
		  } else {
		  	if($offers_style === 'style-two') {
			  	if($column === 'col-2') {
					  if(class_exists('Aq_Resize')) {
			        $image_url = aq_resize( $image_url, '570', '440', true );
			      } else {$image_url = $image_url;}
			      $featured_img_actual = ( $image_url ) ? $image_url : WINDFALL_IMAGES . '/holders/570x440.png';
					} elseif ($column === 'col-4') {
					  if(class_exists('Aq_Resize')) {
			        $image_url = aq_resize( $image_url, '270', '170', true );
			      } else {$image_url = $image_url;}
			      $featured_img_actual = ( $image_url ) ? $image_url : WINDFALL_IMAGES . '/holders/270x170.png';
					} else {
					  if(class_exists('Aq_Resize')) {
			        $image_url = aq_resize( $image_url, '370', '240', true );
			      } else {$image_url = $image_url;}
			      $featured_img_actual = ( $image_url ) ? $image_url : WINDFALL_IMAGES . '/holders/370x240.png';
					}
				} else {
					if(class_exists('Aq_Resize')) {
		        $image_url = aq_resize( $image_url, '270', '180', true );
		      } else {$image_url = $image_url;}
		      $featured_img_actual = ( $image_url ) ? $image_url : WINDFALL_IMAGES . '/holders/270x180.png';
				}
		  }

		  if($column === 'col-2') {
			  $col_cls = 'col-lg-6 col-md-6';
			} elseif ($column === 'col-4') {
			  $col_cls = 'col-lg-3 col-md-6';
			} else {
			  $col_cls = 'col-lg-4 col-md-6';
			}
		  		 
			$feature_icon = $icon ? ' <i class="'.$icon.'" aria-hidden="true"></i>' : '';
		  $feature_image = $image_url ? '<div class="wndfal-image"><img src="'.$featured_img_actual.'" alt="'.$alt.'"></div>' : '';
		  $featured_img_style_one = $image_url ? '<img src="'.$featured_img_actual.'" alt="'.$alt.'">' : '';
		  $offer_content = $content ? '<p>'.$content.'</p>' : '';
		  $link = $offer_more_link ? '<a href="'.$offer_more_link.'" '.$offer_more_link_attr.' class="wndfal-link">'.$offer_more_text.'<i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';

		  $button_one = $offer_more_link ? '<a href="'.$offer_more_link.'" '.$offer_more_link_attr.' class="wndfal-btn wndfal-small-btn"><span class="btn-text-wrap"><span class="btn-text">'.$offer_more_text.'</span></span></a>' : '<span class="wndfal-btn wndfal-small-btn"><span class="btn-text-wrap"><span class="btn-text">'.$offer_more_text.'</span></span></span>';
			$button_actual = $offer_more_text ? $button_one : '';

			$offers_title_link = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a>' : $title;
			$offers_title = $title ? '<h4 class="offer-title">'.$offers_title_link.'</h4>' : '';

			$image_link_actual = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$feature_image.'</a>' : $feature_image;
			$offers_image = $feature_image;
			if($offers_style === 'style-two') {
				$output .= '<div class="'.$col_cls.'"><div class="item">
							        <div class="offer-item">
							          '.$image_link_actual.'
							          <div class="offer-info">
							            '.$offers_title.$offer_content.$link.'
							          </div>
							        </div>
							      </div></div>';
			} else {
		  	$output .='<div class="col-xl-3 col-lg-4 col-md-6">
						        <div class="offer-item">
						          <div class="offer-info-wrap">
						            '.$icon_image_actual.'
						            '.$offers_title.'
						          </div>
						          <div class="offer-info">
						            <div class="wndfal-image">
						              '.$featured_img_style_one.'
						              <div class="wndfal-table-wrap">
						                <div class="wndfal-align-wrap">
						                  '.$offer_content.$button_actual.'
						                </div>
						              </div>
						            </div>
						          </div>
						        </div>
						      </div>';
    	}
		}

		$output .= '</div>';
		$output .= $explore_link_actual;
		$output .='</div></div>';

		echo $output;
		
	}

	/**
	 * Render Offers widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Offer() );
