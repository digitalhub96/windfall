<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );

if ($windfall_meta) {
	$windfall_hide_footer  = $windfall_meta['hide_footer'];
  $windfall_hide_copyright = $windfall_meta['hide_copyright'];
  $above_footer_widget = $windfall_meta['above_footer_widget'];
} else {
  $windfall_hide_footer = '';
  $windfall_hide_copyright = '';
  $above_footer_widget = cs_get_option('above_footer_widget');
}
$left_copyright_text = cs_get_option('copyright_text');
$middle_copyright_text = cs_get_option('secondary_text');
$right_copyright_text = cs_get_option('copyright_text_right');

$above_footer_widget = $above_footer_widget ? $above_footer_widget : cs_get_option('above_footer_widget');
if($windfall_meta && $above_footer_widget != 'default') {
  $above_footer_widget = $windfall_meta['above_footer_widget'];
} else {
  $above_footer_widget = cs_get_option('above_footer_widget');
}
// Copyright border
if (!$windfall_hide_footer) {
  $cprt_border = 'no-need-border';
 } else {
  $cprt_border = 'need-border';
 }
// Above Footer Widget
// WindfallWP
if($above_footer_widget === 'show') {
  if (is_active_sidebar( 'above-footer' )) {
    dynamic_sidebar( 'above-footer' );
  } 
}

?>
</div><!-- Main Wrap Inner -->
<?php
if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') || $left_copyright_text || $middle_copyright_text || $right_copyright_text) {
?>
<!-- Footer -->
<footer class="wndfal-footer">
  <?php if (!$windfall_hide_footer) {
  if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) { ?>
  <div class="footer-wrap">
    <div class="container">
      <?php get_template_part( 'layouts/footer/footer', 'widgets' ); ?>
    </div>
  </div>
  <?php do_action( 'windfall_after_footer_action' ); // Windfall Action
  } } ?>
  <?php if(!$windfall_hide_copyright) {
  if ($left_copyright_text || $middle_copyright_text || $right_copyright_text) { ?>
    <div class="wndfal-copyright <?php echo esc_attr($cprt_border); ?>">
      <div class="container">
        <?php
        $need_copyright = cs_get_option('need_copyright');
        if($need_copyright) {
          get_template_part( 'layouts/footer/footer', 'copyright' );
        } ?>
      </div>
    </div>
  <?php do_action( 'windfall_after_copyright_action' ); // Windfall Action
  } } ?>
</footer>
<!-- Footer -->
<?php } else {
if(!$windfall_hide_copyright) { ?>
<footer class="wndfal-footer">
  <div class="footer-wrap copyrgt <?php echo esc_attr($cprt_border); ?>">
    <div class="wndfal-copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 textcenter">
            <p>&copy; <?php echo esc_html(date('Y')); ?>. <?php esc_html_e('Designed by', 'windfall') ?> <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php esc_html_e('VictorThemes', 'windfall') ?></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php	} } // Hide Footer Metabox ?>
</div><!-- Main Wrap -->
<?php
$theme_preloader = cs_get_option('theme_preloader');
$theme_btotop = cs_get_option('theme_btotop');
if($theme_btotop) {
?>
<!-- Hanor Back Top -->
<div class="wndfal-back-top">
  <a href="javascript:void(0);">
    <span class="wndfal-table-wrap">
      <span class="wndfal-align-wrap">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
      </span>
    </span>
  </a>
</div>
<?php }
if ($theme_preloader) { ?>
<!-- Hanor Preloader -->
<div class="wndfal-preloader">
  <div class="loader-wrap">
    <div class="loader">
      <div class="loader-inner pacman"></div>
    </div>
  </div>
</div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
<?php
