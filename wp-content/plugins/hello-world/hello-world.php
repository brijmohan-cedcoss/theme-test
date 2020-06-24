<?php
/**
 * This is a template plugin file.
 *
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
 * Creating an option which sets when the plugin activates.
 */
function my_option() {
	add_option( 'Installed_on' );
}

/**
 * Function to delete option when the plugin deactivates.
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

}

register_activation_hook( __FILE__, 'activate_myplugin' );


/**
 * Deactivation the plugin.
 */
function deactivate_myplugin() {
	// Trigger our function that deletes an option type plugin.
	my_option_delete();
}
register_deactivation_hook( __FILE__, 'deactivate_myplugin' );

/**
 * Adding twitter link on the front end.
 *
 * @param [string] $content is a string.
 * @return $content
 */
function add_twitter_link( $content ) {
	if ( is_singular() ) {
		$url     = get_permalink();
		$link    = "<a href='https://twitter.com/intent/tweet?url=" . rawurlencode( $url ) . "'>Twitter link</a>";
		$content = $content . $link;
	}
	return $content;
}
add_filter( 'the_content', 'add_twitter_link' );

/**
 * Counts the number of characters on a single page.
 *
 * @param [string] $content is a string.
 * @return $char_count
 */
function char_count( $content ) {
	global $post;
	if ( is_singular() ) {
		$char_count = strlen( wp_strip_all_tags( strip_shortcodes( html_entity_decode( $post->post_content ) ) ) );
	}
	return $content . '<br>' . $char_count . '&nbsp;Characters';
}

add_filter( 'the_content', 'char_count' );


/**
 * Custom option and settings
 */
function wporg_settings_init() {
	// register a new setting for "wporg" page.
	register_setting( 'wporg', 'wporg_options' );

	// register a new section in the "wporg" page.
	add_settings_section(
		'wporg_section_developers',
		__( 'Social Links.', 'wporg' ),
		'wporg_section_developers_cb',
		'wporg'
	);

	// register a new field in the "wporg_section_developers" section, inside the "wporg" page.
	add_settings_field(
		'wporg_field_facebook', // as of WP 4.6 this value is used only internally.
		// use $args' label_for to populate the id inside the callback.
		__( 'Facebook Link', 'wporg' ),
		'wporg_field__facebook',
		'wporg',
		'wporg_section_developers',
		array(
			'label_for'         => 'wporg_field_facebook',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		),
	);

	// register a new field in the "wporg_section_developers" section, inside the "wporg" page.
	add_settings_field(
		'wporg_field_twitter', // as of WP 4.6 this value is used only internally.
		// use $args' label_for to populate the id inside the callback.
		__( 'Twitter Link', 'wporg' ),
		'wporg_field__twitter',
		'wporg',
		'wporg_section_developers',
		array(
			'label_for'         => 'wporg_field_twitter',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		),
	);
}

/**
 * Register our wporg_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'wporg_settings_init' );



// developers section cb.

// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
/**
 * Custom option and settings:
 * callback functions
 *
 * @param  [string] $args have the following keys defined: title, id, callback.
 */
function wporg_section_developers_cb( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Link to the Social websites.', 'wporg' ); ?></p>
	<?php
}

// pill field cb.

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// WordPress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.

/**
 * Facebook link field callback function
 *
 * @param [type] $args is defined at the add_settings_field() function.
 * @return void
 */
function wporg_field__facebook( $args ) {
	// get the value of the setting we've registered with register_setting().
	// output the field.
	?>
	<input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>" name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]" >
	<p class="description">
		<?php esc_html_e( 'If you are ready please add your link of Facebook.', 'wporg' ); ?>
	</p>
	<?php
}

/**
 * Pill field callback function
 *
 * @param [type] $args is defined at the add_settings_field() function.
 * @return void
 */
function wporg_field__twitter( $args ) {
	// get the value of the setting we've registered with register_setting().

	// output the field.
	?>
	<input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>" name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]" >
	<p class="description">
		<?php esc_html_e( 'If you are ready please add your link of Twitter.', 'wporg' ); ?>
	</p>
	<?php
}

/**
 * Top level menu
 */
function wporg_options_page() {
	// add top level menu page.
	add_menu_page(
		'WPOrg',
		'WPOrg Options',
		'manage_options',
		'wporg',
		'wporg_options_page_html'
	);
}

/**
 * Register our wporg_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'wporg_options_page' );

/**
 * Top level menu:
 * callback functions
 */
