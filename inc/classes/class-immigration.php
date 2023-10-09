<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Immigration {
    
    // singletone instance_variable
    private static $instance;

    public function __construct(){

        add_action( 'init', [ $this, 'post_type_immigration' ] );

        
            

    }

    /**
     * singletone instance
     *
     * @return void
     */
    public static function init(){
        if( is_null( self::$instance )){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * regoster new post type called "Immigrations".
     * post_type_Immigrations()
     *
     * @return void
     */
    public function post_type_immigration(){
        
        $labels = [
            'name'                  => _x( 'Immigrations', 'Post Type General Name', 'truvik' ),
            'singular_name'         => _x( 'Immigration', 'Post Type Singular Name', 'truvik' ),
            'menu_name'             => __( 'Immigrations', 'truvik' ),
            'name_admin_bar'        => __( 'Immigration', 'truvik' ),
            'archives'              => __( 'Immigration Archives', 'truvik' ),
            'attributes'            => __( 'Immigration Attributes', 'truvik' ),
            'parent_item_colon'     => __( 'Parent Immigration:', 'truvik' ),
            'all_items'             => __( 'All Immigrations', 'truvik' ),
            'add_new_item'          => __( 'Add New Immigration', 'truvik' ),
            'add_new'               => __( 'Add New', 'truvik' ),
            'new_item'              => __( 'New Immigration', 'truvik' ),
            'edit_item'             => __( 'Edit Immigration', 'truvik' ),
            'update_item'           => __( 'Update Immigration', 'truvik' ),
            'view_item'             => __( 'View Immigration', 'truvik' ),
            'view_items'            => __( 'View Immigrations', 'truvik' ),
            'search_items'          => __( 'Search Immigration', 'truvik' ),
            'not_found'             => __( 'Not found', 'truvik' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'truvik' ),
            'featured_image'        => __( 'Featured Image', 'truvik' ),
            'set_featured_image'    => __( 'Set featured image', 'truvik' ),
            'remove_featured_image' => __( 'Remove featured image', 'truvik' ),
            'use_featured_image'    => __( 'Use as featured image', 'truvik' ),
            'insert_into_item'      => __( 'Insert into Immigration', 'truvik' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Immigration', 'truvik' ),
            'items_list'            => __( 'Immigrations list', 'truvik' ),
            'items_list_navigation' => __( 'Immigrations list navigation', 'truvik' ),
            'filter_items_list'     => __( 'Filter Immigrations list', 'truvik' ),
        ];
        $args = [
            'label'                 => __( 'Immigration', 'truvik' ),
            'description'           => __( 'Custom post type for Immigrations', 'truvik' ),
            'labels'                => $labels,
            'supports'              => [ 'title', 'thumbnail' ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-nametag',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        ];

        register_post_type( 'immigration', $args );
    }

}

Immigration::init();
