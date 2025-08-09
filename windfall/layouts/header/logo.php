<?php
// Logo Image
$windfall_brand_logo_default = cs_get_option('brand_logo_default') ? cs_get_option('brand_logo_default')['url'] : '';

// Metabox - Header Transparent
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );
// Retina Size
$windfall_retina_width = cs_get_option('logo_width_height') ? cs_get_option('logo_width_height')['width'] : '';
$windfall_retina_height = cs_get_option('logo_width_height') ? cs_get_option('logo_width_height')['height'] : '';
// Logo Spacings
$windfall_brand_logo_unit = cs_get_option('brand_logo_top_bottom') ? cs_get_option('brand_logo_top_bottom')['unit'] : '';
$windfall_brand_logo_top = cs_get_option('brand_logo_top_bottom') ? cs_get_option('brand_logo_top_bottom')['top'] : '';
$windfall_brand_logo_bottom = cs_get_option('brand_logo_top_bottom') ? cs_get_option('brand_logo_top_bottom')['bottom'] : '';
if ($windfall_brand_logo_top !== '') {
	$windfall_brand_logo_top = $windfall_brand_logo_top ? 'padding-top:'.$windfall_brand_logo_top.$windfall_brand_logo_unit.';' : '';
} else { $windfall_brand_logo_top = ''; }
if ($windfall_brand_logo_bottom !== '') {
	$windfall_brand_logo_bottom = $windfall_brand_logo_bottom ? 'padding-bottom:'.$windfall_brand_logo_bottom.$windfall_brand_logo_unit.';' : '';
} else { $windfall_brand_logo_bottom = ''; }

$windfall_brand_logo_top = $windfall_brand_logo_top ? $windfall_brand_logo_top : '';
$windfall_brand_logo_bottom = $windfall_brand_logo_bottom ? $windfall_brand_logo_bottom : '';
?>
<div class="wndfal-brand" style="<?php echo esc_attr($windfall_brand_logo_top); echo esc_attr($windfall_brand_logo_bottom); ?>">
  <?php do_action( 'windfall_before_logo_action' ); // Windfall Action ?>
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php
		if ($windfall_brand_logo_default) {
			echo '<img src="'. esc_url($windfall_brand_logo_default) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '" class="default-logo normal-logo" width="'. esc_attr($windfall_retina_width) .'" height="'. esc_attr($windfall_retina_height) .'">';
		} else {
			echo '<div class="text-logo">'. esc_html(get_bloginfo( 'name' )) . '</div>';
		}
	echo '</a>';
  do_action( 'windfall_after_logo_action' ); // Windfall Action ?>
</div>
<?php
