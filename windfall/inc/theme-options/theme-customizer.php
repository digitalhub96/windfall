<?php
/*
 * All customizer related options for Windfall theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'windfall_csf_customizer';

  // Create customize options
  CSF::createCustomizeOptions( $prefix );

  // Primary Color
  CSF::createSection( $prefix, array(
	  'title'       => esc_html__('Primary Color', 'windfall'),
  	'priority' 		=> 1,
    'fields' => array(

      array(
	      'id'      => 'all_element_colors',
	      'type'    => 'color',
	      'title' => esc_html__('Elements Primary Color', 'windfall'),
				'desc'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'windfall'),
	      'default' => '#ff6600',
	    ),

    )
  ) );

  // Secondary Color
  CSF::createSection( $prefix, array(
    'name'        => 'elemets_sec_color_section',
	  'title'       => esc_html__('Secondary Color', 'windfall'),
  	'priority' 		=> 2,
    'fields' => array(

      array(
	      'id'      => 'all_element_secondary_colors',
	      'type'    => 'color',
	      'title' => esc_html__('Elements Secondary Color', 'windfall'),
				'desc'    => esc_html__('This is theme secondary color, means it\'ll affect all elements that have default color of our theme secondary color.', 'windfall'),
	      'default' => '#034170',
	    ),

    )
  ) );

  // Topbar Color
  CSF::createSection( $prefix, array(
    'name'        => 'topbar_color_section',
	  'title'       => esc_html__('01. Topbar Colors', 'windfall'),
  	'priority' 		=> 3,
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Top Bar', 'windfall'),
      ),
      array(
	      'id'        => 'topbar_bg_color',
	      'type'      => 'color_group',
	      'title' => esc_html__('Background & Border Color', 'windfall'),
	      'options'   => array(
	        'bg_color' => 'Background Color',
	        'border_color' => 'Border Color',
	      )
	    ),
	    array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Top Bar Common Color', 'windfall'),
      ),
      array(
	      'id'      => 'topbar_text_color',
	      'type'    => 'color',
	      'title' => esc_html__('Text Color', 'windfall'),
	    ),
	    array(
        'id'        => 'topbar_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),

    )
  ) );

  // Header Color
  CSF::createSection( $prefix, array(
	  'id'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'windfall'),
	  'priority' => 4,
	) );

	// Normal Header
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'header_color_section',
    'name'        => 'normal_header_section',
	  'title'       => esc_html__('Header Style One', 'windfall'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Header Colors', 'windfall'),
      ),
      array(
        'id'      => 'header_bg_color',
        'type'    => 'color',
        'title' => esc_html__('Background Color', 'windfall'),
      ),
      array(
        'id'      => 'header_text_color',
        'type'    => 'color',
        'title' => esc_html__('Text Color', 'windfall'),
      ),
      array(
        'id'        => 'header_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Main Menu Colors', 'windfall'),
      ),
      array(
	      'id'      => 'menubar_bg_color',
	      'type'    => 'color',
	      'title' => esc_html__('Background Color', 'windfall'),
	    ),
      array(
        'id'        => 'menu_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),
	    array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sub-Menu Colors', 'windfall'),
      ),
      array(
        'id'        => 'submenu_bg_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Background Color', 'windfall'),
      ),
	    array(
        'id'        => 'submenu_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Header Button Colors', 'windfall'),
      ),
      array(
        'id'        => 'button_bg_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Background Color', 'windfall'),
      ),
      array(
        'id'        => 'button_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Text Color', 'windfall'),
      ),
      array(
        'id'        => 'button_border_color',
        'type'      => 'color',
        'title'     => esc_html__('Border Color', 'windfall'),
      ),

    )
  ) );

  // Header Style Two
  CSF::createSection( $prefix, array(
    'parent'      => 'header_color_section',
    'name'        => 'header_two_section',
    'title'       => esc_html__('Header Style Two', 'windfall'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Header Colors', 'windfall'),
      ),
      array(
        'id'      => 'header_two_bg_color',
        'type'    => 'color',
        'title' => esc_html__('Background Color', 'windfall'),
      ),
      array(
        'id'      => 'header_two_text_color',
        'type'    => 'color',
        'title' => esc_html__('Text Color', 'windfall'),
      ),
      array(
        'id'        => 'header_two_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sub-Menu Colors', 'windfall'),
      ),
      array(
        'id'        => 'submenu_bg_color_two',
        'type'      => 'link_color',
        'title'     => esc_html__('Background Color', 'windfall'),
      ),
      array(
        'id'        => 'submenu_link_color_two',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Header Button Colors', 'windfall'),
      ),
      array(
        'id'        => 'button_bg_color_two',
        'type'      => 'link_color',
        'title'     => esc_html__('Background Color', 'windfall'),
      ),
      array(
        'id'        => 'button_link_color_two',
        'type'      => 'link_color',
        'title'     => esc_html__('Text Color', 'windfall'),
      ),
      array(
        'id'        => 'button_border_color_two',
        'type'      => 'color',
        'title'     => esc_html__('Border Color', 'windfall'),
      ),

    )
  ) );

  // Mobile Menu
  CSF::createSection( $prefix, array(
    'parent'      => 'header_color_section',
    'name'        => 'mobile_menu_section',
    'title'       => esc_html__('Mobile Menu', 'windfall'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Mobile Menu Colors', 'windfall'),
      ),
      array(
        'id'        => 'mobile_menu_color',
        'type'      => 'color_group',
        'title' => esc_html__('Menu Colors', 'windfall'),
        'options'   => array(
          'toggle_color' => 'Menu Toggle Color',
          'bg_color' => 'Menu Background Color',
          'border_color' => 'Border Color',
        )
      ),
      array(
        'id'        => 'mobile_menu_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'windfall'),
      ),
      array(
        'id'        => 'mobile_menu_expand_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Menu Expand Color', 'windfall'),
      ),
      array(
        'id'        => 'mobile_menu_expand_bg_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Menu Expand Background Color', 'windfall'),
      ),

    )
  ) );

  // Title Bar
  CSF::createSection( $prefix, array(
    'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'windfall'),
	  'priority' => 6,
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Title Colors', 'windfall'),
      ),
      array(
	      'id'        => 'titlebar_title_color',
	      'type'      => 'color',
	      'title' => esc_html__('Title Color', 'windfall'),
	    ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Breadcrumb Colors', 'windfall'),
      ),
      array(
        'id'        => 'breadcrumb_bg_color',
        'type'      => 'color',
        'title' => esc_html__('Background Color', 'windfall'),
      ),
      array(
        'id'        => 'breadcrumb_border_color',
        'type'      => 'color',
        'title' => esc_html__('Border Color', 'windfall'),
      ),
      array(
        'id'        => 'breadcrumb_text_color',
        'type'      => 'color',
        'title' => esc_html__('Text Color', 'windfall'),
      ),
      array(
        'id'        => 'breadcrumb_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Breadcrumb Link Color', 'windfall'),
      ),

    )
  ) );

  // Content Color
  CSF::createSection( $prefix, array(
	  'id'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'windfall'),
	  'desc' => esc_html__('This is all about content area text and heading colors.', 'windfall'),
	  'priority' => 7,
	) );

	// Content
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'content_section',
    'name'          => 'content_text_section',
    'title'         => esc_html__('Content Text', 'windfall'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Body Content', 'windfall'),
      ),
      array(
	      'id'      => 'body_color',
	      'type'    => 'color',
	      'title'   => esc_html__('Body & Content Color', 'windfall'),
	    ),
      array(
        'id'        => 'body_links_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Body Links Color', 'windfall'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sidebar Content', 'windfall'),
      ),
      array(
	      'id'      => 'sidebar_content_color',
	      'type'    => 'color',
	      'title'   => esc_html__('Sidebar Content Color', 'windfall'),
	    ),
      array(
        'id'        => 'sidebar_links_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Sidebar Links Color', 'windfall'),
      ),

    )
  ) );

  // Headings
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'content_section',
    'name'          => 'content_heading_section',
    'title'         => esc_html__('Headings', 'windfall'),
    'fields' => array(

      array(
	      'id'        => 'content_heading_color',
	      'type'      => 'color_group',
	      'title' => esc_html__('Headings', 'windfall'),
	      'options'   => array(
	        'content_heading_color' => 'Content Heading',
	        'sidebar_heading_color' => 'Sidebar Heading',
	      )
	    ),

    )
  ) );

  // Content Color
  CSF::createSection( $prefix, array(
	  'id'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'windfall'),
	  'desc' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Windfall > Theme Options > Footer', 'windfall'),
	  'priority' => 8,
	) );

  // Footer Widget Colors
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'footer_section',
    'name'        => 'footer_widget_section',
	  'title'       => esc_html__('Widget Block', 'windfall'),
    'fields' => array(

      array(
	      'id'        => 'footer_colors',
	      'type'      => 'color_group',
	      'title' => esc_html__('Footer Colors', 'windfall'),
	      'options'   => array(
	        'footer_bg_color' => 'Background Color',
	        'footer_heading_color' => 'Heading Color',
	        'footer_text_color' => 'Content Color',
	      )
	    ),
	    array(
        'id'        => 'footer_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Footer Link Color', 'windfall'),
      ),

    )
  ) );

  // Footer Copyright Colors
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'footer_section',
    'name'        => 'copyright_section',
	  'title'       => esc_html__('Copyright Block', 'windfall'),
    'fields' => array(

      array(
	      'id'        => 'copyright_colors',
	      'type'      => 'color_group',
	      'title' => esc_html__('Copyright Colors', 'windfall'),
	      'options'   => array(
	        'copyright_bg_color' => 'Background Color',
	        'copyright_text_color' => 'Content Color',
	      )
	    ),
	    array(
        'id'        => 'copyright_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Copyright Link Color', 'windfall'),
      ),

    )
  ) );

}
