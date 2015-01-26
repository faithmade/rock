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
extract( ctfw_location_data() );

$google_map = ctfw_google_map( array(
    'latitude'  => $map_lat,
    'longitude' => $map_lng,
    'type'    => $map_type,
    'zoom'    => $map_zoom
  ) );

?>
<?php if ( $google_map ) : ?>
  <div class="rock-location-full-map">
    <?php echo $google_map; ?>
  </div>
<?php endif; ?>

<div class="entry-location-meta">

  <?php if ( $directions_url ) : ?>
    <div class="rock-location-full-direction">
      <a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="rock-button">
        <i class="genericon genericon-location"></i>
        <?php _ex( 'Get Directions', 'location', 'rock' ); ?>
      </a>
    </div>
  <?php endif; ?>

</div>

<div class="entry-content">
	<?php the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) ); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
