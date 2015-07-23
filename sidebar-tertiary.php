<?php
/**
 * The sidebar containing the alternate widget area.
 *
 * @package rock
 */

/**
 * Get the activate theme layout.
 */
$layout = theme_layouts_get_layout();

if ( $layout !== 'layout-three-column-default' && $layout !== 'layout-three-column-center' && $layout !== 'layout-three-column-reversed' ) {
	return;
}
?>

<div id="tertiary" class="widget-area" role="complementary">

	<?php
    if ( is_active_sidebar( 'sidebar-2' ) ) {
      dynamic_sidebar( 'sidebar-2' );
    }
    else {
      $sidebar_name = "Right Sidebar";
      include 'default-widget.php';
    }
  ?>

</div><!-- #tertiary -->
