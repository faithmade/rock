<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

// Get location data
$location_data        = ctc_location_data();
$address              = $location_data['address'];
$show_directions_link = $location_data['show_directions_link'];
$directions_url       = $location_data['directions_url'];
$phone                = $location_data['phone'];
$times                = $location_data['times'];
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">

			<?php $tag = is_single() ? 'h1' : 'h2'; ?>
			<<?php esc_attr_e( $tag ); ?> class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a>
			</<?php esc_attr_e( $tag ); ?>>

			<div class="location-meta">
				<?php if ( $address ) : ?>
				<span>
					<i class="genericon genericon-location"></i>
					<?php echo wptexturize( $address ); ?>
				</span>
				<?php endif; ?>
				<?php if ( $phone ) : ?>
				<span>
					<i class="genericon genericon-phone"></i>
					<?php echo esc_html( $phone ); ?>
				</span>
				<?php endif; ?>
				<?php if ( $times ) : ?>
				<span>
					<i class="genericon genericon-time"></i>
					<?php echo wptexturize( $times ); ?>
				</span>
				<?php endif; ?>
				</span>
			</div><!-- .location-meta -->

		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
