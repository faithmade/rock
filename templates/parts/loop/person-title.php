<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get person data
$position = ctc_person_data()['position'];
$phone = ctc_person_data()['phone'];
$email = ctc_person_data()['email'];
$urls = ctc_person_data()['urls'];

?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="person-meta">
				<?php if ( $position ) : ?>
					<span>
						<i class="genericon genericon-user"></i>
						<?php echo esc_html( $position ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<span>
						<i class="genericon genericon-phone"></i>
						<?php echo esc_html( $phone ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $email || $urls ) : ?>

					<?php if ( $email ) : ?>
						<span>
							<i class="genericon genericon-mail"></i>
							<a href="mailto:<?php echo antispambot( $email, true ); ?>"><?php echo antispambot( $email ); ?></a>
						</span>
					<?php endif; ?>

				<?php endif; ?>
			</div><!-- .person-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
