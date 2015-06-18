<?php
/**
 * Displays the site title.
 *
 * @package rock
 */
?>

<div class="site-title-wrapper">

	<div class="site-title-wrapper-inner site-logo-align-<?php echo get_option('logo_position','left') ?>">

    <div class="site-logo">
      <?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
    </div>

    <div class="site-header-text">
  		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  		<div class="site-description"><?php bloginfo( 'description' ); ?></div>
    </div>

	</div><!-- .site-info-inner -->

  <?php if( is_active_sidebar( 'header' ) ): ?>

    <div class="header-widget-area">
      <?php dynamic_sidebar( 'header' ); ?>
    </div>

  <?php endif; ?>

</div><!-- .site-title-wrapper -->