function wporg_options_page_html() {
	// check user capabilities.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// add error/update messages.

	// check if the user have submitted the settings.
	// WordPress will add the "settings-updated" $_GET parameter to the url.
	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated".
		add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
	}

	// show error/update messages.
	settings_errors( 'wporg_messages' );
	?>
	<div class="wrap">

		<div class="container">
			<h2>Admin form</h2>

				<div class="form-group">
					<label for="Name">Name</label>
					<input type="text" class="form-control" id="txtName" placeholder="Enter Name" name="txtName">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="txtEmail" placeholder="Enter Email" name="txtEmail">
				</div>
				<button type="submit" id="formName" class="btn btn-primary">Submit</button>
			</form>
		</div>

		<table>
			<tbody>
			<tr>
				<td><input class="pref" checked="checked" name="book" type="radio" value="Sycamore Row" />Sycamore Row</td>
				<td>John Grisham</td>
			</tr>
			<tr>
				<td><input class="pref" name="book" type="radio" value="Dark Witch" />Dark Witch</td>
				<td>Nora Roberts</td>
			</tr>
			</tbody>
		</table>

		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg".
			settings_fields( 'wporg' );
			// output setting sections and their fields.
			// (sections are registered for "wporg", each field is registered to a specific section).
			do_settings_sections( 'wporg' );
			// output save settings button.
			submit_button( 'Save Settings' );
			?>
		</form>
	</div>
	<?php
}

/**
 * My shortcode
 *
 * @param mixed $attr store the arrtibute for the shortcode.
 */
function my_shortcode( $attr ) {
	$arry    = shortcode_atts(
		array(
			'width'  => 500,
			'height' => 400,
		),
		$attr
	);
	$content = '<img src="https://i1.wp.com/www.soccercleats101.com/wp-content/uploads/2019/04/CR7-Boots-Up-Close.jpg?ssl=1" width="' . $arry['width'] . '" height="' . $arry['height'] . '"/>';
	return $content;
}

add_shortcode( 'myshortcode', 'my_shortcode' );

/**
 * Creating Custom post type.
 */
function myown_custom_post_type() {
	$labels = array(
		'name'               => __( 'Products', 'textdomain' ),
		'singular_name'      => __( 'Product', 'textdomain' ),
		'add_new'            => 'Add Product Item',
		'all_items'          => 'All Items',
		'add_new_item'       => 'Add Item',
		'edit_item'          => 'Edit Item',
		'new_item'           => 'New Item',
		'view_item'          => 'View Item',
		'search_item'        => 'Search Product',
		'not_found'          => 'No Items Found',
		'not_found_in_trash' => 'No Items Found In Trash',
		'parent_item_colon'  => 'Parent Item',
	);

	register_post_type(
		'product',
		array(
			'labels'              => $labels,
			'public'              => true,
			'has_archive'         => true,
			'publicly_queryable'  => true,
			'query_var'           => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'show_in_rest'        => true,
			'show_in_admin_bar'   => true,
			'description'         => 'Recipe custom post type.',
			'supports'            => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
			),
			'menu_position'       => 5,
			'exclude_from_search' => false,
		)
	);
}
add_action( 'init', 'myown_custom_post_type' );

/**
 * Registering custom taxonomies.
 */
function myown_custom_taxonomy() {
	$labels = array(
		'name'              => 'Collections',
		'singular_name'     => 'Collection',
		'search_items'      => 'Search Collection',
		'all_items'         => 'All Collections',
		'parent_item'       => 'Parent Collection',
		'parent_item_colon' => 'Parent Collection:',
		'edit_item'         => 'Edit Collection',
		'update_item'       => 'Update Collection',
		'add_new_item'      => 'Add New Collection',
		'new_item_name'     => 'New Collection Name',
		'menu_name'         => 'Collection',
	);

	register_taxonomy(
		'collection',
		array(
			'product',
		),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array(
				'slug' => 'collection',
			),
		),
	);

	register_taxonomy(
		'snapshot',
		array(
			'product',
		),
		array(
			'hierarchical'      => false,
			'label'             => 'Snapshot',
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug' => 'snapshot',
			),
		),
	);
}
add_action( 'init', 'myown_custom_taxonomy' );

/**
 * Enqueue and localize script.
 *
 * @return void
 */
function example_ajax_enqueue() {

	// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'example-ajax-script',
		plugins_url( '/js/myjq.js', __FILE__ ),
		array( 'jquery' ),
		'1.0.0',
		true,
	);

	// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script(
		'example-ajax-script',
		'example_ajax_obj',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'ajax-nonce' ),
		)
	);

}
add_action( 'wp_enqueue_scripts', 'example_ajax_enqueue' );

/**
 * Function for ajax request handler
 *
 * @return void
 */
function example_ajax_request() {
	$nonce = isset( $_POST['nonce'] ) ? wp_unslash( $_POST['nonce'] ) : ' ';

	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	// The $_REQUEST contains all the data sent via ajax.
	if ( isset( $_POST ) ) {

		$fruit = isset( $_POST['fruit'] ) ? wp_unslash( $_POST['fruit'] ) : ' ';

		// Let's take the data that was sent and do something with it.
		if ( 'Banana' === $fruit ) {
			$fruit = 'Apple';
		}

		// Now we'll return it to the javascript function.
		// Anything outputted will be returned in the response.
		echo esc_html( $fruit );

		// If you're debugging, it might be useful to see what was sent in the $_REQUEST.
		// print_r($_REQUEST);.

	}

	// Always die in functions echoing ajax content.
	die();
}

