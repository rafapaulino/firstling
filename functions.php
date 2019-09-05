<?php
/**
 * firstling functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package firstling
 */

if ( ! function_exists( 'firstling_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function firstling_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on firstling, use a find and replace
		 * to change 'firstling' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'firstling', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'main-menu' => __( 'Main Menu', 'firstling' ),
			'footer-menu' => __( 'Footer Menu', 'firstling' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'firstling_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_editor_style('assets/css/editor-style.css');
	}
endif;
add_action( 'after_setup_theme', 'firstling_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function firstling_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'firstling_content_width', 640 );
}
add_action( 'after_setup_theme', 'firstling_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function firstling_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'firstling' ),
		'id' => 'main-sidebar',
		'description' => __( 'Site Main Sidebar', 'firstling' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'firstling_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function firstling_scripts() {

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), null, 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array('font-awesome'), null, 'all' );
	wp_enqueue_style( 'jcarousel', get_template_directory_uri() . '/assets/css/jcarousel.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'jquery-scroll-top', get_template_directory_uri() . '/assets/css/jquery-scroll-top.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'barra-topo', get_template_directory_uri() . '/assets/css/barra-topo.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'redes-sociais', get_template_directory_uri() . '/assets/css/redes-sociais.css' , array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'categories', get_template_directory_uri() . '/assets/css/categories.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'tagcloud', get_template_directory_uri() . '/assets/css/tagcloud.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'ultimas-noticias', get_template_directory_uri() . '/assets/css/ultimas-noticias.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'animated-border', get_template_directory_uri() . '/assets/css/animated-border.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'animate.css', get_template_directory_uri() . '/assets/css/animate.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'rafa-carrossel', get_template_directory_uri() . '/assets/css/rafa-carrossel.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'prev-next', get_template_directory_uri() . '/assets/css/prev-next.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'noticias-relacionadas', get_template_directory_uri() . '/assets/css/noticias-relacionadas.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'plyr', get_template_directory_uri() . '/assets/css/plyr.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'smartmenus', get_template_directory_uri() . '/assets/css/smartmenus.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/venobox.css', array('bootstrap'), null, 'all' );
	wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/css/app.css', array('bootstrap'), null, 'all' );

	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery.validate', get_template_directory_uri() . '/assets/js/jquery.validate.js', array('jquery'), null, true );
	wp_enqueue_script( 'additional-methods', get_template_directory_uri() . '/assets/js/additional-methods.js', array('jquery.validate'), null, true );
	wp_enqueue_script( 'jquery.jcarousel', get_template_directory_uri() . '/assets/js/jquery.jcarousel.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery-scroll-top', get_template_directory_uri() . '/assets/js/jquery-scroll-top.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery.touchSwipe', get_template_directory_uri() . '/assets/js/jquery.touchSwipe.js', array('jquery'), null, true );
	wp_enqueue_script( 'carrossel', get_template_directory_uri() . '/assets/js/carrossel.js', array('jquery'), null, true );
	wp_enqueue_script( 'noticias-relacionadas', get_template_directory_uri() . '/assets/js/noticias-relacionadas.js', array('jquery'), null, true );
	wp_enqueue_script( 'plyr', get_template_directory_uri() . '/assets/js/plyr.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery.smartmenus', get_template_directory_uri() . '/assets/js/jquery.smartmenus.js', array('jquery'), null, true );
	wp_enqueue_script( 'jquery.smartmenus.bootstrap-4', get_template_directory_uri() . '/assets/js/jquery.smartmenus.bootstrap-4.js', array('jquery.smartmenus'), null, true );
	wp_enqueue_script( 'venobox-js', get_template_directory_uri() . '/assets/js/venobox.js', array('jquery'), null, true );
	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/app.js', array('bootstrap-js'), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'firstling_scripts' );

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

require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/widgets/PopularNews_Widget.php';
require get_template_directory() . '/inc/widgets/Categories_Widget.php';
require get_template_directory() . '/inc/widgets/Form_Widget.php';
require get_template_directory() . '/inc/widgets/SocialSidebar_Widget.php';
require get_template_directory() . '/inc/widgets/TopSocialSidebar_Widget.php';
require get_template_directory() . '/inc/widgets/Tags_Widget.php';
require get_template_directory() . '/inc/widgets/sidebar.php';
require get_template_directory() . '/inc/class-bootstrap-nav.php';