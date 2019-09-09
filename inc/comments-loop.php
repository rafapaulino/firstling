<?php
if ( ! function_exists( 'firstling_comments_loop' ) ) {

	/**
	 * Custom comments loop.
	 *
	 * @since 2.2.0
	 *
	 * @param  object $comment Comment object.
	 * @param  array  $args    Comment arguments.
	 * @param  int    $depth   Comment depth.
	 */
	function firstling_comments_loop( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) {
			case 'pingback' :
			case 'trackback' :
?>
				<li class="media post pingback">
					<p><?php esc_attr_e( 'Pingback:', 'firstling' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_attr_e( 'Edit', 'firstling' ), '<span class="edit-link">', '</span>' ); ?></p>
<?php
			break;
			default :
?>
				<li <?php comment_class( 'media' ); ?> id="li-comment-<?php comment_ID(); ?>">
					<div id="div-comment-<?php comment_ID(); ?>" class="comment-body comment-author vcard">
						<div class="media-left">
							<?php echo str_replace( "class='avatar", "class='media-object avatar", get_avatar( $comment, 64 ) ); ?>
						</div>
						<div class="media-body">
							<div class="comment-meta">
								<h5 class="media-heading">
									<?php echo sprintf( '<strong>%1$s</strong>
                                                         <a href="%2$s" class="comment-time">%3$s <time datetime="%4$s">%5$s %6$s </time> %7$s</a>',
                                                         esc_attr(get_comment_author_link()),
                                                         esc_url( get_comment_link( $comment->comment_ID ) ),
                                                         esc_attr_e('in', 'firstling'),														 
														 esc_attr(get_comment_time( 'c' )),
														 esc_attr(get_comment_date()), esc_attr_e('at', 'firstling'),
														 esc_attr(get_comment_time()), esc_attr_e( 'said:', 'firstling' ) ); ?>
								</h5>

								<?php edit_comment_link( esc_attr_e( 'Edit', 'firstling' ), '<span class="edit-link">', ' </span>' ); ?>

								<?php if ( $comment->comment_approved == '0' ) : ?>
								    <p class="comment-awaiting-moderation alert alert-info"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'firstling' ); ?></p>
								<?php endif; ?>
                            </div><!-- .comment-meta -->

							<div class="comment-content">
								<?php comment_text(); ?>
							</div><!-- .comment-content -->

							<div class="comment-metadata">
								<span class="reply-link"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_attr_e( 'Respond', 'firstling' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
							</div><!-- .comment-metadata -->
						</div>
        </div><!-- .comment-body -->
<?php
			break;
		}
	}
}