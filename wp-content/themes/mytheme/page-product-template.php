<?php
/**
 * Template Name: Product Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
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
				
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 10,
				);
				$loop = new WP_Query($args);
				while ( $loop->have_posts() ) {
					$loop->the_post();
					?>
					<div class="entry-content">
						<?php the_title(); ?>
						<?php the_content(); ?>
					</div>
					<?php
				}
				?>
			</div>

		<?php get_sidebar(); ?>

	</div>
<!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer(); ?>
