<?php
/*
 * Elementor Windfall FAQ Accordion Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_BootAccordion extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_boot_accordion';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'FAQ Accordion', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall FAQ Accordion widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_boot_accordion'];
	}
	*/
	
	/**
	 * Register Windfall FAQ Accordion widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){

		$this->start_controls_section(
			'section_active',
			[
				'label' => __( 'Accordion Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'accordion_style',
			[
				'label' => __( 'Accordion Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__( 'Style One', 'windfall-core' ),
					'style-two' => esc_html__( 'Style Two', 'windfall-core' ),
					'style-three' => esc_html__( 'Style Three', 'windfall-core' ),
				],
				'default' => 'style-one',
			]
		);

		$this->add_control(
			'active',
			[
				'label' => __( 'Active Accordion Number', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 1,
			]
		);
		
		$this->end_controls_section();// end: Section

		$this->start_controls_section(
			'section_boot_accordion',
			[
				'label' => __( 'FAQ Accordion Item', 'windfall-core' ),
			]
		);		

		$repeater = new Repeater();		
		$repeater->add_control(
			'accordion_title',
			[
				'label' => esc_html__( 'Accordion Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Accordion Title', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type title here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'accordion_content',
			[
				'label' => esc_html__( 'Content', 'windfall-core' ),
				'default' => esc_html__( 'your content text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'windfall-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'meta_question',
			[
				'label' => esc_html__( 'Question Text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Was this answer helpful?', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'yes_txt',
			[
				'label' => esc_html__( 'Yes Text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Yes', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'yes_link',
			[
				'label' => esc_html__( 'Yes Link', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'no_txt',
			[
				'label' => esc_html__( 'No Text', 'windfall-core' ),
				'placeholder' => esc_html__( 'No', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'no_link',
			[
				'label' => esc_html__( 'No Link', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'bootAccordion_groups',
			[
				'label' => esc_html__( 'FAQ Accordion Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'accordion_title' => esc_html__( 'Item #1', 'windfall-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ accordion_title }}}',
			]
		);
				
		$this->end_controls_section();// end: Section		

		// Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Section', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_width',
			[
				'label' => esc_html__( 'Width', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .faq-wrap' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'section_border',
				'label' => esc_html__( 'Border', 'windfall-core' ),
				'selector' => '{{WRAPPER}} .card',
			]
		);
		$this->add_control(
			'section_border_radius',
			[
				'label' => __( 'Border Radius', 'windfall-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .card, {{WRAPPER}} .card-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
				'label' => esc_html__( 'Typography', 'windfall-core' ),
				'name' => 'sasacc_title_typography',				
				'selector' => '{{WRAPPER}}  h4.accordion-title button',
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
						'{{WRAPPER}}  h4.accordion-title button.collapsed, {{WRAPPER}}  h4.accordion-title button.collapsed:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  h4.accordion-title button.collapsed, {{WRAPPER}}  h4.accordion-title button.collapsed:before' => 'background: {{VALUE}};',
					],
					'condition' => [
						'accordion_style' => array('style-three'),
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'title_hover',
					[
						'label' => esc_html__( 'Active', 'windfall-core' ),
					]
				);
			$this->add_control(
				'title_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  h4.accordion-title button:hover, {{WRAPPER}}  h4.accordion-title button, {{WRAPPER}}  h4.accordion-title button:hover:before, {{WRAPPER}}  h4.accordion-title button:before' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'title_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  h4.accordion-title button:hover, {{WRAPPER}}  h4.accordion-title button, {{WRAPPER}}  h4.accordion-title button:hover:before, {{WRAPPER}}  h4.accordion-title button:before' => 'background: {{VALUE}};',
					],
					'condition' => [
						'accordion_style' => array('style-three'),
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render FAQ Accordion widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		// FAQ Accordion query
		$boot_accordion = $this->get_settings_for_display( 'bootAccordion_groups' );
		//$one_active  = ( isset( $settings['one_active'] ) && ( 'true' == $settings['one_active'] ) ) ? true : false;
		$settings = $this->get_settings_for_display();
		$active_tab = !empty( $settings['active'] ) ? $settings['active'] : '';
		$accordion_style = !empty($settings['accordion_style']) ? $settings['accordion_style'] : '';
		
		if($accordion_style === 'style-three') {
			$acc_style_cls = '';
		} elseif($accordion_style === 'style-two') {
			$acc_style_cls = ' accordion-style-two';
		} else {
			$acc_style_cls = '';
		}

		if($accordion_style === 'style-three') {
			$style_three_cls = ' widget-services';
		} else {
			$style_three_cls = '';
		}
	
			$output = '';
			if( !empty( $boot_accordion ) && is_array( $boot_accordion ) ){

				$output .= '<div class="faq-wrap '.$style_three_cls.'"><div id="accordion" class="accordion collapse-others '.$acc_style_cls.'">';

				$key = 1;
				foreach ( $boot_accordion as $each_logo ) {
					$meta_question = !empty($each_logo['meta_question']) ? $each_logo['meta_question'] : '';
					$yes_txt = !empty($each_logo['yes_txt']) ? $each_logo['yes_txt'] : '';
					$yes_link = !empty($each_logo['yes_link']) ? $each_logo['yes_link'] : '';
					$no_txt = !empty($each_logo['no_txt']) ? $each_logo['no_txt'] : '';
					$no_link = !empty($each_logo['no_link']) ? $each_logo['no_link'] : '';

					// Meta Question
					$y_link = $yes_link ? '<a href="'.$yes_link.'">'.$yes_txt.'</a>' : '<span>'.$yes_txt.'</span>';
					$y_link_actual = $yes_txt ? $y_link : '';

					$n_link = $no_link ? '<a href="'.$no_link.'">'.$no_txt.'</a>' : '<span>'.$no_txt.'</span>';
					$n_link_actual = $no_txt ? $n_link : '';

					$meta = $meta_question ? '<div class="faq-meta">'.$meta_question.$y_link_actual.$n_link_actual.'</div>' : '';

				  $opened    = ( $key == $active_tab ) ? ' show' : '';		
				  $collapsed    = ( $key == $active_tab ) ? '' : 'collapsed';		
    			$uniqtab     = uniqid();

					$output .= '<div class="card'.$opened.'">
					              <div class="card-header" id="headingOne'. esc_attr($key.$uniqtab) .'">
					                <h4 class="accordion-title">
					                  <button class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#wndfalAcc-'. esc_attr($key.$uniqtab) .'" aria-expanded="true" aria-controls="wndfalAcc-'. esc_attr($key.$uniqtab) .'">
										          '.$each_logo['accordion_title'] .'
										        </button>
					                </h4>
					              </div>
					              <div id="wndfalAcc-'. esc_attr($key.$uniqtab) .'" class="collapse '. $opened .'" data-parent="#accordion">
									        <div class="card-body">
									          '.do_shortcode($each_logo['accordion_content']).$meta.'
									        </div>
									      </div>
					            </div>';
				$key++;
				}

				$output .= '</div></div>';
			}

			echo $output;
		
	}

	/**
	 * Render FAQ Accordion widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_BootAccordion() );
