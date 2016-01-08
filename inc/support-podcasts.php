<?php
/**
 * Support for Podcasts by ChurchThemes.net
 *
 * Adds support for podcast widgets to use in FaithBuilder. This overrides the default widgets from
 * the Podcasts by ChurchThemes.net plugin and patches them to make them compatibile with Faithbuilder 
 *
 * @package    Rock
 * @subpackage Includes
 * @copyright  Copyright (c) 2014, upthemes.com
 * @link       https://upthemes.com/themes/rock
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.0
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Unregister the Podcast Widgets
 * @return  void
 */
function rock_unregister_podcast_widgets() {
	unregister_widget( 'SSP_Widget_Series' );
	unregister_widget('SSP_Widget_Single_Episode' );
	unregister_widget('SSP_Widget_Recent_Episodes' );
}
add_action( 'widgets_init', 'rock_unregister_podcast_widgets', 20 );

/**
 * Register our Patched Widget Classes
 * @return void
 */
function rock_patch_podcast_widgets() {
	include_once( dirname(__FILE__) . '/patched-widget-classes.php' );

	if( class_exists( 'SSP_Widget_Series' ) ) {
		register_widget( 'Patched_SSP_Widget_Series');
	}

	if( class_exists( 'SSP_Widget_Single_Episode' ) ) {
		register_widget( 'Patched_SSP_Widget_Single_Episode' );
	}

	if( class_exists( 'SSP_Widget_Single_Episode' ) ) {
		register_widget( 'Patched_SSP_Widget_Recent_Episodes' );
	}
}
add_action( 'widgets_init', 'rock_patch_podcast_widgets', 21 );
