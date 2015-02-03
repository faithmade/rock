<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">

			<?php do_action( 'rock_before_post_title' ); ?>

			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a>
			</h1>

			<?php do_action( 'rock_after_post_title' ); ?>

		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
