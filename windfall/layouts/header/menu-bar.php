<?php
// Metabox
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $windfall_id : false;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );
// Header Style - ThemeOptions & Metabox

$header_btns = cs_get_option('header_btns');
$windfall_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$windfall_breakpoint = $windfall_mobile_breakpoint ? $windfall_mobile_breakpoint : '1199';
if ($windfall_meta) {
  $windfall_choose_menu = $windfall_meta['choose_menu'];
  $windfall_search_icon        = $windfall_meta['search_icon'];
  $final_fullwidth_menubar = $windfall_meta['fullwidth_menubar'];
  $windfall_header_design_actual  = $windfall_meta['select_header_design'];
} else { 
  $windfall_choose_menu = ''; 
  $windfall_search_icon        = cs_get_option('search_icon');
  $final_fullwidth_menubar = cs_get_option('fullwidth_menubar');
  $windfall_header_design_actual  = cs_get_option('select_header_design');
}

// Header Style
if($windfall_meta && $windfall_header_design_actual != 'default') {
  $windfall_header_design_actual = $windfall_meta['select_header_design'];
} else {
  $windfall_header_design_actual  = cs_get_option('select_header_design');
}

// Menu Bar Fullwidth
if($windfall_meta && $final_fullwidth_menubar != 'default') {
  $final_fullwidth_menubar = $windfall_meta['fullwidth_menubar'];
} else {
  $final_fullwidth_menubar = cs_get_option('fullwidth_menubar');
}

// Search Icon
if($windfall_meta && $windfall_search_icon != 'default') {
  $windfall_search_icon        = $windfall_meta['search_icon'];
} else {
  $windfall_search_icon        = cs_get_option('search_icon');
}

// Navigation & Search
do_action( 'windfall_before_menu_action' ); // Windfall Action
if($windfall_header_design_actual != 'style_two') { 
  if ( has_nav_menu( 'primary' ) ) { ?>
  <div class="navigation-wrap">
    <?php if($final_fullwidth_menubar === 'fullwidth') { ?>
    <div class="container">
    <?php } ?>
    <div class="row align-items-center">
      <div class="col-md-10 col-6">
  <?php } } ?>    
        <nav class="wndfal-navigation" data-nav="<?php echo esc_attr($windfall_breakpoint); ?>">
          <?php
            $windfall_choose_menu = $windfall_choose_menu ? $windfall_choose_menu : '';
            wp_nav_menu(
              array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'container'         => '',
                'container_class'   => '',
                'container_id'      => '',
                'menu'              => $windfall_choose_menu,
                'menu_class'        => 'main-navigation',
                'fallback_cb'       => 'windfall_wp_bootstrap_navwalker::fallback',
                'walker'            => new windfall_wp_bootstrap_navwalker()
              )
            );
          ?>
        </nav> <!-- Container -->
        <?php if($windfall_header_design_actual === 'style_two') {
          if($windfall_search_icon === 'show') { get_template_part( 'layouts/header/header', 'search' ); }
        }
if($windfall_header_design_actual != 'style_two') { 
  if ( has_nav_menu( 'primary' ) ) { ?>
      </div>
      <?php } ?>
      <div class="col-md-2 col-6">
        <?php if($windfall_search_icon === 'show') { get_template_part( 'layouts/header/header', 'search' ); } ?>
      </div>
      <?php if ( has_nav_menu( 'primary' ) ) { ?>
    </div>
    <?php  if($final_fullwidth_menubar === 'fullwidth') { ?>
    </div>
    <?php } ?>
  </div>
<?php } } do_action( 'windfall_after_menu_action' ); // Windfall Action
