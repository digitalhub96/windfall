<?php
/*
 * Elementor Windfall Gallery Infos Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Gallery_Infos extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_gallery_infos';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Gallery Infos', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-info-circle';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Gallery Infos widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-windfall_gallery_infos'];
	}
	
	/**
	 * Register Windfall Gallery Infos widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_gallery_info',
			[
				'label' => esc_html__( 'Gallery Infos Options', 'windfall-core' ),
			]
		);
		
		$repeater = new Repeater();
		$repeater->add_control(
			'info_title',
			[
				'label' => esc_html__( 'Title', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type item title here', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'info_text',
			[
				'label' => esc_html__( 'Content', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Type multiple information text by separting "Enter"', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'info_text_link',
			[
				'label' => esc_html__( 'Content Link', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'Type multiple information link by separting "Enter" (Make equality of link and link)', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'info_icon',
			[
				'label' => esc_html__( 'Icon', 'windfall-core' ),
				'type' => Controls_Manager::ICON,
				'options' => Controls_Helper_Output::get_include_icons(),
				'frontend_available' => true,
				'default' => 'icon icon-Bulb',
			]
		);
	
		$this->add_control(
			'infos_groups',
			[
				'label' => esc_html__( 'Gallery Infos Items', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'info_title' => esc_html__( 'Item #1', 'windfall-core' ),
					],
					
				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ info_title }}}',
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
				'name' => 'info_title_typography',				
				'selector' => '{{WRAPPER}} .wndfal-gallery-detail h6.glry-infos-title',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-gallery-detail h6.glry-infos-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Content Style
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Text', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'info_content_typography',
				'selector' => '{{WRAPPER}} .wndfal-gallery-detail span.glry-infos-content',
			]
		);

		$this->start_controls_tabs( 'content_style' );
			$this->start_controls_tab(
				'title_normal',
				[
					'label' => esc_html__( 'Normal', 'windfall-core' ),
				]
			);
			$this->add_control(
				'content_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-gallery-detail span.glry-infos-content, {{WRAPPER}} .wndfal-gallery-detail span.glry-infos-content a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
				'content_hover',
				[
					'label' => esc_html__( 'Hover', 'windfall-core' ),
				]
			);
			$this->add_control(
				'content_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wndfal-gallery-detail span.glry-infos-content a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section();// end: Section

		// Section Style
		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__( 'Section', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-gallery-detail' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-gallery-detail' => 'border-color: {{VALUE}};',
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
						'max' => 50,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-gallery-detail span.wndfal-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wndfal-gallery-detail span.wndfal-icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_section();// end: Section

	}

	/**
	 * Render Gallery Infos widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$infos_groups = !empty( $settings['infos_groups'] ) ? $settings['infos_groups'] : [];
		// Turn output buffer on
		ob_start(); ?>
		<div class="wndfal-gallery-detail">
    <?php
		// Group Param Output
		if( is_array( $infos_groups ) && !empty( $infos_groups ) ){
			foreach ( $infos_groups as $each_item ) {
				$info_title = !empty( $each_item['info_title'] ) ? $each_item['info_title'] : '';
				$info_text = !empty( $each_item['info_text'] ) ? $each_item['info_text'] : '';
				$info_text_link = !empty( $each_item['info_text_link'] ) ? $each_item['info_text_link'] : '';
				$icon = !empty( $each_item['info_icon'] ) ? $each_item['info_icon'] : '';

        $info_icon = $icon ? '<span class="wndfal-icon"><i class="'.$icon.'" aria-hidden="true"></i></span>' : '';
        $title = $info_title ? '<h6 class="glry-infos-title">'.$info_title.'</h6>' : '';
        $content = $info_text ? '<span class="glry-infos-content">'.$info_text.'</span>' : '';

        if ($info_text) {
		      $infos = $info_text;
		    } else {
		      $infos = array();
		    }
		      // foreach ( $infos as $key => $information ) {
		        $meta_info = explode('<br>', nl2br($info_text, false));
		        $meta_url = explode('<br>', nl2br($info_text_link, false));

		        if(!empty($info_text_link)) {
		          $meta_i = count($meta_info);
		          $meta_u = count($meta_url);
		          if ($meta_i > $meta_u) {
		            $meta_info = array_slice($meta_info, 0, count($meta_url));
		          } elseif($meta_u > $meta_i) {
		            $meta_url = array_slice($meta_url, 0, count($meta_info));
		          } else {
		            $meta_info = $meta_info;
		            $meta_url = $meta_url;
		          }
		          $totlal_info = array_combine($meta_info, $meta_url);
		          ?>
		            <div class="glry-box">
		            <?php echo $info_icon.$title;
	                foreach ($totlal_info as $info => $url) {  ?>
	                  <span class="glry-infos-content"><a href="<?php echo trim($url);?>"><?php echo trim($info); ?></a></span>
	                <?php } ?>
		            </div>
		        <?php
		        } else {
		             ?>
		            <div class="glry-box">
		            <?php echo $info_icon.$title;
		                foreach ($meta_info as $key => $info) { ?>
		                  <span class="glry-infos-content"><?php echo trim($info); ?></span>
		                <?php } ?>
		            </div>
		        <?php
		        } 
			}
		} ?>
		</div>
	<?php
	// Return outbut buffer
	echo ob_get_clean();
		
	}

	/**
	 * Render Gallery Infos widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Gallery_Infos() );
