<?php
/**
 * Rock functions and definitions.
 *
 * Set up the theme and provide some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Rock
 * @since   1.0.0
 */

/**
 * Rock theme version.
 *
 * @since 1.0.0
 *
 * @var string
 */
define( 'ROCK_VERSION', '3.0.0' );

/**
 * Minimum WordPress version required for Rock.
 *
 * @since 1.0.0
 *
 * @var string
 */
if ( ! defined( 'ROCK_MIN_WP_VERSION' ) ) {

	define( 'ROCK_MIN_WP_VERSION', '4.4' );

}

/**
 * Enforce the minimum WordPress version requirement.
 *
 * @since 1.0.0
 */
if ( version_compare( get_bloginfo( 'version' ), ROCK_MIN_WP_VERSION, '<' ) ) {

	require_once get_template_directory() . '/inc/compat/wordpress.php';

}

/**
 * Load custom helper functions for this theme.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/helpers.php';

/**
 * Load custom template tags for this theme.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Load custom primary nav menu walker.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/walker-nav-menu.php';

/**
 * Load template parts and override some WordPress defaults.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/hooks.php';

/**
 * Load Beaver Builder compatibility file.
 *
 * @since 1.0.0
 */
if ( class_exists( 'FLBuilder' ) ) {

	require_once get_template_directory() . '/inc/compat/beaver-builder.php';

}

/**
 * Load Jetpack compatibility file.
 *
 * @since 1.0.0
 */
if ( class_exists( 'Jetpack' ) ) {

	require_once get_template_directory() . '/inc/compat/jetpack.php';

}

/**
 * Load WooCommerce compatibility file.
 *
 * @since 1.0.0
 */
if ( class_exists( 'WooCommerce' ) ) {

	require_once get_template_directory() . '/inc/compat/woocommerce.php';

}

/**
 * Load Customizer class (must be required last).
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the 'after_setup_theme' hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @global array $rock_image_sizes
 * @since  1.0.0
 */
