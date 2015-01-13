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
			<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="entry-meta">
				<?php

				$ctc_sermon_topic = get_the_term_list( $post->ID, 'ctc_sermon_topic', '', __( ', ', 'rock' ) );
	      $ctc_sermon_book = get_the_term_list( $post->ID, 'ctc_sermon_book', '', __( ', ', 'rock' ) );
	      $ctc_sermon_series = get_the_term_list( $post->ID, 'ctc_sermon_series', '', __( ', ', 'rock' ) );
	      $ctc_sermon_speaker = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', __( ', ', 'rock' ) );
	      $ctc_sermon_tag = get_the_term_list( $post->ID, 'ctc_sermon_tag', '', __( ', ', 'rock' ) );

				?>
				<?php
				$format = get_post_format( get_the_ID() );
				if ( false === $format ) {
					$format = 'standard';
				}
				echo '<span class="post-format">' . $format . '</span>';
				?>
				<?php rock_posted_on(); ?>
			</div><!-- .entry-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
