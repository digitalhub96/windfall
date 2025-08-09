<?php
/*
 * Elementor Windfall About Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Special_Offer extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_special_offer';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Special Offer', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-thumbs-o-up';
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
		return ['vt-windfall_special_offer'];
	}
	*/

	/**
	 * Register Windfall Windfall Special Offer widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){

		$this->start_controls_section(
			'section_features',
			[
				'label' => esc_html__( 'Special Offer Options', 'windfall-core' ),
			]
		);

		$this->add_control(
			'offer_type',
			[
				'label' => __( 'Listing Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'static' => esc_html__( 'Static Widget', 'windfall-core' ),
					'product' => esc_html__( 'Product Listing', 'windfall-core' ),
				],
				'default' => 'static',
			]
		);

		$this->add_control(
			'offer_image',
			[
				'label' => esc_html__( 'Upload Special Offer Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'offer_type' => array('static'),
				],
				'description' => esc_html__( 'Set your offer image.', 'windfall-core'),
			]
		);
		$this->add_control(
			'offer_title',
			[
				'label' => esc_html__( 'Special Offer Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Special Offer Title', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type offer title text here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_title_link',
			[
				'label' => esc_html__( 'Title Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'windfall-core' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_content',
			[
				'label' => esc_html__( 'Special Offer Content', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Type offer content here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_tag',
			[
				'label' => esc_html__( 'Special Offer Tag', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type offer item tag text here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'select_icon',
			[
				'label' => esc_html__( 'Tag Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-star',
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_discount',
			[
				'label' => esc_html__( 'Special Offer Discount Percentage', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type offer percentage here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_discount_text',
			[
				'label' => esc_html__( 'Special Offer Discount Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type offer discount text here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_actual_price',
			[
				'label' => esc_html__( 'Special Offer Actual Price', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type offer actual price here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'offer_sale_price',
			[
				'label' => esc_html__( 'Special Offer Sale Price', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Type offer sale price here', 'windfall-core' ),
				'label_block' => true,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => __( 'Button Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'custom' => esc_html__( 'Custom Button', 'windfall-core' ),
					'shortcode' => esc_html__( 'Shortcode Button', 'windfall-core' ),
				],
				'default' => 'custom',
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_control(
			'btn_txt',
			[
				'label' => esc_html__( 'Button Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type your button text here', 'windfall-core' ),
				'condition' => [
					'button_type' => array('custom'),
				],
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
					'button_type' => array('custom'),
				],
			]
		);
		$this->add_control(
			'button_shortcode',
			[
				'label' => esc_html__( 'Add Button Shortcode', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( '[add_to_cart id="18" quantity="1"]', 'windfall-core' ),
				'condition' => [
					'button_type' => array('shortcode'),
				],
				'description' => __( 'Eg: [add_to_cart id="18" quantity="1"] <br> For reference <a href="https://docs.woocommerce.com/document/woocommerce-shortcodes/#section-15" target="_blank">Woocommerce Docs</a>', 'windfall-core' ),
			]
		);
		$this->add_control(
			'pr_limit',
			[
				'label' => esc_html__( 'Number Control', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__( 'Enter the number of items to show.', 'windfall-core' ),
				'condition' => [
					'offer_type' => array('product'),
				],
			]
		);
		$this->add_control(
			'pr_order',
			[
				'label' => __( 'Order', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__( 'Asending', 'windfall-core' ),
					'DESC' => esc_html__( 'Desending', 'windfall-core' ),
				],
				'default' => 'DESC',
				'condition' => [
					'offer_type' => array('product'),
				],
			]
		);
		$this->add_control(
			'pr_orderby',
			[
				'label' => __( 'Order By', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'windfall-core' ),
					'ID' => esc_html__( 'ID', 'windfall-core' ),
					'author' => esc_html__( 'Author', 'windfall-core' ),
					'title' => esc_html__( 'Title', 'windfall-core' ),
					'date' => esc_html__( 'Date', 'windfall-core' ),
				],
				'default' => 'date',
				'condition' => [
					'offer_type' => array('product'),
				],
			]
		);
		$this->add_control(
			'pr_cats',
			[
				'label' => __( 'Certain Categories?', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'product_cat'),
				'multiple' => true,
				'condition' => [
					'offer_type' => array('product'),
				],
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
				'condition' => [
					'offer_type' => array('static'),
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
				'selector' => '{{WRAPPER}} h3.wndfal-offer-title',
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
						'{{WRAPPER}} h3.wndfal-offer-title, {{WRAPPER}} h3.wndfal-offer-title a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} h3.wndfal-offer-title a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wndfal-offer-content p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-content' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Tag Style
		$this->start_controls_section(
			'section_tag_style',
			[
				'label' => esc_html__( 'Tag', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'tag_typography',
				'selector' => '{{WRAPPER}} .wndfal-offer-content span.offer-tag',
			]
		);
		$this->add_control(
			'tag_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-content span.offer-tag' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tag_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-content span.offer-tag' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Regular Price Style
		$this->start_controls_section(
			'section_reg_price_style',
			[
				'label' => esc_html__( 'Regular Price', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .wndfal-offer-price del',
			]
		);
		$this->add_control(
			'actual_price_color',
			[
				'label' => esc_html__( 'Regular Price Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-price del' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Sale Price Style
		$this->start_controls_section(
			'section_sale_price_style',
			[
				'label' => esc_html__( 'Sale Price', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'sale_price_typography',
				'selector' => '{{WRAPPER}} .wndfal-offer-price ins',
			]
		);
		$this->add_control(
			'sale_price_color',
			[
				'label' => esc_html__( 'Sale Price Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-offer-price ins' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Discount Box
		$this->start_controls_section(
			'section_discount_style',
			[
				'label' => esc_html__( 'Discount Box', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'offer_type' => array('static'),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Percentage Typography', 'windfall-core' ),
				'name' => 'discount_typography',
				'selector' => '{{WRAPPER}} .offer-discount span.discnt-percent',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Discount Text Typography', 'windfall-core' ),
				'name' => 'discount_txt_typography',
				'selector' => '{{WRAPPER}} .offer-discount span.discnt-text',
			]
		);
		$this->add_control(
			'discount_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-discount' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'discount_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offer-discount' => 'background: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-offer-content a.button',
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
					'{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-offer-content a.button' => 'min-width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-btn .btn-text, {{WRAPPER}} .wndfal-offer-content a.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-offer-content a.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wndfal-btn, {{WRAPPER}} .wndfal-offer-content a.button' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn .btn-text-wrap, {{WRAPPER}} .wndfal-offer-content a.button' => 'background-color: {{VALUE}};',
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
						'{{WRAPPER}} .wndfal-btn:hover, {{WRAPPER}} .wndfal-offer-content a.button:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'button_bg_hover_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-btn:hover .btn-text-wrap, {{WRAPPER}} .wndfal-offer-content a.button:hover' => 'background-color: {{VALUE}};',
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
					'condition' => [
						'button_type' => array('custom'),
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
		$offer_type = !empty( $settings['offer_type'] ) ? $settings['offer_type'] : [];
		$offer_title = !empty( $settings['offer_title'] ) ? $settings['offer_title'] : [];
		$offer_title_link = !empty( $settings['offer_title_link']['url'] ) ? $settings['offer_title_link']['url'] : '';
		$title_external = !empty( $settings['offer_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$title_nofollow = !empty( $settings['offer_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$title_link_attr = !empty( $btn_link ) ?  $title_external.' '.$title_nofollow : '';

		$offer_content = !empty( $settings['offer_content'] ) ? $settings['offer_content'] : [];
		$offer_tag = !empty( $settings['offer_tag'] ) ? $settings['offer_tag'] : [];
		$select_icon = !empty( $settings['select_icon'] ) ? $settings['select_icon'] : [];
		$offer_discount = !empty( $settings['offer_discount'] ) ? $settings['offer_discount'] : [];
		$offer_discount_text = !empty( $settings['offer_discount_text'] ) ? $settings['offer_discount_text'] : [];
		$offer_actual_price = !empty( $settings['offer_actual_price'] ) ? $settings['offer_actual_price'] : [];
		$offer_sale_price = !empty( $settings['offer_sale_price'] ) ? $settings['offer_sale_price'] : [];
		$disable_resizer = !empty( $settings['disable_resizer'] ) ? $settings['disable_resizer'] : '';

		$pr_limit = !empty( $settings['pr_limit'] ) ? $settings['pr_limit'] : '';
		$pr_order = !empty( $settings['pr_order'] ) ? $settings['pr_order'] : '';
		$pr_orderby = !empty( $settings['pr_orderby'] ) ? $settings['pr_orderby'] : '';
		$pr_cats = !empty( $settings['pr_cats'] ) ? $settings['pr_cats'] : [];

		$dis_percent = $offer_discount ? '<span class="discnt-percent">'.$offer_discount.'</span>' : '';
		$dis_text = $offer_discount_text ? '<span class="discnt-text">'.$offer_discount_text.'</span>' : '';

		if($dis_percent || $dis_text) {
			$discount_actual = '<div class="offer-discount">'.$dis_percent.$dis_text.'</div>';
		} else {
			$discount_actual = '';
		}

		$image_url = wp_get_attachment_url( $settings['offer_image']['id'] );
	  $alt = get_post_meta($settings['offer_image']['id'], '_wp_attachment_image_alt', true);

	  if($disable_resizer) {
	  	$featured_img_actual = $image_url;
	  } else {
		if(function_exists('windfall_secure_resize')) {
        $image_url = windfall_secure_resize( $image_url, '585', '434', true );
      } else {$image_url = $image_url;}
      $featured_img_actual = ( $image_url ) ? $image_url : WINDFALL_IMAGES . '/holders/585x434.png';
	  }

	  $content = $offer_content ? '<p>'.$offer_content.'</p>' : '';

	  // Button
		$btn_text = !empty( $settings['btn_txt'] ) ? $settings['btn_txt'] : '';
		$btn_link = !empty( $settings['button_link']['url'] ) ? $settings['button_link']['url'] : '';
		$btn_external = !empty( $settings['button_link']['is_external'] ) ? 'target="_blank"' : '';
		$btn_nofollow = !empty( $settings['button_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty( $btn_link ) ?  $btn_external.' '.$btn_nofollow : '';

		$button_type = !empty( $settings['button_type'] ) ? $settings['button_type'] : '';
		$button_shortcode = !empty( $settings['button_shortcode'] ) ? $settings['button_shortcode'] : '';

		// Title
		$title = $offer_title_link ? '<a href="'.$offer_title_link.'" '.$title_link_attr.'>'.$offer_title.'</a>' : $offer_title;
		$title_actual = $offer_title ? '<h3 class="wndfal-offer-title">'.$title.'</h3>' : '';

		// Price
		$actual = $offer_actual_price ? '<del>'.$offer_actual_price.'</del>' : '';
		$sale = $offer_sale_price ? '<ins>'.$offer_sale_price.'</ins>' : '';

		// Tag
		$tag_icon = $select_icon ? '<i class="'. $select_icon .'"></i>' : '';
		$tag_actual = $offer_tag ? '<span class="offer-tag">'.$tag_icon.$offer_tag.'</span>' : '';

		// Button Styling
		$button_main = $btn_link ? '<a href="'.$btn_link.'" '.$btn_link_attr.' class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></a>' : '<span class="wndfal-btn"><span class="btn-text-wrap"><span class="btn-text">'.$btn_text.'</span></span></span>';
		if($button_type === 'shortcode') {
			$button_actual = do_shortcode($button_shortcode);
		} else {
			$button_actual = $btn_text ? '<div class="wndfal-btns-group">'.$button_main.'</div>' : '';
		}

		$feature_image = $image_url ? '<div class="wndfal-image"><img src="'.$featured_img_actual.'" alt="'.$alt.'"></div>' : '';

		if($offer_type === 'product') {
			$output = '';
			global $paged;
	    if( get_query_var( 'paged' ) )
	      $my_page = get_query_var( 'paged' );
	    else {
	      if( get_query_var( 'page' ) )
	        $my_page = get_query_var( 'page' );
	      else
	        $my_page = 1;
	      set_query_var( 'paged', $my_page );
	      $paged = $my_page;
	    }

	    $args = array(
        'paged'          => (int)$my_page,
        'post_type'      => 'product',
	      'posts_per_page' => (int)$pr_limit,
        'order'          => $pr_order,
        // 'product_cat'    => $pr_cats,
        'orderby'        => $pr_orderby,
        'tax_query'      => array(
                              array(
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => 'exclude-from-catalog',
                                'operator' => 'NOT IN',
                              )
                            ),
	    );

	    $windfall_products = new \WP_Query($args);
	    ob_start(); ?>
		    <div class="wndfal-prdt-offer">
			    <?php
			    if ($windfall_products->have_posts()) : while ($windfall_products->have_posts()) : $windfall_products->the_post();
		      global $product; ?>
						<div class="wndfal-special-offer">
						  <div class="container">
						    <div class="row">
						      <div class="wndfal-offer-image">
						        <?php echo woocommerce_get_product_thumbnail(); ?>
						      </div>
						      <div class="wndfal-offer-content">
						      <?php if ( !$product->is_in_stock() ) {
										  echo '<span class="offer-tag">' . esc_html__( 'Sold', 'windfall-core' ) . '</span>';
										} else if ( $product->is_on_sale() ) {
										  echo '<span class="offer-tag">' . esc_html__( 'Sale!', 'windfall-core' ) . '</span>';
										} ?>
										<h3 class="wndfal-offer-title"><a href="<?php echo get_the_permalink($product->get_id()); ?>"><?php echo esc_attr(get_the_title($product->get_id())); ?></a></h3>
						        <p><?php the_excerpt(); ?></p>
						        <div class="wndfal-offer-price">
			                <?php echo $product->get_price_html(); ?>
						        </div>
						        <?php woocommerce_template_loop_add_to_cart( $windfall_products->post, $product ); ?>
						      </div>
						    </div>
						  </div>
						</div>
					<?php endwhile; endif;
					wp_reset_postdata(); ?>
				</div>
				<?php

			// Return outbut buffer
			echo ob_get_clean();
		} else {
			$output = '<div class="wndfal-special-offer">
							  <div class="container">
							    <div class="row">
							      <div class="wndfal-offer-image">
							        '.$feature_image.$discount_actual.'
							      </div>
							      <div class="wndfal-offer-content">
							        '.$tag_actual.$title_actual.$content.'
							        <div class="wndfal-offer-price">
							          '.$actual.$sale.'
							        </div>
							        '.$button_actual.'
							      </div>
							    </div>
							  </div>
							</div>';
		}

		echo $output;

	}

	/**
	 * Render About widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Special_Offer() );
