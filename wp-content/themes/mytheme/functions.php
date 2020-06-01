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


