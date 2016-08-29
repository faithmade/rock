<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

$ctc_sermon_topic    = get_the_term_list( $post->ID, 'ctc_sermon_topic', '', esc_html__( ', ' ) );
$ctc_sermon_book     = get_the_term_list( $post->ID, 'ctc_sermon_book', '', esc_html__( ', ' ) );
$ctc_sermon_series   = get_the_term_list( $post->ID, 'ctc_sermon_series', '', esc_html__( ', ' ) );
$ctc_sermon_speaker  = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', esc_html__( ', ' ) );
$ctc_sermon_tag      = get_the_term_list( $post->ID, 'ctc_sermon_tag', '', esc_html__( ', ' ) );
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<div class="entry-meta">
				<?php esc_html_e( rock_posted_on() ); ?>
			</div><!-- .entry-meta -->

			<?php $tag = is_single() ? 'h1' : 'h2'; ?>
			<<?php esc_attr_e( $tag ); ?> class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a>
			</<?php esc_attr_e( $tag ); ?>>


			<div class="sermon-meta">
				<?php if ( $ctc_sermon_speaker ) : ?>
				<span>
					<i class="genericon genericon-user"></i>
					<?php echo $ctc_sermon_speaker; ?>
				</span>
				<?php endif; ?>
				<?php if ( $ctc_sermon_topic ) : ?>
				<span>
					<i class="genericon genericon-category"></i>
					<?php echo $ctc_sermon_topic; ?>
				</span>
				<?php endif; ?>
				<?php if ( $ctc_sermon_book ) : ?>
				<span>
					<i class="genericon genericon-book"></i>
					<?php echo $ctc_sermon_book; ?>
				</span>
				<?php endif; ?>
				<?php if ( $ctc_sermon_tag ) : ?>
				<span>
					<i class="genericon genericon-tag"></i>
					<?php echo $ctc_sermon_tag; ?>
				</span>
				<?php endif; ?>
			</div><!-- .sermon-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
