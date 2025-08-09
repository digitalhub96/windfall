<?php
/*
 * Elementor Windfall Social Icons Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_SocialIcons extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_social_icons';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Social Icons', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-facebook-square';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Social Icons widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_list'];
	}
	*/
	
	/**
	 * Register Windfall Social Icons widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_social_icons',
			[
				'label' => esc_html__( 'Social Icons Options', 'windfall-core' ),
			]
		);

		$this->add_control(
			'social_style',
			[
				'label' => __( 'Social Icons Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'windfall-core' ),
					'style-two' => esc_html__( 'Style Two(Rounded)', 'windfall-core' ),
				],
				'default' => 'style-one',
			]
		);
		$this->add_control(
			'social_title',
			[
				'label' => esc_html__( 'Social Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type social icons title here', 'windfall-core' ),
				'default' => esc_html__( 'Stay connected: ', 'windfall-core' ),
			]
		);
		$this->add_control(
			'button_alignment',
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
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$repeater = new Repeater();
		
		$repeater->add_control(
			'select_icon',
			[
				'label' => esc_html__( 'Select Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'frontend_available' => true,
				'options' => Controls_Helper_Output::get_include_icons(),
				'default' => 'fa fa-facebook',
			]
		);
		$repeater->add_control(
			'icon_link',
			[
				'label' => esc_html__( 'Icon Link', 'windfall-core' ),
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
				'label' => esc_html__( 'Social Icons', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ select_icon }}}',
			]
		);
		$this->end_controls_section();// end: Section

		// Section Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Social Title', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'sec_content_typography',				
				'selector' => '{{WRAPPER}} .social-label',
			]
		);
		$this->add_control(
			'sec_title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-label' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'icon_style' );
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
						'{{WRAPPER}} .wndfal-social a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_bg',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-social a' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'social_style' => array('style-two'),
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
						'{{WRAPPER}} .wndfal-social a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'icon_bg_hov',
				[
					'label' => esc_html__( 'Background Hover Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-social a:hover, {{WRAPPER}} .wndfal-social.rounded a:hover:before, {{WRAPPER}} .wndfal-social.rounded a:hover:after' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'social_style' => array('style-two'),
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs		
		
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-social a' => 'font-size:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-social a' => 'width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_margin',
			[
				'label' => __( 'Margin', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Social Icons widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$listItems_groups = !empty( $settings['listItems_groups'] ) ? $settings['listItems_groups'] : [];
		$social_style = !empty( $settings['social_style'] ) ? $settings['social_style'] : '';
		$social_title = !empty( $settings['social_title'] ) ? $settings['social_title'] : '';

		if($social_style === 'style-two') {
			$style_class = ' rounded';
		} else {
			$style_class = '';
		}

		$title = $social_title ? '<span class="social-label">'.$social_title.'</span>' : '';
		
	  $output = '<div class="wndfal-social '.$style_class.'">'.$title;

		// Group Param Output
		if( is_array( $listItems_groups ) && !empty( $listItems_groups ) ){
		  foreach ( $listItems_groups as $each_list ) {

		  $icon_link = !empty( $each_list['icon_link'] ) ? $each_list['icon_link'] : '';
			$link_url = !empty( $icon_link['url'] ) ? esc_url($icon_link['url']) : '';
			$link_external = !empty( $icon_link['is_external'] ) ? 'target="_blank"' : '';
			$link_nofollow = !empty( $icon_link['nofollow'] ) ? 'rel="nofollow"' : '';
			$link_attr = !empty( $icon_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

   		$social_icon = ( $each_list['select_icon'] ) ? $each_list['select_icon'] : '';
			
			if($social_style === 'style-two') {
		  	$output .= '<a  href="'.$link_url.'" '.$link_attr.' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><span><i class="'. $social_icon .'"></i></span></a>';
			} else {
		  	$output .= '<a  href="'.$link_url.'" '.$link_attr.' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i></a>';
			}

		  }
		}

		$output .= '</div>';

		echo $output;
		
	}

	/**
	 * Render Social Icons widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_SocialIcons() );
