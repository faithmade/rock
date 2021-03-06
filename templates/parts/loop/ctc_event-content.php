<?php
/**
 * The template part for displaying the post content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

$event_data = ctc_event_data();
$address    = $event_data['address'];
?>

<?php if ( $address ) : ?>
<div class="rock-event-full-map">
	<iframe class="event-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo urlencode( $address ); ?>&output=embed"></iframe>
</div>
<?php endif; ?>

<div class="entry-content">
	<?php

		if ( is_category() || is_archive() ) {
			the_excerpt();
		}
		else {
			the_content( esc_html__( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
