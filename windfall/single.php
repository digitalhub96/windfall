<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();

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

// Theme Options
$windfall_sidebar_position = cs_get_option('single_sidebar_position');
$windfall_single_blog_widget = cs_get_option('single_blog_widget');
if ($windfall_single_blog_widget) {
	$widget_select = $windfall_single_blog_widget;
} else {
	if (is_active_sidebar('sidebar-1')) {
		$widget_select = 'sidebar-1';
	} else {
		$widget_select = '';
	}
}
// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($windfall_sidebar_position === 'sidebar-hide') {
		$layout_class = 'col-md-12';
		$windfall_sidebar_class = 'hide-sidebar';
	} elseif ($windfall_sidebar_position === 'sidebar-left') {
		$layout_class = 'wndfal-primary';
		$windfall_sidebar_class = 'left-sidebar';
	} else {
		$layout_class = 'wndfal-primary';
		$windfall_sidebar_class = 'right-sidebar';
	}
} else {
	$windfall_sidebar_position = 'sidebar-hide';
	$layout_class = 'col-md-12';
	$windfall_sidebar_class = 'hide-sidebar';
}
?>
<div class="wndfal-mid-wrap <?php echo esc_attr($windfall_content_padding .' '. $windfall_sidebar_class); ?>" style="<?php echo esc_attr($windfall_custom_padding); ?>">
  <div class="container">
    <div class="blog-custom-width">
      <div class="row">
        <div class="<?php echo esc_attr($layout_class); ?>">
          <div class="wndfal-unit-fix">
            <div class="wndfal-blog-detail">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();
									get_template_part( 'layouts/post/content', 'single' );
									if ( comments_open() || get_comments_number() ) :
					          comments_template();
					        endif;
								endwhile;
							else :
								get_template_part( 'layouts/post/content', 'none' );
							endif; ?>
						</div><!-- unit-fix -->
					</div><!-- layout -->
				</div>
				<?php
					if ($windfall_sidebar_position !== 'sidebar-hide') {
						get_sidebar(); // Sidebar
					}
				?>
			</div><!-- row -->
		</div>
	</div><!-- container -->
</div><!-- mid -->
<?php
get_footer();
