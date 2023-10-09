<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Team_Member{
    
    // singletone instance_variable
    private static $instance;

    public function __construct(){
        add_action( 'init', [ $this, 'team_memeber' ] );
            

    }

    public static function get_instance(){
        if( is_null( self::$instance )){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function team_memeber(){
        $labels = array(
            'name'                  => 'Team Members',
            'singular_name'         => 'Team Member',
            'menu_name'             => 'Team Members',
            'add_new'               => 'Add New',
            'add_new_item'          => 'Add New Member',
            'edit_item'             => 'Edit Team Member',
            'new_item'              => 'New Team Member',
            'view_item'             => 'View Team Member',
            'view_items'            => 'View Team Members',
            'search_items'          => 'Search Team Members',
            'not_found'             => 'No Team Member found',
            'not_found_in_trash'    => 'No Team Members found in Trash',
            'parent_item_colon'     => 'Parent Team Member:',
            'all_items'             => 'All Members',
            'archives'              => 'Team Member Archives',
            'attributes'            => 'Team Member Attributes',
            'insert_into_item'      => 'Insert into Team Member',
            'uploaded_to_this_item' => 'Uploaded to this Team Member',
            'featured_image'        => 'Team Member Cover Image',
            'set_featured_image'    => 'Set Team Member cover image',
            'remove_featured_image' => 'Remove Team Member cover image',
            'use_featured_image'    => 'Use as Team Member cover image',
            'filter_items_list'     => 'Filter Team Member list',
            'items_list_navigation' => 'Team Member list navigation',
            'items_list'            => 'Team Member list',
        );
        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'team-member' ), // Replace 'books' with your desired URL slug
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => false,
            'menu_position'         => 5,
            'supports'              => array( 'title', 'thumbnail' ),
            'menu_icon'             => 'dashicons-groups'
        );
        register_post_type( 'team_member', $args );
    }

}

Team_Member::get_instance();