function rock_setup() {

	global $rock_image_sizes;

	/**
	 * Load theme translations.
	 *
	 * Translations can be filed in the /languages/ directory. If you're
	 * building a theme based on Rock, use a find and replace to change
	 * 'rock' to the name of your theme in all the template files.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 * @since 1.0.0
	 */
	load_theme_textdomain( 'rock', get_template_directory() . '/languages' );

	/**
	 * Filter registered image sizes.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	$rock_image_sizes = (array) apply_filters( 'rock_image_sizes',
		array(
			'rock-featured' => array(
				'width'  => 1600,
				'height' => 9999,
				'crop'   => false,
				'label'  => esc_html__( 'Featured', 'rock' ),
			),
			'rock-hero' => array(
				'width'  => 2400,
				'height' => 1300,
				'crop'   => array( 'center', 'center' ),
				'label'  => esc_html__( 'Hero', 'rock' ),
			),
		)
	);

	foreach ( $rock_image_sizes as $name => &$args ) {

		if ( empty( $name ) || empty( $args['width'] ) || empty( $args['height'] ) ) {

			unset( $rock_image_sizes[ $name ] );

			continue;

		}

		$args['crop']  = ! empty( $args['crop'] ) ? $args['crop'] : false;
		$args['label'] = ! empty( $args['label'] ) ? $args['label'] : ucwords( str_replace( array( '-', '_' ), ' ', $name ) );

		add_image_size(
			sanitize_key( $name ),
			absint( $args['width'] ),
			absint( $args['height'] ),
			$args['crop']
		);

	}

	if ( $rock_image_sizes ) {

		add_filter( 'image_size_names_choose', 'rock_image_size_names_choose' );

	}

	/**
	 * Enable support for Automatic Feed Links.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 * @since 1.0.0
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for plugins and themes to manage the document title tag.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 * @since 1.0.0
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 * @since 1.0.0
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for customizer selective refresh
	 *
	 * https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
	 * @since 1.0.0
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Register custom Custom Navigation Menus.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/register_nav_menus
	 * @since 1.0.0
	 */
	register_nav_menus(
		/**
		 * Filter registered nav menus.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		(array) apply_filters( 'rock_nav_menus',
			array(
				'primary' => esc_html__( 'Primary Menu', 'rock' ),
				'social'  => esc_html__( 'Social Menu', 'rock' ),
				'footer'  => esc_html__( 'Footer Menu', 'rock' ),
			)
		)
	);

	/**
	 * Enable support for HTML5 markup.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 * @since 1.0.0
	 */
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

	/**
	 * Enable support for Post Formats.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Formats
	 * @since 1.0.0
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		)
	);

}
add_action( 'after_setup_theme', 'rock_setup' );

/**
 * Add theme support for Church Theme Content plugin
 *
 * @since 1.0
 */
function rock_add_theme_support_ctc() {
  /**
   * Plugin Support
   *
   * Tell plugin theme supports it. This leaves all features disabled so they can
   * be enabled explicitly below. When support not added, all features are revealed
   * so user can access content (in case switched to an unsupported theme).
   *
   * This also removes the plugin's "not using compatible theme" message.
   */
  add_theme_support( 'churchthemes-framework' );
  /**
   * Plugin Features
   *
   * When array of arguments not given, plugin defaults are used (enabling all taxonomies
   * and fields for feature). It is recommended to explicitly specify taxonomies and
   * fields used by theme so plugin updates don't reveal unsupported features.
   */
  // Sermons
  add_theme_support( 'ctc-sermons', array(
    'taxonomies' => array(
      'ctc_sermon_topic',
      'ctc_sermon_book',
      'ctc_sermon_series',
      'ctc_sermon_speaker',
      'ctc_sermon_tag',
    ),
    'fields' => array(
      '_ctc_sermon_has_full_text',
      '_ctc_sermon_video',
      '_ctc_sermon_audio',
      '_ctc_sermon_pdf',
    ),
    'field_overrides' => array()
  ) );
  // Events
  if( ! class_exists('TribeEvents') ) {
    add_theme_support( 'ctc-events', array(
      'taxonomies' => array(),
      'fields' => array(
        '_ctc_event_start_date',
        '_ctc_event_end_date',
        '_ctc_event_time',
        '_ctc_event_recurrence',
        '_ctc_event_recurrence_end_date',
        '_ctc_event_venue',
        '_ctc_event_address',
        '_ctc_event_show_directions_link',
        '_ctc_event_map_lat',
        '_ctc_event_map_lng',
        '_ctc_event_map_type',
        '_ctc_event_map_zoom',
      ),
      'field_overrides' => array(
        '_ctc_event_map_type' => array(
          'default' => 'HYBRID',
        ),
        '_ctc_event_map_zoom' => array(
          'default' => '14',
        ),
      )
    ) );
  }
  // People
  add_theme_support( 'ctc-people', array(
    'taxonomies' => array(
      'ctc_person_group',
    ),
    'fields' => array(
      '_ctc_person_position',
      '_ctc_person_phone',
      '_ctc_person_email',
      '_ctc_person_urls',
    ),
    'field_overrides' => array(
      '_ctc_person_email' => array(
        'desc' => sprintf( __( 'The WordPress <a href="%s" target="_blank">antispambot</a> function is used to help deter automated email harvesting.', 'rock' ), 'http://codex.wordpress.org/Function_Reference/antispambot' ),
      ),
    ),
  ) );
  // Locations
  add_theme_support( 'ctc-locations', array(
    'taxonomies' => array(),
    'fields' => array(
      '_ctc_location_address',
      '_ctc_location_show_directions_link',
      '_ctc_location_map_lat',
      '_ctc_location_map_lng',
      '_ctc_location_map_type',
      '_ctc_location_map_zoom',
      '_ctc_location_phone',
      '_ctc_location_times',
    ),
    'field_overrides' => array(
      '_ctc_location_map_type' => array(
        'default' => 'HYBRID',
      ),
      '_ctc_location_map_zoom' => array(
        'default' => '14',
      ),
    )
  ) );
}
add_action( 'after_setup_theme', 'rock_add_theme_support_ctc', 9999 );

/**
 * Register image size labels.
 *
 * @filter image_size_names_choose
 * @since  1.0.0
 *
 * @param  array $sizes
 *
 * @return array
 */
function rock_image_size_names_choose( $sizes ) {

	global $rock_image_sizes;

	$labels = array_combine(
		array_keys( $rock_image_sizes ),
		wp_list_pluck( $rock_image_sizes, 'label' )
	);

	return array_merge( $sizes, $labels );

}

/**
 * Sets the content width in pixels, based on the theme layout.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @action after_setup_theme
 * @global int $content_width
 * @since  1.0.0
 */
function rock_content_width() {

	$layout        = rock_get_layout();
	$content_width = ( 'one-column-wide' === $layout ) ? 1068 : 688;

	/**
	 * Filter the content width in pixels.
	 *
	 * @since 1.0.0
	 *
	 * @param string $layout
	 *
	 * @var int
	 */
	$GLOBALS['content_width'] = (int) apply_filters( 'rock_content_width', $content_width, $layout );

}
add_action( 'after_setup_theme', 'rock_content_width', 0 );

/**
 * Enable support for custom editor style.
 *
 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/
 * @since 1.0.0
 */
add_action( 'admin_init', 'add_editor_style', 10, 0 );

/**
 * Register sidebar areas.
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 * @since 1.0.0
 */
function rock_register_sidebars() {

	/**
	 * Filter registered sidebars areas.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	$sidebars = (array) apply_filters( 'rock_sidebars',
		array(
			'sidebar-1' => array(
				'name'          => esc_html__( 'Sidebar', 'rock' ),
				'description'   => esc_html__( 'The primary sidebar appears alongside the content of every page, post, archive, and search template.', 'rock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'sidebar-2' => array(
				'name'          => esc_html__( 'Secondary Sidebar', 'rock' ),
				'description'   => esc_html__( 'The secondary sidebar will only appear when you have selected a three-column layout.', 'rock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'footer-1' => array(
				'name'          => esc_html__( 'Footer 1', 'rock' ),
				'description'   => esc_html__( 'This sidebar is the first column of the footer widget area.', 'rock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'footer-2' => array(
				'name'          => esc_html__( 'Footer 2', 'rock' ),
				'description'   => esc_html__( 'This sidebar is the second column of the footer widget area.', 'rock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'footer-3' => array(
				'name'          => esc_html__( 'Footer 3', 'rock' ),
				'description'   => esc_html__( 'This sidebar is the third column of the footer widget area.', 'rock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'hero' => array(
				'name'          => esc_html__( 'Hero', 'rock' ),
				'description'   => esc_html__( 'Hero widgets appear over the header image on the front page.', 'rock' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
		)
	);

	foreach ( $sidebars as $id => $args ) {

		register_sidebar( array_merge( array( 'id' => $id ), $args ) );

	}

}
add_action( 'widgets_init', 'rock_register_sidebars' );

/**
 * Enqueue theme scripts and styles.
 *
 * @link  https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @link  https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @since 1.0.0
 */
function rock_scripts() {

	$stylesheet = get_stylesheet();
	$suffix     = SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( $stylesheet, get_stylesheet_uri(), false, defined( 'ROCK_CHILD_VERSION' ) ? ROCK_CHILD_VERSION : ROCK_VERSION );

	wp_style_add_data( $stylesheet, 'rtl', 'replace' );

	wp_enqueue_script( 'rock-navigation', get_template_directory_uri() . "/assets/js/navigation{$suffix}.js", array( 'jquery' ), ROCK_VERSION, true );
	wp_enqueue_script( 'rock-skip-link-focus-fix', get_template_directory_uri() . "/assets/js/skip-link-focus-fix{$suffix}.js", array(), ROCK_VERSION, true );
	wp_enqueue_script( 'rock-fitvids', get_template_directory_uri() . "/assets/js/fitvids{$suffix}.js", array( 'jquery' ), ROCK_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	if ( rock_has_hero_image() ) {

		wp_add_inline_style(
			$stylesheet,
			sprintf(
				'%s { background-image: url(%s); }',
				rock_get_hero_image_selector(),
				esc_url( rock_get_hero_image() )
			)
		);

	}

}
add_action( 'wp_enqueue_scripts', 'rock_scripts' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @action wp
 * @global WP_Query $wp_query
 * @global WP_User  $authordata
 * @since  1.0.0
 */
function rock_setup_author() {

	global $wp_query, $authordata;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {

		$authordata = get_userdata( $wp_query->post->post_author );

	}

}
add_action( 'wp', 'rock_setup_author' );

/**
 * Reset the transient for the active categories check.
 *
 * @action create_category
 * @action edit_category
 * @action delete_category
 * @action save_post
 * @see    rock_has_active_categories()
 * @since  1.0.0
 */
function rock_has_active_categories_reset() {

	delete_transient( 'rock_has_active_categories' );

}
add_action( 'create_category', 'rock_has_active_categories_reset' );
add_action( 'edit_category',   'rock_has_active_categories_reset' );
add_action( 'delete_category', 'rock_has_active_categories_reset' );
add_action( 'save_post',       'rock_has_active_categories_reset' );
