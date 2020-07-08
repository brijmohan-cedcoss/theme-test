<?php 
/**
 * The template for displaying all single posts of Custom post type(podcast)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package poca
 */

get_header();
?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area single-podcast-breadcumb bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
          <!-- Music Area -->
          <div class="poca-music-area style-2 bg-transparent mb-0">
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2">December 9, 2018</span>
              <h2 class="text-white">Episode 201 - You Don’t Know Squat!</h2>
              <div class="music-meta-data">
                <p class="text-white">By <a href="#" class="music-author text-white">Admin</a> | <a href="#" class="music-catagory  text-white">Tutorials</a> | <a href="#" class="music-duration  text-white">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player style-2">
                <audio preload="auto" controls>
                  <source src="<?php echo get_template_directory_uri(); ?>/audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Likes, Share & Download -->
              <div class="likes-share-download d-flex align-items-center justify-content-between">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
                <div>
                  <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                  <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                </div>
              </div>
            </div>
          </div>
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
              <li class="breadcrumb-item"><a href="#">Podcast</a></li>
              <li class="breadcrumb-item active" aria-current="page">Single</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Podcast Details Area Start ***** -->
  <section class="podcast-details-area">
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
              <h2><?php the_title(); ?></h2>
              <p><?php the_content(); ?></p>

              <!-- Post Catagories -->
              <div class="post-catagories d-flex align-items-center">
                <h6>Categories:</h6>
                <ul class="d-flex flex-wrap align-items-center">
				<?php $terms = wp_get_post_terms( $post->ID, 'poca_category', array( 'fields' => 'all' ) );
					foreach ( $terms as $term) { ?>
                  	<li><a href="<?php echo( get_term_link($term->slug, 'poca_category') ); ?>"><?php echo $term->name . ','; ?></a></li>
					<?php } ?>
                  <!-- <li><a href="#">Business,</a></li>
                  <li><a href="#">Tech</a></li> -->
                </ul>
              </div>

              <!-- Pagination -->
              <div class="poca-pager d-flex mb-30">
			  <?php 
                  $prev_post = get_adjacent_post( false, '', true );
                  $next_post = get_adjacent_post( false, '', false );
                  ?>
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>">Previous Post <span><?php echo( $prev_post->post_title ); ?></span></a>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>">Next Post <span><?php echo( $next_post->post_title ); ?></span></a>
              </div>
			<?php } ?>
              <!-- Comments Area -->
			  <?php comments_template(); ?>

              <!-- Leave A Reply -->
              <div class="contact-form">
                <!-- <h5 class="mb-30">Leave A Comment</h5> -->

                <!-- Form -->
				<?php //Declare Vars
                    $comment_send      = 'Post Comment';
                    $comment_reply     = '<h5 class="mb-30">Leave A Comment</h5>';
                    $comment_reply_to  = '<h5 class="mb-30">Reply to %1$s</h5>';
                    $comment_cookies_1 = ' By commenting you accept the';
                    $comment_cookies_2 = ' Privacy Policy';
                    
                    $comment_author    = 'Name';
                    $comment_email     = 'E-Mail';
                    $comment_body      = 'Comment';
                    $comment_url       = 'Website';
                   
                    
                    //Array
                    $comments_args     = array(
                        //Define Fields
                        'fields'            => array(
                            //Author field
                            'author'  => '<div class="col-lg-6">
                                            <input type="text" id="author" name="author" class="form-control mb-30" aria-required="true" placeholder="' . $comment_author .'">
                                          </div>',
                            //Email Field
                            'email'   => '<div class="col-lg-6">
                                            <input type="email" id="email" name="email" class="form-control mb-30" placeholder="' . $comment_email .'">
                                         </div>',
                            //URL Field
                            'url'     => '<div class="col-lg-6">
                                            <input type="hidden" id="url" name="url" class="form-control mb-30" placeholder="' . $comment_url .'">
                                          </div>',
                            //Cookies
                            'cookies' => '<div class="col-lg-6">
                                            <input type="checkbox" id="cookies" name="cookies"  required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>
                                          </div>',
                        ),
                        
                        // Change the title of send button
                        'label_submit'      => __( $comment_send ),
                        // Change the title of the reply section
                        'title_reply'       => __( $comment_reply ),
                        // Change the title of the reply section
                        'title_reply_to'    => __( $comment_reply_to ),
                        //Cancel Reply Text
                        'cancel_reply_link' => __( $comment_cancel ),
                        // Redefine your own textarea (the comment body).
                        'comment_field'     => '<div class="col-12">
                                                  <textarea id="comment" name="comment" class="form-control mb-30" aria-required="true" placeholder="' . $comment_body .'"></textarea>
                                                </div>',
                        //Redefine your own submit button
                        'submit_button'      => '<div class="col-12">
                                                   <button type="submit" name="%1$s" id="%2$s" class="%3$s btn poca-btn mt-30" value="%4$s">Post Comment</button>
                                                 </div>',
                      );
                    comment_form( $comments_args );

                ?>
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
  <!-- ***** Podcast Details Area End ***** -->

<?php
get_footer();