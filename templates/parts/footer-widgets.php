<?php
/**
 * Displays the footer widget zones.
 *
 * @package rock
 */
?>

<?php if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ): ?>

<div class="footer-widget-area">

	<div class="footer-widget">
		<?php dynamic_sidebar( 'footer-1' ); ?>
	</div>

	<div class="footer-widget">
		<?php dynamic_sidebar( 'footer-2' ); ?>
	</div>

	<div class="footer-widget">
		<?php dynamic_sidebar( 'footer-3' ); ?>
	</div>

</div>

<?php endif; ?>
