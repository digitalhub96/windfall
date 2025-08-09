<?php
/**
 * Template part for displaying posts.
 */
// Metabox
global $post;
$windfall_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$windfall_large_image = $windfall_large_image[0];

$windfall_blog_style = cs_get_option('blog_listing_style');
$author_by_text = cs_get_option('author_by_text');
$author_by_text = $author_by_text ? $author_by_text : esc_html__('By ','windfall');
$windfall_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$windfall_blog_columns = cs_get_option('blog_listing_columns');
$date_format = cs_get_option('blog_date_format');
$windfall_blog_aqr = cs_get_option('blog_aqr');
$windfall_read_more_text = cs_get_option('read_more_text');
$windfall_read_text = $windfall_read_more_text ? $windfall_read_more_text : esc_html__( 'Read More', 'windfall' );
$date_format_actual = $date_format ? $date_format : '';
// Columns
if ($windfall_blog_columns === 'col-2') {
	$windfall_blog_col_class = 'col-md-6 col-sm-6';
} else {
	$windfall_blog_col_class = 'col-lg-4 col-md-6 col-sm-12';
}

if ($windfall_blog_aqr) {
	$featured_img = $windfall_large_image;
} else {
	if ($windfall_blog_style === 'style-two') {
		if ($windfall_blog_columns === 'col-2') {
	    if(class_exists('Aq_Resize')) {
	      $blog_img = aq_resize( $windfall_large_image, '570', '370', true );
	    } else {$blog_img = $windfall_large_image;}
	    $featured_img = ( $blog_img ) ? $blog_img : esc_url(WINDFALL_IMAGES) . '/holders/570x370.png';
		} else {
	  	if(class_exists('Aq_Resize')) {
				$blog_img = aq_resize( $windfall_large_image, '370', '220', true );
	    } else {$blog_img = $windfall_large_image;}
			$featured_img = ( $blog_img ) ? $blog_img : esc_url(WINDFALL_IMAGES) . '/holders/370x220.png';
		}
	} else {
		if(class_exists('Aq_Resize')) {
			$blog_img = aq_resize( $windfall_large_image, '828', '490', true );
	   } else {$blog_img = $windfall_large_image;}
		$featured_img = ( $blog_img ) ? $blog_img : $windfall_large_image;
	}
}

if(is_sticky()) {
  $sticky_class = ' sticky';
} else {
  $sticky_class = '';
}
if ($windfall_large_image) {
	$img_class = ' hav-featured-image';
} else {
	$img_class = ' dhav-featured-image';
}
$cat_list = get_the_category();
if($windfall_blog_style === 'style-two') {
?>
<div class="<?php echo esc_attr($windfall_blog_col_class); ?>">
  <div class="blog-item">
    <?php if ($windfall_large_image) { ?>
		  <div class="wndfal-image">
		    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>"></a>
		  </div>
		<?php } ?>
    <div class="blog-info">
    		<?php if ( !in_array( 'date', $windfall_metas_hide ) ) { ?>
		      <h6 class="blog-date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_html(get_the_date($date_format_actual)); ?></h6>
		    <?php } ?>
      <h3 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h3>
      <?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				echo '<p>';
				windfall_excerpt($blog_excerpt);
				echo '</p>';
				echo windfall_wp_link_pages();
			?>
     <a href="<?php echo esc_url( get_permalink() ); ?>" class="wndfal-link"><?php echo esc_html($windfall_read_text); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="blog-item <?php echo esc_attr($img_class); ?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class('wndfal-blog-post'.$sticky_class); ?>>
	  <?php if ($windfall_large_image) { ?>
		  <div class="wndfal-image">
		    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>"></a>
		  </div>
		<?php } ?>
	  <div class="blog-info">
	    <div class="blog-date">
	    <ul>
		    <?php if ( !in_array( 'date', $windfall_metas_hide ) ) { ?>
		      <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_html(get_the_date($date_format_actual)); ?></li>
		    <?php } if ( !in_array( 'author', $windfall_metas_hide ) ) { ?>
		      <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo esc_html($author_by_text); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html(get_the_author()); ?></a></li>
		    <?php } if ( !in_array( 'category', $windfall_metas_hide ) ) {
		    	if (has_category()){
		    	?> <li><i class="fa fa-th" aria-hidden="true"></i> <?php echo the_category(', '); ?></li>
	    	<?php } } ?>
	    </ul>
	    </div>
	    <h2 class="blog-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h2>
	    <?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				echo '<p>';
				windfall_excerpt($blog_excerpt);
				echo '</p>';
				echo windfall_wp_link_pages();
			?>
	    <div class="blog-meta">
	      <div class="row align-items-center">
	        <div class="col-6">
	        	<a href="<?php echo esc_url( get_permalink() ); ?>" class="wndfal-link"><?php echo esc_html($windfall_read_text); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
	        </div>
	        <div class="col-6 textright">
	        <?php if ( !in_array( 'comments', $windfall_metas_hide ) ) {
			    	if (get_comments_number()!=0) { ?>
			      <span class="blog-comment"><?php comments_popup_link( esc_html__( '0', 'windfall' ), esc_html__( '1', 'windfall' ), esc_html__( '%', 'windfall' ), '', '' ); ?></span>
			    <?php } } ?>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<?php }
