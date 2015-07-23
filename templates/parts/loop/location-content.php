<?php
/**
 * The template part for displaying the post content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */


// Get data
// $address, $show_directions_link, $directions_url, $phone, $times, $map_lat, $map_lng, $map_type, $map_zoom
extract( ctc_location_data() );

$address = ctc_location_data()['address'];
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
      the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );
    }

  ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
