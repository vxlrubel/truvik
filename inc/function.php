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

/**
 * get data from database
 *
 * @param [type] $query
 * @return response
 */
if( ! function_exists('_get_application_result') ){
    function _get_application_result( $query ){
        $results = $query;
        if( $results ){
            foreach( $results as $row ){
                ob_start(); ?>
                    <tr class="filter-status-<?php echo $row->set_status; ?>">
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

                <?php $response .= ob_get_clean();
                
            }
        }else{
            $response = "<tr><td colspan=\"9\">No results found.</td></tr>";
        }
        return $response;
    }
}