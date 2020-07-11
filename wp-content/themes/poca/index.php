<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package poca
 */

get_header();
?>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Blogs</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcumb--con">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Blog Area Start ***** -->
  <section class="blog-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">

		  <!-- Single Blog Area -->
		  <?php
			if ( have_posts() ) {
			/* Start the Loop */
				while ( have_posts() ) {
					the_post();
			?>
					<div class="single-blog-area mt-50 mb-50">
						<a href="#" class="mb-30"><?php the_post_thumbnail(); ?></a>
						<!-- Content -->
						<div class="post-content">
							<a href="#" class="post-date"><?php the_date(); ?></a>
							<a href="<?php echo get_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
							<div class="post-meta mb-15">
								<a href="#" class="post-author"><?php the_author(); ?></a> |
								<a href="#" class="post-catagory"><?php the_category(','); ?></a>
							</div>
							<p><?php echo wp_trim_words( get_the_content(), 100, '</br></br><a href="' . get_permalink() . '" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a>' ); ?></p>
							<!-- <a href="#" class="read-more-btn">Continue reading <i class="fa fa-angle-right" aria-hidden="true"></i></a> -->

						</div>
					</div>
			<?php
				}
			} 
			?>
          <!-- Pagination -->
          <div class="poca-pager d-flex mb-80">
            <?php previous_posts_link( 'Older posts' ); ?>
            <?php next_posts_link( 'Newer posts' ); ?>
          </div>

        </div>

        <div class="col-12 col-lg-4">
          <div class="sidebar-area mt-5">
            <?php get_sidebar('alt'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Blog Area End ***** -->

<?php

get_footer();
