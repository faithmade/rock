<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

// Get event data
$event_data           = ctc_event_data();
$date                 = $event_data['date'];
$start_date           = $event_data['start_date'];
$end_date             = $event_data['end_date'];
$time                 = $event_data['time'];
$venue                = $event_data['venue'];
$address              = $event_data['address'];
$show_directions_link = $event_data['show_directions_link'];
$directions_url       = $event_data['directions_url'];
$map_lat              = $event_data['map_lat'];
$map_lng              = $event_data['map_lng'];
$map_type             = $event_data['map_type'];
$map_zoom             = $event_data['map_zoom'];
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">

			<?php $tag = is_single() ? 'h1' : 'h2'; ?>
			<<?php esc_attr_e( $tag ); ?> class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a>
			</<?php esc_attr_e( $tag ); ?>>

			<div class="event-meta">
				<?php if ( $date ) : ?>
					<span>
						<i class="genericon genericon-month"></i>
						<?php esc_html_e( $date ); ?>
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
						<?php esc_html_e( $venue ); ?>
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
