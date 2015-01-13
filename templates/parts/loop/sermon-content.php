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
extract( ctfw_sermon_data() );
print_r( ctfw_sermon_data() );
?>
<div class="entry-content">

  <?php



  ?>

  <button>PDF</button>

  <a href="" class="button">Video</a>

	<?php the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'rock' ) ); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'rock' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
