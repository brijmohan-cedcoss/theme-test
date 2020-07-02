<?php
/**
 * The template for wp_list_comments(); callback function.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poca
 */
?>

<?php
if( ! function_exists( 'poca_comments' ) ):
function poca_comments($comment, $args, $depth) {
    ?>
		<li class="single_comment_area" id="li-comment-<?php comment_ID() ?>">
			<!-- Comment Content -->
			<?php if ($comment->comment_approved == '0') : ?>
                <em><?php esc_html_e('Your comment is awaiting moderation.','poca') ?></em>
                <br/>
            <?php endif; ?>
			<div class="comment-content d-flex">
				<!-- Comment Author -->
				<div class="comment-author">
					<?php echo get_avatar($comment,$size='74',$default='' ); ?>
				</div>
				<!-- Comment Meta -->
				<div class="comment-meta">
					<a href="#" class="post-date"><?php echo get_comment_date(); ?></a>
					<h5><?php echo get_comment_author() ?></h5>
					<?php comment_text(); ?>
					<a href="#" class="like">Like</a>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</li>
<?php
        }
endif;
?>




