<?php
/**
 * Displays site credit.
 *
 * @package Rock
 */
?>

<div class="site-info-text">
<?php

printf(
	esc_html_x( 'Copyright %1$s %2$d %3$s', '1. copyright symbol, 2. year, 3. site title', 'rock' ),
	'&copy;',
	date( 'Y' ),
	get_bloginfo( 'blogname' )
);

if ( (bool) apply_filters( 'rock_author_credit', true ) ) {

	echo ' &mdash; ';

	printf(
		esc_html_x( '%1$s theme by %2$s', '1. theme name link, 2. theme author link', 'rock' ),
		sprintf(
			'<a href="https://churchthemes.net/themes/%s/" rel="designer">%s</a>',
			sanitize_key( get_stylesheet() ),
			esc_html( get_option( 'current_theme', ucwords( get_stylesheet() ) ) )
		),
		'<a href="https://faithmade.com" rel="designer">Faithmade</a>'
	);

}

?>
</div>
