<?php
/**
 * The template part for displaying the post title.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

$ctc_sermon_topic = get_the_term_list( $post->ID, 'ctc_sermon_topic', '', __( ', ', 'rock' ) );
$ctc_sermon_book = get_the_term_list( $post->ID, 'ctc_sermon_book', '', __( ', ', 'rock' ) );
$ctc_sermon_series = get_the_term_list( $post->ID, 'ctc_sermon_series', '', __( ', ', 'rock' ) );
$ctc_sermon_speaker = get_the_term_list( $post->ID, 'ctc_sermon_speaker', '', __( ', ', 'rock' ) );
$ctc_sermon_tag = get_the_term_list( $post->ID, 'ctc_sermon_tag', '', __( ', ', 'rock' ) );
?>
<header class="entry-header">
	<div class="entry-header-row">
		<div class="entry-header-column">
			<div class="entry-meta">
				<span class="post-format">Sermon</span>
				<?php rock_posted_on(); ?>
			</div><!-- .entry-meta -->
			<a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="sermon-meta">
				<span>
					<i class="genericon genericon-user"></i>
					<?php echo $ctc_sermon_speaker; ?>
				</span>
				<span>
					<i class="genericon genericon-category"></i>
					<?php echo $ctc_sermon_topic; ?>
				</span>
				<span>
					<i class="genericon genericon-book"></i>
					<?php echo $ctc_sermon_book; ?>
				</span>
			</div><!-- .sermon-meta -->
		</div><!-- .entry-header-column -->
	</div><!-- .entry-header-row -->
</header><!-- .entry-header -->
