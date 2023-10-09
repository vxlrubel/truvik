<?php


/**
 * DIRECTLY ACCESS DENIED ERROR
 */
defined('ABSPATH') OR exit( 'No direct script access' );

class Assessment_Form{
    public function __construct(){
        add_action( 'admin_menu', [ $this, 'assessment_menu'] );
    }

    /**
     * create admin menu called Assessment Form
     * assessment_menu()
     *
     * @return void
     */
    public function assessment_menu(){
        add_menu_page(
            'Assessment Form',                         // Page Title
            'Assessment Form',                         // Menu Title
            'manage_options',                          // Capability required to access the page
            'assessment-form',                         // Menu Slug
            [ $this, '_cb_display_assessment_form' ],  // Callback function to display the page content
            'dashicons-clipboard',                     // Icon URL or Dashicon class
            9                                          // Menu Position
        );
    }

    /**
     * render the assessment form data
     * _cb_display_assesment_form()
     *
     * @return void
     */
    public function _cb_display_assessment_form(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'applications'; // Replace with your table name

        $results = $wpdb->get_results("SELECT * FROM $table_name");
        echo '<div class="wrap">';
        echo '<h2>Assessment Form Data</h2>';

        if( ! empty($results) ){
            echo do_shortcode( '[display_custom_data]' );
        }else{
            echo "No results found";
        }

        echo '</div>';
    }

}

new Assessment_Form;

function display_custom_table_data_with_shortcode() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'applications';

    // $results = $wpdb->get_results("SELECT * FROM $table_name");
    // $results = $wpdb->get_results("SELECT *, DATE(application_date) as date FROM $table_name");
    $results = $wpdb->get_results("SELECT *, DATE(application_date) as date FROM $table_name ORDER BY application_date DESC");

    $all_count        = _get_assessment_count('all');
    $approved_count   = _get_assessment_count('approved');
    $processing_count = _get_assessment_count('processing');
    $rejected_count   = _get_assessment_count('rejected');
    
    ob_start(); ?>

        <ul class="subsubsub">
            <li>
                <a href="javascript:void(0)" class="current">All<span class="count" id="show-all-status">(<?php echo $all_count; ?>)</span></a> |
            </li>
            <li>
                <a href="javascript:void(0)" class="publish">Processing <span class="count" id="show-processing">(<?php echo $processing_count; ?>)</span></a> |
            </li>
            <li>
                <a href="javascript:void(0)" class="publish">Approved <span class="count" id="show-approved">(<?php echo $approved_count; ?>)</span></a> |
            </li>
            <li>
                <a href="javascript:void(0)" class="publish">Rejected <span class="count" id="show-rejected">(<?php echo $rejected_count; ?>)</span></a>
            </li>
        </ul>

        <div class="tablenav top">
            <div class="alignleft actions position-relative">
                <select id="filter-assessment-data">
                    <option value="3">All</option>
                    <option value="1">Approved</option>
                    <option selected="selected" value="0">Processing</option>
                    <option value="2">Rejected</option>
                </select>
                <!-- filtering button -->
                <input type="submit" id="filter-assessment-data-submit" class="button button-width" value="Apply Filter">
                <!-- export button -->
                <button type="button" class="button truvik-button px-15 export-button-position" id="filtered-assessment-data-export">Export</button>
            </div>
            <div class="alignleft actions">
                <input type="date" id="truvik-start-date" class="button button-width">
                <span style="display:inline-block;margin-top:2px;">&#8919;</span>
                <input type="date" id="truvik-start-end" class="button button-width">
                <input type="submit" id="filter-assessment-data-by-date" class="button button-width" value="Apply Filter">
            </div>
            <div class="tablenav-pages one-page">
                <span class="displaying-num">
                    <?php
                        if( $all_count == 0 )
                            $item = 'No Item Found';
                        if( $all_count == 1 )
                            $item = '1 item';
                        if( $all_count >= 1 )
                            $item = "{$all_count} items";
                        echo $item;
                    ?>
                </span>
            </div>
            <br class="clear">          
                                                
        </div>

        <table class="wp-list-table widefat fixed striped table-view-list pages">
            <!-- table header -->
            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column">
                        <a href="#" class="pl-10">ID</a>
                    </td>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Date</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Name</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Country</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Phone</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Email Address</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Inquiry Type</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Occupation</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Status</span></a>
                    </th>
                </tr>
            </thead>
            
            <!-- table body -->
            <tbody class="truvik-custom-table-list" id="stroed-filtered-data">
                <?php require_once dirname(__FILE__) . '/dataformat.php'; ?>
            </tbody>

            <!-- table footer -->
            <tfoot>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column">
                        <a href="#" class="pl-10">ID</a>
                    </td>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Date</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Name</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Country</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Phone</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Email Address</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Inquiry Type</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Occupation</span></a>
                    </th>
                    <th scope="col" class="manage-column">
                        <a href="#"><span>Status</span></a>
                    </th>
                </tr>
            </tfoot>
        </table>


    <?php return ob_get_clean();
}

add_shortcode('display_custom_data', 'display_custom_table_data_with_shortcode');


    