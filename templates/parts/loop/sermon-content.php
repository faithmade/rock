<?php
/**
 * The template part for displaying the post content.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rock
 */

// Get sermon data:
// $has_full_text   True if full text of sermon was provided as post content
// $video_player    Embed code generated from uploaded file, URL for file on other site, page on oEmbed-supported site such as YouTube, or manual embed code (HTML or shortcode)
// $video_download_url  URL for download link (available only for local files, "Save As" will be forced)
// $audio_player    Same as video
// $audio_download_url  Same as video
// $pdf_download_url  URL for download link (local or externally hosted, but "Save As" forced only if local)
extract( ctc_sermon_data() );

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

if ( $video_download_url )
  $video_download = '<a href="' . $video_download_url . '" class="button">
                       <i class="genericon genericon-cloud-download"></i>
                       ' . _x( 'Save Video', 'Text for the video download link for sermons.', 'rock' ) . '
                     </a>';

if ( $audio_download_url )
  $audio_download = '<a href="' . $audio_download_url . '" class="button">
                       <i class="genericon genericon-cloud-download"></i>
                       ' . _x( 'Save Audio', 'Text for the audio download link for sermons', 'rock' ) . '
                     </a>';

if ( $pdf_download_url )
  $pdf_download = '<a href="' . $pdf_download_url . '" class="button">
                     <i class="genericon genericon-cloud-download"></i>
                     ' . _x( 'PDF', 'Text for the PDF download link for sermons.', 'rock' ) . '
                   </a>';

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
        <?php _e( 'Show Video Player', 'rock' ); ?>
      </a>
    <?php endif; ?>
    <?php if ( $audio_player && 'video' == $current_player ) : // have audio player but currently showing video ?>
      <a href="?player=audio" class="button">
        <i class="genericon genericon-audio"></i>
        <?php _e( 'Show Audio Player', 'rock' ); ?>
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
      the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) );
    }

  ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
