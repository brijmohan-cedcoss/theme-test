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
 * Creating an option which sets when the plugin activates
 */
function my_option() {
	add_option( 'Installed_on' );
}

/**
 * Function to delete option whwn the plugin deactivates.
 */
function my_option_delete() {
	delete_option( 'Installed_on' );
}

/**
 * Activate the plugin.
 */
function activate_myplugin() {
	// Trigger our function that adds an option type plugin.
	my_option();
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'activate_myplugin' );


/**
 * Deactivation the plugin.
 */
function deactivate_myplugin() {
	// Trigger our function that deletes an option type plugin.
	my_option_delete();
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'deactivate_myplugin' );



