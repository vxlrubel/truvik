<?php
// require_once dirname(__FILE__) . '/dataformat.php';

$start_date = '2020-08-01';
$end_date = '2022-10-16';

$applications = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT *, DATE(application_date) as application_date FROM $table_name WHERE DATE(application_date) >= %s AND DATE(application_date) <= %s ORDER BY application_date DESC",
        $start_date,
        $end_date
    )
);

foreach ( $applications as $application ) {
    echo $application->application_date;
    # code...
}






// ajax data search

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



// status filter
if ( $results ) {
    foreach ($results as $row ) {
        ob_start();
        ?>
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
        <?php

        $response .= ob_get_clean();
    }
} else {
    $response = "<tr><td colspan=\"9\">No results found.</td></tr>";
    
}