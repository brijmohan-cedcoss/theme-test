<?php
/**
 * This page consist of mytheme functions and defiinitons.
 * php version 7.3.5
 *
 * @category   null
 * @package    WordPress
 * @subpackage Mytheme
 * @author     brij1234 <brijmohan11.1996@gmail.com>
 * @license    GNU General Public License version 2 or later; see LICENSE
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      Mytheme 1.0
 */

/**
 * Enqueue styles.
 */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', false );

	wp_enqueue_style( 'blog-home', get_template_directory_uri() . '/css/blog-home.css', array(), '1.1', false );

	wp_register_script( 'iconify', 'https://code.iconify.design/1/1.0.6/iconify.min.js', array(), '1.1', false );
	wp_enqueue_script( 'iconify' );
}

/**
 * Enqueue scripts.
 */
function themeslug_enqueue_script() {
	wp_enqueue_script( 'jquery', '', array(), '1.1', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.1', true );

}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

/**
 * Enqueue navigation menu.
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu'  => __( 'Extra Menu' ),
		)
	);
}

add_action( 'init', 'register_my_menus' );

/**
 * Theme support.
 */
function mytheme_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'mytheme-fullscreen', 1980, 9999 );

	add_image_size( 'custom_post_thumb', 730, 300, true );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/**
	* Custom Background.
	*/
	add_theme_support( 'custom-background' );

	/**
	* Post formats.
	*/
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	/**
	* Editor style support
	*/
	add_theme_support( 'editor-styles' );

	/**
	 * Custom header.
	 */
	add_theme_support(
		'custom-header',
		array(
			'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
			'default-text-color' => '000',
			'width'              => 1000,
			'height'             => 250,
			'flex-width'         => true,
			'flex-height'        => true,
		)
	);

}

add_action( 'after_setup_theme', 'mytheme_theme_support' );


/**
 * Sidebar support.
 */
function my_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar', 'mytheme' ),
			'description'   => __( 'This is a primary sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'my_register_sidebars' );

/**
 * Getting user roles.
 */
function user_role() {
	$current_user = wp_get_current_user();

	$user_roles = $current_user->roles;
	$user_role  = array_shift( $user_roles );

	return $user_role;
}

add_action(
	'template_redirect',
	function() {

		$page_id = 2010;
		$user    = user_role(); // Getting user roles here.

		// If logged in do not redirect.
		// If user is subscriber prevent access to author Center page.
		if ( is_user_logged_in() && ( 'subscriber' === $user ) ) {
			$redirect = false;

			if ( is_page( $page_id ) ) {
				$redirect = true;
			}

			if ( $redirect ) {
				wp_safe_redirect( esc_url( home_url() ), 307 ); // Redirecting user to home page if found true.
			}
		} elseif ( ! is_user_logged_in() ) { // Checking for the guest user.
			$redirect = false;

			if ( is_page( 2010 ) || is_page( 2012 ) ) { // Preventing guest user from accessing author center and subscriber center pages.
				$redirect = true;
			}

			if ( $redirect ) {
				wp_safe_redirect( esc_url( wp_login_url() ), 307 ); // Redirecting user to login page if found true.
			}
		} elseif ( is_user_logged_in() && ( 'author' === $user ) ) { // Redirect for author.
			$redirect = false;
		}
	}
);

require get_stylesheet_directory() . '/inc/class-mytheme-widget.php'; // Including custom widget file.
new Mytheme_Widget();

require get_stylesheet_directory() . '/inc/class-mytheme-customizer.php'; // Including customizer file.
new Mytheme_Customizer();


