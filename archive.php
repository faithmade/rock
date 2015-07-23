<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title">
					<?php echo rock_get_the_archive_title(); ?>
				</h1>

				<?php if( get_the_archive_description() ): ?>
				<div class="archive-description">
					<?php get_the_archive_description(); ?>
				</div>
				<?php endif; ?>

			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php $posts = query_posts($query_string . '&orderby=menu_order&order=asc&posts_per_page=-1'); while ( have_posts() ) : the_post(); ?>

				<?php rock_get_content_template() ?>

			<?php endwhile; ?>

			<?php rock_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_sidebar( 'tertiary' ); ?>
<?php get_footer(); ?>
