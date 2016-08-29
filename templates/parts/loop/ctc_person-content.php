<?php
/**
 * The template part for displaying the post content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

$location_data  = ctc_location_data();
$directions_url = $location_data['directions_url'];

$google_map = ctc_google_map( array(
	'latitude'  => $location_data['map_lat'],
	'longitude' => $location_data['map_lng'],
	'type'      => $location_data['map_type'],
	'zoom'      => $location_data['map_zoom']
) );

?>
<?php if ( $google_map ) : ?>
	<div class="rock-event-full-map">
		<?php echo $google_map; ?>
	</div>
<?php endif; ?>

<div class="entry-event-meta">

	<?php if ( $directions_url ) : ?>
		<div class="rock-event-full-direction">
			<a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="rock-button">
				<i class="genericon genericon-location"></i>
				<?php echo esc_html_x( 'Get Directions', 'event', 'rock' ); ?>
			</a>
		</div>
	<?php endif; ?>

</div>

<div class="entry-content">
	<?php

		if ( is_category() || is_archive() ) {
			the_excerpt();
		}
		else {
			the_content( esc_html__( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );
		}

	?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
