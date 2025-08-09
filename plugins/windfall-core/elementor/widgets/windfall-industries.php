<?php
/*
 * Elementor Windfall Industries Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Industries extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_industries';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Industries', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa  fa-bar-chart';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Industries widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	/*
	public function get_script_depends() {
		return ['vt-windfall_industries'];
	}
	*/
	
	/**
	 * Register Windfall Industries widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function _register_controls(){
		
		$this->start_controls_section(
			'section_industries',
			[
				'label' => __( 'Industry Item', 'windfall-core' ),
			]
		);

		$this->add_control(
			'industries_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title Text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type title text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'industries_title_link',
			[
				'label' => esc_html__( 'Title Link', 'windfall-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'industries_content',
			[
				'label' => esc_html__( 'Content', 'windfall-core' ),
				'default' => esc_html__( 'your content text', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'industries_more_text',
			[
				'label' => esc_html__( 'Read More Text', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'windfall-core' ),
				'placeholder' => esc_html__( 'Type read more text here', 'windfall-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'industries_more_link',
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
			'industries_image',
			[
				'label' => esc_html__( 'Featured Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'industries_icon_image',
			[
				'label' => esc_html__( 'Icon Image', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'section_alignment',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
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
			]
		);

		$this->end_controls_section();// end: Section

		// Style
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Section', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Overlay Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industry-info-wrap' => 'background-color: {{VALUE}};',
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
					'name' => 'sasent_title_typography',
					'selector' => '{{WRAPPER}} .industry-title',
				]
			);
			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .industry-title' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Content		
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
					'selector' => '{{WRAPPER}} .industry-info-inner p',
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .industry-info-inner p' => 'color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();// end: Section

		// Link
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',				
				'selector' => '{{WRAPPER}} .industry-info .wndfal-link',
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
						'{{WRAPPER}} .industry-info .wndfal-link' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .industry-info .wndfal-link:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render App Works widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$industries_image = !empty( $settings['industries_image']['id'] ) ? $settings['industries_image']['id'] : '';	
		$industries_icon_image = !empty( $settings['industries_icon_image']['id'] ) ? $settings['industries_icon_image']['id'] : '';	
		$industries_title = !empty( $settings['industries_title'] ) ? $settings['industries_title'] : '';	
		$industries_content = !empty( $settings['industries_content'] ) ? $settings['industries_content'] : '';	
		$section_alignment = !empty( $settings['section_alignment'] ) ? $settings['section_alignment'] : '';
		$disable_resizer = !empty( $settings['disable_resizer'] ) ? $settings['disable_resizer'] : '';
		// Read More Link
		$industries_more_text = !empty( $settings['industries_more_text'] ) ? $settings['industries_more_text'] : '';	
		$industries_more_link = !empty( $settings['industries_more_link']['url'] ) ? $settings['industries_more_link']['url'] : '';
		$industries_more_link_external = !empty( $settings['industries_more_link']['is_external'] ) ? 'target="_blank"' : '';
		$industries_more_link_nofollow = !empty( $settings['industries_more_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$industries_more_link_attr = !empty( $industries_more_link ) ?  $industries_more_link_external.' '.$industries_more_link_nofollow : '';

		// Title Link
		$industries_title_link = !empty( $settings['industries_title_link']['url'] ) ? $settings['industries_title_link']['url'] : '';
		$industries_title_link_external = !empty( $settings['industries_title_link']['is_external'] ) ? 'target="_blank"' : '';
		$industries_title_link_nofollow = !empty( $settings['industries_title_link']['nofollow'] ) ? 'rel="nofollow"' : '';
		$industries_title_link_attr = !empty( $industries_title_link ) ?  $industries_title_link_external.' '.$industries_title_link_nofollow : '';

		$image_url = wp_get_attachment_url( $industries_image );
		$icon_image_url = wp_get_attachment_url( $industries_icon_image );

		if($disable_resizer) {
	  	$featured_img_actual = $image_url;
	  } else {
	  	if(class_exists('Aq_Resize')) {
        $image_url = aq_resize( $image_url, '370', '260', true );
      } else {$image_url = $image_url;}
      $featured_img_actual = ( $image_url ) ? $image_url : WINDFALL_IMAGES . '/holders/370x260.png';
	  }

		$content = $industries_content ? '<p>'.$industries_content.'</p>' : '';
		$link = $industries_more_link ? '<a href="'.$industries_more_link.'" '.$industries_more_link_attr.' class="wndfal-link">'.$industries_more_text.'<i class="fa fa-angle-right" aria-hidden="true"></i></a>' : '';

		$title = $industries_title_link ? '<a href="'.$industries_title_link.'">'.$industries_title.'</a>' : '<span>'.$industries_title.'</span>';
		$title_actual = $industries_title ? '<h3 class="industry-title">'.$title.'</h3>' : '';

		$alt = get_post_meta($industries_image, '_wp_attachment_image_alt', true);
		$image = $industries_image ? '<img src="'.$featured_img_actual.'" alt="'.$alt.'">' : '';

		if($section_alignment === 'left') {
			$align_class = ' left-align';
		} elseif ($section_alignment === 'right') {
			$align_class = ' right-align';
		} else {
			$align_class = ' center-align';
		}

		// Icon Image
		$icon_alt = get_post_meta($industries_icon_image, '_wp_attachment_image_alt', true);
		$icon_image = $industries_image ? '<img src="'.$icon_image_url.'" alt="'.$icon_alt.'" width="29">' : '';

		$output = '<div class="wndfal-industries">
							  <div class="industry-item '.$align_class.'">
							    <div class="wndfal-image">
							      '.$image.'
							      <div class="industry-info-wrap">
							        <div class="wndfal-table-wrap">
							          <div class="wndfal-align-wrap">
							            <div class="wndfal-icon">
							              '.$icon_image.'
							            </div>
							            <div class="industry-info">
							              '.$title_actual.'
							              <div class="industry-info-inner">
							                '.$content.'
							                '.$link.'
							              </div>
							            </div>
							          </div>
							        </div>
							      </div>
							    </div>
							  </div>
							</div>';
		echo $output;
		
	}

	/**
	 * Render Industries widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Industries() );
