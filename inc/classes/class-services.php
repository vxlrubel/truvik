<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Services{
    
    // singletone instance_variable
    private static $instance;

    public function __construct(){

        add_action( 'init', [ $this, 'post_type_services' ] );

        add_action( 'init', [ $this, 'service_category_registers' ] );

        add_action( 'init', [ $this, 'service_tag_register' ] );

        
            

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
     * regoster new post type called "services".
     * post_type_services()
     *
     * @return void
     */
    public function post_type_services(){
        
        $labels = [
            'name'                  => _x( 'Services', 'Post Type General Name', 'truvik' ),
            'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'truvik' ),
            'menu_name'             => __( 'Services', 'truvik' ),
            'name_admin_bar'        => __( 'Service', 'truvik' ),
            'archives'              => __( 'Service Archives', 'truvik' ),
            'attributes'            => __( 'Service Attributes', 'truvik' ),
            'parent_item_colon'     => __( 'Parent Service:', 'truvik' ),
            'all_items'             => __( 'All Services', 'truvik' ),
            'add_new_item'          => __( 'Add New Service', 'truvik' ),
            'add_new'               => __( 'Add New', 'truvik' ),
            'new_item'              => __( 'New Service', 'truvik' ),
            'edit_item'             => __( 'Edit Service', 'truvik' ),
            'update_item'           => __( 'Update Service', 'truvik' ),
            'view_item'             => __( 'View Service', 'truvik' ),
            'view_items'            => __( 'View Services', 'truvik' ),
            'search_items'          => __( 'Search Service', 'truvik' ),
            'not_found'             => __( 'Not found', 'truvik' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'truvik' ),
            'featured_image'        => __( 'Featured Image', 'truvik' ),
            'set_featured_image'    => __( 'Set featured image', 'truvik' ),
            'remove_featured_image' => __( 'Remove featured image', 'truvik' ),
            'use_featured_image'    => __( 'Use as featured image', 'truvik' ),
            'insert_into_item'      => __( 'Insert into Service', 'truvik' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Service', 'truvik' ),
            'items_list'            => __( 'Services list', 'truvik' ),
            'items_list_navigation' => __( 'Services list navigation', 'truvik' ),
            'filter_items_list'     => __( 'Filter Services list', 'truvik' ),
        ];
        $args = [
            'label'                 => __( 'Service', 'truvik' ),
            'description'           => __( 'Custom post type for services', 'truvik' ),
            'labels'                => $labels,
            'supports'              => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
            'taxonomies'            => [ 'service_category' ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'menu_icon'             => 'dashicons-networking',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        ];

        register_post_type( 'services', $args );
    }

    public function service_category_registers(){
        $labels = array(
            'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'truvik' ),
            'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'truvik' ),
            'menu_name'                  => __( 'Categories', 'truvik' ),
            'all_items'                  => __( 'All Categories', 'truvik' ),
            'parent_item'                => __( 'Parent Category', 'truvik' ),
            'parent_item_colon'          => __( 'Parent Category:', 'truvik' ),
            'new_item_name'              => __( 'New Category Name', 'truvik' ),
            'add_new_item'               => __( 'Add New Category', 'truvik' ),
            'edit_item'                  => __( 'Edit Category', 'truvik' ),
            'update_item'                => __( 'Update Category', 'truvik' ),
            'view_item'                  => __( 'View Category', 'truvik' ),
            'separate_items_with_commas' => __( 'Separate categories with commas', 'truvik' ),
            'add_or_remove_items'        => __( 'Add or remove categories', 'truvik' ),
            'choose_from_most_used'      => __( 'Choose from the most used categories', 'truvik' ),
            'popular_items'              => __( 'Popular Categories', 'truvik' ),
            'search_items'               => __( 'Search Categories', 'truvik' ),
            'not_found'                  => __( 'Not Found', 'truvik' ),
            'no_terms'                   => __( 'No categories', 'truvik' ),
            'items_list'                 => __( 'Categories list', 'truvik' ),
            'items_list_navigation'      => __( 'Categories list navigation', 'truvik' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'service_category', ['services'], $args );
    }

    public function service_tag_register(){
        $labels = [
            'name'                       => _x( 'Service Tags', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Service Tag', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Tags', 'text_domain' ),
            'all_items'                  => __( 'All Tags', 'text_domain' ),
            'parent_item'                => __( 'Parent Tag', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Tag:', 'text_domain' ),
            'new_item_name'              => __( 'New Tag Name', 'text_domain' ),
            'add_new_item'               => __( 'Add New Tag', 'text_domain' ),
            'edit_item'                  => __( 'Edit Tag', 'text_domain' ),
            'update_item'                => __( 'Update Tag', 'text_domain' ),
            'view_item'                  => __( 'View Tag', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate tags with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove tags', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used tags', 'text_domain' ),
            'popular_items'              => __( 'Popular Tags', 'text_domain' ),
            'search_items'               => __( 'Search Tags', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
            'no_terms'                   => __( 'No tags', 'text_domain' ),
            'items_list'                 => __( 'Tags list', 'text_domain' ),
            'items_list_navigation'      => __( 'Tags list navigation', 'text_domain' ),
        ];
        $args = [
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        ];
        register_taxonomy( 'service_tag', ['services'], $args );
    }

}

Services::init();
