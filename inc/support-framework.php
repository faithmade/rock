<?php
/**
 * Church Theme Framework Feature Support
 *
 * The framework's features and widgets must be enabled and configured explicitly.
 *
 * @package Rock
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add theme support for framework features
 *
 * @since 1.0
 */
function rock_add_theme_support_framework() {

	/**
	 * Setup
	 */

	// Require minimum version of WordPress
	// An admin notice is shown if old version is used
	add_theme_support( 'ctc-wordpress-version', '3.6' );

	// Theme activation tasks
	add_theme_support( 'ctc-after-activation', array(
		'flush_rewrite_rules' => true, // make sure friendly URL's work
		'hide_default_notice' => true // no need to be redundant
	) );

	// Load language file from wp-content/languages/themes/textdomain-locale.mo
	// It is absolutely best to keep it outside of theme to prevent loss during update
	add_theme_support( 'ctc-load-translation' );

	/**
	 * Design
	 */

	// Prompt outdated Internet Explorer users to upgrade to a modern browser
	add_theme_support( 'ctc-ie-unsupported', 8 ); // version 7 and earlier

	// Automatically form <title>
	add_theme_support( 'ctc-auto-title' );

	/**
	 * Posts
	 */

	// Add additional classes to post_class()
	// This will add useful classes like ctc-has-image
	add_theme_support( 'ctc-post-classes' );

	// Shorten comment author to keep long trackback titles in check
	add_theme_support( 'ctc-shorten-comment-author', 50 );

	// Enable date archives for sermon posts
	// Flush rewrite rules (re-save permalinks) to take effect
	add_theme_support( 'ctc-sermon-date-archive' );

	// Make group taxonomy archive order manually (like People template)
	add_theme_support( 'ctc-people-group-manual-order' );

	// Prev/Next Event Sorting
	// This makes get_previous_post() and get_next_post() sort by event Start Date instead of Publish Date
	add_theme_support( 'ctc-event-navigation' );

	// Prev/Next Person Sorting
	// This makes get_previous_post() and get_next_post() sort by manual order instead of Publish Date
	add_theme_support( 'ctc-person-navigation' );

	// Prev/Next Location Sorting
	// This makes get_previous_post() and get_next_post() sort by manual order instead of Publish Date
	add_theme_support( 'ctc-location-navigation' );

	/**
	 * Media
	 */

	// Show size notes under "Featured Image" for specific post types
	// Provide third argument to override the default message: 'The target image size is %s.'
	// Provide each item as array( 'size', 'message' ) instead of 'size' for post type-specific messages
	add_theme_support(
		'ctc-featured-image-notes',
		array(
			'post'          => 'post-thumbnail',
			'ctc_sermon'    => 'post-thumbnail',
			'ctc_event'     => 'post-thumbnail',
			'ctc_person'    => 'post-thumbnail',
			'ctc_location'  => 'post-thumbnail'
		),
		esc_html__( 'We suggest using images that are at least 800px wide.', 'rock' )
	);

	// Enable image upscaling (helpful for responsive themes)
	// Resized images will be made for all uploads, even if source is smaller than target
	add_theme_support( 'ctc-image-upscaling' );

	// Use custom size for gallery thumbnails
	// This will be used when size attribute not specifically set on shortcode
	add_theme_support( 'ctc-gallery-thumb-size', array(
		'3' => 'rock-rect-large',   // when 1 to 3 columns used
		'5' => 'rock-rect-medium',  // when 4 to 5 columns used
		'9' => 'rock-rect-small',   // when 6 to 9 columns used
	) );

	// Remove default gallery styles
	// It is better to do all styling in style.css and not rely on <style> that WordPress injects
	add_theme_support( 'ctc-remove-gallery-styles' );

	// Automatically make video and audio embeds responsive
	// Uses FitVid.js and custom styles to assist WordPress core embeds, [video] and [audio]
	add_theme_support( 'ctc-responsive-embeds' );

	// Generic embeds
	// This helps make embeds more generic by setting parameters to remove
	// related videos, set neutral colors, reduce branding, etc.
	add_theme_support( 'ctc-generic-embeds' );

	// Force download of certain file types via ?download=path/filename.type
	// This prompts "Save As" -- handy for MP3, PDF, etc. Only works on local files.
	add_theme_support( 'ctc-force-downloads' );

	/**
	 * Attachments
	 */

	// Attachment inherit discussion status
	// Inherit comment and ping statuses from parent post. If not attached to a post, discussion is disabled.
	add_theme_support( 'ctc-attachment-inherit-discussion' );

	/**
	 * Admin
	 */

	// Remove and redirect Custom Background page to Customizer
	// Additional options are added for custom background there
	add_theme_support( 'ctc-force-customizer-background' );

	// Enable sidebar/widget restrictions
	// Useful for keeping widgts in appropriate widget areas (e.g. Slide widgets)
	// See includes/sidebars.php for configuration
	add_theme_support( 'ctc-sidebar-widget-restrictions' );

	// Show custom ordering tip under taxonomies list (very handy for People Groups)
	// Provide URL as second parameter to override the default recommended plugin
	add_theme_support( 'ctc-taxonomy-order-note' );

	/**
	 * Import
	 */

	// Set menu locations after import
	// If zero locations already set, sample menus (if exist) are set to appropriate location.
	// If at least one location is set, assume admin is done configuring.
	add_theme_support( 'ctc-import-set-menu-locations', array(
			 'top'    => 'top-menu', // menu slug from sample content file
			 'header' => 'header-menu',
			 'footer' => 'footer-menu'
	) );

	// Delete WordPress sample content before import
	// Move the sample post, page and comment that fresh WordPress installs have into Trash.
	add_theme_support( 'ctc-import-delete-wp-content' );

}

