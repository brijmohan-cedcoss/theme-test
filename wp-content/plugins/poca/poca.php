<?php
/**
 * This is a template plugin file.
 *
 * @package Poca
 * Plugin Name: Poca
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: This is a basic plugin
 * Version:     1.0
 * Author:      Brij Mohan Pandey
 * Author URI:  https://developer.wordpress.org/
 * Text Domain: poca
 * Domain Path: /languages
 * License:     GPL2
 *
 *
 * Poca is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Poca is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with My Plugin . If not, see {License URI}.
 */

/**
 * Creating Custom post type.
 */
function poca_custom_post_type() {
	$labels = array(
		'name'               => __( 'Podcasts', 'poca' ),
		'singular_name'      => __( 'Podcast', 'poca' ),
		'add_new'            => 'Add Podcast',
		'all_items'          => 'All Podcasts',
		'add_new_item'       => 'Add Podcast',
		'edit_item'          => 'Edit Podcast',
		'new_item'           => 'New Podcast',
		'view_item'          => 'View Podcast',
		'search_item'        => 'Search Podcast',
		'not_found'          => 'No Items Found',
		'not_found_in_trash' => 'No Items Found In Trash',
		'parent_item_colon'  => 'Parent Item',
	);

	register_post_type(
		'podcast',
		array(
			'labels'              => $labels,
			'public'              => true,
			'has_archive'         => true,
			'publicly_queryable'  => true,
			'query_var'           => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'show_in_rest'        => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-format-audio',
			'description'         => 'Podcast custom post type.',
			'supports'            => array(
				'title',
				'comments',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
			),
			'menu_position'       => 5,
			'exclude_from_search' => false,
			'rewrite'             => array(
				'slug' => 'podcast',
			),
		)
	);
}
add_action( 'init', 'poca_custom_post_type' );

/**
 * Activate plugin
 */
function activate_poca() {
	// Trigger our function that adds a custom post type.
	poca_custom_post_type();
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'activate_poca' );

/**
 * Deacitvate plugin
 */
function deactivate_poca() {
	// Trigger our function that adds a custom post type.
	poca_custom_post_type();
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'deactivate_poca' );

/**
 * Creating custom taxonomy (categories) for Podcasts
 */
function poca_custom_taxonomy() {
	$labels = array(
		'name'              => 'Categories',
		'singular_name'     => 'Category',
		'search_items'      => 'Search Categories',
		'all_items'         => 'All Categories',
		'parent_item'       => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item'         => 'Edit Category',
		'update_item'       => 'Update Category',
		'add_new_item'      => 'Add New Category',
		'new_item_name'     => 'New Category Name',
		'menu_name'         => 'Category',
	);
	// Registering custom category taxanomy.
	register_taxonomy(
		'poca_category',
		array(
			'podcast',
		),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array(
				'slug' => 'category',
			),
		),
	);

	// Registering custom tag taxonomy.
	register_taxonomy(
		'poca_tags',
		array(
			'podcast',
		),
		array(
			'hierarchical'      => false,
			'label'             => 'Tag',
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug' => 'tag',
			),
		),
	);
}
add_action( 'init', 'poca_custom_taxonomy' );

require plugin_dir_path( __FILE__ ) . '/inc/class-poca-categories.php'; // Including custom widget file.
new Poca_Categories();

require plugin_dir_path( __FILE__ ) . '/inc/class-poca-categories2.php'; // Including custom widget file.
new Poca_Categories2();

require plugin_dir_path( __FILE__ ) . '/inc/class-poca-recentpost.php'; // Including custom widget file.
new Poca_Recentpost();

require plugin_dir_path( __FILE__ ) . '/inc/class-poca-recentpost2.php'; // Including custom widget file.
new Poca_Recentpost2();

/**
 * Enqueue and Localize script.
 */
function poca_ajax_enqueue() {

	// Enqueue script on the frontend.
	wp_enqueue_script(
		'poca_ajax_enqueue',
		plugins_url( '/js/poca-ajax.js', __FILE__ ),
		array( 'jquery' ),
		'1.0.0',
		true,
	);

	// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script(
		'poca_ajax_enqueue',
		'poca_ajax_obj',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'ajax-nonce' ),
		),
	);

}
add_action( 'wp_enqueue_scripts', 'poca_ajax_enqueue' );

/**
 * Ajax request handler
 *
 * @return void
 */
function poca_load_post_ajax() {
	$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}
	if ( isset( $_POST['ppp'] ) && isset( $_POST['category'] ) ) {
		$post_per_page = sanitize_text_field( wp_unslash( $_POST['ppp'] ) );
		$cate          = sanitize_text_field( wp_unslash( $_POST['category'] ) );

		if ( '*' == $cate ) {
			$args = array(
				'post_type'      => 'podcast',
				'posts_per_page' => $post_per_page,
			);
		} else {
			$args = array(
				'post_type'      => 'podcast',
				'posts_per_page' => $post_per_page,
				'tax_query'      => array(
					array(
						'taxonomy' => 'poca_category',
						'terms'    => $cate,
						'field'    => 'slug',
					),
				),
			);
		}
	}

		$query = new WP_Query( $args ); ?>
		<div class="row poca-portfolio" >
		<?php
		while ( $query->have_posts() ) {
			$query->the_post();
			?>

			<!-- Single gallery Item -->
			<div  class="col-12 col-md-6 single_gallery_item entre wow fadeInUp" data-wow-delay="0.2s">
				<!-- Welcome Music Area -->
				<div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
					<div class="poca-music-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="poca-music-content text-center">
						<span class="music-published-date mb-2"><?php echo get_the_date(); ?></span>
						<h2><?php the_title(); ?></h2>
						<div class="music-meta-data">
							<p>By <a href="#" class="music-author"><?php the_author(); ?></a> | 
							<?php
							$terms = wp_get_post_terms( $query->post->ID, 'poca_category', array( 'fields' => 'all' ) );
							foreach ( $terms as $term) { 
							?>
							<a href="<?php echo( get_term_link( $term->slug, 'poca_category' ) ); ?>" class="music-catagory"><?php echo $term->name; ?></a> <?php } ?>| 
							<a href="#" class="music-duration"><?php the_time(); ?></a></p>
						</div>
						<!-- Music Player -->
						<div class="poca-music-player">
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
			<?php
			wp_reset_postdata();
		}
		?> 
		</div>
		<?php

		die();
}

add_action( 'wp_ajax_nopriv_poca_ajax_request', 'poca_load_post_ajax' );
add_action( 'wp_ajax_poca_ajax_request', 'poca_load_post_ajax' );
