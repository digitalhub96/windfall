<?php
// Metabox
global $post;
$windfall_id    = ( isset( $post ) ) ? $post->ID : false;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $windfall_id : false;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );
if($windfall_meta){
  $top_options = $windfall_meta['topbar_options'];
  $top_left = $windfall_meta['top_left'];
  $top_right = $windfall_meta['top_right'];
} else {
  $top_options = '';
  $top_left = '';
  $top_right = '';
}

if($windfall_meta && $top_options != 'default') {
  $windfall_top_left = $windfall_meta['top_left'];
  $windfall_top_right = $windfall_meta['top_right'];
} else {
  $windfall_top_left = cs_get_option('top_left');
  $windfall_top_right = cs_get_option('top_right');
}
// Topbar options
$windfall_top_left = $windfall_top_left ? $windfall_top_left : cs_get_option('top_left');
$windfall_top_right = $windfall_top_right ? $windfall_top_right : cs_get_option('top_right');

$windfall_hide_topbar = cs_get_option('top_bar');
if ($windfall_hide_topbar === true ) {
  $windfall_hide_topbar = 'hide';
} else {
  $windfall_hide_topbar = 'show';
}
if($top_options != 'hide_topbar') {
if($windfall_hide_topbar === 'show') {
if($windfall_top_left || $windfall_top_right ) {
?>
<div class="wndfal-topbar">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 wndfal-top-left">
        <?php do_action( 'windfall_before_top_left_action' ); // Windfall Action
      	echo do_shortcode($windfall_top_left); // WindfallWP
        do_action( 'windfall_after_top_left_action' ); // Windfall Action ?>
    	</div>
      <div class="col-md-6 textright">
        <?php do_action( 'windfall_before_top_right_action' ); // Windfall Action
      	echo do_shortcode($windfall_top_right); // WindfallWP
        do_action( 'windfall_after_top_right_action' ); // Windfall Action ?>
    	</div>
    </div>
  </div>
</div>
<?php } } } // Hide Topbar - From Metabox
