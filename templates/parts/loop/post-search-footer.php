<?php
/**
 * Template part for displaying the post footer on search results inside The Loop.
 *
 * @package Rock
 */
?>

<footer class="entry-footer">

	<?php if ( 'post' == get_post_type() ) : ?>

		<?php $category_list = get_the_category_list( esc_html_x( ', ', 'separator for items in a list', 'rock' ) ); ?>

		<?php if ( $category_list && rock_has_active_categories() ) : ?>

			<span class="cat-links">

				<?php printf( esc_html_x( 'Posted in: %s', 'category list', 'rock' ), $category_list ); ?>

			</span>

		<?php endif; ?>

		<?php $tag_list = get_the_tag_list( '', esc_html_x( ', ', 'separator for items in a list', 'rock' ) ); ?>

		<?php if ( $tag_list ) : ?>

			<span class="tags-links">

				<?php printf( esc_html_x( 'Filed under: %s', 'tag list', 'rock' ), $tag_list ); ?>

			</span>

		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

		<span class="comments-link"><?php comments_popup_link( esc_html__( 'Leave a comment', 'rock' ), esc_html__( '1 Comment', 'rock' ), esc_html_x( '% Comments', 'number of comments', 'rock' ) ); ?></span>

	<?php endif; ?>

	<?php edit_post_link( esc_html__( 'Edit', 'rock' ), '<span class="edit-link">', '</span>' ); ?>

</footer><!-- .entry-footer -->
