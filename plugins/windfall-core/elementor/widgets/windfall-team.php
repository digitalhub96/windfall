<?php
/*
 * Elementor Windfall Team Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$noneed_team_post = (windfall_framework_active()) ? cs_get_option('noneed_team_post') : '';

if (!$noneed_team_post) {
class Windfall_Team extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_team';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Team', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-users';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Team widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	
	public function get_script_depends() {
		return ['vt-windfall_team'];
	}
	
	/**
	 * Register Windfall Team widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_team_settings',
			[
				'label' => esc_html__( 'Team Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'team_list_heading',
			[
				'label' => __( 'Listing', 'windfall-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'team_aqr',
			[
				'label' => esc_html__( 'Disable Image Resize?', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		$this->add_control(
			'team_column',
			[
				'label' => __( 'Columns', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'frontend_available' => true,
				'options' => [
					'col-4' => esc_html__( 'Column Four', 'windfall-core' ),
					'col-3' => esc_html__( 'Column Three', 'windfall-core' ),
				],
				'default' => 'col-4',
				'description' => esc_html__( 'Select your team column.', 'windfall-core' ),
			]
		);	
		$this->add_control(
			'team_limit',
			[
				'label' => esc_html__( 'Limit', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
			]
		);
		$this->add_control(
			'team_order',
			[
				'label' => esc_html__( 'Order', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__('DESC', 'windfall-core'),
					'ASC' => esc_html__('ASC', 'windfall-core'),
				],
			]
		);
		$this->add_control(
			'team_orderby',
			[
				'label' => esc_html__( 'Order By', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => '',
				'options' => [
					'none' => esc_html__('None', 'windfall-core'),
					'ID' => esc_html__('ID', 'windfall-core'),
					'author' => esc_html__('Author', 'windfall-core'),
					'title' => esc_html__('Name', 'windfall-core'),
					'date' => esc_html__('Date', 'windfall-core'),
					'rand' => esc_html__('Rand', 'windfall-core'),
					'menu_order' => esc_html__('Menu Order', 'windfall-core'),
				],
			]
		);
		$this->add_control(
			'team_show_category',
			[
				'label' => __( 'Certain Categories?', 'windfall-core' ),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names( 'team_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'img_border_color',
			[
				'label' => esc_html__( 'Border Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info, {{WRAPPER}} .mate-meta' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_name_style',
			[
				'label' => esc_html__( 'Name', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .mate-info h4, {{WRAPPER}} .mate-info h4 a',
			]
		);

		$this->start_controls_tabs( 'name_style' );
			$this->start_controls_tab(
					'name_normal',
					[
						'label' => esc_html__( 'Normal', 'windfall-core' ),
					]
				);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mate-info h4, {{WRAPPER}} .mate-info h4 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'name_hover',
					[
						'label' => esc_html__( 'Hover', 'windfall-core' ),
					]
				);
			$this->add_control(
				'name_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mate-info h4 a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	

		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_profession_style',
			[
				'label' => esc_html__( 'Profession', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'profession_typography',
				'selector' => '{{WRAPPER}} .mate-info h6',
			]
		);
		$this->add_control(
			'profession_color',
			[
				'label' => esc_html__( 'Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info h6' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'profession_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info h6' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();// end: Section

		// Contact Links Style
		$this->start_controls_section(
			'section_contact_style',
			[
				'label' => esc_html__( 'Contact Links', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sasfea_contact_links_typography',
				'selector' => '{{WRAPPER}} .mate-info ul li a',
			]
		);
		$this->add_control(
			'link_icon_color',
			[
				'label' => esc_html__( 'Link Icon Color', 'windfall-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mate-info ul li i' => 'color: {{VALUE}};',
				],
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
						'{{WRAPPER}} .mate-info ul li a, {{WRAPPER}} .mate-info ul li' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .mate-info ul li a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section

		// Social Style
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__( 'Social Icons', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'social_title_typography',
				'selector' => '{{WRAPPER}} .mate-meta .social-title',
			]
		);
		$this->start_controls_tabs( 'social_style' );
			$this->start_controls_tab(
					'social_normal',
					[
						'label' => esc_html__( 'Normal', 'windfall-core' ),
					]
				);
			$this->add_control(
				'social_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mate-meta .wndfal-social a, {{WRAPPER}} .mate-meta .wndfal-social span' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Normal tab
			$this->start_controls_tab(
					'social_hover',
					[
						'label' => esc_html__( 'Hover', 'windfall-core' ),
					]
				);
			$this->add_control(
				'social_hover_color',
				[
					'label' => esc_html__( 'Color', 'windfall-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mate-meta .wndfal-social a:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs	
		
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Team widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		// Team query
		$team_limit = !empty( $settings['team_limit'] ) ? $settings['team_limit'] : '';
		$team_column = !empty( $settings['team_column'] ) ? $settings['team_column'] : '';
		$team_order = !empty( $settings['team_order'] ) ? $settings['team_order'] : '';
		$team_orderby = !empty( $settings['team_orderby'] ) ? $settings['team_orderby'] : '';
		$team_show_category = !empty( $settings['team_show_category'] ) ? $settings['team_show_category'] : [];
		$team_aqr  = ( isset( $settings['team_aqr'] ) && ( 'true' == $settings['team_aqr'] ) ) ? true : false;
		$meet_txt = cs_get_option('team_social_title');
		$meet_txt = $meet_txt ? $meet_txt : esc_html__('Meet me on:','windfall');

		// Column
		if ($team_column === 'col-3') {
			$windfall_team_col_class = 'col-xl-4 col-sm-6';
		} else {
			$windfall_team_col_class = 'col-xl-3 col-sm-6';
		}

		// Turn output buffer on
		ob_start();

		// Pagination
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
		$team_limit = $team_limit ? $team_limit : '-1';
		$args = array(
		  'paged' => $my_page,
		  'post_type' => 'team',
		  'posts_per_page' => (int) $team_limit,
		  'team_category' => $team_show_category,
		  'orderby' => $team_orderby,
		  'order' => $team_order,
		);
		$windfall_team = new \WP_Query( $args );
		if ($windfall_team->have_posts()) : ?>
		<div class="wndfal-team">
		  <div class="container">
		    <div class="row">
					<?php
					  while ($windfall_team->have_posts()) : $windfall_team->the_post();
						$team_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_team', true );
						if($team_options) {
						  $team_job_position = $team_options['team_job_position'];
						  $team_socials = $team_options['social_icons'];
						  $team_contact = $team_options['contact_details'];
						} else {
						  $team_job_position = '';
						  $team_socials = '';
						  $team_contact = '';
						}

						$position = $team_job_position ? '<h6 class="mate-designation">'.$team_job_position.'</h6>' : '';

						// Featured Image
						$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
						$large_image = $large_image[0];
						$abt_title = get_the_title();
						if ($team_aqr) {
							$team_featured_img = $large_image;
						} else {
							if ($team_column === 'col-3') {
								if(function_exists('windfall_secure_resize')) {
									$team_img = windfall_secure_resize( $large_image, '353', '220', true );
								} else {$team_img = $large_image;}
								$team_featured_img = ( $team_img ) ? $team_img : WINDFALL_PLUGIN_ASTS . '/images/holders/353x220.png';
							} else {
								if(function_exists('windfall_secure_resize')) {
									$team_img = windfall_secure_resize( $large_image, '270', '220', true );
								} else {$team_img = $large_image;}
								$team_featured_img = ( $team_img ) ? $team_img : WINDFALL_PLUGIN_ASTS . '/images/holders/270x220.png';
							}
						}
						?>
						<div class="<?php echo esc_attr($windfall_team_col_class); ?>">
			        <div class="mate-item">
			          <?php if ($large_image) { ?>
				        	<div class="wndfal-image"><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($team_featured_img); ?>" alt="<?php echo esc_html($abt_title); ?>"></a></div>
				        <?php } ?>
			          <div class="mate-info">
			            <?php echo $position; ?>
			            <h4 class="mate-name"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($abt_title); ?></a></h4>
			            <?php if ( ! empty( $team_contact ) ) { ?>
					        	<ul>
			                <?php foreach ( $team_contact as $contact ) {
			                if($contact['contact_link']) { ?>
			                  <li><i class="<?php echo esc_attr($contact['contact_icon']); ?>" aria-hidden="true"></i><a href="<?php echo esc_url($contact['contact_link']); ?>" target="_blank"><?php echo esc_html($contact['contact_text']); ?></a></li>
			                <?php } else { ?>
			                  <li><i class="<?php echo esc_attr($contact['contact_icon']); ?>" aria-hidden="true"></i><?php echo esc_html($contact['contact_text']); ?></li>
			                <?php } } ?>
			            	</ul>
			            <?php } ?>
			            <div class="mate-meta">
			              <div class="row align-items-center">
			                <div class="col-6 social-title"><?php echo $meet_txt; ?></div>
			                <?php if ( ! empty( $team_socials ) ) { ?>
							        	<div class="col-6">
				                  <div class="wndfal-social">
				                    <?php foreach ( $team_socials as $social ) {
				                    if($social['icon_link']) { ?>
				                    	<a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
					                  <?php } } ?>
				                	</div>
			                	</div>
			                <?php } ?>
			              </div>
			            </div>
			          </div>
			        </div>
			      </div>
						<?php
					  endwhile;
					?>
		  	</div>
		  </div>
		</div> <!-- team End -->
		<?php
		endif;
		wp_reset_postdata();

		// wp_reset_postdata();
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Team widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Team() );
}
