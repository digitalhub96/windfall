<?php
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );
// Breadcrumb Style
$breadcrumb_style = cs_get_option('breadcrumb_style');
if($breadcrumb_style === 'two') {
	$breadcrumb_cls = ' breadcrumb-two';
} else {
	$breadcrumb_cls = ' breadcrumb-one';
}
if ($windfall_meta) {
	$windfall_hide_breadcrumbs  = $windfall_meta['hide_breadcrumbs'];
} else { 
	$windfall_hide_breadcrumbs = '';
}

if (!$windfall_hide_breadcrumbs) { // Hide Breadcrumbs
?>
<!-- Breadcrumbs -->
<div class="wndfal-breadcrumb">
  <div class="container">
    <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
  </div>
</div>
<!-- Breadcrumbs -->
<?php
} // Hide Breadcrumbs
