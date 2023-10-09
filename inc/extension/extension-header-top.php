<?php

defined('ABSPATH') OR exit('No direct script access allowed');

// require_once Redux_Core::$dir . 'inc/extensions/icon_select/font-awesome-5-free.php';

Redux::set_section( $opt_name, array(
    'title'      => esc_html__( 'Header Top', 'truvik' ),
    'id'         => 'truvik-header-area-top',
    'desc'       => esc_html__( 'You may modify/change the content of header top area', 'truvik' ),
    'subsection' => true,
    'fields'     => [
        [
            'id'       => 'truvik-enable-header-top',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable/Desiable', 'truvik' ),
            'subtitle' => esc_html__( 'Modify the header Top area', 'truvik' ),
            'default'  => true
        ],
        [
			'id' => 'footer_deviders-header-top',
			'type' => 'divide',
		],
        // [
        //     'id'       => 'truvik-enable-header-top-email',
        //     'type'     => 'text',
        //     'title'    => esc_html__( 'Email', 'truvik' ),
        //     'subtitle' => esc_html__( 'Change the email address from here', 'truvik' ),
        //     'required' => [ 'truvik-enable-header-top', '=', true ],
        //     'default'  => 'info@example.com',
        // ],
        // [
        //     'id'       => 'truvik-enable-header-top-number',
        //     'type'     => 'text',
        //     'title'    => esc_html__( 'Number', 'truvik' ),
        //     'subtitle' => esc_html__( 'Change the number from here', 'truvik' ),
        //     'required' => [ 'truvik-enable-header-top', '=', true ],
        //     'default'  => '+00123456789'
        // ],
        [
            'id'       => 'truvik-header-top-left',
            'title'    => esc_html__( 'Header Top Left', 'truvik' ),
            'type'     => 'repeater',
            'subtitle' => wp_kses_post( esc_html( 'Add Contact Details', 'truvik' ) ),
            'required' => [ 'truvik-enable-header-top', '=', true ],
            'fields'   => [
                [
                    'id'         => 'truvik-header-top-left-title',
                    'title'      => 'Title',
                    'type'       => 'text',
                    'default'    => 'Email',
                    'validators' => 'textfield',
                ],
                [
                    'id'               => 'truvik-header-top-left-icon',
                    'title'            => 'Select contact icon',
                    'type'             => 'icon_select',
                    'default'          => 'fas fa-envelope',
                    'enqueue'          => true,
                    'enqueue_frontend' => true,
                ],
                [
                    'id'       => 'truvik-header-top-left-info',
                    'title'    => 'Enter Contact details',
                    'title'    => 'Enter your contact info like (email, phone number)',
                    'type'     => 'text',
                    'validate' => 'textfield',
                    'default'  => 'info@emample.com'
        
                ],
            ]
            
        ],
        [
            'id'          => 'truvik-enable-header-top-social',
            'type'        => 'checkbox',
            'title'       => esc_html__( 'Header Top Right', 'truvik' ),
            'subtitle'    => esc_html__( 'Enable/Disable Default style', 'truvik' ),
            'description' => esc_html__( 'if checked (custom style) otherwise default', 'truvik' ),
            'required'    => [ 'truvik-enable-header-top', '=', true ],
            'default'     => false,
        ],
        
        [
            'id'       => 'truvik-add-social-media-icons-here',
            'title'    => esc_html__( 'Social Media List', 'truvik' ),
            'type'     => 'repeater',
            'subtitle' => wp_kses_post( esc_html( 'Add Social Media', 'truvik' ) ),
            'required' => [ 'truvik-enable-header-top-social', '=', false ],
            'fields'   => [
                [
                    'id'         => 'truvik-social-link-text',
                    'title'      => 'Title',
                    'type'       => 'text',
                    'default'    => 'Facebook',
                    'validators' => 'textfield',
                ],
                [
                    'id'               => 'truvik-social-link-icon',
                    'title'            => 'social icon links',
                    'type'             => 'icon_select',
                    'default'          => 'fab fa-facebook-f',
                    'enqueue'          => true,
                    'enqueue_frontend' => true,
                    // 'stylesheet'       => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css',
                ],
                [
                    'id'       => 'truvik-social-link-validate',
                    'title'    => 'Social Url',
                    'type'     => 'text',
                    'validate' => ['url'],
                    'default'  => '#'
        
                ],
            ]
            
        ],
        
        
    ]
) );