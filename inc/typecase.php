<?php

$font_locations = array(
  array(
    'label' => 'Main Title',
    'selector' => 'h1.entry-title',
    'default' => 'Lato, sans-serif',
  ),
  array(
    'label' => 'Main Content',
    'selector' => '.entry-content',
    'default' => 'Lato, sans-serif',
  ),
);

add_theme_support( 'typecase', $font_locations );
