<?php
/**
 * The template part for displaying general content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'templates/parts/loop/ctc_person', 'title' ); ?>

	<?php get_template_part( 'templates/parts/loop/post', 'thumbnail' ); ?>

	<?php get_template_part( 'templates/parts/loop/ctc_person', 'content' ); ?>

	<?php get_template_part( 'templates/parts/loop/ctc_person', 'footer' ); ?>

</article><!-- #post-## -->
