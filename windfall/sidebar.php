<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

$windfall_blog_widget = cs_get_option('blog_widget');
$windfall_single_blog_widget = cs_get_option('single_blog_widget');

if (is_page()) {
	// Page Layout Options
	$windfall_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );	
	$order_class = '';

	// Sidebar Type
	$sidebar_type = $windfall_page_layout['sidebar_type'];
	if($sidebar_type === 'sticky') {
		$sidebar_class = '';
	} elseif($sidebar_type === 'floating') {
		$sidebar_class = ' wndfal-page-sdbr wndfal-floating-sidebar';
	} else {
		$sidebar_class = '';
	}

} elseif (is_single()) {
	$sidebar_type = cs_get_option('single_sidebar_type');
	if($sidebar_type === 'sticky') {
		$sidebar_class = ' wndfal-sticky-sidebar';
	} elseif($sidebar_type === 'floating') {
		$sidebar_class = ' wndfal-floating-sidebar';
	} else {
		$sidebar_class = '';
	}
	$order_class = ' custom-sidebar-wrap';
} else {
	$sidebar_type = cs_get_option('blog_sidebar_type');
	if($sidebar_type === 'sticky') {
		$sidebar_class = ' wndfal-sticky-sidebar';
	} elseif($sidebar_type === 'floating') {
		$sidebar_class = ' wndfal-floating-sidebar';
	} else {
		$sidebar_class = '';
	}
	$order_class = ' custom-sidebar-wrap';
}

?>
<div class="wndfal-secondary wndfal-sidebar <?php echo esc_attr($sidebar_class.$order_class); ?>">
	<div class="secondary-wrap">
		<?php do_action( 'windfall_before_sidebar_action' ); // Windfall Action
		if (is_page() && $windfall_page_layout['page_sidebar_widget']) {
			if (is_active_sidebar($windfall_page_layout['page_sidebar_widget'])) {
				dynamic_sidebar($windfall_page_layout['page_sidebar_widget']);
			}
		} elseif (!is_page() && $windfall_blog_widget && !is_single()) {
			if (is_active_sidebar($windfall_blog_widget)) {
				dynamic_sidebar($windfall_blog_widget);
			}
		} elseif (is_single() && $windfall_single_blog_widget) {
			if (is_active_sidebar($windfall_single_blog_widget)) {
				dynamic_sidebar($windfall_single_blog_widget);
			}
		} else {
			if (is_active_sidebar('sidebar-1')) {
				dynamic_sidebar( 'sidebar-1' );
			}
		}
		do_action( 'windfall_after_sidebar_action' ); // Windfall Action ?>
	</div>
</div><!-- #secondary -->
<?php
