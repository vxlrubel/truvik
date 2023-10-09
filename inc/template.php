<?php

namespace Truvik;
// directly access denied
defined('ABSPATH') OR exit;

function primary_menu(){
    $args = [
        'container'            => '',
        'container_class'      => '',
        'container_id'         => '',
        'menu_class'           => 'menu',
        'walker'               => new \Truvik_Nav_Walker,
        'theme_location'       => 'primary-menu',
    ];

    has_nav_menu( 'primary-menu' ) ? wp_nav_menu( $args ) : '';
}

function secondary_menu(){
    $args = [
        'container'            => '',
        'container_class'      => '',
        'container_id'         => '',
        'menu_class'           => 'social-icons',
        'theme_location'       => 'secondary-menu',
    ];

    has_nav_menu( 'secondary-menu' ) ? wp_nav_menu( $args ) : '';
}
