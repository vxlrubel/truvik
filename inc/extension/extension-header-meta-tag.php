<?php

defined('ABSPATH') OR exit('No direct script access allowed');

Redux::set_section( 
    $opt_name,
    [
        'title'      => esc_html__( 'Include Header Tag', 'truvik' ),
        'id'         => 'truvik-header-meta-tag-seo',
        'desc'       => esc_html__( 'You may modify/change the content of header bottom area', 'truvik' ),
        'subsection' => true,
        'fields'     => [
            [
                'id'          => 'truvik-header-metatag',
                'type'        => 'textarea',
                'title'       => esc_html__( 'Meta Tag', 'truvik' ),
                'subtitle'    => esc_html__( 'Include meta tag for seo', 'truvik' ),
                'description' => esc_html__( 'You may add some meta tag from here.', 'truvik' ),
                'default'     => '<meta name="viewport" content="width=device-width, initial-scale=1">',
            ],
        ]
    ]
);