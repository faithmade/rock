<?php
/**
 * Compatibility Functions
 *
 * Require minimum version of WordPress, Church Theme Content plugin, Internet Explorer, etc.
 *
 * @package    Church_Theme_Framework
 * @subpackage Functions
 * @copyright  Copyright (c) 2013, churchthemes.com
 * @link       https://github.com/churchthemes/church-theme-framework
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      0.9
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/*******************************************
 * WORDPRESS VERSION
 *******************************************/

// Based on code from default Twenty Thirteen theme

/**
 * Detect if old WordPress version used
 *
 * Use add_theme_support( 'ctc-wordpress-version', 7 ); // 7 and under not supported
 *
 * @since 0.9
 * @return bool True if theme supports feature and version is old
 */
function ctc_old_wp() {

	$old = false;

	// Theme uses this feature
	$support = get_theme_support( 'ctc-wordpress-version' );
	if ( ! empty( $support[0] ) ) {

		// Get minimum required version
		$required_version = $support[0];

		// Is old version used?
		if ( version_compare( $GLOBALS['wp_version'], $required_version, '<' ) ) {
			$old = true;
		}

	}

	return apply_filters( 'ctc_old_wp', $old );

}

/**
 * Message to show when old version used
 *
 * @since 0.9
 * @return string Message saying version is old
 */
function ctc_old_wp_message() {
	return sprintf( __( '<b>Activation Failed:</b> %s requires a newer version of WordPress. Please update and try again.', 'rock' ), CTC_THEME_NAME );
}

/**
 * Prevent switching to theme on old version of WordPress
 *
 * Switches to the previously activated theme or the default theme.
 *
 * @since 0.9
 * @param string $theme_name Theme slug
 * @param object $theme Theme object
 */
function ctc_old_wp_switch_theme( $theme_name, $theme ) {

	// Is WordPress version too old for theme?
	if ( ctc_old_wp() ) {

		if ( CTC_THEME_SLUG != $theme->get_template() ) {
			switch_theme( $theme->get_template(), $theme->get_stylesheet() );
		} elseif ( CTC_THEME_SLUG != WP_DEFAULT_THEME ) {
			switch_theme( WP_DEFAULT_THEME );
		}

		unset( $_GET['activated'] );

		// Don't show regular notices (license activation, CTC plugin, etc.)
		ctc_activation_remove_notices();

		// Show notice saying to update WP then try again
		add_action( 'admin_notices', 'ctc_old_wp_switch_theme_notice' );

	}

}

add_action( 'after_switch_theme', 'ctc_old_wp_switch_theme', 10, 2 );

/**
 * Show notice if try to switch to theme while using old version of WordPress
 *
 * @since 0.9
 */
function ctc_old_wp_switch_theme_notice() {

	?>
	<div class="error">
		<p>
			<?php echo ctc_old_wp_message(); ?>
		</p>
	</div>
	<?php

}

/**
 * Prevent Customizer preview from showing theme while using old version of WordPress
 *
 * @since 0.9
 */
function ctc_old_wp_customizer_notice() {

	// Is WordPress version too old for theme?
	if ( ctc_old_wp() ) {

		// Show message
		wp_die( ctc_old_wp_message() . sprintf( ' <a href="javascript:history.go(-1);">%s</a>', __( 'Go back.', 'rock' ) ) );

	}

}

add_action( 'load-customize.php', 'ctc_old_wp_customizer_notice' );

/*****************************************************
 * CHURCH THEME CONTENT
 *****************************************************/

/**
 * Plugin file
 *
 * @since 0.9
 * @return string Main plugin file relative to plugin directory
 */
function ctc_plugin_file() {
	return 'churchthemes/churchthemes.php';
}

/**
 * Plugin slug
 *
 * @since 0.9
 * @return string Plugin slug based on its directory
 */
function ctc_plugin_slug() {
	return dirname( ctc_plugin_file() );
}

/**
 * Plugin is installed and has been activated
 *
 * @since 0.9
 * @return bool True if plugin installed and active
 */
function ctc_plugin_active() {

	$activated = false;

	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( is_plugin_active( ctc_plugin_file() ) ) {
		$activated = true;
	}

	return apply_filters( 'ctc_plugin_active', $activated );

}

/**
 * Plugin is installed but not necessarily activated
 *
 * @since 0.9
 * @return bool True if plugin is installed
 */
function ctc_plugin_installed() {

	$installed = false;

	if ( array_key_exists( ctc_plugin_file(), get_plugins() ) ) {
		$installed = true;
	}

	return apply_filters( 'ctc_plugin_installed', $installed );

}