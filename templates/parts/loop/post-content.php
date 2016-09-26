<?php
/**
 * Template part for displaying the post content inside The Loop.
 *
 * @package Primer
 * @since   1.0.0
 */
?>

<div class="entry-content">

	<?php

<<<<<<< Updated upstream
	the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'primer' ) );
=======
	the_content( esc_html__( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );
>>>>>>> Stashed changes

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'primer' ),
			'after'  => '</div>',
		)
	);

	?>

</div><!-- .entry-content -->
