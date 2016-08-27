<?php
/**
 * Church Theme Content Feature Support
 *
 * The plugin provides church-related post types and taxonomies.
 *
 * @package    Rock
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

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
				'desc' => sprintf( esc_html__( 'The WordPress <a href="%s" target="_blank">antispambot</a> function is used to help deter automated email harvesting.', 'rock' ), 'http://codex.wordpress.org/Function_Reference/antispambot' ),
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
