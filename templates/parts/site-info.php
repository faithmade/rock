<?php
/**
 * Displays the footer site info.
 *
 * @package Rock
 */
?>

<div class="site-info-wrapper">

	<div class="site-info">

		<div class="site-info-inner">

			<?php
			/**
			 * Fires inside the `.site-info` element.
			 *
			 * @since 1.0.0
			 */
			do_action( 'rock_site_info' );
			?>

		</div><!-- .site-info-inner -->

	</div><!-- .site-info -->

</div><!-- .site-info-wrapper -->
