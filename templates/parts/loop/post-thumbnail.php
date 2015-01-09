<?php
/**
 * The template part for displaying the post thumbnail.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */
?>

<?php if( has_post_thumbnail() ): ?>
<div class="featured-image">
	<?php the_post_thumbnail( 'rock-featured' ); ?>
</div><!-- .featured-image -->
<?php endif; ?>
