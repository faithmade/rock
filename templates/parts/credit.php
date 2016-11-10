<?php
/**
 * Displays site credit.
 *
 * @package Rock
 * @since   1.0.0
 */
?>

<div class="site-info-text">
<?php

printf(
	esc_html_x( 'Copyright %1$s %2$d %3$s. Powered by ', '1. copyright symbol, 2. year, 3. site title', 'rock' ) . __( '<a href="https://faithmade.com/">Faithmade</a>.', 'rock' ),
	'&copy;',
	date( 'Y' ),
	get_bloginfo( 'blogname' )
);

?>
</div>
