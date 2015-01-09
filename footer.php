<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rock
 */
?>

	</div><!-- #content -->

	<?php do_action( 'rock_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-inner">

			<?php do_action( 'rock_footer' ); ?>

		</div><!-- .site-footer-inner -->
	</footer><!-- #colophon -->

	<?php do_action( 'rock_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
