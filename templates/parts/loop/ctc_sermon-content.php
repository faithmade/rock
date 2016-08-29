<?php
/**
 * The template part for displaying the post content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock
 */

// Get sermon data:
$has_full_text       = ctc_sermon_data()['has_full_text'];
$video_player        = ctc_sermon_data()['video_player'];
$video_download_url  = ctc_sermon_data()['video_download_url'];
$audio_player        = ctc_sermon_data()['audio_player'];
$audio_download_url  = ctc_sermon_data()['audio_download_url'];
$pdf_download_url    = ctc_sermon_data()['pdf_download_url'];

// Show buttons if need to switch between video and audio players or have at least one download link
$show_buttons = false;
if ( ( $video_player && $audio_player ) || $video_download_url || $audio_download_url || $pdf_download_url ) {
	$show_buttons = true;
}

// Player request (?player=audio or ?player=video)
// Optionally show and scroll to a specific player
if (isset($_GET['player']) && (('video' == $_GET['player'] && $video_player) || ('audio' == $_GET['player'] && $audio_player))):

	$player_request = $_GET['player'];

	switch ( $player_request ):
		case 'video':
			$player = $video_player;
		break;
		case 'audio':
			$player = $audio_player;
		break;
	endswitch;

	$current_player = $player_request;

else:

	if ( $video_player ):
		$player = $video_player;
		$current_player = 'video';
	elseif ( $audio_player ):
		$player = $audio_player;
		$current_player = 'audio';
	endif;

endif;

if ( $video_download_url ){
	$video_download = '<a href="' . esc_url( $video_download_url ) . '" class="button">
											 <i class="genericon genericon-cloud-download"></i>
											 ' . esc_html_x( 'Save Video', 'Text for the video download link for sermons.', 'rock' ) . '
										 </a>';
}

if ( $audio_download_url ){
	$audio_download = '<a href="' . esc_url( $audio_download_url ) . '" class="button">
											 <i class="genericon genericon-cloud-download"></i>
											 ' . esc_html_x( 'Save Audio', 'Text for the audio download link for sermons', 'rock' ) . '
										 </a>';
}

if ( $pdf_download_url ){
	$pdf_download = '<a href="' . esc_url( $pdf_download_url ) . '" class="button">
										 <i class="genericon genericon-cloud-download"></i>
										 ' . esc_html_x( 'PDF', 'Text for the PDF download link for sermons.', 'rock' ) . '
									 </a>';
}

?>
<?php if ( isset( $player ) ): ?>
<div class="entry-media <?php echo $current_player ?>">
	<?php echo $player; ?>
</div>
<?php endif; ?>

<div class="entry-media-meta">

	<?php if ( isset( $player ) ): ?>

		<?php if ( $video_player && 'audio' == $current_player ) : // have video player but currently showing audio ?>
			<a href="?player=video" class="button">
				<i class="genericon genericon-video"></i>
				<?php esc_html_e( 'Show Video Player', 'rock' ); ?>
			</a>
		<?php endif; ?>
		<?php if ( $audio_player && 'video' == $current_player ) : // have audio player but currently showing video ?>
			<a href="?player=audio" class="button">
				<i class="genericon genericon-audio"></i>
				<?php esc_html_e( 'Show Audio Player', 'rock' ); ?>
			</a>
		<?php endif; ?>

		<?php if ( isset( $video_download ) ) echo $video_download; ?>

		<?php if ( isset( $audio_download ) ) echo $audio_download; ?>

	<?php endif; ?>

	<?php if ( isset( $pdf_download ) ) echo $pdf_download; ?>

</div>

<div class="entry-content">
	<?php

		if ( is_category() || is_archive() ) {
			the_excerpt();
		}
		else {
			the_content( esc_html__( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );
		}

	?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
