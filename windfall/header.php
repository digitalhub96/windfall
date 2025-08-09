<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(WINDFALL_IMAGES); ?>/favicon.png" />
<?php }
$windfall_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($windfall_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($windfall_all_element_color); ?>">

<link rel="profile" href="//gmpg.org/xfn/11">

<?php
// Metabox
global $post;
$windfall_id    = ( isset( $post ) ) ? $post->ID : false;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $windfall_id : false;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

// Header Style
$windfall_sticky_header      = cs_get_option('sticky_header');
$windfall_sticky_footer      = cs_get_option('sticky_footer');

if ($windfall_sticky_footer) {
  $footer_class = ' wndfal-sticky-footer';
} else {
  $footer_class = '';
}
if ($windfall_sticky_header) {
  $header_class = ' wndfal-sticky';
} else {
  $header_class = '';
}
// fullwidth Topbar
if ($windfall_meta) {
  $hide_header  = $windfall_meta['hide_header'];
  $windfall_header_design_actual  = $windfall_meta['select_header_design'];
  $final_fullwidth_menubar = $windfall_meta['fullwidth_menubar'];
  $windfall_search_icon        = $windfall_meta['search_icon'];
} else {
  $hide_header = '';
  $windfall_header_design_actual  = cs_get_option('select_header_design');
  $final_fullwidth_menubar = cs_get_option('fullwidth_menubar');
  $windfall_search_icon        = cs_get_option('search_icon');
}

if ($windfall_meta && $windfall_meta['one_page_menu']) {
  $one_page_menu = $windfall_meta['one_page_menu'];
} else {
  $one_page_menu = '';
}

// One Page Menu
if($one_page_menu) {
  $parallax_menu_class = ' smooth-scroll';
} else {
  $parallax_menu_class = '';
}

// Header Style
if($windfall_meta && $windfall_header_design_actual != 'default') {
  $windfall_header_design_actual = $windfall_meta['select_header_design'];
} else {
  $windfall_header_design_actual  = cs_get_option('select_header_design');
}
if($windfall_header_design_actual === 'style_two') {
  $header_style_class = ' header-style-two';
} else {
  $header_style_class = ' header-style-one';
}

// Menu Bar Fullwidth
if($windfall_meta && $final_fullwidth_menubar != 'default') {
  $final_fullwidth_menubar = $windfall_meta['fullwidth_menubar'];
} else {
  $final_fullwidth_menubar = cs_get_option('fullwidth_menubar');
}

$header_contact = cs_get_option('header_contact');
$header_btns = cs_get_option('header_btns');

if($final_fullwidth_menubar === 'fullwidth') {
  $menubar_class = ' fullwidth-menubar';
} else {
  $menubar_class = ' container-menubar';
}


wp_head();

// Dynamic styles include
do_action('windfall-vt-dynamic-styles');
?>
</head>
<body <?php body_class(); ?>>
<!-- Full Page -->
<!-- Hanor Main Wrap -->
<div class="wndfal-main-wrap <?php echo esc_attr($footer_class.$header_style_class.$menubar_class); ?>">
  <!-- Hanor Main Wrap Inner -->
  <div class="main-wrap-inner">
  <!-- Windfall Topbar -->
  <?php get_template_part( 'layouts/header/top', 'bar' );
  if(!$hide_header) {
  // Header
  do_action( 'windfall_before_header_action' ); // Windfall Action
  if($windfall_header_design_actual === 'style_two') { ?>
  <header class="wndfal-header <?php echo esc_attr($parallax_menu_class.$header_class); ?>">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-6 col-sm-5 col-8">
          <?php get_template_part( 'layouts/header/logo' ); ?>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-7 col-4">
          <div class="header-right">
            <?php get_template_part( 'layouts/header/menu', 'bar' );
            echo do_shortcode($header_btns); ?> <!-- WindfallWP -->
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php } else { ?>
  <header class="wndfal-header <?php echo esc_attr($parallax_menu_class.$header_class); ?>">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-sm-6">
          <?php  get_template_part( 'layouts/header/logo' ); ?>
        </div>
        <div class="col-lg-9 col-sm-6">
          <div class="header-right">
            <?php echo do_shortcode($header_contact); // WindfallWP
            echo do_shortcode($header_btns); ?> <!-- WindfallWP -->
          </div>
        </div>
      </div>
      <?php if($final_fullwidth_menubar != 'fullwidth') {
        get_template_part( 'layouts/header/menu', 'bar' );
      } ?>
    </div>
      <?php if($final_fullwidth_menubar === 'fullwidth') {
        get_template_part( 'layouts/header/menu', 'bar' );
      } ?>
  </header>
  <?php do_action( 'windfall_after_header_action' ); // Windfall Action
  } }
  // Title Area
  $windfall_need_title_bar = cs_get_option('need_title_bar');
  // WindfallWP 
  if($windfall_need_title_bar) {
    get_template_part( 'layouts/header/title', 'bar' );
  }

  $windfall_need_breadcrumbs = cs_get_option('need_breadcrumbs');
  // WindfallWP
  if($windfall_need_breadcrumbs) {
    get_template_part( 'layouts/header/breadcrumbs', 'bar' );
  }
