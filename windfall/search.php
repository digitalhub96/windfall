<?php
/*
 * The template for displaying archive pages.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();

// Metabox
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

// Theme Options
$windfall_sidebar_position = cs_get_option('blog_sidebar_position');
$windfall_blog_style = cs_get_option('blog_listing_style');
$windfall_blog_widget = cs_get_option('blog_widget');

if ($windfall_blog_widget) {
  $widget_select = $windfall_blog_widget;
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
<div class="wndfal-mid-wrap mid-spacer-seven <?php echo esc_attr($windfall_sidebar_class); ?>">
  <div class="container">
    <div class="blog-custom-width">
      <div class="row">
        <?php if ($windfall_sidebar_position === 'sidebar-left' && $windfall_sidebar_position !== 'sidebar-hide') { get_sidebar(); } ?>
        <div class="<?php echo esc_attr($layout_class); ?>">
          <?php if ($windfall_blog_style === 'style-two') { ?>
            <div class="row">
          <?php } else { ?>
            <div class="blog-wrap">
            <?php }
            if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'layouts/post/content' );
              endwhile;
            else :
              get_template_part( 'layouts/post/content', 'none' );
            endif;
              windfall_default_paging_nav();
              wp_reset_postdata();  // avoid errors further down the page ?>
          </div>
        </div>
        <?php if ($windfall_sidebar_position !== 'sidebar-hide') {  get_sidebar(); } ?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
