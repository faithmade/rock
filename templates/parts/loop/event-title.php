<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get data
// $date (localized range), $start_date, $end_date, $time, $venue, $address, $show_directions_link, $directions_url, $map_lat, $map_lng, $map_type, $map_zoom
extract( ctfw_event_data() );
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
			</div><!-- .sermon-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
