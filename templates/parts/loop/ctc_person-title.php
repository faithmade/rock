<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

// Get person data
$position = ctc_person_data()['position'];
$phone    = ctc_person_data()['phone'];
$email    = ctc_person_data()['email'];
$urls     = ctc_person_data()['urls'];

?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">

			<?php $tag = is_single() ? 'h1' : 'h2'; ?>
			<<?php esc_attr_e( $tag ); ?> class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a>
			</<?php esc_attr_e( $tag ); ?>>

			<div class="person-meta">
				<?php if ( $position ) : ?>
					<span>
						<i class="genericon genericon-user"></i>
						<?php esc_html_e( $position ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<span>
						<i class="genericon genericon-phone"></i>
						<?php esc_html_e( $phone ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $email ) : ?>
					<span>
						<i class="genericon genericon-mail"></i>
						<a href="mailto:<?php echo antispambot( $email, true ); ?>"><?php echo antispambot( $email ); ?></a>
					</span>
				<?php endif; ?>

				<?php

				if ( $urls ) :

					$urls = explode("\n", $urls);

					foreach ($urls as $url) {
						?>
						<span>
							<i class="genericon genericon-link"></i>
							<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_url( $url ); ?></a>
						</span>
						<?php
					}

				endif;

				?>

			</div><!-- .person-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
