<?php
/**
 * Single Post.
 */
// Metabox
global $post;

$windfall_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$windfall_large_image = $windfall_large_image[0];

$date_format = cs_get_option('blog_date_format');
$date_format_actual = $date_format ? $date_format : '';
// Single Theme Option
$windfall_single_tag_list = cs_get_option('single_tag_list');
$windfall_single_author_info = cs_get_option('single_author_info');
$windfall_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$windfall_single_share_option = cs_get_option('single_share_option');
$single_featured_image = cs_get_option('single_featured_image');
$author_by_text = cs_get_option('author_by_text');
$author_by_text = $author_by_text ? $author_by_text : esc_html__('By ','windfall');

$cat_list = get_the_category();
$tag_list = get_the_tags();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('wndfal-blog-post'); ?>>
	<div class="blog-detail-wrap entry-content">
    <?php // WindfallWP 
    if(!$single_featured_image) {} else {
    if ($windfall_large_image) { ?>
    <div class="blog-image">
      <img src="<?php echo esc_url($windfall_large_image); ?>" alt="<?php the_title_attribute(); ?>">
    </div>
    <?php } } ?>
    <div class="blog-detail">
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
      <?php
        the_content();
        echo windfall_wp_link_pages();
      ?>
      <div class="blog-meta">
        <div class="row align-items-center">
          <div class="col-md-6">
            <?php // WindfallWP 
            if($windfall_single_tag_list && $tag_list) {
            if ( $tag_list ) { ?>
              <div class="wndfal-blog-tags">
                <?php
                $tags = get_the_tags();
                foreach ( $tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><span class="wndfal-label"><?php esc_html_e('#', 'windfall'); ?><?php echo esc_html( $tag->name ); ?></span></a>
                <?php endforeach; ?>
              </div>
            <?php } } ?>
          </div>
          <div class="col-md-6 textright">
            <?php if ( !in_array( 'comments', $windfall_metas_hide ) ) {
              if (get_comments_number()!=0) { ?>
              <span class="blog-comment"><?php comments_popup_link( esc_html__( '0', 'windfall' ), esc_html__( '1', 'windfall' ), esc_html__( '%', 'windfall' ), '', '' ); ?></span>
            <?php } } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  // WindfallWP 
  if($windfall_single_share_option) {
		if ( function_exists( 'windfall_wp_share_option' ) ) {
			echo windfall_wp_share_option();
		}
  }
	// Author Info
  // WindfallWP 
  if(!$windfall_single_author_info) {
	 echo windfall_author_info(); 
  } ?>

</div><!-- #post-## -->
<?php
