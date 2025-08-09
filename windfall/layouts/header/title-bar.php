<?php
// Metabox
$windfall_id    = ( isset( $post ) ) ? $post->ID : 0;
$windfall_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $windfall_id;
$windfall_id    = ( windfall_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $windfall_id;
$windfall_id    = ( !is_tag() && !is_archive() && !is_search()) ? $windfall_id : false;
$windfall_meta  = get_post_meta( $windfall_id, 'page_type_metabox', true );
if ($windfall_meta) {
	$windfall_title_bar_padding = $windfall_meta['title_area_spacings'];
  $windfall_bg_overlay_color = $windfall_meta['titlebar_bg_overlay_color'];
  $hide_overlay = $windfall_meta['hide_overlay'];
  $title_area_bg_size = $windfall_meta['title_area_bg_size'];
} else {
	$windfall_title_bar_padding = '';
  $windfall_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
  $hide_overlay = '';
  $title_area_bg_size = '';
}

// Padding - Theme Options
if ($windfall_title_bar_padding && $windfall_title_bar_padding !== 'padding-default') {
  $windfall_title_spacings_unit = $windfall_meta['title_top_bottom_padding']['unit'];
	$windfall_title_top_spacings = $windfall_meta['title_top_bottom_padding']['top'];
	$windfall_title_bottom_spacings = $windfall_meta['title_top_bottom_padding']['bottom'];
	if ($windfall_title_bar_padding === 'padding-custom') {
		$windfall_title_top_spacings = $windfall_title_top_spacings ? 'padding-top:'.$windfall_title_top_spacings.$windfall_title_spacings_unit.';' : '';
		$windfall_title_bottom_spacings = $windfall_title_bottom_spacings ? 'padding-bottom:'.$windfall_title_bottom_spacings.$windfall_title_spacings_unit.';' : '';
		$windfall_custom_padding = $windfall_title_top_spacings . $windfall_title_bottom_spacings;
	} else {
		$windfall_custom_padding = '';
	}
} else {
	$windfall_title_bar_padding = cs_get_option('title_bar_padding');
  $windfall_titlebar_padding_unit = cs_get_option('titlebar_top_bottom_padding') ? cs_get_option('titlebar_top_bottom_padding')['unit'] : '';
	$windfall_titlebar_top_padding = cs_get_option('titlebar_top_bottom_padding') ? cs_get_option('titlebar_top_bottom_padding')['top'] : '';
	$windfall_titlebar_bottom_padding = cs_get_option('titlebar_top_bottom_padding') ? cs_get_option('titlebar_top_bottom_padding')['bottom'] : '';
	if ($windfall_title_bar_padding === 'padding-custom') {
		$windfall_titlebar_top_padding = $windfall_titlebar_top_padding ? 'padding-top:'.$windfall_titlebar_top_padding.$windfall_titlebar_padding_unit.';' : '';
		$windfall_titlebar_bottom_padding = $windfall_titlebar_bottom_padding ? 'padding-bottom:'.$windfall_titlebar_bottom_padding.$windfall_titlebar_padding_unit.';' : '';
		$windfall_custom_padding = $windfall_titlebar_top_padding . $windfall_titlebar_bottom_padding;
	} else {
		$windfall_custom_padding = '';
	}
}

// Banner Type - Meta Box
if ($windfall_meta) {
	$windfall_banner_type = $windfall_meta['banner_type'];
} else { $windfall_banner_type = ''; }

// Overlay Color
if ($windfall_meta && $windfall_bg_overlay_color) {
  $windfall_bg_overlay_color = $windfall_meta['titlebar_bg_overlay_color'];
} else {
  $windfall_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
}
if ($windfall_bg_overlay_color) {
	$windfall_overlay_color = 'style=background-color:'.$windfall_bg_overlay_color.';';
} else {
	$windfall_overlay_color = '';
}

if ($title_area_bg_size) {
  $windfall_bg_size = ' background-size:'.windfall_core_check_px($title_area_bg_size);
} else {
  $windfall_bg_size = '';
}

// Background - Type
if( $windfall_meta && ($windfall_meta['title_area_bg']['background-color'] || $windfall_meta['title_area_bg']['background-image']['url'])  ) {

  $image      = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-image']['url'] : cs_get_option('titlebar_bg')['background-image']['url'];
  $repeat     = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-repeat'] : cs_get_option('titlebar_bg')['background-repeat'];
  $position   = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-position'] : cs_get_option('titlebar_bg')['background-position'];
  $attachment = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-attachment'] : cs_get_option('titlebar_bg')['background-attachment'];
  $size       = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-size'] : cs_get_option('titlebar_bg')['background-size'];
  $origin     = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-origin'] : cs_get_option('titlebar_bg')['background-origin'];
  $clip       = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-clip'] : cs_get_option('titlebar_bg')['background-clip'];
  $blend      = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-blend-mode'] : cs_get_option('titlebar_bg')['background-blend-mode'];
  $bg_color   = $windfall_meta['title_area_bg'] ? $windfall_meta['title_area_bg']['background-color'] : cs_get_option('titlebar_bg')['background-color'];
} else {
  $image      = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-image']['url'] : '';
  $repeat     = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-repeat'] : '';
  $position   = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-position'] : '';
  $attachment = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-attachment'] : '';
  $size       = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-size'] : '';
  $origin     = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-origin'] : '';
  $clip       = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-clip'] : '';
  $blend      = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-blend-mode'] : '';
  $bg_color   = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-color'] : '';
}
if ($image || $bg_color) {
  $background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $background_attachment  = ( ! empty( $image ) && ! empty( $attachment ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $background_origin      = ( ! empty( $image ) && ! empty( $origin ) ) ? ' background-origin: ' . $origin . ';' : '';
  $background_clip        = ( ! empty( $image ) && ! empty( $clip ) ) ? ' background-clip: ' . $clip . ';' : '';
  $background_blend       = ( ! empty( $image ) && ! empty( $blend ) ) ? ' background-blend-mode: ' . $blend . ';' : '';
  $background_color       = ( ! empty( $bg_color ) ) ? ' background-color: ' . $bg_color . ';' : '';

  $background_style       = ( ! empty( $image ) ) ? $background_image . $background_repeat . $background_position . $background_size . $background_attachment : '';
  $title_bg = ( ! empty( $background_style ) || ! empty( $background_color ) ) ? $background_style . $background_color : '';

} else {
  $title_bg = '';
}

if($windfall_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($windfall_meta && $windfall_banner_type === 'revolution-slider') {
   echo do_shortcode($windfall_meta['page_revslider']); // WindfallWP
} elseif($windfall_meta && $windfall_banner_type === 'elementor-templates') {
   echo do_shortcode('[windfall_elementor_template id="'.$windfall_meta['ele_templates'].'"]'); // WindfallWP
} else { ?>
<!-- Hanor Page Title, Hanor Parallax -->
<div class="wndfal-page-title wndfal-parallax <?php echo esc_attr($windfall_title_bar_padding); ?>" style="<?php echo esc_attr($windfall_custom_padding . $title_bg . $windfall_bg_size); ?>">
<?php if (!$hide_overlay) { ?>
<div class="wndfal-overlay" <?php echo esc_attr($windfall_overlay_color); ?>></div>
<?php } ?>
  <div class="container">
    <h1 class="page-title"><?php echo esc_html(windfall_title_area()); ?></h1>
  </div>
</div>
<?php }
