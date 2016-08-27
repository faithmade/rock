<?php
/**
 * Template part for displaying the post content inside The Loop.
 *
 * @package Rock
 */
?>

<div class="entry-content">

	<?php

	the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rock' ),
			'after'  => '</div>',
		)
	);

	?>

</div><!-- .entry-content -->
