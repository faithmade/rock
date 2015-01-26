<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get location data
$address = ctfw_location_data()['address'];
$show_directions_link = ctfw_location_data()['show_directions_link'];
$directions_url = ctfw_location_data()['directions_url'];
$phone = ctfw_location_data()['phone'];
$times = ctfw_location_data()['times'];
$map_lat = ctfw_location_data()['map_lat'];
$map_lng = ctfw_location_data()['map_lng'];
$map_type = ctfw_location_data()['map_type'];
$map_zoom = ctfw_location_data()['map_zoom'];
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
