<?php
/**
 * The template used for displaying page content within the loop.
 *
 * @package rock
 */
?>
<div class="page-content">
	<?php the_content(); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .page-content -->
