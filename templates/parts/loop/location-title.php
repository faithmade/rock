<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get data
// $address, $show_directions_link, $directions_url, $phone, $times, $map_lat, $map_lng, $map_type, $map_zoom
extract( ctfw_location_data() );
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="rock-entry-image">
					<?php rock_post_image(); ?>
				</div>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="event-meta">
				<span>
					<i class="genericon genericon-location"></i>
					<?php echo nl2br( wptexturize( $address ) ); ?>
				</span>
				<span>
					<i class="genericon genericon-phone"></i>
					<?php echo esc_html( $phone ); ?>
				</span>
				<span>
					<i class="genericon genericon-time"></i>
					<?php echo nl2br( wptexturize( $times ) ); ?>
				</span>
				</span>
			</div><!-- .sermon-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
