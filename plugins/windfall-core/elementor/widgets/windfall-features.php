<?php
/*
 * Elementor Windfall Features Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Features extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_features';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Features', 'windfall-core' );
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
	 * Retrieve the list of scripts the Windfall Windfall Features widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_features'];
	}
	*/
	
	/**
	 * Register Windfall Windfall Features widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_features',
			[
				'label' => esc_html__( 'Features Options', 'windfall-core' ),
			]
		);

		$this->add_control(
			'features_style',
			[
				'label' => __( 'Features Style', 'windfall-core' ),
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
					'col-4' => esc_html__( '4 Column', 'windfall-core' ),
					'col-2' => esc_html__( '2 Column', 'windfall-core' ),
				],
				'default' => 'col-3',
				'condition' => [
					'features_style' => array('style-one','style-two'),
				],
			]
		);
		$this->add_responsive_control(
			'features_align',
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
					'{{WRAPPER}} .feature-item' => 'text-align: {{VALUE}};',
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'features_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon-arrows-check',
			]
		);
		$repeater->add_control(
			'features_title',
			[
				'label' => esc_html__( 'Features Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'windfall-core' ),
				'default' => esc_html__( 'Access Conversations', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'features_title_link',
			[
				'label' => esc_html__( 'Features Title Link', 'windfall-core' ),
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
			'features_content',
			[
				'label' => esc_html__( 'Features Content', 'windfall-core' ),
				'default' => esc_html__( 'your content text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'features',
			[
				'label' => esc_html__( 'Features Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'features_title' => esc_html__( 'Features Title', 'windfall-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ features_title }}}',
			]
		);
		
		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Item', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'features_style' => array('style-one'),
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
					'{{WRAPPER}} .feature-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-item' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .feature-item .wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .feature-item .wndfal-icon' => 'width: calc({{SIZE}}{{UNIT}} + 15px);height: calc({{SIZE}}{{UNIT}} + 15px);',
				],
			]
		);
		$this->add_responsive_control(
			'icon_btm',
			[
				'label' => esc_html__( 'Icon Bottom Space', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 25,
						'max' => 200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .feature-item .wndfal-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .feature-item h3',
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
						'{{WRAPPER}} .feature-item h3, {{WRAPPER}} .feature-item h3 a' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .feature-item h3 a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .feature-item p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-item p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Features widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$features = !empty( $settings['features'] ) ? $settings['features'] : [];
		$features_style = !empty( $settings['features_style'] ) ? $settings['features_style'] : [];
		$column = !empty( $settings['col_type'] ) ? $settings['col_type'] : [];
		$features_align = !empty ($settings['features_align']) ? $settings['features_align'] : '';

		if($features_style === 'style-two') {
		  $style_cls = ' features-style-two';
		} else {
		  $style_cls = '';
		}

		if($features_align === 'center') {
			$align_cls = ' center-align';
		} elseif($features_align === 'right') {
			$align_cls = ' right-align';
		} else {
			$align_cls = '';
		}

		if($column === 'col-2') {
		  $col_cls = 'col-lg-6 col-md-6';
		} elseif ($column === 'col-4') {
		  $col_cls = 'col-lg-3 col-md-6';
		} else {
		  $col_cls = 'col-lg-4 col-md-6';
		}

		$output = '<div class="wndfal-features'.$style_cls.$align_cls.'"><div class="container"><div class="row">';

		// Group Param Output
		if( is_array( $features ) && !empty( $features ) )
		foreach ( $features as $each_logo ) {

		  $title = !empty( $each_logo['features_title'] ) ? $each_logo['features_title'] : '';
		  $title_link = !empty( $each_logo['features_title_link']['url'] ) ? $each_logo['features_title_link']['url'] : '';
			$title_external = !empty( $each_logo['features_title_link']['is_external'] ) ? 'target="_blank"' : '';
			$title_nofollow = !empty( $each_logo['features_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
			$title_link_attr = $title_external.' '.$title_nofollow;

		  $content = !empty( $each_logo['features_content'] ) ? $each_logo['features_content'] : '';
		  $icon = !empty( $each_logo['features_icon'] ) ? $each_logo['features_icon'] : '';

			$feature_icon = $icon ? ' <div class="wndfal-icon"><i class="'.$icon.'" aria-hidden="true"></i></div>' : '';
		  $features_content = $content ? '<p>'.$content.'</p>' : '';

			$features_title_link = $title_link ? '<a href="'.esc_url($title_link).'" '.$title_link_attr.'>'.$title.'</a>' : $title;
			$features_title = $title ? '<h3 class="feature-title">'.$features_title_link.'</h3>' : '';

			if ($features_style === 'style-two') {
				$output .= '<div class="'.$col_cls.'">
										  <div class="feature-item">
										    '.$feature_icon.'
										    <div class="feature-info">
										      '.$features_title.$features_content.'
										    </div>
										  </div>
										</div>';
			} else {
		  	$output .= '<div class="'.$col_cls.'">
							        <div class="feature-item">
							          '.$feature_icon.'
							          '.$features_title.$features_content.'
							        </div>
							      </div>';
			}

		}

		$output .= '</div></div></div>';

		echo $output;
		
	}

	/**
	 * Render Features widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Features() );
