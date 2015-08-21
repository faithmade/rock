<?php
/**
 * rock Theme Customizer
 *
 * @package rock
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rock_customize_register( $wp_customize ) {
  $wp_customize->remove_section( 'colors');
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


  if ( is_plugin_active( 'site-logo/site-logo.php' ) ) {
    $wp_customize->add_setting('logo_position', array(
      'default'        => 'left',
      'capability'     => 'edit_theme_options',
      'type'           => 'option',
      'theme_supports' => 'site-logo'
    ));

    $wp_customize->add_control('logo_position_control',
      array(
        'label'    => __( 'Logo Position', 'rock' ),
        'section'  => 'title_tagline',
        'settings' => 'logo_position',
        'type'     => 'radio',
        'choices'  => array(
          'left'     => 'Left',
          'center'   => 'Center',
          'right'    => 'Right',
        ),
    ));
  }

  // Toggle header max width

  $wp_customize->add_setting('header_constraint', array(
    'default'        => 'default',
    'capability'     => 'edit_theme_options',
    'type'           => 'option'
  ));

  $wp_customize->add_control('header_constraint_control',
    array(
      'label'    => __( 'Header Constraint', 'rock' ),
      'description' => 'Set how wide the header and navigation should be.',
      'section'  => 'layout',
      'settings' => 'header_constraint',
      'type'     => 'select',
      'choices'  => array(
        'default'     => 'Default',
        'full'   => 'Full',
      ),
  ));

  // Custom Footer Text

  // $wp_customize->add_section( 'rock_footer' , array(
  //   'title'      => __( 'Footer', 'rock' ),
  //   'priority'   => 150,
  // ));

  // $wp_customize->add_setting( 'footer_text' , array(
  //   'default'     => '',
  //   'transport'   => 'refresh',
  // ));

  // $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_text_control', array(
  //     'label'      => __( 'Footer Text', 'rock' ),
  //     'section'    => 'rock_footer',
  //     'settings'   => 'footer_text',
  // )));

}
add_action( 'customize_register', 'rock_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rock_customize_preview_js() {
	wp_enqueue_script( 'rock_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rock_customize_preview_js' );

/**
 * Add custom CSS to the customizer page
 */
function rock_customizer_style() {
  wp_register_style( 'customizer_style', get_template_directory_uri() . '/assets/css/customizer.css' );
  wp_enqueue_style( 'customizer_style' );
}
add_action( 'customize_controls_print_styles', 'rock_customizer_style' );
