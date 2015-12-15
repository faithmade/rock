<?php
$onboarding_font_pairs = array(
  // Montserrat and Merriweather props @imbradmiller
  array(
    'heading' => array(
      'font_name' => 'Merriweather',
      'font_location' => 'entry-title',
      'font_weight' => '800',
      'font_load' => array(
        'Merriweather', 
        '|.merriweather', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Montserrat',
      'font_location' => 'entry-title',
      'font_weight' => 'normal',
      'font_load' => array(
        'Montserrat', 
        '|.montserrat', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),
  
  // Oswald & Quattrocento props @imbradmiller
  array(
    'heading' => array(
      'font_name' => 'Oswald',
      'font_location' => 'entry-title',
      'font_weight' => '800',
      'font_load' => array(
        'Oswald', 
        '|.oswald', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    'body' => array(
      'font_name' => 'Quattrocento',
      'font_location' => 'entry-title',
      'font_weight' => '400',
      'font_load' => array(
        'Quattrocento', 
        '|.quattrocento', 
        '|.regular&1|400&1|800&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),
  
  // Lora & Open Sans Condensed props @imbradmiller
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
      'font_name' => 'Open Sans Condensed',
      'font_location' => 'entry-content',
      'font_weight' => 'normal',
      'font_load' => array(
        'Open Sans Condensed', 
        '|.open-sans-condensed', 
        '|.regular&1|300&1|700&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),

  // Playfair and Fauna One props @imbradmiller
  array(
    'heading' => array(
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
    'body' => array(
      'font_name' => 'Fauna One',
      'font_location' => 'entry-content',
      'font_weight' => 'normal',
      'font_load' => array(
        'Fauna One', 
        '|.fauna-one', 
        '|.regular&1|400&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),

  // Merriweather and Raleway props @imbradmiller
  array(
     'heading' => array(
      'font_name' => 'Merriweather',
      'font_location' => 'entry-content',
      'font_weight' => 'normal',
      'font_load' => null
      ),
    'body' => array(
      'font_name' => 'Raleway',
      'font_location' => 'entry-content',
      'font_weight' => '300',
      'font_load' => array(
        'Raleway', 
        '|.raleway', 
        '|.regular&1|300&1|400&1|700&1', 
        '|latin&1|latin-ext&1'
        ),
      ),
    ),
  );

/**
 * Adds Support in Onboarding for Typography Pair Selection
 */
add_theme_support( 'onboarding_font_pairs', $onboarding_font_pairs );