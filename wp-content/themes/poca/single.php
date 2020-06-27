<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package poca
 */

get_header();
?>
	<!-- ***** Breadcrumb Area Start ***** -->
	<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Blog Single</h2>
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
              <li class="breadcrumb-item"><a href="#">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Blog Details Area Start ***** -->
  <section class="blog-details-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="podcast-details-content d-flex mt-5 mb-80">

            <!-- Post Share -->
            <div class="post-share">
              <p>Share</p>
              <div class="social-info">
                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                <a href="#" class="pinterest"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#" class="thumb-tack"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
              </div>
            </div>

            <!-- Post Details Text -->
            <div class="post-details-text">
			<?php
				while ( have_posts() ) {
					the_post();
			?>
              	<?php the_post_thumbnail(); ?>

				<div class="post-content">
					<a href="#" class="post-date"><?php the_date(); ?></a>
					<h2><?php the_title(); ?></h2>
					<div class="post-meta">
						<a href="#" class="post-author"><?php the_title();?></a> |
						<a href="#" class="post-catagory"><?php the_category('<a href="#" class="post-catagory"></a>'); ?></a>
					</div>
				</div>

              <p><?php the_content(); ?></p>
              
              <!-- Post Catagories -->
              <div class="post-catagories d-flex align-items-center">
                <h6>Categories:</h6>
                <ul class="d-flex flex-wrap align-items-center">
                  <li><a href="#"><?php the_category('<li><a href="#">,</a></li>');?>,</a></li>
                  
                </ul>
              </div>

			  <!-- Pagination -->
			  <div class="poca-pager d-flex mb-30">
                <a href="#">Previous Post <span>Episode 3 – Wardrobe For Busy People</span></a>
                <a href="#">Next Post <span>Episode 6 – Defining Your Style</span></a>
              </div>

              <!-- Comments Area -->
              <div class="comment_area mb-50 clearfix">
				<h5 class="title"><?php get_comments(); ?></h5>
		
				<?php } ?>
                <ol>
                  <!-- Single Comment Area -->
                  <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                      <!-- Comment Author -->
                      <div class="comment-author">
                        <img src="img/bg-img/16.jpg" alt="author">
                      </div>
                      <!-- Comment Meta -->
                      <div class="comment-meta">
                        <a href="#" class="post-date">27 Aug 2018</a>
                        <h5>Jerome Leonard</h5>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                        <a href="#" class="like">Like</a>
                        <a href="#" class="reply">Reply</a>
                      </div>
                    </div>

                    <ol class="children">
                      <li class="single_comment_area">
                        <!-- Comment Content -->
                        <div class="comment-content d-flex">
                          <!-- Comment Author -->
                          <div class="comment-author">
                            <img src="img/bg-img/17.jpg" alt="author">
                          </div>
                          <!-- Comment Meta -->
                          <div class="comment-meta">
                            <a href="#" class="post-date">27 Aug 2018</a>
                            <h5>Theodore Adkins</h5>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                            <a href="#" class="like">Like</a>
                            <a href="#" class="reply">Reply</a>
                          </div>
                        </div>
                      </li>
                    </ol>
                  </li>

                  <!-- Single Comment Area -->
                  <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                      <!-- Comment Author -->
                      <div class="comment-author">
                        <img src="img/bg-img/18.jpg" alt="author">
                      </div>
                      <!-- Comment Meta -->
                      <div class="comment-meta">
                        <a href="#" class="post-date">27 Aug 2018</a>
                        <h5>Roger Marshall</h5>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                        <a href="#" class="like">Like</a>
                        <a href="#" class="reply">Reply</a>
                      </div>
                    </div>
                  </li>
                </ol>
              </div>

              <!-- Leave A Reply -->
              <div class="contact-form">
                <h5 class="mb-30">Leave A Comment</h5>

                <!-- Form -->
                <form action="#" method="post">
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
                </form>

              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-4">
          <div class="sidebar-area mt-5">

			<?php get_sidebar(); ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Blog Details Area End ***** -->
	

<?php
get_footer();
