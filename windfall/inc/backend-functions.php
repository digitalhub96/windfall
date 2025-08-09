<?php
/*
 * All Back-End Helper Functions for Windfall Theme
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/* Validate px entered in field */
if( ! function_exists( 'windfall_check_px' ) ) {
  function windfall_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Escape Strings */
if( ! function_exists( 'windfall_vt_esc_string' ) ) {
  function windfall_vt_esc_string( $num ) {
    return preg_replace('/\D/', '', $num);
  }
}

/* Escape Numbers */
if( ! function_exists( 'windfall_vt_esc_number' ) ) {
  function windfall_vt_esc_number( $num ) {
    return preg_replace('/[^a-zA-Z]/', '', $num);
  }
}

/* Compress CSS */
if ( ! function_exists( 'windfall_compress_css_lines' ) ) {
  function windfall_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'windfall_add_inline_style' ) ) {
  function windfall_add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* HEX to RGB */
if( ! function_exists( 'windfall_vt_hex2rgb' ) ) {
  function windfall_vt_hex2rgb( $hexcolor, $opacity = 1 ) {

    if( preg_match( '/^#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}$/i', $hexcolor ) ) {

      $hex    = str_replace( '#', '', $hexcolor );

      if( strlen( $hex ) == 3 ) {
        $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
      } else {
        $r    = hexdec( substr( $hex, 0, 2 ) );
        $g    = hexdec( substr( $hex, 2, 2 ) );
        $b    = hexdec( substr( $hex, 4, 2 ) );
      }

      return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;

    } else {

      return $hexcolor;

    }

  }
}

/* Yoast Plugin Metabox Low */
if( ! function_exists( 'windfall_vt_yoast_metabox' ) ) {
  function windfall_vt_yoast_metabox() {
    return 'low';
  }
  add_filter( 'wpseo_metabox_prio', 'windfall_vt_yoast_metabox' );
}

if( ! function_exists( 'windfall_is_post_type' ) ) {
  function windfall_is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
}

/**
 * If WooCommerce Plugin Activated
 */
if ( ! function_exists( 'windfall_is_woocommerce_activated' ) ) {
  function windfall_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

/**
 * If is WooCommerce Shop
 */
if ( ! function_exists( 'windfall_is_woocommerce_shop' ) ) {
  function windfall_is_woocommerce_shop() {
    if ( windfall_is_woocommerce_activated() && is_shop() ) { return true; } else { return false; }
  }
}

/**
 * If is WPML is active
 */
if ( ! function_exists( 'windfall_is_wpml_activated' ) ) {
  function windfall_is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 * Remove Rev Slider Metabox
 */
if ( is_admin() ) {
  if( ! function_exists( 'windfall_remove_rev_slider_meta_boxes' ) ) {
    function windfall_remove_rev_slider_meta_boxes() {
      remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'team', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'testimonial', 'normal' );
      remove_meta_box( 'mymetabox_revslider_0', 'apps', 'normal' );
    }
    add_action( 'do_meta_boxes', 'windfall_remove_rev_slider_meta_boxes' );
  }
}

/* Custom Styles */
if( ! function_exists( 'windfall_vt_custom_css' ) ) {
  function windfall_vt_custom_css() {
    wp_enqueue_style('windfall-default-style', get_template_directory_uri() . '/style.css');
    $output = windfall_dynamic_styles();
    $custom_css = windfall_compress_css_lines( $output );

    wp_add_inline_style( 'windfall-default-style', $custom_css );
  }
}

/**
 * Check if Codestar Framework is Active or Not!
 */
if ( ! function_exists( 'windfall_framework_active' ) ) {
  function windfall_framework_active() {
    return ( class_exists( 'CSF' ) ) ? true : false;
  }
}

// A Custom function for Windfall Options
if ( ! function_exists( 'cs_get_option' ) ) {
  function cs_get_option( $option = '', $default = null ) {
    $options = get_option( 'windfall_csf_theme_options' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

// A Custom function for Windfall Customizer Options
if ( ! function_exists( 'cs_get_customize_option' ) ) {
  function cs_get_customize_option( $option = '', $default = null ) {
    $options = get_option( 'windfall_csf_customizer' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}

// Removing the classic editor for Widget area in WP 5.8 update
function windfall_theme_support() {
  remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'windfall_theme_support' );
