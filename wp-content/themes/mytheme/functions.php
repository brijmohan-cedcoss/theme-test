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
 * Support thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped).

	// Additional image sizes
	// Delete the next line if you do not need additional image sizes.
	add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
}

/**
 * Custom header.
 */
function themename_custom_header_setup() {
	$args = array(
		'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
		'default-text-color' => '000',
		'width'              => 1000,
		'height'             => 250,
		'flex-width'         => true,
		'flex-height'        => true,
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );

/**
 * Custom Background.
 */
add_theme_support( 'custom-background' );

/**
 * Post formats.
 */
function themename_post_formats_setup() {
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}
add_action( 'after_setup_theme', 'themename_post_formats_setup' );

/**
 * Sidebar support.
 */
function my_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar' ),
			'description'   => __( 'A short description of the sidebar.' ),
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
 * Custom logo support.
 */
function themename_custom_logo_setup() {
	$defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

/**
 * Title tag support.
 */
add_theme_support( 'title-tag' );

/**
 * Automaic feed link support.
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Html5 support
 */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

/**
 * Editor style support
 */
add_theme_support( 'editor-styles' );


if ( ! isset( $content_width ) ) {
	$content_width = 640;
}
/**
 * Content Width
 */
function mytheme_adjust_content_width() {
	global $content_width;

	if ( is_page_template( 'full-width.php' ) ) {
		$content_width = 780;
	}
}
add_action( 'template_redirect', 'mytheme_adjust_content_width' );


