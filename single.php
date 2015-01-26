<?php
/**
 * The template for displaying all single posts.
 *
 * @package rock
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php

			switch ( get_post_type() ) {
				case 'ctc_sermon':
					get_template_part( 'content', 'sermon' );
				break;
				case 'ctc_event':
					get_template_part( 'content', 'event' );
				break;
				case 'ctc_person':
					get_template_part( 'content', 'person' );
				break;
				case 'ctc_location':
					get_template_part( 'content', 'location' );
				break;
				default:
					get_template_part( 'content', get_post_format() );
				break;
			}

			?>

			<?php rock_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_sidebar( 'tertiary' ); ?>
<?php get_footer(); ?>
