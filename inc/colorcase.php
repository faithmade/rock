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
                'selector' => '.main-navigation-container',
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

        'Sidebar' => array(
            'Background' => array(
                'selector' => '#secondary .widget',
                'attribute' => 'background-color',
                'default' => '#fff',
            ),
            'Title Color' => array(
                'selector' => '#secondary .widget-title',
                'attribute' => 'color',
                'default' => '#222',
            ),
            'Text Color' => array(
                'selector' => '#secondary, #secondary abbr',
                'attribute' => 'color',
                'default' => '#444',
            ),
            'List Divider' => array(
                'selector' => '#secondary .widget li',
                'attribute' => 'border-bottom-color',
                'default' => '#e7e7e7',
            ),
            'Link Color' => array(
                'selector' => '#secondary a',
                'attribute' => 'color',
                'default' => '#e91f2e',
            ),
            'Link Hover Color' => array(
                'selector' => '#secondary a:hover, #secondary a:focus',
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

    ),



);

add_theme_support( 'colorcase', $color_locations );
