<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Testmonial {
    
    // singletone instance_variable
    private static $instance;

    public function __construct(){

        add_action( 'init', [ $this, 'post_type_Testimonial' ] );

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
     * regoster new post type called "Testimonials".
     * post_type_Testimonials()
     *
     * @return void
     */
    public function post_type_Testimonial(){
        
        $labels = [
            'name'                  => _x( 'Testimonials', 'Post Type General Name', 'truvik' ),
            'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'truvik' ),
            'menu_name'             => __( 'Testimonials', 'truvik' ),
            'name_admin_bar'        => __( 'Testimonial', 'truvik' ),
            'archives'              => __( 'Testimonial Archives', 'truvik' ),
            'attributes'            => __( 'Testimonial Attributes', 'truvik' ),
            'parent_item_colon'     => __( 'Parent Testimonial:', 'truvik' ),
            'all_items'             => __( 'All Testimonials', 'truvik' ),
            'add_new_item'          => __( 'Add New Testimonial', 'truvik' ),
            'add_new'               => __( 'Add New', 'truvik' ),
            'new_item'              => __( 'New Testimonial', 'truvik' ),
            'edit_item'             => __( 'Edit Testimonial', 'truvik' ),
            'update_item'           => __( 'Update Testimonial', 'truvik' ),
            'view_item'             => __( 'View Testimonial', 'truvik' ),
            'view_items'            => __( 'View Testimonials', 'truvik' ),
            'search_items'          => __( 'Search Testimonial', 'truvik' ),
            'not_found'             => __( 'Not found', 'truvik' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'truvik' ),
            'featured_image'        => __( 'Featured Image', 'truvik' ),
            'set_featured_image'    => __( 'Set featured image', 'truvik' ),
            'remove_featured_image' => __( 'Remove featured image', 'truvik' ),
            'use_featured_image'    => __( 'Use as featured image', 'truvik' ),
            'insert_into_item'      => __( 'Insert into Testimonial', 'truvik' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'truvik' ),
            'items_list'            => __( 'Testimonials list', 'truvik' ),
            'items_list_navigation' => __( 'Testimonials list navigation', 'truvik' ),
            'filter_items_list'     => __( 'Filter Testimonials list', 'truvik' ),
        ];
        $args = [
            'label'                 => __( 'Testimonial', 'truvik' ),
            'description'           => __( 'Custom post type for Testimonials', 'truvik' ),
            'labels'                => $labels,
            'supports'              => [ 'title', 'thumbnail', 'editor', 'custom-fields' ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 8,
            'menu_icon'             => 'dashicons-superhero',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        ];

        register_post_type( 'testimonial', $args );
    }

}

Testmonial::init();
