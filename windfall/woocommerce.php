<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Metabox
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

if ($windfall_meta) {
	$windfall_content_padding = $windfall_meta['content_spacings'];
} else { $windfall_content_padding = ''; }

// Padding - Metabox
if ($windfall_content_padding && $windfall_content_padding !== 'padding-none') {
  $windfall_content_spacings_unit = $windfall_meta['content_top_bottom_padding']['unit'];
  $windfall_content_top_spacings = $windfall_meta['content_top_bottom_padding']['top'];
  $windfall_content_bottom_spacings = $windfall_meta['content_top_bottom_padding']['bottom'];
  if ($windfall_content_padding === 'padding-custom') {
    $windfall_content_top_spacings = $windfall_content_top_spacings ? 'padding-top:'.$windfall_content_top_spacings.$windfall_content_spacings_unit.';' : '';
    $windfall_content_bottom_spacings = $windfall_content_bottom_spacings ? 'padding-bottom:'.$windfall_content_bottom_spacings.$windfall_content_spacings_unit.';' : '';
    $windfall_custom_padding = $windfall_content_top_spacings . $windfall_content_bottom_spacings;
  } else {
    $windfall_custom_padding = '';
  }
} else {
  $windfall_custom_padding = '';
}

// Page Layout Options
$windfall_woo_columns = cs_get_option('woo_product_columns');
$windfall_woo_sidebar = cs_get_option('woo_sidebar_position');
$windfall_woo_columns = $windfall_woo_columns ? $windfall_woo_columns : '3';

$windfall_woo_widget = cs_get_option('woo_widget');
if ($windfall_woo_widget) {
	$widget_select = $windfall_woo_widget;
} else {
	if (is_active_sidebar( 'sidebar-shop' )) {
		$widget_select = 'sidebar-shop';
	} else {
		$widget_select = '';
	}
}

if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($windfall_woo_sidebar === 'sidebar-hide') {
		$windfall_column_class = 'col-md-12';
		$windfall_sidebar_class = 'hide-sidebar';
	} elseif ($windfall_woo_sidebar === 'sidebar-left') {
		$windfall_column_class = 'wndfal-primary col-xl-9 col-lg-8';
		$windfall_sidebar_class = 'left-sidebar';
	} else {
		$windfall_column_class = 'wndfal-primary col-xl-9 col-lg-8';
		$windfall_sidebar_class = 'right-sidebar';
	}
} else {
	$windfall_woo_sidebar = 'sidebar-hide';
	$windfall_column_class = 'col-md-12';
	$windfall_sidebar_class = 'hide-sidebar';
}

get_header(); ?>
<div class="wndfal-mid-wrap mid-spacer-two <?php echo esc_attr($windfall_content_padding); ?>" style="<?php echo esc_attr($windfall_custom_padding); ?>">
  <div class="container">
    <div class="woocommerce woocommerce-page">
      <div class="row">
			<?php do_action('windfall_woocommerce_before_shop_loop'); ?>
				<div class="container wndfal-content-area woo-col-<?php echo esc_attr($windfall_woo_columns .' '. $windfall_sidebar_class); ?>">
					<div class="row">
						<?php
						// Left Sidebar
						if($windfall_woo_sidebar === 'left-sidebar') {
				   		get_sidebar('shop');
						}
						?>
						<div class="wndfal-content-side woo-primary-wrap <?php echo esc_attr($windfall_column_class); ?>">
							<?php
								if ( have_posts() ) :
									woocommerce_content();
								endif; // End of the loop.
							?>
						</div>
						<?php
						// Right Sidebar
						if($windfall_woo_sidebar !== 'left-sidebar' && $windfall_woo_sidebar !== 'sidebar-hide') {
							get_sidebar('shop');
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
