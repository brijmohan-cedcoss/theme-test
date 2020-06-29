<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poca
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
	<!-- Comments Area -->
	<div class="comment_area mb-50 clearfix">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<h5 class="title"><?php
							printf(
							esc_html(/* translators: %s: search term */
								_nx(
									'%s Comment',
									'%s Comments',
									get_comments_number(),
									'comments title',
									'mytheme'
								)
							),
							esc_html( number_format_i18n( get_comments_number() ) ),
							'<span>' . esc_html( get_the_title() ) . '</span>'
							);
						?>
		</h5>


		<ol>
		<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 74,
				)
			);
			?>
			
		</ol>
		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'poca' ); ?></p>
			<?php
		endif;
		}
		?>
	</div>
		<?php comment_form(); ?>
			<!-- Leave A Reply -->
	<div class="contact-form">
		<h5 class="mb-30">Leave A Comment</h5>

		<!-- Form -->
		<!-- <form action="#" method="post">
			<div class="row">
				<div class="col-lg-6">
					<input type="text" name="message-name" class="form-control mb-30" placeholder="Name">
				</div>
				<div class="col-lg-6">
					<input type="email" name="message-email" class="form-control mb-30" placeholder="Email">
				</div>
				<div class="col-12">
					<textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
				</div>
				<div class="col-12">
					<button type="submit" class="btn poca-btn mt-30">Post Comment</button>
				</div>
			</div>
		</form> -->

	</div>

<!-- #comments -->
