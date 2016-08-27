<?php
/**
 * The template part for displaying general content.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#content-slug-php
 *
 * @package Rock
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_single() || ! rock_use_featured_hero_image() ) : ?>

		<?php get_template_part( 'templates/parts/loop/post', 'thumbnail' ); ?>

	<?php endif; ?>

	<?php get_template_part( 'templates/parts/loop/' . get_post_type(), 'title' ); ?>

	<?php
	/**
	 * Fires after templates/parts/loop/post template
	 *
	 * @since 1.0.0
	 */
	do_action( 'rock_after_post_title_template' );
	?>

	<?php if ( is_single() ) : ?>

		<?php get_template_part( 'templates/parts/loop/' . get_post_type(), 'content' ); ?>

	<?php else : ?>

		<?php get_template_part( 'templates/parts/loop/' . get_post_type(), 'excerpt' ); ?>

	<?php endif; ?>

	<?php get_template_part( 'templates/parts/loop/post' . get_post_type(), 'footer' ); ?>

</article><!-- #post-## -->
