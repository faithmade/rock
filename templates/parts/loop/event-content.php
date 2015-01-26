<?php
/**
 * The template part for displaying the post content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

$address = ctfw_event_data()['address'];
$directions_url = ctfw_event_data()['directions_url'];
?>

<div class="rock-event-full-map">
  <iframe class="event-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo urlencode( $address ); ?>&output=embed"></iframe>
</div>

<div class="entry-event-meta">

  <?php if ( $directions_url ) : ?>
    <div class="rock-event-full-direction">
      <a href="<?php echo esc_url( $directions_url ); ?>" target="_blank" class="rock-button">
        <i class="genericon genericon-location"></i>
        <?php _ex( 'Get Directions', 'event', 'rock' ); ?>
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