add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );

// If you wanted to also use the function for non-logged in users (in a theme for example).
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );

/**
 * Function for ajax request handler
 *
 * @return void
 */
function form_ajax_handler() {
	$nonce = isset( $_GET['nonce'] ) ? wp_unslash( $_GET['nonce'] ) : ' ';

	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	// The $_REQUEST contains all the data sent via ajax.
	if ( isset( $_GET ) ) {

		$name_new  = isset( $_GET['name'] ) ? wp_unslash( $_GET['name'] ) : ' ';
		$email_new = isset( $_GET['email'] ) ? wp_unslash( $_GET['email'] ) : ' ';

		// Let's take the data that was sent and do something with it.
		if ( 'Brij' === $name_new ) {
			$name_new = 'Mohan';
		}

		// Now we'll return it to the javascript function.
		// Anything outputted will be returned in the response.
		echo esc_html( $name_new . ' ' . $email_new );

		// If you're debugging, it might be useful to see what was sent in the $_REQUEST.
		// print_r($_REQUEST);.

	}

	// Always die in functions echoing ajax content.
	die();
}

add_action( 'wp_ajax_form_ajax_request', 'form_ajax_handler' );
add_action( 'wp_ajax_nopriv_form_ajax_request', 'form_ajax_handler' );

/**
 * Adding Query form on the Submit form post(Custom post type=product).
 *
 * @param [string] $content is a string.
 * @return $content
 */
function submit_form( $content ) {
	if ( is_page( 2084 ) ) {
		$formhtml = '<div class="container">
						<h2>Query form</h2>
						<div class="form-group">
							<label for="Name">Name:</label>
							<input type="text" class="form-control" id="formName" placeholder="Enter Your Name" name="formName">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="formEmail" placeholder="Enter Email" name="formEmail">
						</div>
						<div class="form-group">
							<label for="query">Your Query:</label>
							<textarea name="formQuery" id="formQuery" class="form-control" cols="30" rows="10"></textarea>
						</div>
						<button type="submit" id="submitform" class="btn btn-primary">Submit</button>
					</div>';
		$content  = $content . '<br>' . $formhtml . '<br>';
	}
	return $content;
}
add_filter( 'the_content', 'submit_form' );

/**
 * Creating Custom post type.
 */
function myown_custom_post_feedback() {
	$labels = array(
		'name'               => __( 'Feedbacks', 'textdomain' ),
		'singular_name'      => __( 'Feedback', 'textdomain' ),
		'add_new'            => 'Add New Feedback',
		'all_items'          => 'All Feedbacks',
		'add_new_item'       => 'Add Feedback',
		'edit_item'          => 'Edit Feedback',
		'new_item'           => 'New Feedback',
		'view_item'          => 'View Feedback',
		'search_item'        => 'Search Feedback',
		'not_found'          => 'No Items Found',
		'not_found_in_trash' => 'No Items Found In Trash',
		'parent_item_colon'  => 'Parent Item',
	);

	register_post_type(
		'feedback',
		array(
			'labels'              => $labels,
			'public'              => true,
			'has_archive'         => true,
			'publicly_queryable'  => true,
			'query_var'           => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'show_in_rest'        => true,
			'show_in_admin_bar'   => true,
			'description'         => 'Recipe custom post type.',
			'supports'            => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
			),
			'menu_position'       => 5,
			'exclude_from_search' => false,
		)
	);
}
add_action( 'init', 'myown_custom_post_feedback' );

/**
 * Function for ajax request handler
 *
 * @return void
 */
function submit_form_ajax_handler() {
	$nonce = isset( $_POST['nonce'] ) ? wp_unslash( $_POST['nonce'] ) : ' ';

	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	// The $_REQUEST contains all the data sent via ajax.
	if ( isset( $_POST ) ) {
		$name_new  = isset( $_POST['name'] ) ? wp_unslash( $_POST['name'] ) : ' ';
		$email_new = isset( $_POST['email'] ) ? wp_unslash( $_POST['email'] ) : ' ';
		$info_new  = isset( $_POST['msg'] ) ? wp_unslash( $_POST['msg'] ) : ' ';

		$user_id = get_current_user_id();

		// Create post object.
		$my_post = array(
			'post_type'    => 'feedback',
			'post_title'   => wp_strip_all_tags( $name_new ),
			'post_content' => $info_new . '<br>' . "<small><a href='" . $email_new . "'>Email Here</a></small>",
			'post_status'  => 'publish',
			'post_author'  => $user_id,
		);

		// Insert the post into the database.
		$post_ID = wp_insert_post( $my_post );
		echo esc_html( $post_ID );

		// If you're debugging, it might be useful to see what was sent in the $_REQUEST.
		// print_r($_REQUEST);.

	}

	// Always die in functions echoing ajax content.
	die();
}

add_action( 'wp_ajax_submit_form_ajax_request', 'submit_form_ajax_handler' );
add_action( 'wp_ajax_nopriv_submit_form_ajax_request', 'submit_form_ajax_handler' );
