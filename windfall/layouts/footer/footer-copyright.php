<?php
	// Main Text
	$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
	$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
	$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
	$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

$left_copyright_text = cs_get_option('copyright_text');
$middle_copyright_text = cs_get_option('secondary_text');
$right_copyright_text = cs_get_option('copyright_text_right');

$copyright_layout = cs_get_option('copyright_layout');
if ($copyright_layout === 'copyright-1') {
	$layout_class = 'col-md-12 textcenter';
} elseif ($copyright_layout === 'copyright-2') {
	$layout_class = 'col-md-6';
} else {
	$layout_class = 'col-md-4';
}
?>
<!-- Copyright Bar -->
<div class="row align-items-center">
  <div class="<?php echo esc_attr($layout_class); ?>">
  	<?php do_action( 'windfall_before_copyright_left_action' ); // Windfall Action ?>
    <?php if ($left_copyright_text){ echo do_shortcode($left_copyright_text); } ?> <!-- WindfallWP -->
  	<?php do_action( 'windfall_after_copyright_left_action' ); // Windfall Action ?>
  </div>
  <?php if ($copyright_layout === 'copyright-3') { ?>
	  <div class="<?php echo esc_attr($layout_class); ?> textcenter">
  		<?php do_action( 'windfall_before_copyright_center_action' ); // Windfall Action ?>
	    <p><?php if ($middle_copyright_text){ echo do_shortcode($middle_copyright_text); } ?></p> <!-- WindfallWP -->
  		<?php do_action( 'windfall_after_copyright_center_action' ); // Windfall Action ?>
	  </div>
	<?php } 
  if ($copyright_layout === 'copyright-2' || $copyright_layout === 'copyright-3') { ?>
	  <div class="<?php echo esc_attr($layout_class); ?> textright">
  		<?php do_action( 'windfall_before_copyright_right_action' ); // Windfall Action ?>
	    <?php if ($right_copyright_text){ echo do_shortcode($right_copyright_text); } ?> <!-- WindfallWP -->
  		<?php do_action( 'windfall_after_copyright_right_action' ); // Windfall Action ?>
	  </div>
	<?php } ?>
</div>
<!-- Copyright Bar -->
<?php
