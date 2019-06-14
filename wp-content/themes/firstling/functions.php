<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

define('THEME_ASSETS', esc_attr(get_template_directory_uri() . '/assets/') );
define('THEME_PATH', get_template_directory() );

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once THEME_PATH . '/core/classes/class-bootstrap-nav.php';
require_once THEME_PATH . '/core/classes/class-shortcodes.php';
//require_once THEME_PATH . '/core/classes/class-shortcodes-menu.php';
require_once THEME_PATH . '/core/classes/class-thumbnail-resizer.php';
// require_once THEME_PATH . '/core/classes/class-theme-options.php';
// require_once THEME_PATH . '/core/classes/class-options-helper.php';
// require_once THEME_PATH . '/core/classes/class-post-type.php';
// require_once THEME_PATH . '/core/classes/class-taxonomy.php';
// require_once THEME_PATH . '/core/classes/class-metabox.php';
// require_once THEME_PATH . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once THEME_PATH . '/core/classes/class-contact-form.php';
// require_once THEME_PATH . '/core/classes/class-post-form.php';
// require_once THEME_PATH . '/core/classes/class-user-meta.php';
// require_once THEME_PATH . '/core/classes/class-post-status.php';
//require_once THEME_PATH . '/core/classes/class-term-meta.php';
require_once THEME_PATH . '/custom/helpers.php';
require_once THEME_PATH . '/widgets/sidebar.php';
require_once THEME_PATH . '/custom/navwalker.php';
require_once THEME_PATH . '/custom/theme-custom-options.php';
require_once THEME_PATH . '/custom/theme-custom-options-kirki.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
				'footer-menu' => __( 'Footer Menu', 'odin' )
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
		 * Add support for Post Formats.
		 */
		add_theme_support( 'post-formats', array(
			'gallery',
			'image',
			'video',
			'audio',
		) );

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

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'library', $template_url . '/assets/css/library.min.css' , array(), null, 'all' );
	wp_enqueue_style( 'app', $template_url . '/assets/css/app.min.css' , array(), null, 'all' );

	// jQuery.
	//wp_enqueue_script( 'jquery' );

	// Grunt main file with Bootstrap, FitVids and others libs.
	wp_enqueue_script( 'library', $template_url . '/assets/js/library.min.js', array(), null, true );
	wp_enqueue_script( 'app', $template_url . '/assets/js/app.min.js', array(), null, true );

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );


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
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

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
