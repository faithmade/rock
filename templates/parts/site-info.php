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
				<?php
					// if ( get_theme_mod('footer_text') !== "" ) {
					// 	echo get_theme_mod('footer_text');
					// }
					// else {
						echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo( 'title' ) . '. <a href="https://faithmade.com">Church websites</a> by Faithmade.';
					// }
				?>
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
