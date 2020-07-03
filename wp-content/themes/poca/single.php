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
          <h2 class="title mt-70"><?php the_title(); ?></h2>
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
              <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
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
                  <a href="#" class="post-author"><?php the_author();?></a> |
                  <a href="#" class="post-catagory"><?php the_category(','); ?></a>
                </div>
              </div>

              <p><?php the_content(); ?></p>

              <!-- Post Catagories -->
              <div class="post-catagories d-flex align-items-center">
                <h6>Categories:</h6>
                <ul class="d-flex flex-wrap align-items-center">
                  <li><a href="#"><?php the_category(',');?></a></li>
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
              <!-- Comments Area -->
              <?php comments_template(); ?>

              <!-- Leave A Reply -->
              <div class="contact-form">
                <!-- <h5 class="mb-30">Leave A Comment</h5> -->

                <!-- Form -->
                <?php //Declare Vars
                    $comment_send = 'Post Comment';
                    $comment_reply = '<h5 class="mb-30">Leave A Comment</h5>';
                    $comment_reply_to = 'Reply';
                    $comment_cookies_1 = ' By commenting you accept the';
                    $comment_cookies_2 = ' Privacy Policy';
                    
                    $comment_author = 'Name';
                    $comment_email = 'E-Mail';
                    $comment_body = 'Comment';
                    $comment_url = 'Website';
                    
                    //Array
                    $comments_args = array(
                        //Define Fields
                        'fields' => array(
                            //Author field
                            'author' => '<div class="col-lg-6">
                                          <input type="text" id="author" name="author" class="form-control mb-30" aria-required="true" placeholder="' . $comment_author .'">
                                        </div>',
                            //Email Field
                            'email' => '<div class="col-lg-6">
                                          <input type="email" id="email" name="email" class="form-control mb-30" placeholder="' . $comment_email .'">
                                        </div>',
                            //URL Field
                            'url' => '<div class="col-lg-6">
                                        <input type="hidden" id="url" name="url" class="form-control mb-30" placeholder="' . $comment_url .'">
                                      </div>',
                            //Cookies
                            'cookies' => '<div class="col-lg-6">
                                            <input type="checkbox" id="cookies" name="cookies"  required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>
                                          </div>',
                        ),
                        
                        // Change the title of send button
                        'label_submit' => __( $comment_send ),
                        // Change the title of the reply section
                        'title_reply' => __( $comment_reply ),
                        // Change the title of the reply section
                        'title_reply_to' => __( $comment_reply_to ),
                        //Cancel Reply Text
                        'cancel_reply_link' => __( $comment_cancel ),
                        // Redefine your own textarea (the comment body).
                        'comment_field' => '<div class="col-12">
                                              <textarea id="comment" name="comment" class="form-control mb-30" aria-required="true" placeholder="' . $comment_body .'"></textarea>
                                            </div>',
                        //Message Before Comment
                        'submit_button' => '<div class="col-12">
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
  <!-- ***** Blog Details Area End ***** -->


<?php
get_footer();
