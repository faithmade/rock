<?php
/**
 * rock functions and definitions
 *
 * @package rock
 */

define( 'CTC_THEME_SLUG', 'rock' );
define( 'CTC_THEME_VERSION', '1.0' );

/**
 * Load composer dependencies.
 */
require_once get_template_directory() . '/vendor/autoload.php';

/**
 * Load integrations file.
 */
require_once get_template_directory() . '/inc/integrations.php';

/**
 * ChurchThemes Framework
 */
require_once get_template_directory() . '/inc/support-ctc.php';
require_once get_template_directory() . '/inc/support-framework.php';
require_once get_template_directory() . '/inc/compatibility.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Includes template parts within the theme.
 */
require_once get_template_directory() . '/inc/action-hooks.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Colorcase support
 */
require_once get_template_directory() . '/inc/colorcase.php';

/**
 * Typecase support
 */
require_once get_template_directory() . '/inc/typecase.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom theme layout functionality.
 */
require_once get_template_directory() . '/inc/theme-layouts.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {

	global $content_width;

	$layout = theme_layouts_get_layout();

	switch( $layout ):
		case 'one-column-wide':
			$content_width = 1068;
		case 'one-column-narrow':
			$content_width = 688;
		default:
		$content_width = 688;
	endswitch;

}

if ( ! function_exists( 'rock_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rock_setup() {

	global $post;

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rock, use a find and replace
	 * to change 'rock' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rock', get_template_directory() . '/languages' );

	// Add image size for featured images
	add_image_size( 'rock-featured', 1600, 900, 1 );
	add_image_size( 'rock-rect-large', 900, 900, 1 );
	add_image_size( 'rock-rect-medium', 500, 500, 1 );
	add_image_size( 'rock-rect-small', 300, 300, 1 );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add support for automatic title tag creation.
	add_theme_support( 'title-tag' );

	// Add support for site logo.
	add_theme_support( 'site-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rock' ),
		'social' => __( 'Social Menu', 'rock' ),
	) );

	// Hybrid Core Theme Layouts
	add_theme_support(
		'theme-layouts',
		array(
			'one-column-full'       => __( '1 Column Full',                          'rock' ),
			'one-column-wide'       => __( '1 Column Wide',                          'rock' ),
			'one-column-narrow'     => __( '1 Column Narrow',                        'rock' ),
			'two-column-default'    => __( '2 Columns: Content / Sidebar',           'rock' ),
			'two-column-reversed'   => __( '2 Columns: Sidebar / Content',           'rock' ),
			'three-column-default'  => __( '3 Columns: Content / Sidebar / Sidebar', 'rock' ),
			'three-column-center'   => __( '3 Columns: Sidebar / Content / Sidebar', 'rock' ),
			'three-column-reversed' => __( '3 Columns: Sidebar / Sidebar / Content', 'rock' ),
		),
		array( 'default' => 'two-column-default' )
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rock_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add support for Jetpack featured content
	add_theme_support( 'featured-content', array(
		'filter'     => 'rock_get_featured_posts',
		'max_posts'  => 1,
		'post_types' => array( 'post', 'page' ),
	) );

}
endif; // rock_setup
add_action( 'after_setup_theme', 'rock_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rock_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'rock' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'The left sidebar appears alongside the content of every page, post, archive, and search template.', 'rock' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'rock' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'The right sidebar will only appear when you have selected a three-column layout.', 'rock' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Right', 'rock' ),
		'id'            => 'header',
		'description'   => __( 'The header sidebar appears on the right side of the header of the page.', 'rock' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Left', 'rock' ),
		'id'            => 'footer-1',
		'description'   => __( 'The footer left sidebar appears in the first column of the footer widget area.', 'rock' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Center', 'rock' ),
		'id'            => 'footer-2',
		'description'   => __( 'The footer center sidebar appears in the second column of the footer widget area.', 'rock' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right', 'rock' ),
		'id'            => 'footer-3',
		'description'   => __( 'The footer right sidebar appears in the third column of the footer widget area.', 'rock' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'rock_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rock_scripts() {
	wp_enqueue_style( 'rock', get_stylesheet_uri() );

	wp_style_add_data( 'rock', 'rtl', 'replace' );

	wp_enqueue_script( 'rock-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rock-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'rock_scripts' );

/**
 * Remove page template dropdown
 */
function remove_page_template_metabox() {
  remove_meta_box( 'pageparentdiv', null, 'side' );
}

add_action( 'dbx_post_advanced', 'remove_page_template_metabox' );

/**
 * Force full width template if Beaver Builder is active
 */
function faithmade_bb_check(){
	global $post;
	setup_postdata($post);

  if ( is_page($post->ID) ) {
  	if ( get_post_meta($post->ID, '_fl_builder_enabled', true) == 1 || FLBuilderModel::is_builder_active() ) {
    	update_post_meta( $post->ID, '_wp_page_template', 'templates/full-width.php' );
    }
    else {
    	update_post_meta( $post->ID, '_wp_page_template', 'default' );
    }
  }
}

add_action( 'wp', 'faithmade_bb_check', 15 );
