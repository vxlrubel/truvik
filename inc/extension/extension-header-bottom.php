<?php

defined('ABSPATH') OR exit('No direct script access allowed');

Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Header Bottom', 'truvik' ),
    'id'         => 'truvik-header-area-bottom',
    'desc'       => esc_html__( 'You may modify/change the content of header bottom area', 'truvik' ),
    'subsection' => true,
    'fields'     => [
        [
            'id'       => 'truvik-enable-header-bottom',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable/Desiable', 'truvik' ),
            'subtitle' => esc_html__( 'Modify the header bottom area', 'truvik' ),
        ],
        [
            'id'          => 'truvik-enable-header-bottom-logo-enable',
            'type'        => 'checkbox',
            'title'       => esc_html__( 'Enable/Disable', 'truvik' ),
            'subtitle'    => esc_html__( 'Enable or desiable the logo', 'truvik' ),
            'description' => __( 'logo visibility', 'truvik' ),
            'url'         => false,
            'required'    => [ 'truvik-enable-header-bottom', '=', true ]
        ],
        [
            'id'       => 'truvik-enable-header-bottom-logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Logo', 'truvik' ),
            'subtitle' => esc_html__( 'Change the website logo from here', 'truvik' ),
            'url'      => false,
            'required' => [ 'truvik-enable-header-bottom-logo-enable', '=', true ]
        ],
        [
            'id'          => 'truvik-enable-header-bottom-search-enable',
            'type'        => 'checkbox',
            'title'       => esc_html__( 'Enable/Disable', 'truvik' ),
            'subtitle'    => esc_html__( 'Search bar visibility', 'truvik' ),
            'url'         => false,
            'description' => __( 'Search bar visibility', 'truvik' ),
            'required'    => [ 'truvik-enable-header-bottom', '=', true ]
        ],
        [
            'id'          => 'truvik-enable-header-bottom-quote-enable',
            'type'        => 'checkbox',
            'title'       => esc_html__( 'Enable/Disable', 'truvik' ),
            'subtitle'    => esc_html__( 'Quote button visibility', 'truvik' ),
            'url'         => false,
            'description' => __( 'Quote button visibility', 'truvik' ),
            'required'    => [ 'truvik-enable-header-bottom', '=', true ]
        ],
        [
            'id'          => 'truvik-enable-header-bottom-quote-text',
            'type'        => 'text',
            'title'       => esc_html__( 'Button Text', 'truvik' ),
            'subtitle'    => esc_html__( 'Change the button text', 'truvik' ),
            'url'         => false,
            'description' => __( 'You may change the button text from here', 'truvik' ),
            'required'    => [ 'truvik-enable-header-bottom-quote-enable', '=', true ]
        ],
        [
            'id'          => 'truvik-enable-header-bottom-quote-url',
            'type'        => 'text',
            'title'       => esc_html__( 'Url', 'truvik' ),
            'subtitle'    => esc_html__( 'Change Url', 'truvik' ),
            'url'         => false,
            'description' => __( 'You may change the button url from here.', 'truvik' ),
            'required'    => [ 'truvik-enable-header-bottom-quote-enable', '=', true ]
        ],
    ]
) );
