<?php
/**
 * Template part for displaying the post thumbnail inside The Loop.
 *
 * @package Rock
 */
?>

<?php if ( has_post_thumbnail() ) : ?>

	<div class="featured-image">

	<?php
	/**
	 * Fires before the post thumbnail element.
	 *
	 * @since 1.0.0
	 */
	do_action( 'rock_before_post_thumbnail' );
	?>

	<?php if ( ! is_single() ) : ?>

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( rock_get_featured_image_size() ); ?></a>

	<?php else : ?>

		<?php the_post_thumbnail( rock_get_featured_image_size() ); ?>

	<?php endif; ?>

	<?php
	/**
	 * Fires after the post thumbnail element.
	 *
	 * @since 1.0.0
	 */
	do_action( 'rock_after_post_thumbnail' );
	?>

	</div><!-- .featured-image -->

<?php endif; ?>
