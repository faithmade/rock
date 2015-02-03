<?php
/**
 * Displays the footer site info.
 *
 * @package rock
 */
?>

<div class="site-info-wrapper">
	<div class="site-info">
		<div class="site-info-inner">

			<div class="site-info-text">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'rock' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'rock' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'rock' ), 'rock', '<a href="https://churchthemes.net/" rel="designer">ChurchThemes</a>' ); ?>
			</div><!-- .site-info-text -->

			<div class="social-menu">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'social',
						'depth'          => 1,
					) ); ?>
			</div><!-- .social-menu -->

		</div><!-- .site-info-inner -->
	</div><!-- .site-info -->
</div><!-- .site-info-wrapper -->
