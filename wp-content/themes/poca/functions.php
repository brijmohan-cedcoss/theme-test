<?php
/**
 * poca functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package poca
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'poca_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function poca_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on poca, use a find and replace
		 * to change 'poca' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'poca', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'poca' ),
			)
		);

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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'poca_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'poca_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function poca_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'poca_content_width', 640 );
}
add_action( 'after_setup_theme', 'poca_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function poca_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'poca' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'poca' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'poca_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function poca_scripts() {

	wp_enqueue_script( 'jqueryeasing-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/js/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-navigation', get_template_directory_uri() . '/js-default/navigation.js', array(), _S_VERSION, true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jarallax-js', get_template_directory_uri() . '/js/jarallax.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jarallaxvideo-js', get_template_directory_uri() . '/js/jarallax-video.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'pocabundle-js', get_template_directory_uri() . '/js/poca.bundle.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'waypoint-js', get_template_directory_uri() . '/js/waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'active-js', get_template_directory_uri() . '/js/default-assets/active.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'audioplayer-js', get_template_directory_uri() . '/js/default-assets/audioplayer.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'avoidconerror-js', get_template_directory_uri() . '/js/default-assets/avoid.console.error.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'classynav-js', get_template_directory_uri() . '/js/default-assets/classynav.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scrollup-js', get_template_directory_uri() . '/js/default-assets/jquery.scrollup.min.js', array(), _S_VERSION, true );

	
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'audioplayer-css', get_template_directory_uri() . '/css/default-assets/audioplayer.css', array(), _S_VERSION );
	wp_enqueue_style( 'classynav-css', get_template_directory_uri() . '/css/default-assets/classy-nav.css', array(), _S_VERSION );
	wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/css/default-assets/hkgrotesk-fonts.css', array(), _S_VERSION );

	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/style.css', array(), _S_VERSION );
	wp_style_add_data( 'stylesheet', 'rtl', 'replace' );


}
add_action( 'wp_enqueue_scripts', 'poca_scripts' );

/**
 * Enqueue styles.
 */
function poca_styles() {

	
	
	// wp_register_style( 'magnific', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css', array(), _S_VERSION );
	// wp_enqueue_style( 'magnific' );
}
add_action( 'wp_enqueue_scripts', 'poca_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

