<?php
/**
 * Template Name: No Header/Footer
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="content" class="site-content">
      <div id="primary" class="content-area">
        <?php the_content(); ?>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
