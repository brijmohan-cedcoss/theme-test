<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package poca
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

	<!-- Single Widget Area -->
	<div class="single-widget-area search-widget-area mb-80">
		<form action="#" method="post">
			<input type="search" name="search" class="form-control" placeholder="Search ...">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>

	<!-- Single Widget Area -->
	<div class="single-widget-area catagories-widget mb-80">
		<h5 class="widget-title">Categories</h5>

		<!-- catagories list -->
		<ul class="catagories-list">
			<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entrepreneurship</a></li>
			<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Media</a></li>
			<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tech</a></li>
			<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tutorials</a></li>
			<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Business</a></li>
			<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entertainment</a></li>
		</ul>
	</div>

	<!-- Single Widget Area -->
	<div class="single-widget-area news-widget mb-80">
		<h5 class="widget-title">Recent Posts</h5>

		<!-- Single News Area -->
		<div class="single-news-area d-flex">
			<div class="blog-thumbnail">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/11.jpg" alt="">
			</div>
			<div class="blog-content">
				<a href="#" class="post-title">Episode 10: Season Finale</a>
				<span class="post-date">December 9, 2018</span>
			</div>
		</div>

		<!-- Single News Area -->
		<div class="single-news-area d-flex">
			<div class="blog-thumbnail">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/12.jpg" alt="">
			</div>
			<div class="blog-content">
				<a href="#" class="post-title">Episode 6: SoundCloud Example</a>
				<span class="post-date">December 9, 2018</span>
			</div>
		</div>

		<!-- Single News Area -->
		<div class="single-news-area d-flex">
			<div class="blog-thumbnail">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/13.jpg" alt="">
			</div>
			<div class="blog-content">
				<a href="#" class="post-title">Episode 7: Best Mics for Podcasting</a>
				<span class="post-date">December 9, 2018</span>
			</div>
		</div>

		<!-- Single News Area -->
		<div class="single-news-area d-flex">
			<div class="blog-thumbnail">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bg-img/14.jpg" alt="">
			</div>
			<div class="blog-content">
				<a href="#" class="post-title">Episode 6 – Defining Your Style</a>
				<span class="post-date">December 9, 2018</span>
			</div>
		</div>

	</div>

	<!-- Single Widget Area -->
	<div class="single-widget-area adds-widget mb-80">
		<a href="#"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/img/bg-img/banner.png" alt=""></a>
	</div>

	<!-- Single Widget Area -->
	<div class="single-widget-area tags-widget mb-80">
		<h5 class="widget-title">Popular Tags</h5>

		<ul class="tags-list">
			<li><a href="#">Creative</a></li>
			<li><a href="#">Unique</a></li>
			<li><a href="#">audio</a></li>
			<li><a href="#">Episodes</a></li>
			<li><a href="#">ideas</a></li>
			<li><a href="#">Podcasts</a></li>
			<li><a href="#">Wordpress Template</a></li>
			<li><a href="#">startup</a></li>
			<li><a href="#">video</a></li>
		</ul>
	</div>
