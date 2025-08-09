<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Metabox
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

if ($windfall_meta) {
	$windfall_content_padding = $windfall_meta['content_spacings'];
} else {
	$windfall_content_padding = '';
}
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
$page_layout  = get_post_meta( $windfall_id, 'page_layout_options', true );
// Page Layout Options
if ($page_layout) {
	$windfall_page_layout = $page_layout['page_layout'];
	if($windfall_page_layout === 'left-sidebar' || $windfall_page_layout === 'right-sidebar') {
		$windfall_column_class = 'wndfal-primary';
		$windfall_layout_class = 'container';
	} elseif($windfall_page_layout === 'full-width') {
    $windfall_column_class = 'col-md-12';
    $windfall_layout_class = 'container-fluid';
  } else {
		$windfall_column_class = 'col-md-12';
		$windfall_layout_class = 'container';
	}

	// Page Layout Class
	if ($windfall_page_layout === 'left-sidebar') {
		$windfall_sidebar_class = 'left-sidebar';
	} elseif ($windfall_page_layout === 'right-sidebar') {
		$windfall_sidebar_class = 'right-sidebar';
	} else {
		$windfall_sidebar_class = 'full-width';
	}
	// Sidebar Type
	$sidebar_type = $page_layout['sidebar_type'];
	if($sidebar_type === 'sticky') {
		$sidebar_class = ' wndfal-sticky-sidebar';
	} elseif($sidebar_type === 'floating') {
		$sidebar_class = '';
	} else {
		$sidebar_class = '';
	}

} else {
	$windfall_page_layout = '';
	$windfall_column_class = 'col-md-12';
	$windfall_layout_class = 'container';
	$windfall_sidebar_class = 'wndfal-full-width';
	$sidebar_class = '';
}

get_header();
?>
<div class="wndfal-mid-wrap <?php echo esc_attr($windfall_content_padding .' '. $windfall_sidebar_class); ?>" style="<?php echo esc_attr($windfall_custom_padding); ?>">
	<div class="<?php echo esc_attr($windfall_layout_class); ?>">
		<div class="row">
			<?php
			// Left Sidebar
			if($windfall_page_layout === 'left-sidebar') { ?>
	   		<div class="col-xl-3 col-lg-4 page-sidebar-wrap <?php echo esc_attr($sidebar_class); ?>">
				<?php get_sidebar(); ?>
				</div>
			<?php }
			if($windfall_page_layout === 'left-sidebar' || $windfall_page_layout === 'right-sidebar') {
			?>
				<div class="col-xl-9 col-lg-8">
			<?php } ?>
			<div class="<?php echo esc_attr($windfall_column_class); ?>">
      <?php do_action( 'windfall_before_content_action' ); // Windfall Action
				while ( have_posts() ) : the_post();
					the_content();
					echo windfall_wp_link_pages();
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile;
      do_action( 'windfall_after_content_action' ); // Windfall Action ?>
			</div><!-- Content Area -->
			<?php if($windfall_page_layout === 'left-sidebar' || $windfall_page_layout === 'right-sidebar') {
			?>
				</div>
			<?php }
			// Right Sidebar
			if($windfall_page_layout === 'right-sidebar') { ?>
				<div class="col-xl-3 col-lg-4 page-sidebar-wrap <?php echo esc_attr($sidebar_class); ?>">
				<?php get_sidebar(); ?>
				</div>
			<?php }
			?>
		</div>
	</div>
</div>
<?php
get_footer();
