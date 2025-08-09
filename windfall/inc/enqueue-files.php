<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'windfall_vt_scripts_styles' ) ) {
  function windfall_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', WINDFALL_CSS . '/font-awesome.min.css', array(), '4.7.0', 'all' );
    wp_enqueue_style( 'themify-icons', WINDFALL_CSS .'/themify-icons.min.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'linea-icons', WINDFALL_CSS .'/linea-icons.min.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'loaders-style', WINDFALL_CSS .'/loaders-style.min.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'magnific-popup', WINDFALL_CSS .'/magnific-popup.min.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'nice-select', WINDFALL_CSS .'/nice-select.min.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'owl-carousel', WINDFALL_CSS .'/owl.carousel.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'jquery-clockpicker', WINDFALL_CSS .'/jquery-clockpicker.min.css', array(), '0.0.7', 'all' );
    wp_enqueue_style( 'datepicker', WINDFALL_CSS .'/datepicker.min.css', array(), '1.0.4', 'all' );
    wp_enqueue_style( 'meanmenu', WINDFALL_CSS .'/meanmenu.css', array(), '2.0.7', 'all' );
    wp_enqueue_style( 'bootstrap-slider', WINDFALL_CSS .'/bootstrap-slider.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'bootstrap', WINDFALL_CSS .'/bootstrap.min.css', array(), '4.1.3', 'all' );
    wp_enqueue_style( 'windfall-styles', WINDFALL_CSS .'/styles.css', array(), WINDFALL_VERSION, 'all' );
    // Dynamic Styles
    // wp_enqueue_style( 'dynamic-style', WINDFALL_THEMEROOT_URI . '/inc/dynamic-style.php', array(), WINDFALL_VERSION, 'all' );

    // RTL Files
    if ( is_rtl() ) {
      wp_enqueue_style( 'windfall-style-rtl', WINDFALL_CSS .'/style-rtl.css', array(), WINDFALL_VERSION, 'all' );
      wp_style_add_data( 'windfall-style', 'rtl', 'replace' );
    }

    // Scripts
    wp_enqueue_script( 'popper', WINDFALL_SCRIPTS . '/popper.min.js', array( 'jquery' ), WINDFALL_VERSION, true );
    wp_enqueue_script( 'bootstrap', WINDFALL_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '4.1.3', true );
    wp_enqueue_script( 'html5shiv', WINDFALL_SCRIPTS . '/html5shiv.min.js', array( 'jquery' ), '3.7.0', true );
    wp_enqueue_script( 'range-slider', WINDFALL_SCRIPTS . '/range-slider.min.js', array( 'jquery' ), '9.5.3', true );
    wp_enqueue_script( 'respond', WINDFALL_SCRIPTS . '/respond.min.js', array( 'jquery' ), '1.4.2', true );
    wp_enqueue_script( 'placeholders', WINDFALL_SCRIPTS . '/placeholders.min.js', array( 'jquery' ), '4.0.1', true );
    wp_enqueue_script( 'jquery-sticky', WINDFALL_SCRIPTS . '/jquery.sticky.min.js', array( 'jquery' ), '1.0.4', true );
    wp_enqueue_script( 'jquery-nice-select', WINDFALL_SCRIPTS . '/jquery.nice-select.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'jarallax', WINDFALL_SCRIPTS . '/jarallax.min.js', array( 'jquery' ), '1.10.5', true );
    wp_enqueue_script( 'jquery-matchheight', WINDFALL_SCRIPTS . '/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.2', true );
    wp_enqueue_script( 'waypoints', WINDFALL_SCRIPTS . '/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
    wp_enqueue_script( 'owl-carousel', WINDFALL_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), '2.3.0', true );
    wp_enqueue_script( 'page-scroll', WINDFALL_SCRIPTS . '/page-scroll.min.js', array( 'jquery' ), '1.5.8', true );
    wp_enqueue_script( 'isotope', WINDFALL_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '3.0.1', true );
    wp_enqueue_script( 'packery-mode-pkgd', WINDFALL_SCRIPTS . '/packery-mode.pkgd.min.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'jquery-counterup', WINDFALL_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'jquery-magnific-popup', WINDFALL_SCRIPTS . '/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'loaders-style', WINDFALL_SCRIPTS . '/loaders-style.min.js', array( 'jquery' ), WINDFALL_VERSION, true );
    wp_enqueue_script( 'jquery-meanmenu', WINDFALL_SCRIPTS . '/jquery.meanmenu.js', array( 'jquery' ), '2.0.8', true );
    wp_enqueue_script( 'datepicker', WINDFALL_SCRIPTS . '/datepicker.min.js', array( 'jquery' ), '1.0.4', true );
    wp_enqueue_script( 'clockpicker', WINDFALL_SCRIPTS . '/clockpicker.min.js', array( 'jquery' ), '0.0.7', true );
    wp_enqueue_script( 'jquery-sticky-sidebar', WINDFALL_SCRIPTS . '/jquery-sticky-sidebar.min.js', array( 'jquery' ), '1.5.0', true );
    wp_enqueue_script( 'jquery-responsivetabs', WINDFALL_SCRIPTS . '/jquery-responsiveTabs.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'jquery-rateyo', WINDFALL_SCRIPTS . '/jquery-rateyo.min.js', array( 'jquery' ), '2.3.3', true );
    wp_enqueue_script( 'windfall-scripts', WINDFALL_SCRIPTS . '/scripts.js', array( 'jquery' ), WINDFALL_VERSION, true );
    wp_enqueue_script( 'swiper', WINDFALL_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '5.3.6', true );

    // Comments
    wp_enqueue_script( 'jquery-validate', WINDFALL_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'jquery-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive
    wp_enqueue_style( 'windfall-responsive', WINDFALL_CSS .'/responsive.css', array(), WINDFALL_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'windfall_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'windfall_vt_admin_scripts_styles' ) ) {
  function windfall_vt_admin_scripts_styles() {

    wp_enqueue_style( 'windfall-admin-main', WINDFALL_CSS . '/admin-styles.css', true );
    wp_enqueue_script( 'windfall-admin-scripts', WINDFALL_SCRIPTS . '/admin-scripts.js', true );
    wp_enqueue_style( 'themify-icons', WINDFALL_CSS .'/themify-icons.min.css', array(), WINDFALL_VERSION, 'all' );
    wp_enqueue_style( 'linea', WINDFALL_CSS .'/linea-icons.min.css', array(), WINDFALL_VERSION, 'all' );

  }
  add_action( 'admin_enqueue_scripts', 'windfall_vt_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'windfall_vt_wp_enqueue_styles' ) ) {
  function windfall_vt_wp_enqueue_styles() {
    windfall_vt_google_fonts();
    windfall_custom_google_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'windfall_vt_wp_enqueue_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function windfall_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'windfall_add_editor_styles' );
