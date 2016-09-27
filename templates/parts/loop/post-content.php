<?php
/**
 * Template part for displaying the post content inside The Loop.
 *
 * @package Rock
 * @since   1.0.0
 */
?>

<div class="entry-content">

	<?php

	the_content( esc_html__( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rock' ),
			'after'  => '</div>',
		)
	);

	?>

</div><!-- .entry-content -->
