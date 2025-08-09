<?php
/*
 * The sidebar only for WooCommerce pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

$windfall_woo_widget = cs_get_option('woo_widget');
$sidebar_type = cs_get_option('woo_sidebar_type');
if ($sidebar_type === 'bar-sticky') {
	$sidebar_sticky_class = ' wndfal-sticky-sidebar';
	$sidebar_floating_class = '';
} elseif ($sidebar_type === 'bar-float') {
	$sidebar_floating_class = ' wndfal-floating-sidebar';
	$sidebar_sticky_class = '';
} else {
	$sidebar_class = '';
	$sidebar_floating_class = '';
	$sidebar_sticky_class = '';
}

?>
<div class="col-xl-3 col-lg-4 wndfal-woo-sidebar <?php echo esc_attr($sidebar_sticky_class); ?>">
	<div class="wndfal-sidebar wndfal-secondary <?php echo esc_attr($sidebar_floating_class); ?>">
		<div class="secondary-wrap">
			<?php if ($windfall_woo_widget) {
				if (is_active_sidebar($windfall_woo_widget)) {
					dynamic_sidebar($windfall_woo_widget);
				}
			} else {
				if (is_active_sidebar( 'sidebar-shop' )) {
					dynamic_sidebar( 'sidebar-shop' );
				} 
			} ?>
		</div>
	</div><!-- #secondary -->
</div>
<?php
