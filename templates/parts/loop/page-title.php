<?php
/**
 * The template used for displaying page title within the loop.
 *
 * @package rock
 */
?>
<header class="entry-header">
	<?php $tag = is_single() ? 'h1' : 'h2'; ?>
	<<?php echo $tag; ?> class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a>
	</<?php echo $tag; ?>>
</header><!-- .entry-header -->
