<?php
/*
 * The template for displaying all single team.
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
// Padding - Theme Options
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

$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$large_image = $large_image[0];

$abt_title = get_the_title();
$team_options = get_post_meta( get_the_ID(), 'windfall_csf_meta_options_team', true );
if($team_options) {
  $team_job_position = $team_options['team_job_position'];
	$team_socials = $team_options['social_icons'];
	$team_contact = $team_options['contact_details'];
} else {
  $team_job_position = '';
  $team_socials = '';
  $team_contact = '';
}
?>
<div class="wndfal-mid-wrap team-single <?php echo esc_attr($windfall_content_padding); ?>" style="<?php echo esc_attr($windfall_custom_padding); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="wndfal-team-wrap">
					<div class="row align-items-center">
						<div class="col-md-3">
							<?php if ($large_image) { ?>
			        <div class="wndfal-image"><img src="<?php echo esc_url($large_image); ?>" alt="<?php echo esc_attr($abt_title); ?>"></div>
			        <?php } ?>
						</div>
						<div class="col-md-9">
							<div class="single-mate-info">
								<div class="mate-info">
				          <h5 class="mate-name"><?php echo esc_html($abt_title); ?></h5>
				          <p><?php echo esc_html($team_job_position); ?></p>
				        </div>
				        <?php if(has_excerpt()){ ?>
				        <p><?php the_excerpt(); ?></p>
                <?php } if ( ! empty( $team_contact ) ) { ?>
				        	<ul class="mate-contact">
                    <?php foreach ( $team_contact as $contact ) {
                    if($contact['contact_link']) { ?>
                      <li><span><?php echo esc_html($contact['contact_title']); ?></span><a href="<?php echo esc_url($contact['contact_link']); ?>" target="_blank"><?php echo esc_html($contact['contact_text']); ?></a></li>
	                  <?php } else { ?>
                      <li><span><?php echo esc_html($contact['contact_title']); ?></span><?php echo esc_html($contact['contact_text']); ?></li>
	                  <?php } } ?>
                	</ul>
                <?php }
                if ( ! empty( $team_socials ) ) { ?>
				        	<div class="wndfal-social">
                    <?php foreach ( $team_socials as $social ) {
                    if($social['icon_link']) { ?>
                    	<a href="<?php echo esc_url($social['icon_link']); ?>"><i class="<?php echo esc_attr($social['icon']); ?>"></i></a>
	                  <?php } } ?>
                	</div>
                <?php } ?>
			        </div>
						</div>
					</div>
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
						the_content();
					endwhile;
					endif;
				?>
				</div><!-- Blog Div -->
				<?php
		    	wp_reset_postdata();  // avoid errors further down the page
				?>
			</div><!-- Content Area -->
		</div>
	</div>
</div>
<?php
get_footer();
