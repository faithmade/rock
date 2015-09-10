<?php
/**
 * Custom Post Type Archive Support
 *
 * The plugin provides a better editting experience when dealing with Custom Post Type Archive Pages.
 * Relies on the cpt-archive plugin https://github.com/cedaro/cpt-archives.
 *
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
 * Adds Post Type Support for the Custom Post Types used by the Rock Framework.
 * @return void
 */
function rock_cpt_archive_support() {
	 if ( empty( $GLOBALS['cptarchives'] ) ) {
        return;
    }
	
	$churchtheme_post_types = array(
		'ctc_sermon',
		'ctc_event',
		'tribe_event',
		'ctc_location',
		'ctc_person'
		);

	foreach( $churchtheme_post_types as $post_type ) {
		if( post_type_exists( $post_type ) ) {
			$GLOBALS['cptarchives']->register_archive( $post_type, array(
		        'customize_rewrites' => 'archives',
		        'show_in_menu'       => true,
		        'supports'           => array( 'title', 'editor', 'thumbnail' ),
		    ) );
		}
	}   
}
add_action( 'init', 'rock_cpt_archive_support', 50 );