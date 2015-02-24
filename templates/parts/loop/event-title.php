<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get event data
$date                 = ctc_event_data()['date'];
$start_date           = ctc_event_data()['start_date'];
$end_date             = ctc_event_data()['end_date'];
$time                 = ctc_event_data()['time'];
$venue                = ctc_event_data()['venue'];
$address              = ctc_event_data()['address'];
$show_directions_link = ctc_event_data()['show_directions_link'];
$directions_url       = ctc_event_data()['directions_url'];
$map_lat              = ctc_event_data()['map_lat'];
$map_lng              = ctc_event_data()['map_lng'];
$map_type             = ctc_event_data()['map_type'];
$map_zoom             = ctc_event_data()['map_zoom'];
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a></h1>
			<div class="event-meta">
				<?php if ( $date ) : ?>
					<span>
						<i class="genericon genericon-month"></i>
						<?php echo esc_html( $date ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $time ) : ?>
					<span>
						<i class="genericon genericon-time"></i>
						<?php echo nl2br( wptexturize( $time ) ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $venue ) : ?>
					<span>
						<i class="genericon genericon-home"></i>
						<?php echo esc_html( $venue ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $address ) : ?>
					<span>
						<i class="genericon genericon-location"></i>
						<?php echo nl2br( wptexturize( $address ) ); ?>
					</span>
				<?php endif; ?>
				</span>
     </div><!-- .event-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
