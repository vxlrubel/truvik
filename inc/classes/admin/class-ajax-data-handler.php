<?php

namespace Truvik\Admin;
/**
 * directories access denied 
 */
defined('ABSPATH') OR exit('No direct script access allowed');

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

            $query = "SELECT *, DATE(application_date) as date FROM $table WHERE set_status = '$set_status'";
        }
        if( $status == 3 ){
            $query = "SELECT *, DATE(application_date) as date FROM $table";
        }


        
        $results = $wpdb->get_results($query);

        if ( $results ) {
            foreach ($results as $row ) {
                ob_start();
                ?>
                    <tr>
                        <th scope="row" class="check-column">
                                <a href="#" class="pl-10"><?php echo $count++; ?></a>
                        </th>
                        <td class="column-title">
                            <strong>
                                <a class="row-title" href="javascript:void(0)"><?php echo $row->date; ?></a>
                            </strong>
                        </td>
                        <td class="column-title approve-parent">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->first_name .' '. $row->last_name; ?></a></strong>
                            <div class="row-actions">
                                <span class="edit">
                                    <a class="assessment-data-approve" href="javascript:void(0)" data-assessment="<?php echo $row->id; ?>">Approve</a> | 
                                </span>
                                <span class="view"> | <a href="javascript:void(0)" class="assessment-data-processing" data-assessment="<?php echo $row->id; ?>" >Processing</a></span>
                                <span class="trash">
                                    <a class="assessment-data-reject submitdelete" href="javascript:void(0)"   data-assessment="<?php echo $row->id; ?>">Reject</a>
                                </span>
                                <span class="view">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#popup-user-details-<?php echo $row->id; ?>">View Details</a>
                                </span>
                            </div>
                        </td>
                        <td class="column-title">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->country; ?></a></strong>
                            <div class="row-actions">
                                <span class="view">
                                    <a href="<?php echo esc_url($resume_url); ?>" download>Download Resume</a>
                                </span>
                            </div>
                        </td>
                        <td class="column-title">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->phone_number; ?></a></strong>
                            <div class="row-actions">
                                <span class="view">
                                    <a href="<?php echo esc_url($resume_url); ?>" target="_blank">View Resume</a>
                                </span>
                            </div>
                        </td>
                        <td class="column-title">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->email_address; ?></a></strong>
                        </td>
                        <td class="column-title">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->inquiry_type; ?></a></strong>
                        </td>
                        <td class="column-title">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->occupation; ?></a></strong>
                        </td>
                        <td class="column-title target-parent">
                            <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->set_status; ?></a></strong>
                        </td>
                        
                    </tr>

                    <div class="modal fade" id="popup-user-details-<?php echo $row->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-capitalize" id="staticBackdropLabel">Details of <?php echo $row->first_name .' '. $row->last_name; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">Name</div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2"><?php echo $row->first_name .' '. $row->last_name; ?></div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">DOB</div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->dob; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">Age</div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->age; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">Gender</div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->gender; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Nationality
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->nationality; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Country
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->country; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                City
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->city; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Phone
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->phone_number; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Email
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="py-2">
                                                <?php echo $row->email_address; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Inquiry Type
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->inquiry_type; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Occupation
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->occupation; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Message
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->text_message; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">
                                                Status
                                            </div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <?php echo $row->set_status; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row px-2">
                                        <div class="col-3 border">
                                            <div class="text-capitalize py-2">Resume</div>
                                        </div>
                                        <div class="col-9 border">
                                            <div class="text-capitalize py-2">
                                                <a href="<?php echo esc_url($resume_url); ?>" download> Download </a>
                                                <span> / </span>
                                                <a href="<?php echo esc_url($resume_url); ?>"> View</a>
                                            </div>
                                        </div>
                                    </div>
                                

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="button truvik-button-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="button truvik-button download-info" data-id="<?php echo $row->id; ?>">
                                        <a href="<?php echo esc_url($resume_url); ?>" download style="color: white;">Download Resume</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php

                $response .= ob_get_clean();
            }
        } else {
            $response = "<tr><td colspan=\"9\">No results found.</td></tr>";
            
        }
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
            if( $results ){
                foreach( $results as $row ){
                    ob_start(); ?>
                        <tr>
                            <th scope="row" class="check-column">
                                    <a href="#" class="pl-10"><?php echo $count++; ?></a>
                            </th>
                            <td class="column-title">
                                <strong>
                                    <a class="row-title" href="javascript:void(0)"><?php echo $row->date; ?></a>
                                </strong>
                            </td>
                            <td class="column-title approve-parent">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->first_name .' '. $row->last_name; ?></a></strong>
                                <div class="row-actions">
                                    <span class="edit">
                                        <a class="assessment-data-approve" href="javascript:void(0)" data-assessment="<?php echo $row->id; ?>">Approve</a> | 
                                    </span>
                                    <span class="view"> | <a href="javascript:void(0)" class="assessment-data-processing" data-assessment="<?php echo $row->id; ?>" >Processing</a></span>
                                    <span class="trash">
                                        <a class="assessment-data-reject submitdelete" href="javascript:void(0)"   data-assessment="<?php echo $row->id; ?>">Reject</a>
                                    </span>
                                    <span class="view">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#popup-user-details-<?php echo $row->id; ?>">View Details</a>
                                    </span>
                                </div>
                            </td>
                            <td class="column-title">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->country; ?></a></strong>
                                <div class="row-actions">
                                    <span class="view">
                                        <a href="<?php echo esc_url($resume_url); ?>" download>Download Resume</a>
                                    </span>
                                </div>
                            </td>
                            <td class="column-title">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->phone_number; ?></a></strong>
                                <div class="row-actions">
                                    <span class="view">
                                        <a href="<?php echo esc_url($resume_url); ?>" target="_blank">View Resume</a>
                                    </span>
                                </div>
                            </td>
                            <td class="column-title">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->email_address; ?></a></strong>
                            </td>
                            <td class="column-title">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->inquiry_type; ?></a></strong>
                            </td>
                            <td class="column-title">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->occupation; ?></a></strong>
                            </td>
                            <td class="column-title target-parent">
                                <strong><a class="row-title" href="javascript:void(0)"><?php echo $row->set_status; ?></a></strong>
                            </td>
                            
                        </tr>

                        <div class="modal fade" id="popup-user-details-<?php echo $row->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-capitalize" id="staticBackdropLabel">Details of <?php echo $row->first_name .' '. $row->last_name; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">Name</div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2"><?php echo $row->first_name .' '. $row->last_name; ?></div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">DOB</div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->dob; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">Age</div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->age; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">Gender</div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->gender; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Nationality
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->nationality; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Country
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->country; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    City
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->city; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Phone
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->phone_number; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Email
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="py-2">
                                                    <?php echo $row->email_address; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Inquiry Type
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->inquiry_type; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Occupation
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->occupation; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Message
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->text_message; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">
                                                    Status
                                                </div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <?php echo $row->set_status; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row px-2">
                                            <div class="col-3 border">
                                                <div class="text-capitalize py-2">Resume</div>
                                            </div>
                                            <div class="col-9 border">
                                                <div class="text-capitalize py-2">
                                                    <a href="<?php echo esc_url($resume_url); ?>" download> Download </a>
                                                    <span> / </span>
                                                    <a href="<?php echo esc_url($resume_url); ?>"> View</a>
                                                </div>
                                            </div>
                                        </div>
                                    

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="button truvik-button-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="button truvik-button download-info" data-id="<?php echo $row->id; ?>">
                                            <a href="<?php echo esc_url($resume_url); ?>" download style="color: white;">Download Resume</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php $response .= ob_get_clean();
                
                }
            }else{
                $response = "<tr><td colspan=\"9\">No results found.</td></tr>";
            }
            
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
Ajax_Assment_Data_Handler::init();
