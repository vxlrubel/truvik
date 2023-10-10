<?php


// directly access denied
defined('ABSPATH') || exit; ?>

<?php $count = 1; ?>
<?php foreach ( $results as $row ) :
    $upload_dir = wp_upload_dir();
    $resume_url = $upload_dir['baseurl'] . '/assessment/' . $row->assessment_resume; ?>
    <tr class="set-status-<?php echo $row->set_status;?>">
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

                <!-- modal view button -->
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
                            <div class="text-capitalize py-2">
                                Submit Date
                            </div>
                        </div>
                        <div class="col-9 border">
                            <div class="text-capitalize py-2">
                                <?php echo $row->date; ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row px-2">
                        <div class="col-3 border">
                            <div class="text-capitalize py-2">Resume</div>
                        </div>
                        <div class="col-9 border">
                            <div class="text-capitalize py-2">
                                <a href="<?php echo esc_url($resume_url); ?>" target="_blank"> View Resume</a>
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
    
    
<?php endforeach; ?>
