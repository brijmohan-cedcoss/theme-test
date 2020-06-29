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
	<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg);">
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
              	<?php the_post_thumbnail(); ?></br></br>

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
                  <?php 
                  $prev_post = get_adjacent_post(false, '', true);
                  $next_post = get_adjacent_post(false, '', false);
                  ?>
                
                      <a href="<?php echo get_permalink($prev_post->ID); ?>">Previous Post <span><?php echo($prev_post->post_title); ?></span></a>
                      <a href="<?php echo get_permalink($next_post->ID); ?>">Next Post <span><?php echo($next_post->post_title); ?></span></a>
                </div>
          <?php } ?>

              <?php comments_template(); ?>
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

        
      </div>
    </div>
  </section>
  <!-- ***** Blog Details Area End ***** -->
	

<?php
get_footer();
