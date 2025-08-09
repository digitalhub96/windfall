<?php
/*
 * Windfall Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

if ( ! function_exists( 'windfall_vt_widget_init' ) ) {
	function windfall_vt_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'windfall' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'windfall' ),
					'before_widget' => '<div id="%1$s" class="wndfal-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);

		  // Footer Widgets
			$footer_widgets = cs_get_option( 'footer_widget_layout' );
	    if( $footer_widgets ) {

	      switch ( $footer_widgets ) {
	        case 5:
	        case 6:
	        case 7:
	          $length = 3;
	        break;

	        case 8:
	        case 9:
	        case 10:
	          $length = 4;
	        break;
	        default:
	          $length = $footer_widgets;
	        break;
	      }

	      for( $i = 0; $i < $length; $i++ ) {
	      	$space_class = '';
	        $num = ( $i+1 );
	        if ($length == 5) {
		        if ($num == 2) {
		        	$space_class = ' widget-spacer-one';
		        } else {
		        	$space_class = '';
		        }
	        }
	        register_sidebar( array(
	          'id'            => 'footer-' . $num,
	          'name'          => esc_html__( 'Footer Widget ', 'windfall' ). $num,
	          'description'   => esc_html__( 'Appears on footer section.', 'windfall' ),
	          'before_widget' => '<div class="footer-widget'.$space_class.' %2$s">',
	          'after_widget'  => '<div class="clear"></div></div> <!-- end widget -->',
	          'before_title'  => '<h4 class="footer-widget-title">',
	          'after_title'   => '</h4>'
	        ) );

	      }

	    }
	    // Footer Widgets

	    // Shop Widget
			register_sidebar(
				array(
					'name' => esc_html__( 'Shop Widget', 'windfall' ),
					'id' => 'sidebar-shop',
					'description' => esc_html__( 'Appears on WooCommerce Pages.', 'windfall' ),
					'before_widget' => '<div id="%1$s" class="wndfal-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);
			// Shop Widget

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];

				register_sidebar( array(
					'name' => esc_html($heading),
					'id' => $own_id,
					'description' => esc_html($desc),
					'before_widget' => '<div id="%1$s" class="wndfal-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'windfall_vt_widget_init' );
}
