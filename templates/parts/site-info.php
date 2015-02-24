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
				<?php printf( __( 'Built on %1$s by %2$s.', 'rock' ), 'the <a href="https://rock.churchthemes.net/" rel="designer">Rock Framework</a>', '<a href="https://churchthemes.net/" rel="designer">ChurchThemes</a>' ); ?>
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
