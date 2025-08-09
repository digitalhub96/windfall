<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
$windfall_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($windfall_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($windfall_all_element_color); ?>">
<link rel="profile" href="//gmpg.org/xfn/11">

<?php
wp_head();
if (windfall_is_elementor()) {
  $layout_class = 'container-fluid';
} else {
  $layout_class = 'container';
}
?>
</head>
	<body <?php body_class(); ?>>
    <div class="wndfal-mid-wrap vt-maintenance-mode">
      <div class="<?php echo esc_attr($layout_class); ?>">
        <div class="row">
          <div class="col-md-12">
            <?php
              $windfall_page = get_post( cs_get_option('maintenance_mode_page') );
              if (windfall_is_elementor()) {
                echo ( is_object( $windfall_page ) ) ? do_shortcode( '[windfall_elementor_template id="'.$windfall_page->ID.'"]' ) : '';
                // WindfallWP
              } else {
                echo ( is_object( $windfall_page ) ) ? do_shortcode( $windfall_page->post_content ) : ''; // WindfallWP
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
<?php
