<?php

$color_locations = array(

    'sections' => array(

        'General' => array(
            'Background' => array(
                'selector' => 'body',
                'attribute' => 'background-color',
                'default' => '#e7e7e7',
            ),
        ),

        'Header' => array(
            'Background' => array(
                'selector' => '.site-header',
                'attribute' => 'background-color',
                'default' => '#fff',
            ),
            'Site Title' => array(
                'selector' => '.site-header .site-title a',
                'attribute' => 'color',
                'default' => '#000',
            ),
            'Site Description' => array(
                'selector' => '.site-header .site-description',
                'attribute' => 'color',
                'default' => '#777',
            ),
        ),

        'Navigation' => array(
            'Background' => array(
                'selector' => '.main-navigation-container, .main-navigation li.menu-item-has-children:hover > ul',
                'attribute' => 'background-color',
                'default' => '#222',
            ),
            'Link Text' => array(
                'selector' => '.main-navigation-container li > a',
                'attribute' => 'color',
                'default' => '#c8c8c8',
            ),
            'Hover Link Text' => array(
                'selector' => '.main-navigation-container li:hover > a, .main-navigation-container li:focus > a',
                'attribute' => 'color',
                'default' => '#fff',
            ),
            'Hover Link Background' => array(
                'selector' => '.main-navigation-container li:hover > a, .main-navigation-container li:focus > a',
                'attribute' => 'background-color',
                'default' => '#3c3c3c',
            ),
            'Active Link Text' => array(
                'selector' => '.main-navigation-container li.current_page_item > a',
                'attribute' => 'color',
                'default' => '#777',
            ),
            'Active Link Background' => array(
                'selector' => '.main-navigation-container li.current_page_item > a',
                'attribute' => 'background-color',
                'default' => '#777',
            ),
        ),

        'Content' => array(
            'Background' => array(
                'selector' => '.hentry',
                'attribute' => 'background-color',
                'default' => '#fff',
            ),
            'Page Title Color' => array(
                'selector' => '.content-area .entry-title, .content-area .entry-title a',
                'attribute' => 'color',
                'default' => '#222',
            ),
            'Text Color' => array(
                'selector' => '.hentry',
                'attribute' => 'color',
                'default' => '#444',
            ),
            'Link Color' => array(
                'selector' => '.content-area a',
                'attribute' => 'color',
                'default' => '#e91f2e',
            ),
            'Link Hover Color' => array(
                'selector' => '.content-area a:hover, .content-area a:focus',
                'attribute' => 'color',
                'default' => '#c21322',
            ),
        ),

        'Comments' => array(
            'Background' => array(
                'selector' => '.comments-area',
                'attribute' => 'background-color',
                'default' => '#fff',
            ),
            'Text Color' => array(
                'selector' => '.comments-area, .comments-title, .comment-reply-title, .form-allowed-tags, .form-allowed-tags abbr, .form-allowed-tags code',
                'attribute' => 'color',
                'default' => '#444',
            ),
            'Link Color' => array(
                'selector' => '.comments-area a',
                'attribute' => 'color',
                'default' => '#e91f2e',
            ),
            'Link Hover Color' => array(
                'selector' => '.comments-area a:hover, .comments-area a:focus',
                'attribute' => 'color',
                'default' => '#c21322',
            ),
            'Button Background' => array(
                'selector' => '.comments-area input[type="submit"]',
                'attribute' => 'background-color',
                'default' => '#e91f2e',
            ),
            'Button Background Hover' => array(
                'selector' => '.comments-area input[type="submit"]:hover',
                'attribute' => 'background-color',
                'default' => '#c21322',
            ),
            'Button Text' => array(
                'selector' => '.comments-area input[type="submit"]',
                'attribute' => 'color',
                'default' => '#fff',
            ),
            'Button Text Hover' => array(
                'selector' => '.comments-area input[type="submit"]:hover',
                'attribute' => 'color',
                'default' => '#fff',
            ),
        ),

        'Sidebar' => array(
            'Background' => array(
                'selector' => '#secondary .widget, #tertiary .widget',
                'attribute' => 'background-color',
                'default' => '#fff',
            ),
            'Title Color' => array(
                'selector' => '#secondary .widget-title, #tertiary .widget-title',
                'attribute' => 'color',
                'default' => '#222',
            ),
            'Text Color' => array(
                'selector' => '#secondary, #secondary abbr, #tertiary, #tertiary abbr',
                'attribute' => 'color',
                'default' => '#444',
            ),
            'List Divider' => array(
                'selector' => '#secondary .widget li, #tertiary .widget li',
                'attribute' => 'border-bottom-color',
                'default' => '#e7e7e7',
            ),
            'Link Color' => array(
                'selector' => '#secondary a, #tertiary a',
                'attribute' => 'color',
                'default' => '#e91f2e',
            ),
            'Link Hover Color' => array(
                'selector' => '#secondary a:hover, #secondary a:focus, #tertiary a:hover, #tertiary a:focus',
                'attribute' => 'color',
                'default' => '#c21322',
            ),
        ),

        'Footer' => array(
            'Background' => array(
                'selector' => '.site-info-wrapper',
                'attribute' => 'background-color',
                'default' => '#fff',
            ),
            'Text Color' => array(
                'selector' => '.site-info-wrapper',
                'attribute' => 'color',
                'default' => '#222',
            ),
            'Link Color' => array(
                'selector' => '.site-info-wrapper a',
                'attribute' => 'color',
                'default' => '#222',
            ),
            'Link Hover Color' => array(
                'selector' => '.site-info-wrapper a:hover, .site-info-wrapper a:focus',
                'attribute' => 'color',
                'default' => '#222',
            ),
            'Social Link Icon' => array(
                'selector' => '.site-info-wrapper .site-info .social-menu a',
                'attribute' => 'color',
                'default' => '#fff',
            ),
            'Social Link Icon Hover' => array(
                'selector' => '.site-info-wrapper .site-info .social-menu a:hover, .site-info-wrapper .site-info .social-menu a:focus',
                'attribute' => 'color',
                'default' => '#fff',
            ),
            'Social Link Background' => array(
                'selector' => '.site-info-wrapper .site-info .social-menu a',
                'attribute' => 'background-color',
                'default' => '#222',
            ),
            'Social Link Background Hover' => array(
                'selector' => '.site-info-wrapper .site-info .social-menu a:hover, .site-info-wrapper .site-info .social-menu a:focus',
                'attribute' => 'background-color',
                'default' => '#e91f2e',
            ),
        ),

    ),

    'palettes' => array(

        'Default' => array(

            'General' => array(
              'Background' => '#e7e7e7',
            ),

            'Sidebar' => array(
                'Background Color' => '#FFFFFF',
                'Text Color' => '#333333',
                'Link Color' => '#333333',
                'Link Hover Color' => '#707070',
            ),

            'Content' => array(
                'Background Color' => '#FFFFFF',
                'Text Color' => '#333333',
                'Link Color' => '#333333',
                'Link Hover Color' => '#707070',
            ),

        ),

        'Dreamy' => array(

            'General' => array(
              'Background' => '#e7e7e7',
            ),

            'Header' => array(
                'Background' => '#89bdd3',
                'Site Title' => '#fff',
                'Site Description' => '#fff'
            ),

            'Navigation' => array(
                'Background' => '#222',
                'Link Text' => '#fff'
            ),

            'Content' => array(
                'Background Color' => '#e3e3e3',
                'Text Color' => '#222',
                'Link Color' => '#9ad3de',
                'Link Hover Color' => '#89bdd3',
            ),

            'Comments' => array(
                'Button Background' => '#9ad3de',
                'Button Background Hover' => '#89bdd3',
                'Button Text' => '#fff',
                'Button Text Hover' => '#fff',
            ),

            'Footer' => array(
                'Background' => '#89bdd3',
                'Text Color' => '#fff',
                'Link Color' => '#fff',
                'Link Hover Color' => '#fff',
                'Social Link Background' => '#222',
                'Social Link Background Hover' => '#fff',
                'Social Link Icon' => '#fff',
                'Social Link Icon Hover' => '#222'
            ),

        ),

        'Aquatic' => array(

          'General' => array(
            'Background' => '#e7e7e7',
          ),

          'Header' => array(
              'Background' => '#fae596',
              'Site Title' => '#173e43',
              'Site Description' => '#173e43'
          ),

          'Navigation' => array(
              'Background' => '#173e43',
              'Hover Link Background' => '#3fb0ac',
              'Link Text' => '#fff'
          ),

          'Content' => array(
              'Background' => '#dddfd4',
              'Text Color' => '#173e43',
              'Link Color' => '#3fb0ac',
              'Link Hover Color' => '#173e43',
          ),

          'Comments' => array(
              'Background' => '#dddfd4',
              'Button Background' => '#173e43',
              'Button Background Hover' => '#3fb0ac',
              'Button Text' => '#fff',
              'Button Text Hover' => '#fff',
          ),

          'Footer' => array(
              'Background' => '#173e43',
              'Text Color' => '#fff',
              'Link Color' => '#fff',
              'Link Hover Color' => '#fff',
              'Social Link Background' => '#3fb0ac',
              'Social Link Background Hover' => '#3fb0ac',
              'Social Link Icon' => '#fff',
              'Social Link Icon Hover' => '#173e43'
          ),

          'Sidebar' => array(
              'Background' => '#dddfd4',
              'Title Color' => '#173e43',
              'Text Color' => '#173e43',
              'Link Color' => '#3fb0ac',
              'Link Hover Color' => '#173e43',
          ),

        ),

        'Humanity' => array(

            'General' => array(
              'Background' => '#ede9ce',
            ),

            'Header' => array(
                'Background' => '#ede9ce',
                'Site Title' => '#935347',
                'Site Description' => '#64706c'
            ),

            'Navigation' => array(
                'Background' => '#935347',
                'Hover Link Background' => '#c7ad88',
                'Link Text' => '#fff'
            ),

            'Content' => array(
                'Background' => '#fff',
                'Text Color' => '#64706c',
                'Link Color' => '#935347',
                'Link Hover Color' => '#c7ad88',
            ),

            'Comments' => array(
                'Background' => '#fff',
                'Button Background' => '#935347',
                'Button Background Hover' => '#c7ad88',
                'Button Text' => '#fff',
                'Button Text Hover' => '#fff',
            ),

            'Footer' => array(
                'Background' => '#935347',
                'Text Color' => '#fff',
                'Link Color' => '#fff',
                'Link Hover Color' => '#fff',
                'Social Link Background' => '#c7ad88',
                'Social Link Background Hover' => '#fff',
                'Social Link Icon' => '#935347',
                'Social Link Icon Hover' => '#935347'
            ),

            'Sidebar' => array(
                'Background' => '#fff',
                'Text Color' => '#64706c',
                'Link Color' => '#935347',
                'Link Hover Color' => '#c7ad88',
            ),

        ),

        'Wood Grain' => array(

            'General' => array(
              'Background' => '#e7e7e7',
            ),

            'Header' => array(
                'Background' => '#feffff',
                'Site Title' => '#312c32',
                'Site Description' => '#daad86'
            ),

            'Navigation' => array(
                'Background' => '#daad86',
                'Hover Link Background' => '#98dafc',
                'Link Text' => '#fff'
            ),

            'Content' => array(
                'Background' => '#feffff',
                'Text Color' => '#312c32',
                'Link Color' => '#daad86',
                'Link Hover Color' => '#98dafc',
            ),

            'Comments' => array(
                'Background' => '#fff',
                'Button Background' => '#daad86',
                'Button Background Hover' => '#98dafc',
                'Button Text' => '#fff',
                'Button Text Hover' => '#fff',
            ),

            'Footer' => array(
                'Background' => '#daad86',
                'Text Color' => '#fff',
                'Link Color' => '#fff',
                'Link Hover Color' => '#fff',
                'Social Link Background' => '#98dafc',
                'Social Link Background Hover' => '#98dafc',
                'Social Link Icon' => '#312c32',
                'Social Link Icon Hover' => '#312c32'
            ),

            'Sidebar' => array(
                'Background Color' => '#feffff',
                'Text Color' => '#312c32',
                'Link Color' => '#daad86',
                'Link Hover Color' => '#98dafc',
            ),

            'Content' => array(
                'Background Color' => '#feffff',
                'Text Color' => '#312c32',
                'Link Color' => '#daad86',
                'Link Hover Color' => '#98dafc',
            ),

        ),

    ),

);

add_theme_support( 'colorcase', $color_locations );
