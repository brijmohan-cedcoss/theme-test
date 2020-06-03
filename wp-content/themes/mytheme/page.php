<?php
/**
 * The main template file
 *
 * This is the page file in a WordPress theme
 * and one of the required files for a theme to access a page.
 * It is used to display a page when nothing more specific matches a query.
 * php version 7.3.5
 *
 * @category   null
 * @package    WordPress
 * @subpackage Mytheme
 * @author     brij1234 <brijmohan11.1996@gmail.com>
 * @license    GNU General Public License version 2 or later; see LICENSE
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      Mytheme 1.0
 */

get_header();
?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="my-4">Page Heading
					<small>Secondary Text</small>
				</h1>

				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						// individual post section.
						the_post();
						?>
						<!-- Blog Post -->
						<div class="card mb-4">
							<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
							<div class="card-body">
								<h2 class="card-title"><?php the_title(); ?></h2>
								<?php the_content(); ?>
								<a href="#" class="btn btn-primary">Read More &rarr;</a>
							</div>
							<div class="card-footer text-muted">
								Posted on <?php the_date(); ?> by
								<a href="#"><?php the_author(); ?></a>
							</div>
						</div>
						<?php
					}
				}
				?>

			<!-- Pagination -->
				<ul class="pagination justify-content-center mb-4">
					<li class="page-item">
						<a class="page-link" href="#">&larr; Older</a>
					</li>
					<li class="page-item disabled">
						<a class="page-link" href="#">Newer &rarr;</a>
					</li>
				</ul>
				<?php
				// Previous / Next page pagination.
				the_posts_pagination(
					array(
						'prev_text'          => __( 'Older', 'mytheme' ),
						'next_text'          => __( 'Newer', 'mytheme' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mytheme' ) . '</sapn>',
					)
				);
				?>

			</div>

		<?php get_sidebar(); ?>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

<?php get_footer(); ?>
