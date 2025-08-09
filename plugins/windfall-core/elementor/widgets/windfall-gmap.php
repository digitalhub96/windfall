<?php
/*
 * Elementor Windfall Google map Widget
 * Author & Copyright: VictorTheme
*/

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Windfall_Gmap extends Widget_Base{

	/**
	 * Retrieve the widget name.
	*/
	public function get_name(){
		return 'vt-windfall_gmap';
	}

	/**
	 * Retrieve the widget title.
	*/
	public function get_title(){
		return esc_html__( 'Google map', 'windfall-core' );
	}

	/**
	 * Retrieve the widget icon.
	*/
	public function get_icon() {
		return 'fa fa-map';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	*/
	public function get_categories() {
		return ['victortheme-category'];
	}

	/**
	 * Retrieve the list of scripts the Windfall Google map widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	*/
	public function get_script_depends() {
		return ['vt-windfall_gmap'];
	}
	
	
	/**
	 * Register Windfall Google map widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	*/
	protected function register_controls(){
		
		$this->start_controls_section(
			'section_gmap_api',
			[
				'label' => esc_html__( 'Map ( API KEY ) Options', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gmap_id',
			[
				'label' => esc_html__( 'Enter Map ID', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type map id here', 'windfall-core' ),
				'description' => __( 'Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong>', 'windfall-core'),
			]
		);
		$this->add_control(
			'gmap_api',
			[
				'label' => esc_html__( 'Google Map API Key', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Type map api key here', 'windfall-core' ),
				'description' => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'windfall-core'),
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_gmap_settings',
			[
				'label' => esc_html__( 'Map Settings', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gmap_type',
			[
				'label' => __( 'Google Map Type', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ROADMAP' => esc_html__( 'ROADMAP', 'windfall-core' ),
					'SATELLITE' => esc_html__( 'SATELLITE', 'windfall-core' ),
					'HYBRID' => esc_html__( 'HYBRID', 'windfall-core' ),
					'TERRAIN' => esc_html__( 'TERRAIN', 'windfall-core' ),
				],
				'default' => 'ROADMAP',
			]
		);
		$this->add_control(
			'gmap_style',
			[
				'label' => __( 'Google Map Style', 'windfall-core' ),
				'type' => Controls_Manager::SELECT,
				'condition' => [
					'gmap_type' => 'ROADMAP',
				],
				'frontend_available' => true,
				'options' => array_flip([
					__( 'Select Style', 'windfall-core' ) => '',
					__( 'Gray Scale', 'windfall-core' ) => "gray-scale",
					__( 'Mid Night', 'windfall-core' ) => "mid-night",
					__( 'Black', 'windfall-core' ) => "black-road",
					__( 'Blue Water', 'windfall-core' ) => 'blue-water',
					__( 'Light Dream', 'windfall-core' ) => 'light-dream',
					__( 'Pale Dawn', 'windfall-core' ) => 'pale-dawn',
					__( 'Apple Maps-esque', 'windfall-core' ) => 'apple-maps',
					__( 'Blue Essence', 'windfall-core' ) => 'blue-essence',
					__( 'Unsaturated Browns', 'windfall-core' ) => 'unsaturated-browns',
					__( 'Paper', 'windfall-core' ) => 'paper',
					__( 'Midnight Commander', 'windfall-core' ) => 'midnight-commander',
					__( 'Light Monochrome', 'windfall-core' ) => 'light-monochrome',
					__( 'Flat Map', 'windfall-core' ) => 'flat-map',
					__( 'Retro', 'windfall-core' ) => 'retro',
					__( 'becomeadinosaur', 'windfall-core' ) => 'becomeadinosaur',
					__( 'Neutral Blue', 'windfall-core' ) => 'neutral-blue',
					__( 'Subtle Grayscale', 'windfall-core' ) => 'subtle-grayscale',
					__( 'Ultra Light with Labels', 'windfall-core' ) => 'ultra-light-labels',
					__( 'Shades of Grey', 'windfall-core' ) => 'shades-grey',
				]),
				'default' => 'gray-scale',
			]
		);
		$this->add_control(
			'zoom',
			[
				'label' => esc_html__( 'Zoom', 'windfall-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'gmap_common_marker',
			[
				'label' => esc_html__( 'Common Marker', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Upload your custom marker.', 'windfall-core'),
			]
		);
		$this->end_controls_section();// end: Section
		
		
		$this->start_controls_section(
			'section_gmap_on_off',
			[
				'label' => esc_html__( 'Enable & Disable', 'windfall-core' ),
			]
		);
		$this->add_control(
			'gmap_scroll_wheel',
			[
				'label' => esc_html__( 'Scroll Wheel', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'false',
			]
		);
		$this->add_control(
			'gmap_street_view',
			[
				'label' => esc_html__( 'Street View Control', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'false',
			]
		);
		$this->add_control(
			'gmap_maptype_control',
			[
				'label' => esc_html__( 'Map Type Control', 'windfall-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'windfall-core' ),
				'label_off' => esc_html__( 'No', 'windfall-core' ),
				'return_value' => 'false',
			]
		);
		$this->end_controls_section();// end: Section
		
		
		$this->start_controls_section(
			'section_map_pins',
			[
				'label' => esc_html__( 'Map Pins', 'windfall-core' ),
			]
		);
		
		$repeater = new Repeater();
		$repeater->add_control(
			'latitude',
			[
				'label' => esc_html__( 'Latitude', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'longitude',
			[
				'label' => esc_html__( 'Longitude', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'windfall-core' ),
			]
		);
		$repeater->add_control(
			'custom_marker',
			[
				'label' => esc_html__( 'Custom Marker', 'windfall-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__( 'Upload your unique map marker if your want to differentiate from others.', 'windfall-core'),
				'label_block' => true,
				
			]
		);
		$repeater->add_control(
			'location_heading',
			[
				'label' => esc_html__( 'Heading', 'windfall-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'location_text',
			[
				'label' => __( 'Content', 'windfall-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'label_block' => true,
			]
		);
		$this->add_control(
			'locations_groups',
			[
				'label' => esc_html__( 'Locations', 'windfall-core' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'location_heading' => esc_html__( 'Item #1', 'windfall-core' ),
					],
					
				],
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ location_heading }}}',
			]
		);
		$this->end_controls_section();// end: Section
		
		$this->start_controls_section(
			'section_gmap_style',
			[
				'label' => esc_html__( 'Gmap Options', 'windfall-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'gmap_height',
			[
				'label' => esc_html__( 'Height', 'windfall-core' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' =>1,
						'step' => 1,
					],
				],
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .wndfal-gmapElementor' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
		$this->add_control(
			'gmap_custom_css',
			[
				'label' => esc_html__( 'Custom Css', 'windfall-core' ),
				'type' => Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 10,
			]
		);
		$this->end_controls_section();// end: Section
		
	}

	/**
	 * Render Google map widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();
		$gmap_id = !empty( $settings['gmap_id'] ) ? $settings['gmap_id'] : '';
		$gmap_api = !empty( $settings['gmap_api'] ) ? $settings['gmap_api'] : '';
		$gmap_type = !empty( $settings['gmap_type'] ) ? $settings['gmap_type'] : '';
		$gmap_style = !empty( $settings['gmap_style'] ) ? $settings['gmap_style'] : '';
		$zoom = !empty( $settings['zoom'] ) ? $settings['zoom'] : '';
		$gmap_common_marker = !empty( $settings['gmap_common_marker']['id'] ) ? $settings['gmap_common_marker']['id'] : '';
		$gmap_scroll_wheel  = ( isset( $settings['gmap_scroll_wheel'] ) && ( 'true' == $settings['gmap_scroll_wheel'] ) ) ? true : false;
		$gmap_street_view  = ( isset( $settings['gmap_street_view'] ) && ( 'true' == $settings['gmap_street_view'] ) ) ? true : false;
		$gmap_maptype_control  = ( isset( $settings['gmap_maptype_control'] ) && ( 'true' == $settings['gmap_maptype_control'] ) ) ? true : false;
		$locations_groups = !empty( $settings['locations_groups'] ) ? $settings['locations_groups'] : '';
		$gmap_custom_css = !empty( $settings['gmap_custom_css'] ) ? $settings['gmap_custom_css'] : '';
		
		// Atts
		$gmap_id = $gmap_id ? 'id="'. $gmap_id .'"' : '';
		$gmap_api = $gmap_api ? '?key='. $gmap_api : '';
		$gmap_type = $gmap_type ? $gmap_type : 'ROADMAP';
		$gmap_scroll_wheel = $gmap_scroll_wheel ? 'true' : 'false';
		$gmap_street_view = $gmap_street_view ? 'true' : 'false';
		$gmap_maptype_control = $gmap_maptype_control ? 'true' : 'false';
		if ($gmap_style === 'mid-night') {
		  $gmap_style_actual = "[{featureType:'water',stylers:[{color:'#021019'}]},{featureType:'landscape',stylers:[{color:'#08304b'}]},{featureType:'poi',elementType:'geometry',stylers:[{color:'#0c4152'},{lightness:5}]},{featureType:'road.highway',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'road.highway',elementType:'geometry.stroke',stylers:[{color:'#0b434f'},{lightness:25}]},{featureType:'road.arterial',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'road.arterial',elementType:'geometry.stroke',stylers:[{color:'#0b3d51'},{lightness:16}]},{featureType:'road.local',elementType:'geometry',stylers:[{color:'#000000'}]},{elementType:'labels.text.fill',stylers:[{color:'#ffffff'}]},{elementType:'labels.text.stroke',stylers:[{color:'#000000'},{lightness:13}]},{featureType:'transit',stylers:[{color:'#146474'}]},{featureType:'administrative',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'administrative',elementType:'geometry.stroke',stylers:[{color:'#144b53'},{lightness:14},{weight:1.4}]}]";
		} elseif ($gmap_style === 'black-road') {
		  $gmap_style_actual = '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]';
		} elseif ($gmap_style === 'blue-water') {
		  $gmap_style_actual = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]';
		} elseif ($gmap_style === 'light-dream') {
		  $gmap_style_actual = '[{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]';
		} elseif ($gmap_style === 'pale-dawn') {
		  $gmap_style_actual = '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]';
		} elseif ($gmap_style === 'apple-maps') {
		  $gmap_style_actual = '[{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]';
		} elseif ($gmap_style === 'blue-essence') {
		  $gmap_style_actual = '[{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]';
		} elseif ($gmap_style === 'unsaturated-browns') {
		  $gmap_style_actual = '[{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","elementType":"labels.icon"},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}]';
		} elseif ($gmap_style === 'paper') {
		  $gmap_style_actual = '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"simplified"},{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"off"},{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]}]';
		} elseif ($gmap_style === 'midnight-commander') {
		  $gmap_style_actual = '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}]';
		} elseif ($gmap_style === 'light-monochrome') {
		  $gmap_style_actual = '[{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}]';
		} elseif ($gmap_style === 'flat-map') {
		  $gmap_style_actual = '[{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]}]';
		} elseif ($gmap_style === 'retro') {
		  $gmap_style_actual = '[{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-17},{"gamma":0.36}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}]';
		} elseif ($gmap_style === 'becomeadinosaur') {
		  $gmap_style_actual = '[{"elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#f5f5f2"},{"visibility":"on"}]},{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#ffffff"},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"visibility":"simplified"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"color":"#ffffff"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#71c8d4"}]},{"featureType":"landscape","stylers":[{"color":"#e5e8e7"}]},{"featureType":"poi.park","stylers":[{"color":"#8ba129"}]},{"featureType":"road","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.sports_complex","elementType":"geometry","stylers":[{"color":"#c7c7c7"},{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#a0d3d3"}]},{"featureType":"poi.park","stylers":[{"color":"#91b65d"}]},{"featureType":"poi.park","stylers":[{"gamma":1.51}]},{"featureType":"road.local","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","stylers":[{"visibility":"simplified"}]},{"featureType":"road"},{"featureType":"road"},{},{"featureType":"road.highway"}]';
		} elseif ($gmap_style === 'neutral-blue') {
		  $gmap_style_actual = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]';
		} elseif ($gmap_style === 'subtle-grayscale') {
		  $gmap_style_actual = '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]';
		} elseif ($gmap_style === 'ultra-light-labels') {
		  $gmap_style_actual = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]';
		} elseif ($gmap_style === 'shades-grey') {
		  $gmap_style_actual = '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]';
		} elseif ($gmap_style === 'gray-scale') {
		  $gmap_style_actual = "[{featureType:'all',elementType:'all',stylers:[{saturation: -100}]}]";
		} else {
		  $gmap_style_actual = "[]";
		}
		if ($gmap_common_marker) {
		  $common_marker = wp_get_attachment_url( $gmap_common_marker );
		  $common_marker = $common_marker;
		} else {
		  $common_marker = WINDFALL_PLUGIN_ASTS . '/images/map-marker.png';
		}

		// Group Field
		$get_locations = array();
		if( is_array( $locations_groups ) && !empty( $locations_groups ) ){
			foreach ( $locations_groups as $location ) {
			  $location = $location;
			  $location['latitude'] = $location['latitude'] ? $location['latitude'] : '';
			  $location['longitude'] = $location['longitude'] ? $location['longitude'] : '';
			  $location['custom_marker'] = $location['custom_marker'] ? $location['custom_marker'] : '';
			  $location['location_text'] = $location['location_text'] ? $location['location_text'] : '';
			  $location['location_heading'] = $location['location_heading'] ? $location['location_heading'] : '';
			  $get_locations[] = $location;
			}
		}

		// Shortcode Style CSS
		$e_uniqid        = uniqid();
		
		$styled_class  = ' wndfal-gmapElementor';

		wp_enqueue_script( 'vtheme-googlemap', WINDFALL_PLUGIN_ASTS . '/jquery.googlemap.js', array( 'jquery' ), '1.5.0', true );
		wp_enqueue_script( 'vtheme-map-api', '//maps.googleapis.com/maps/api/js'. $gmap_api .'', array( 'jquery' ), '', true );

		// Turn output buffer on
		ob_start();

		// Map Tab ID
		if ($gmap_id) {
		  $gmap_open = '<div '. $gmap_id .' class="wndfal-gmap-tab tab-pane fade">';
		  $gmap_close = '</div>';
		} else {
		  $gmap_open = '';
		  $gmap_close = '';
		}

		echo $gmap_open;
		echo '<div id="map-'. $e_uniqid .'" class="wndfal-google-map '. $styled_class .'"></div>';
		echo $gmap_close;

	?>
		<script>
		// Custom Map Script
		jQuery(document).ready(function($) {
		  $("#<?php echo esc_js('map-'. $e_uniqid); ?>").googleMap({
			zoom: <?php echo esc_js($zoom); ?>,
			type: "<?php echo esc_js($gmap_type); ?>",
			styles: <?php echo $gmap_style_actual; ?>,
			streetViewControl: <?php echo esc_js($gmap_street_view); ?>,
			scrollwheel: <?php echo esc_js($gmap_scroll_wheel); ?>,
			mapTypeControl: <?php echo esc_js($gmap_maptype_control); ?>,
			<?php
			$first = true;
			if( is_array( $locations_groups ) && !empty( $locations_groups ) ){
				foreach ( $locations_groups as $location ) {
				  if ( $first ) {
					$first = false;
					$latitude = $location['latitude'];
					$longitude = $location['longitude'];
					?>
					coords: [<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>],
					<?php
				  } else {
				  }
				}
			}
			?>
		  });
		  <?php 
		  if( is_array( $locations_groups ) && !empty( $locations_groups ) ){
		  foreach ( $locations_groups as $location ) {
			$latitude = $location['latitude'];
			$longitude = $location['longitude'];
			$marker_url = $location['custom_marker'] ? wp_get_attachment_url( $location['custom_marker'] ) : '';
			$marker = $location['custom_marker'] ? $marker_url : $common_marker;
			$heading = ($location['location_heading']) ? 'title: "'. $location['location_heading'] .'",' : '';
			$text = ($location['location_text']) ? 'text: "'. $location['location_text'] .'",' : '';
		  ?>
		  $("#<?php echo esc_js('map-'. $e_uniqid); ?>").addMarker({
			coords: [<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>],
			icon: '<?php echo esc_url($marker); ?>',
			<?php echo $heading;
			echo $text; ?>
		  });
		  <?php } 
		  }
		  ?>
		});
		</script>
		<style><?php echo $gmap_custom_css; ?></style>
	<?php
		// Return outbut buffer
		echo ob_get_clean();
		
	}

	/**
	 * Render Google map widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	*/
	 
	//protected function _content_template(){}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new Windfall_Gmap() );
