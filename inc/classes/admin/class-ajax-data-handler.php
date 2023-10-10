<?php

namespace Truvik\Admin;

// directly acces denied.
defined('ABSPATH') || exit('You have no permission');

class Ajax_Assment_Data_Handler{
    // set singletone instance
    private static $instance;

    /**
     * default constructor
     * 
     * @return void
     */
    public function __construct(){

        // update action
        add_action( 'wp_ajax_update_assessment_form_data', [ $this, 'update_data_status' ] );

        // data deleation 
        add_action( 'wp_ajax_delete_assessment_form_data', [ $this, 'delete_data_from_table' ] );

        // data processing status
        add_action( 'wp_ajax_processing_assessment_data', [ $this, 'processing_assessment_data' ] );

        // data filtering
        add_action( 'wp_ajax_assessment_data_filtering', [ $this, 'assessment_data_filtering' ] );

        // expert filtered data from custom table
        add_action( 'wp_ajax_export_assessment_data', [ $this, 'export_assessment_data' ] );

        // filter by date
        add_action( 'wp_ajax_truvik_filter_by_date', [ $this, 'filter_by_date' ] );

    }

    /**
     * database status update
     * update_data_status()
     *
     * @return void
     */
    public function update_data_status(){

        global $wpdb;
    
        $table = $wpdb->prefix . 'applications';
    
        $id = intval($_POST['id']);
    
        $status = $_POST['status'];
    
        $where = [
            'id' => $id
        ];
        
        // approve assessment form data
        if( 'processing' == $status || 'rejected' == $status){
            $updated_data = [
                'set_status' => 'approved'
            ];
            $wpdb->update($table, $updated_data, $where);
    
            $response = $updated_data['set_status'];
        }
    
        wp_send_json_success( $response );
    }

    /**
     * delete assessment data from database
     * delete_data_from_table()
     *
     * @return void
     */
    public function delete_data_from_table(){


        global $wpdb;
    
        $table = $wpdb->prefix . 'applications';
    
        $id = intval($_POST['id']);
    
        $status = $_POST['status'];
    
        $where = [
            'id' => $id
        ];
        
        // approve assessment form data
        if( 'processing' == $status || 'approved' == $status ){
            $updated_data = [
                'set_status' => 'rejected',
            ];
            $wpdb->update($table, $updated_data, $where);
    
            $response = $updated_data['set_status'];
        }
    
        wp_send_json_success( $response );
        
    }

    /**
     * update status to processing from rejected and approved status
     * processing_assessment_data()
     *
     * @return void
     */
    public function processing_assessment_data(){

        global $wpdb;
    
        $table = $wpdb->prefix . 'applications';
    
        $id = intval($_POST['id']);
    
        $status = $_POST['status'];
    
        $where = [
            'id' => $id
        ];
        
        // update data status
        if( 'rejected' == $status || 'approved' == $status ){
            $updated_data = [
                'set_status' => 'processing',
            ];
            $wpdb->update($table, $updated_data, $where);
    
            $response = $updated_data['set_status'];
        }
    
        wp_send_json_success( $response );
    }

    /**
     * table data filtering
     * assessment_data_filtering()
     *
     * @return void
     */
    public function assessment_data_filtering(){

        global $wpdb;

        $response = '';

        $count = 1;

        $status = intval( $_POST['status'] );

        $table = $wpdb->prefix . 'applications';

        if( $status == 2 || $status == 1 || $status == 0 ){

            if( 2 == $status ){
                $set_status = 'rejected';
            }

            if( 1 == $status ){
                $set_status = 'approved';
            }

            if( 0 == $status ){
                $set_status = 'processing';
            }

            $query = "SELECT *, DATE(application_date) as date FROM $table WHERE set_status = '$set_status' ORDER BY application_date DESC";
        }
        if( $status == 3 ){
            $query = "SELECT *, DATE(application_date) as date FROM $table ORDER BY application_date DESC";
        }


        
        $results = $wpdb->get_results($query);

        $response .= _get_application_result( $results );

        wp_send_json_success( $response );
    }
     
    /**
     * retrive data from custom table called $wpdb->prefix. 'applications' table
     * expert_filtering_assessment_data()
     *
     * @return void
     */
    public function export_assessment_data(){

        check_ajax_referer( 'ajax_exporter', 'security' );

        global $wpdb;

        $status     = intval( $_POST['status'] );
        $table      = $wpdb->prefix . 'applications';
        $start_date = $_POST['start_date'];
        $end_date   = $_POST['end_date'];
        $csv_data   = "Submit Date,First Name,Last Name,Date of Birth,Age,Gender,Nationality,Country,City,Phone Number,Email Address,Inquiry Type,Occupation,Message,Status,Resume\n";
        if( ! empty( $start_date ) && ! empty( $end_date ) ){
            $query = $wpdb->prepare( "SELECT *, DATE(application_date) as submition_date FROM $table WHERE DATE(application_date) >= %s AND DATE(application_date) <= %s ORDER BY application_date DESC", $start_date, $end_date );
        }else{
            if( $status == 2 || $status == 1 || $status == 0 ){

                if( 2 == $status ){
                    $set_status = 'rejected';
                }

                if( 1 == $status ){
                    $set_status = 'approved';
                }

                if( 0 == $status ){
                    $set_status = 'processing';
                }

                $query = "SELECT *, DATE(application_date) as submition_date FROM $table WHERE set_status = '$set_status' ORDER BY application_date DESC";
            }
            if( $status == 3 ){
                $query = "SELECT *, DATE(application_date) as submition_date FROM $table ORDER BY application_date DESC";
            }
        }


        // execute the query
        $applications = $wpdb->get_results( $query );

        foreach ( $applications as $data ) {
            $csv_data .= "{$data->submition_date},{$data->first_name},{$data->last_name},{$data->dob},{$data->age},{$data->gender},{$data->nationality},{$data->country},{$data->city},{$data->phone_number},{$data->email_address},{$data->inquiry_type},{$data->occupation},{$data->text_message},{$data->set_status},{$data->assessment_resume}\n"; // Adjust columns accordingly
        }

        $filename = 'assessment-data.csv';

        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
        echo $csv_data;
        wp_die();
    }

    public function filter_by_date(){
        
        global $wpdb;

        $response = '';
        $count = 1;

        $table_name = "{$wpdb->prefix}applications";

        if( isset($_POST['action']) && $_POST['action'] == 'truvik_filter_by_date' ){
            if( ! empty($_POST['start']) ){
                $start_date = $_POST['start'];
            }else{
                $response = 'Please provide the start date.';
            }
            if( ! empty($_POST['end']) ){
                $end_date = $_POST['end'];
            }else{
                $response = 'Please provide the end date.';
            }
            $results = $wpdb->get_results( $wpdb->prepare( "SELECT *, DATE(application_date) as date FROM $table_name WHERE DATE(application_date) >= %s AND DATE(application_date) <= %s ORDER BY application_date DESC", $start_date, $end_date ) );
            
            $response .= _get_application_result( $results );
            
        }else{
            $response = 'You have no permission.';
        }

        wp_send_json_success( $response );
    }
    
    /**
     * singleton instance create
     * init()
     * @return void
     */
    public static function init(){
        if( is_null( self::$instance ) )
            self::$instance = new self();
        return self::$instance;
    }

}
// execute the ajax handler class
Ajax_Assment_Data_Handler::init();
