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
	
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<div class="comment_area mb-50 clearfix">
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
							'style'       => 'ol',
							'short_ping'  => true,
							'callback'    => 'poca_comments',
							
						)
					);
					?>
			
			</ol>
		</div>	
		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'poca' ); ?></p>
			<?php
		endif;
	}
		?>
		


<!-- #comments -->
