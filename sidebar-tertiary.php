<?php
/**
 * The sidebar containing the alternate widget area.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#sidebar-php
 *
 * @package Rock
 * @since   1.0.0
 */

if ( ! rock_layout_has_sidebar() || ! is_active_sidebar( 'sidebar-2' ) || 0 === strpos( rock_get_layout(), 'three-column-' ) ) {

	return;

}

?>

<div id="tertiary" class="widget-area" role="complementary">

	<?php dynamic_sidebar( 'sidebar-2' ); ?>

</div><!-- #tertiary -->
