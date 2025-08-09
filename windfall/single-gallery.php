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
<div class="wndfal-mid-wrap gallery-single <?php echo esc_attr($windfall_content_padding); ?>" style="<?php echo esc_attr($windfall_custom_padding); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					if (have_posts()) : while (have_posts()) : the_post();
						the_content();
					endwhile;
					endif;
				?>
			</div>
		</div>
	<?php // avoid errors further down the page

	// Related Articles
	global $post;
	$gallery_single_related_post = cs_get_option('gallery_single_related_post');
	$gallery_related_title = cs_get_option('gallery_related_title');
	$gallery_related_limit = cs_get_option('gallery_related_limit');

	$gallery_related_title = $gallery_related_title ? $gallery_related_title : esc_html__( 'Related Articles', 'windfall' );
	$gallery_related_limit = $gallery_related_limit ? $gallery_related_limit : '3';

	$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'gallery_category', array('fields' => 'ids') );
	$args = array(
	  'post_type' => 'gallery',
	  'post_status' => 'publish',
	  'posts_per_page' => $gallery_related_limit,
	  'orderby' => 'rand',
	  'tax_query' => array(
	    array(
	      'taxonomy' => 'gallery_category',
	      'field' => 'id',
	      'terms' => $customTaxonomyTerms
	    )
	  ),
	  'post__not_in' => array ($post->ID),
	);
	$relatedPosts = new WP_Query( $args );

if($relatedPosts->have_posts()){
	if(!$gallery_single_related_post) {} else { ?>
		<div class="wndfal-related-gallery">
	    <h3 class="related-gallery-title"><?php echo esc_html($gallery_related_title); ?></h3>
	      <div class="row">
			      <?php
						while ($relatedPosts->have_posts()) {
						$relatedPosts->the_post();
			      $related_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
			      $related_large_image = $related_large_image[0];
				if(function_exists('windfall_secure_resize')) {
							$related_img = windfall_secure_resize( $related_large_image, '370', '260', true );
				    } else {$related_img = $related_large_image;}
						$related_featured_img = ( $related_img ) ? $related_img : $related_large_image; ?>
						<div class="masonry-item">
			        <div class="gallery-item">
			          <div class="wndfal-image">
			            <img src="<?php echo esc_url($related_featured_img); ?>" alt="<?php the_title_attribute(); ?>">
	                <div class="wndfal-popup">
				            <a href="<?php echo esc_url($related_large_image); ?>">
				              <div class="gallery-info">
				                <div class="wndfal-table-wrap">
				                  <div class="wndfal-align-wrap">
				                     <i class="fa fa-search" aria-hidden="true"></i>
				                  </div>
				                </div>
				              </div>
				            </a>
	                </div>
			          </div>
			          <h5 class="gallery-title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo get_the_title(); ?></a></h5>
			        </div>
		      	</div>
						<?php	} wp_reset_postdata(); ?>
	      </div>
	  </div>
	<?php } }  ?>
	</div>
</div>
<?php
get_footer();
