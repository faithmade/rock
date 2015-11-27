<?php

$onboarding_font_pairs = array(
  // Open Sans
  array(
    'heading' => array(
      'font_name' => 'Open Sans',
      'font_location' => 'entry-title',
      'font_weight' => 'normal',
      'font_load' => array(
        'Open Sans', 
        '|.open-sans', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Open Sans',
      'font_location' => 'entry-content',
      'font_weight' => 'normal',
      'font_load' => null // already loaded
      ),
    ),
  
  // Neuton
  array(
    'heading' => array(
      'font_name' => 'Neuton',
      'font_location' => 'entry-title',
      'font_weight' => '800',
      'font_load' => array(
        'Neuton', 
        '|.neuton', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Neuton',
      'font_location' => 'entry-content',
      'font_weight' => 'normal',
      'font_load' => null // already loaded
      ),
    ),
  
  // Playfair
  array(
    'heading' => array(
      'font_name' => 'Playfair Display SC',
      'font_location' => 'entry-title',
      'font_weight' => 'normal',
      'font_load' => array(
        'Playfair Display SC', 
        '|.playfair-display-sc', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Playfair Display',
      'font_location' => 'entry-content',
      'font_weight' => 'normal',
      'font_load' => array(
        'Playfair Display', 
        '|.playfair-display', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),

  // Dosis
  array(
    'heading' => array(
      'font_name' => 'Dosis',
      'font_location' => 'entry-title',
      'font_weight' => '700',
      'font_load' => array(
        'Dosis', 
        '|.dosis', 
        '|.regular&1|300&1|400&1|700&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Dosis',
      'font_location' => 'entry-content',
      'font_weight' => '300',
      'font_load' => null
      ),
    ),

  // Lora & Lato
  array(
    'heading' => array(
      'font_name' => 'Lora',
      'font_location' => 'entry-title',
      'font_weight' => '700',
      'font_load' => array(
        'Lora', 
        '|.lora', 
        '|.regular&1|300&1|400&1|700&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Lato',
      'font_location' => 'entry-content',
      'font_weight' => '300',
      'font_load' => array(
        'Lato', 
        '|.lato', 
        '|.regular&1|300&1|400&1|700&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),
  );

add_theme_support( 'onboarding_font_pairs', $onboarding_font_pairs );