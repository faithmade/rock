<?php
/**
 * Displays the primary navigation.
 *
 * @package Rock
 */
?>

<div class="main-navigation-container">

	<?php
	/**
	 * Fires inside the `<div class="main-navigation-container">` element.
	 *
	 * @since 1.0.0
	 */
	do_action( 'rock_before_site_navigation' );
	?>

	<nav id="site-navigation" class="main-navigation" role="navigation">

		<?php
		/**
		 * Fires inside the `<nav id="site-navigation" class="main-navigation" role="navigation">` element.
		 *
		 * @since 1.0.0
		 */
		do_action( 'rock_site_navigation' );
		?>

	</nav><!-- #site-navigation -->

	<?php
	/**
	 * Fires after the `<nav id="site-navigation" class="main-navigation" role="navigation">` element.
	 *
	 * @since 1.0.0
	 */
	do_action( 'rock_after_site_navigation' );
	?>

</div>
