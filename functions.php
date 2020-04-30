<?php
/**
 * The functions file for this theme.
 *
 * @package GutenZurbWP
 * @author  FAPNET
 * @link    https://fapnet.com.br
 * @version 0.0.2
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gutenzurb_theme_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'gutenzurb_lang' );

	// Add theme support for Automatic Feed Links.
	add_theme_support( 'automatic-feed-links' );

	// disable comments feed.
	add_filter( 'feed_links_show_comments_feed', '__return_false' );

	// Add theme support for document Title tag.
	add_theme_support( 'title-tag' );

	// Add theme support for Featured Images.
	add_theme_support( 'post-thumbnails' );

	// Set custom thumbnail dimensions.
	set_post_thumbnail_size( 746, 334, true );

	// Update default images sizes (thumbnail, medium, large).
	update_option( 'thumbnail_size_w', 160 );
	update_option( 'thumbnail_size_h', 160 );
	update_option( 'thumbnail_crop', 1 );

	// Add new image sizes (name, width, height, crop { true or array([left, center, right], [top, center, bottom]) } ).
	add_image_size( 'custom-size', 220, 180, true );
	add_image_size( 'custom-size', 220, 220, array( 'left', 'top' ) );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Primary', 'gutenzurb_lang' ),
			'social' => __( 'Social', 'gutenzurb_lang' ),
		)
	);

	// Add theme support for HTML5 Semantic Markup.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Enable support for Post Formats. See: https://codex.wordpress.org/Post_Formats.
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Theme styles for the visual editor (font, colors, and column width).
	add_editor_style( array( 'css/editor-style.css', _fonts_url() ) );

}
add_action( 'after_setup_theme', 'gutenzurb_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gutenzurb_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Left Sidebar', 'gutenzurb_lang' ),
			'id'            => 'sidebar-left',
			'description'   => __( 'Sidebar displayed at the left side of the content.', 'gutenzurb_lang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Right Sidebar', 'gutenzurb_lang' ),
			'id'            => 'sidebar-right',
			'description'   => __( 'Sidebar displayer at the right side of the content.', 'gutenzurb_lang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Top Sidebar', 'gutenzurb_lang' ),
			'id'            => 'sidebar-top',
			'description'   => __( 'Sidebar dispplayed at the top of the website, above the menu header.', 'gutenzurb_lang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar', 'gutenzurb_lang' ),
			'id'            => 'sidebar-footer',
			'description'   => __( 'Sidebar dispplayed at the footer of the website.', 'gutenzurb_lang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'gutenzurb_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function gutenzurb_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'app-style', get_template_directory_uri() . '/css/app.css', false, '0.0.1', false );

	// Use updated jQuery.
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js', false, '3.5.0', false );
		wp_enqueue_script( 'jquery' );
	}

	// Zurb Foundation Scripts.
	wp_enqueue_script( 'what-input', 'https://cdnjs.cloudflare.com/ajax/libs/what-input/5.2.7/what-input.min.js', array( 'jquery' ), '5.2.7', true );
	wp_enqueue_script( 'foundation', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/js/foundation.min.js', array( 'jquery' ), '6.6.3', true );

	// Fontawesome.
	// integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous".
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/releases/v5.13.0/js/all.js', array(), '5.13.0', true );

	// Theme Script.
	wp_enqueue_script( 'app-script', get_template_directory_uri() . '/js/app-min.js', array( 'jquery' ), '0.0.1', true );

	// Comments Script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gutenzurb_scripts' );


/**
 * Add Defer attribute to JS.
 *
 * @param [string] $tag The original js tag.
 * @param [string] $handle The js script name that is been added.
 * @return $tag
 */
function add_defer_attribute( $tag, $handle ) {

	// add script handles to the array below.
	$scripts_to_defer = array( 'fontawesome' );

	foreach ( $scripts_to_defer as $defer_script ) {
		if ( $defer_script === $handle ) {
			return str_replace( ' src', ' defer="defer" src', $tag );
		}
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );


/**
 * Add Async attribute to JS
 *
 * @param [string] $tag The original js tag.
 * @param [string] $handle The js script name that is been added.
 * @return $tag
 */
function add_async_attribute( $tag, $handle ) {

	// add script handles to the array below.
	$scripts_to_async = array( 'app-script', 'foundation', 'what-input' );

	foreach ( $scripts_to_async as $async_script ) {
		if ( $async_script === $handle ) {
			return str_replace( ' src', ' async="async" src', $tag );
		}
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'add_async_attribute', 10, 2 );

// Import Microdata Menu Walker
require_once '/inc/class-microdata-nav.walker';
