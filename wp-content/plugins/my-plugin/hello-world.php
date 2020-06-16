<?php
/**
 * @package Myplugin
 * Plugin Name: Hello World
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: This is a basic plugin
 * Version:     1.0
 * Author:      Brij Mohan Pandey
 * Author URI:  https://developer.wordpress.org/
 * Text Domain: wporg
 * Domain Path: /languages
 * License:     GPL2
 *
 * My Plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * My Plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with My Plugin . If not, see {License URI}.
 */

/**
 * Register the "book" custom post type
 */
function myplugin_post_type() {
	register_post_type(
		'book',
		array(
			'public' => true,
			'label'  => 'Books',
		)
	);
}
add_action( 'init', 'myplugin_post_type' );

/**
 * Activate the plugin.
 */
function activate_myplugin() {
	// Trigger our function that registers the custom post type plugin.
	myplugin_post_type();
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'activate_myplugin' );


/**
 * Deactivation the plugin.
 */
function deactivate_myplugin() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( 'book' );
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'deactivate_myplugin' );



