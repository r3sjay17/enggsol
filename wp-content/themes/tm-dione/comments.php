<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Infinity
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


<div id="comments" class="comment-area">

	<?php if ( have_comments() ) : ?>

		<h5 class="comment-title">
			<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'tm-dione' ) ),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h5>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'callback'    => 'tm_dione_comment',
				'short_ping'  => true,
				'avatar_size' => 100
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'tm-dione' ); ?></h2>

				<div class="nav-links">

					<div
						class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'tm-dione' ) ); ?></div>
					<div
						class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'tm-dione' ) ); ?></div>

				</div>
				<!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

		<!-- /.comment-list -->
	<?php endif; // Check for have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tm-dione' ); ?></p>
	<?php else : ?>
		<div id="respond" class="comment-respond">
			<?php
			$commenter     = wp_get_current_commenter();
			$req           = get_option( 'require_name_email' );
			$aria_req      = ( $req ? " aria-required='true'" : '' );
			$fields        = array(
				'author' => '<div class="row"><div class="col-md-6"><input id="author" placeholder="' . esc_html__( 'Your name (required)', 'tm-dione' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
				'email'  => '<div class="col-md-6"><input id="email" placeholder="' . esc_html__( 'Your e-mail (required)', 'tm-dione' ) . '" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
			);
			$comments_args = array(
				// change the title of send button
				'label_submit'         => esc_html__( 'Send message', 'tm-dione' ),
				// change the title of the reply section
				'title_reply'          => esc_html__( 'Write a Comment', 'tm-dione' ),
				'title_reply_before'   => '<h5 class="reply-title">',
				'title_reply_after'    => '</h5>',
				// remove "Text or HTML to be displayed after the set of comment fields"
				'comment_notes_after'  => '',
				'comment_notes_before' => '',
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				'comment_field'        => '<div class="row"><div class="col-md-12">
												<textarea cols="40" rows="6" id="comment" placeholder="' . esc_html__( 'Your comment (required)', 'tm-dione' ) . '" name="comment" aria-required="true"></textarea>
												</div></div>',
				'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-border-black" value="%4$s" />',

			);
			comment_form( $comments_args ); ?>
		</div>
	<?php endif; ?>

</div>
<!-- /.comment-area -->
