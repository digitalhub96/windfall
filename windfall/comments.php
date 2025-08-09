<?php
/*
 * The template for displaying comments.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="wndfal-comments-area wndfal-form comments-area">
<?php if ( have_comments() ) : ?>
	<div class="comments-section">
	<?php
	// You can start editing here -- including this comment!
	 ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'windfall' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>

		<ol class="comments">
			<?php wp_list_comments('type=all&callback=windfall_comment_modification'); ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="vt-comment-nav-below" class="navigation vt-comment-navigation" role="navigation">
			<h3 class="vt-screen-reader-text comments-title"><?php esc_html_e( 'Comment navigation', 'windfall' ); ?></h3>
			<div class="vt-nav-links">

				<div class="vt-nav-previous pull-left"><?php previous_comments_link( '&laquo; ' . esc_html__( 'Older Comments', 'windfall' ) ); ?></div>
				<div class="vt-nav-next pull-right"><?php next_comments_link( esc_html__( 'Newer Comments', 'windfall' ) . ' &raquo;'); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="vt-no-comments"><?php esc_html_e( 'Comments are closed.', 'windfall' ); ?></p>
	<?php endif;
		?>
	</div><!-- .comments-section -->
	<?php endif; // Check for have_comments().
	/* ==============================================
	  Comment Forms
	=============================================== */
	if ( comments_open() ) { ?>
	<div id="respondd" class="wndfal-comment-form comment-respond">
		<?php
		$post_comment_text = cs_get_option('post_comment_text');
		$post_comment_text = $post_comment_text ? $post_comment_text : esc_html__( 'Post Comment', 'windfall' );
		$fields = array(
			'author' => do_action( 'windfall_after_comments_action' ).'<div class="row"> <div class="col-md-6 col-sm-6"><label for="author">' . esc_html__( 'Name', 'windfall' ) . '</label><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1"/></div>', // Windfall Action
			'email' => '<div class="col-md-6 col-sm-6"><label for="email">' . esc_html__( 'Email', 'windfall' ) . '</label><input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2"/></div></div>',
		);
		$defaults = array(
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
      'fields' => apply_filters( 'comment_form_default_fields', $fields),
      'id_form'              => 'commentform',
      'class_form'           => 'comments-form',
      'id_submit'            => 'submit',
      'title_reply'          => esc_html__( 'Add Your Comment', 'windfall' ),
      'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'windfall' ),
      'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'. '',
      'label_submit'         => $post_comment_text,
      'comment_field' 			 => '<div class="wndfal-form-textarea no-padding-right"><label for="comment">' . esc_html__( 'Comment:', 'windfall' ) . '</label><textarea id="comment" name="comment" tabindex="4" rows="3" cols="30"></textarea></div>'
    );

		comment_form($defaults);
		?>
	</div>
	<?php } ?>
</div><!-- #comments -->
<?php
