<?php
/**
 * Firstling functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Firstling
 * @since 1.0.2
 */

define('THEME_ASSETS', esc_attr(get_template_directory_uri() . '/assets/') );
define('FIRSTLING_THEME_PATH', get_template_directory() );

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

require_once FIRSTLING_THEME_PATH . '/core/classes/class-bootstrap-nav.php';
require_once FIRSTLING_THEME_PATH . '/core/classes/class-thumbnail-resizer.php';
// require_once THEME_PATH . '/core/classes/abstracts/abstract-front-end-form.php';
require_once FIRSTLING_THEME_PATH . '/custom/helpers.php';
require_once FIRSTLING_THEME_PATH . '/widgets/sidebar.php';
require_once FIRSTLING_THEME_PATH . '/custom/navwalker.php';
require_once FIRSTLING_THEME_PATH . '/custom/theme-custom-options-kirki.php';
require_once FIRSTLING_THEME_PATH . '/custom/comments-loop.php';

//add_filter( 'media_library_show_audio_playlist', '__return_false' );

if ( ! function_exists( 'firstling_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 1.0.2
	 */
	function firstling_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'firstling', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'firstling' ),
				'footer-menu' => __( 'Footer Menu', 'firstling' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'news-sidebar', 640, 440, true );
		add_image_size( 'carrossel', 1140, 426, true );
		add_image_size( 'single', 750, 410, true );
		add_image_size( 'next-prev', 70, 70, true );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		
		
		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );


		/**
		 * Support The Excerpt on pages.
		 */
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
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
		 * Enable support for custom logo.
		 *
		 *  @since Odin 2.2.10
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
	}
}

add_action( 'after_setup_theme', 'firstling_setup_features' );

/**
 * Register widget areas.
 *
 * @since 1.0.2
 */
function firstling_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'firstling' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'firstling' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'firstling_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 1.0.2
 */
function firstling_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'firstling_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 1.0.2
 */
function firstling_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'library', $template_url . '/assets/css/library.min.css' , array(), null, 'all' );
	wp_enqueue_style( 'app', $template_url . '/assets/css/app.min.css' , array(), null, 'all' );

	// Grunt main file with Bootstrap, FitVids and others libs.
	wp_enqueue_script( 'library', $template_url . '/assets/js/library.min.js', array(), null, true );
	wp_enqueue_script( 'app', $template_url . '/assets/js/app.min.js', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'firstling_enqueue_scripts', 1 );


/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}
