<?php
/*
 * All theme related setups here.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/* Set content width */
if ( ! isset( $content_width ) ) $content_width = 1170;

/* Register menu */
register_nav_menus( array(
	'primary' => esc_html__( 'Main Navigation', 'windfall' )
) );

/* Thumbnails */
add_theme_support( 'post-thumbnails' );

/* Feeds */
add_theme_support( 'automatic-feed-links' );

/* Add support for Title Tag. */
add_theme_support( 'title-tag' );

/* WooCommerce */
add_theme_support( 'woocommerce' );

/* Breadcrumb Trail Support */
add_theme_support( 'breadcrumb-trail' );

/* HTML5 */
add_theme_support( 'html5', array( 'gallery', 'caption' ) );

/* Extend wp_title */
if( ! function_exists( 'windfall_theme_wp_title' ) ) {
	function windfall_theme_wp_title( $title, $sep ) {
	 global $paged, $page;

	 if ( is_feed() )
	  return $title;

	 // Add the site name.
	 $site_name = get_bloginfo( 'name' );

	 // Add the site description for the home/front page.
	 $site_description = get_bloginfo( 'description', 'display' );
	 if ( $site_description && ( is_front_page() ) )
	  $title = "$site_name $sep $site_description";

	 // Add a page number if necessary.
	 if ( $paged >= 2 || $page >= 2 )
	  $title = "$site_name $sep" . sprintf( esc_html__( ' Page %s', 'windfall' ), max( $paged, $page ) );

	 return $title;
	}
	add_filter( 'wp_title', 'windfall_theme_wp_title', 10, 2 );
}

/* Languages */
if( ! function_exists( 'windfall_theme_language_setup' ) ) {
	function windfall_theme_language_setup(){
	  load_theme_textdomain( 'windfall', get_template_directory() . '/languages' );
	}
	add_action('after_setup_theme', 'windfall_theme_language_setup');
}

/* Slider Revolution Theme Mode */
if(function_exists( 'set_revslider_as_theme' )){
	add_action( 'init', 'windfall_theme_revslider' );
	function windfall_theme_revslider() {
		set_revslider_as_theme();
	}
}
