<?php

/**
 * Enable support for WooCommerce.
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @action after_setup_theme
 */
function rock_woocommerce_setup() {

	add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'rock_woocommerce_setup' );

/**
 * Remove the default WooCommerce page wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Markup for page wrapper start.
 *
 * @action woocommerce_before_main_content
 */
function rock_woo_wrapper_start() {

	?>
	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<article class="rock-woocommerce hentry">
	<?php

}
add_action( 'woocommerce_before_main_content', 'rock_woo_wrapper_start', 10 );

/**
 * Markup for page wrapper end.
 *
 * @action woocommerce_after_main_content
 */
function rock_woo_wrapper_end() {

	?>
	</article></main></div>
	<?php

}
add_action( 'woocommerce_after_main_content', 'rock_woo_wrapper_end', 10 );

/**
 * Filter the layout for the WooCommerce shop page.
 *
 * @param  string $layout
 *
 * @return string
 */
function rock_woo_shop_layout( $layout ) {

	if ( function_exists( 'wc_get_page_id' ) && function_exists( 'is_shop' ) && is_shop() ) {

		remove_filter( 'theme_mod_layout', __FUNCTION__ ); // Prevent infinite loop

		$layout = rock_get_layout( wc_get_page_id( 'shop' ) );

	}

	return $layout;

}
add_filter( 'theme_mod_layout', 'rock_woo_shop_layout' );
