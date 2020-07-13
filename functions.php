<?php
/**
 * autocircle functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package autocircle
 */

if ( ! defined( 'AUTOCIRCLE_VERSION' ) ) {
	define( 'AUTOCIRCLE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'autocircle_setup' ) ) :

	function autocircle_setup() {
		load_theme_textdomain( 'autocircle', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
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
				'primary' => esc_html__( 'Primary Menu', 'autocircle' ),
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
				'autocircle_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
                
                add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
                add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 70,
				'width'       => 350,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'autocircle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function autocircle_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'autocircle_content_width', 1200 );
}
add_action( 'after_setup_theme', 'autocircle_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function autocircle_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'autocircle' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'autocircle' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'autocircle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function autocircle_scripts() {
	wp_enqueue_style( 'autocircle-style', get_stylesheet_uri(), array(), AUTOCIRCLE_VERSION );
	wp_style_add_data( 'autocircle-style', 'rtl', 'replace' );

	wp_enqueue_script( 'autocircle-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), AUTOCIRCLE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'autocircle_scripts' );

/**
 * Enqueue Admin Scripts
 */
if( !function_exists( 'autocircle_admin_scripts' ) ){
    function autocircle_admin_scripts(){
        wp_enqueue_style( 'autocircle-admin-style', get_template_directory_uri() . '/assets/css/admin/style.css', array(), AUTOCIRCLE_VERSION );
        
    }
}
add_action( 'admin_enqueue_scripts', 'autocircle_admin_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load custom theme option file
 */

require get_template_directory() . '/inc/theme-options.php';

