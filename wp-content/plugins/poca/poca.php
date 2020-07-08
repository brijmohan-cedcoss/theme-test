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

require plugin_dir_path( __FILE__ ) . '/inc/class-poca-recentpost.php'; // Including custom widget file.
new Poca_Recentpost();
