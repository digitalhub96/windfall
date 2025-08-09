<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

// Theme Options
$windfall_error_heading = cs_get_option('error_heading');
$error_page_title = cs_get_option('error_page_title');
$windfall_error_page_content = cs_get_option('error_title_content');
$windfall_error_btn_text = cs_get_option('error_btn_text');
$windfall_error_heading = ( $windfall_error_heading ) ? $windfall_error_heading : esc_html__( 'Sorry!!! Page Not Found!', 'windfall' );
$windfall_error_page_content = ( $windfall_error_page_content ) ? $windfall_error_page_content : esc_html__( 'The link you followed probably broken, or the page has been removed.', 'windfall' );
$windfall_error_btn_text = ( $windfall_error_btn_text ) ? $windfall_error_btn_text : esc_html__( 'Back to Home', 'windfall' );

get_header();
?>
<div class="wndfal-mid-wrap">
  <div class="container">
    <div class="wndfal-error">
    <?php if($error_page_title) { ?>
      <h1 class="error-title"><?php echo esc_html($error_page_title); ?></h1>
    <?php } else { ?>
      <h1 class="error-title"><?php esc_html_e('4','windfall'); ?><span class="error-icon">
        <img src="<?php echo esc_url(WINDFALL_IMAGES).'/icons/icon33@2x.png'; ?>" width="143" alt="<?php esc_attr_e('Error Icon', 'windfall'); ?>">
      </span><?php esc_html_e('4','windfall'); ?></h1>
    <?php } ?>
     <h2 class="error-subtitle"><?php echo esc_html($windfall_error_heading); ?></h2>
      <p><?php echo esc_html($windfall_error_page_content); ?></p>
      <div class="wndfal-btns-group">
        <a href="<?php echo esc_url(home_url( '/' )); ?>" class="wndfal-btn wndfal-border-btn">
          <span class="btn-text-wrap">
            <span class="btn-text"><i class="fa fa-angle-left" aria-hidden="true"></i> <?php echo esc_html($windfall_error_btn_text); ?></span>
          </span>
        </a>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