add_action( 'after_setup_theme', 'rock_add_theme_support_framework' );

/**
 * Add theme support for framework widgets
 *
 * Adding support for a framework widget will include its class, register the widget
 * and utilize the appropriate template in the widget-templates directory.
 *
 * If no fields are set, the default fields (typically all) will be used.
 * It is recommended to explicitly set fields to be used so that framework updates do
 * not introduce fields not supported by the theme.
 *
 * Related: See includes/sidebars.php for restricting widgets to specific sidebars as well
 * as restricting the number of widgets a sidebar can contain.
 *
 * @since 1.0
 */
function rock_add_theme_support_framework_widgets() {

	// Categories Widget
	add_theme_support( 'ctc-widget-categories', array(
		'fields' => array(
			'title',
			'taxonomy',
			'limit',
			'orderby',
			'order',
			'show_dropdown',
			'show_count',
			'show_hierarchy',
		),
		'field_overrides' => array(),
	) );

	// Posts Widget
	add_theme_support( 'ctc-widget-posts', array(
		'fields' => array(
			'title',
			'category',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_author',
			'show_date',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	// Sermons Widget
	add_theme_support( 'ctc-widget-sermons', array(
		'fields' => array(
			'title',
			'topic',
			'book',
			'series',
			'speaker',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_date',
			'show_topic',
			'show_book',
			'show_series',
			'show_speaker',
			'show_media_types',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	add_theme_support( 'ctc-widget-events', array(
		'fields' => array(
			'title',
			'timeframe',
			'limit',
			'show_image',
			'show_date',
			'show_time',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	// Gallery Widget
	add_theme_support( 'ctc-widget-gallery', array(
		'fields' => array(
			'title',
			'post_id', // post/page with gallery
			'orderby',
			'order',
			'limit',
			'thumb_size',
			'show_link',
		),
		'field_overrides' => array(),
	) );

	// Galleries Widget
	add_theme_support( 'ctc-widget-galleries', array(
		'fields' => array(
			'title',
			'orderby',
			'order',
			'limit',
			'show_hierarchy',
		),
		'field_overrides' => array(),
	) );

	// People Widget
	add_theme_support( 'ctc-widget-people', array(
		'fields' => array(
			'title',
			'group',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_position',
			'show_phone',
			'show_email',
			'show_icons',
			'show_excerpt',
		),
		'field_overrides' => array(),
	) );

	// Locations Widget
	add_theme_support( 'ctc-widget-locations', array(
		'fields' => array(
			'title',
			'orderby',
			'order',
			'limit',
			'show_image',
			'show_address',
			'show_phone',
			'show_times',
			'show_map',
		),
		'field_overrides' => array(
			'show_image' => array(
				'default' => false // show map by default instead
			),
			'show_map' => array(
				'default' => true // show map by default instead
			)
		),
	) );

	// Archives Widget
	add_theme_support( 'ctc-widget-archives', array(
		'fields' => array(
			'title',
			'post_type',
			'limit',
			'show_count',
			'show_dropdown',
		),
		'field_overrides' => array(
			'post_type' => array( // explicitly set post type options that this theme provides an archive for
				'options' => array(
					'post'      => esc_html_x( 'Blog', 'archives widget', 'rock' ),
					'ctc_sermon'  => esc_html_x( 'Sermons', 'archives widget', 'rock' ),
				),
			),
		),
	) );

	// Giving Widget
	add_theme_support( 'ctc-widget-giving', array(
		'fields' => array(
			'title',
			'text',
			'button_text',
			'button_url',
		),
		'field_overrides' => array(),
	) );

	// Slide Widget
	add_theme_support( 'ctc-widget-slide', array(
		'fields' => array(
			'title',
			'description',
			'click_url',
			'click_new',
			'image_id',
			'video',
		),
		'field_overrides' => array(
			'image_id' => array( // tell user image is required with this theme
				'after_name' => esc_html_x( '(Required)', 'slide widget image', 'rock' ),
				'desc' => sprintf( esc_html__( 'Image cropped to %s.', 'rock' ), ctc_image_size_dimensions( 'rock-slide' ) ),
			),
			'video' => array( // tell user which video URLs to use
				'desc' => esc_html__( 'To make this a video slide, enter a YouTube or Vimeo video page URL.', 'rock' ),
			),
		),
	) );

	// Highlight Widget
	add_theme_support( 'ctc-widget-highlight', array(
		'fields' => array(
			'title',
			'description',
			'click_url',
			'click_new',
			'image_id',
		),
		'field_overrides' => array(
			'image_id' => array(
				'desc' => sprintf( esc_html__( 'Image cropped to %s.', 'rock' ), ctc_image_size_dimensions( 'rock-rect-large' ) ),
			),
		),
	) );

}