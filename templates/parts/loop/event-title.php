<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get event data
$date = ctfw_event_data()['date'];
$start_date = ctfw_event_data()['start_date'];
$end_date = ctfw_event_data()['end_date'];
$time = ctfw_event_data()['time'];
$venue = ctfw_event_data()['venue'];
$address = ctfw_event_data()['address'];
$show_directions_link = ctfw_event_data()['show_directions_link'];
$directions_url = ctfw_event_data()['directions_url'];
$map_lat = ctfw_event_data()['map_lat'];
$map_lng = ctfw_event_data()['map_lng'];
$map_type = ctfw_event_data()['map_type'];
$map_zoom = ctfw_event_data()['map_zoom'];
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<div class="entry-meta">
				<span class="post-format">Event</span>
				<?php rock_posted_on(); ?>
			</div><!-- .entry-meta -->
			<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="event-meta">
				<span>
					<i class="genericon genericon-month"></i>
					<?php echo esc_html( $date ); ?>
				</span>
				<span>
					<i class="genericon genericon-time"></i>
					<?php echo nl2br( wptexturize( $time ) ); ?>
				</span>
				<span>
					<i class="genericon genericon-home"></i>
					<?php echo esc_html( $venue ); ?>
				</span>
				<span>
					<i class="genericon genericon-location"></i>
					<?php echo nl2br( wptexturize( $address ) ); ?>
				</span>
				</span>
     </div><!-- .event-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
