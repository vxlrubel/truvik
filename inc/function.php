<?php

/**
 * DIRECTRY ACCESS DENIED
 */
defined('ABSPATH') OR exit('No direct script access');

if( ! function_exists('pr') ){
    function pr( $args ){
        echo '<pre>';
        print_r( $args );
        echo '</pre>';
    }
}

/**
 * get count of the row of status from custom table called applications
 *
 * @param string $status
 * @return void
 */
if( ! function_exists('_get_assessment_count') ){

    function _get_assessment_count( $status = 'all' ){
        global $wpdb;
        $table = "{$wpdb->prefix}applications";
        if( $status == 'all' ){
            $query = "SELECT id FROM $table";
        }else{
            $query = "SELECT id FROM $table WHERE set_status ='$status'";
        }

        $count = intval( count( $wpdb->get_results( $query ) ) );

        return $count;
        
    }
}