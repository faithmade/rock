<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get data
// $position, $phone, $email, $urls
extract( ctfw_person_data() );
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="rock-entry-image">
					<?php rock_post_image(); ?>
				</div>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="event-meta">

				<?php if ( $position ) : ?>
					<i class="genericon genericon-user"></i>
					<?php echo esc_html( $position ); ?>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<i class="genericon genericon-phone"></i>
					<?php echo esc_html( $phone ); ?>
				<?php endif; ?>


				<?php if ( $email || $urls ) : ?>

					<?php if ( $email ) : ?>
						<i class="genericon genericon-mail"></i>
						<a href="mailto:<?php echo antispambot( $email, true ); ?>"><?php echo antispambot( $email ); ?></a>
					<?php endif; ?>

				<?php endif; ?>
			</div><!-- .sermon-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
