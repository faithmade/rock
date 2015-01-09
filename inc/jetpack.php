<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package rock
 */

/**
 * Add theme support for Infinite Scroll.
 *
 * @link http://jetpack.me/support/infinite-scroll/
 */
function rock_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'rock_jetpack_setup' );

/**
 * Jetpack featured posts initialization.
 *
 */
function rock_jetpack_init(){

	if( is_home() || is_front_page() ){
		rock_display_featured_posts();
	}

}

add_action( 'rock_header_after', 'rock_jetpack_init' );

/**
 * Adds Jetpack featured posts.
 *
 * @link http://jetpack.me/support/featured-content/
 */
function rock_get_featured_posts() {
    return apply_filters( 'rock_get_featured_posts', array() );
}

/**
 * Check for featured posts,
 *
 */
function rock_has_featured_posts( $minimum = 1 ) {
    if ( is_paged() )
        return false;

    $minimum = absint( $minimum );
    $featured_posts = apply_filters( 'rock_get_featured_posts', array() );

    if ( ! is_array( $featured_posts ) )
        return false;

    if ( $minimum > count( $featured_posts ) )
        return false;

    return true;
}

/**
 * Display the featured content post loop.
 *
 */
function rock_display_featured_posts(){

	get_template_part( 'content', 'featured' );

}

/**
 * Add featured post image background to header.
 *
 */
function rock_get_featured_content_post_bg(){
	$featured_content = rock_get_featured_posts();

	if( $featured_content && is_array( $featured_content ) ):

		$post_ID = $featured_content[0]->ID;

		if( has_post_thumbnail( $post_ID ) ){
			$image_id = get_post_thumbnail_id( $post_ID );

			$featured_image_bg = wp_get_attachment_image_src( $image_id, 'original', true );
			$featured_image_bg = $featured_image_bg[0];

?>
<style id="rock-featured-content">
.featured-content{
	background-image: url(<?php echo $featured_image_bg; ?>);
}
</style>
<?php
		}
	endif;

}

add_action( 'wp_print_styles', 'rock_get_featured_content_post_bg' );
