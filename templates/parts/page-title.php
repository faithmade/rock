<?php
/**
 * Displays page titles.
 *
 * @package Rock
 */
?>

<div class="page-title-container">

	<header class="page-header">

		<?php
		/**
		 * Fires before the page title element.
		 *
		 * @since 1.0.0
		 */
		do_action( 'rock_before_page_title' );
		?>

		<h1 class="page-title"><?php rock_the_page_title() ?></h1>

		<?php
		/**
		 * Fires after the page title element.
		 *
		 * @since 1.0.0
		 */
		do_action( 'rock_after_page_title' );
		?>

	</header><!-- .entry-header -->

</div><!-- .page-title-container -->
