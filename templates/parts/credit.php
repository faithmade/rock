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
	esc_html_x( 'Copyright %1$s %2$d %3$s. Powered by Faithmade.', '1. copyright symbol, 2. year, 3. site title', 'rock' ),
	'&copy;',
	date( 'Y' ),
	get_bloginfo( 'blogname' )
);

?>
</div>
