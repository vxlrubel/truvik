<?php

/**
 * directrly access denied no one can acces this file firectly.
 */
defined('ABSPATH') OR exit('No direct access allowed');

// Hook into theme activation
// Hook into theme activation
function truvik_theme_activation() {
    
    global $wpdb;

    $table_name = $wpdb->prefix . 'applications';

    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name;

    // If the table doesn't exist, create it
    if (!$table_exists) {

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            first_name VARCHAR(255),
            last_name VARCHAR(255),
            dob VARCHAR(255),
            age VARCHAR(255),
            gender VARCHAR(255),
            nationality VARCHAR(255),
            country VARCHAR(255),
            city VARCHAR(255),
            phone_number VARCHAR(255),
            email_address VARCHAR(255),
            inquiry_type VARCHAR(255),
            occupation VARCHAR(255),
            text_message TEXT,
            set_status VARCHAR(255),
            assessment_resume VARCHAR(255),
            application_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        dbDelta($sql);
    }
}

add_action('after_setup_theme', 'truvik_theme_activation');


// create form

function _generate_assessment_form() {

    wp_nonce_field( basename(__FILE__), 'assessment_submition_form' );

    ob_start(); 

    // include the assessment form
    require_once dirname(__FILE__). '/classes/frontend/assessment-form.php';

    return ob_get_clean();
}
add_shortcode('truvik_application_form', '_generate_assessment_form');



// insert the data into the table 
// Hook for form submission handling
// add_action('init', 'process_custom_form')


add_action('template_redirect', 'process_custom_form');
// add_action('init', 'process_custom_form');

function process_custom_form() {
    
    global $wpdb, $truvik_options;

    if( $_SERVER['REQUEST_METHOD'] == 'POST') {
        if( isset( $_POST['truvik_assessment_form_nonce_field'] ) && wp_verify_nonce( $_POST['truvik_assessment_form_nonce_field'], 'truvik_assessment_form_nonce' )){

            $first_name    = sanitize_text_field($_POST['first_name']);
            $last_name     = sanitize_text_field($_POST['last_name']);
            $dob           = sanitize_text_field($_POST['dob']);
            $age           = sanitize_text_field($_POST['age']);
            $gender        = sanitize_text_field($_POST['gender']);
            $nationality   = sanitize_text_field($_POST['nationality']);
            $country       = sanitize_text_field($_POST['country']);
            $city          = sanitize_text_field($_POST['city']);
            $phone_number  = sanitize_text_field($_POST['phone_number']);
            $email_address = sanitize_email($_POST['email_address']);
            $inquiry_type  = sanitize_text_field($_POST['inquiry_type']);
            $occupation    = sanitize_text_field($_POST['occupation']);
            $text_message  = sanitize_textarea_field($_POST['text_message']);
            $set_status    = sanitize_text_field('processing');
            $assessment    = $_FILES[ 'assessment_resume' ];
            $upload_dir    = wp_upload_dir();
            $target_dir    = $upload_dir['basedir'] . '/assessment/';
    
            // Ensure the target directory exists
            wp_mkdir_p($target_dir);
    
            // Generate a unique file name
            $file_name = wp_unique_filename($target_dir, $assessment['name']);
    
            // Move the uploaded file to the target directory
            $target_path = $target_dir . $file_name;
    
            // upload the file inside the assessment directory
            move_uploaded_file($assessment['tmp_name'], $target_path);
            $table_name = $wpdb->prefix . 'applications';
            
            $insert_data = $wpdb->insert(
                $table_name,
                array(
                    'first_name'        => $first_name,
                    'last_name'         => $last_name,
                    'dob'               => $dob,
                    'age'               => $age,
                    'gender'            => $gender,
                    'nationality'       => $nationality,
                    'country'           => $country,
                    'city'              => $city,
                    'phone_number'      => $phone_number,
                    'email_address'     => $email_address,
                    'inquiry_type'      => $inquiry_type,
                    'occupation'        => $occupation,
                    'text_message'      => $text_message,
                    'set_status'        => $set_status,
                    'assessment_resume' => $file_name
                )
            );
            /**
             * check the data
             * 
             */
    
            if( $insert_data === false ){
                
                echo 'failed: '. $wpdb->last_error;
    
            }else{
                // send mail here code
                $email_template = get_template_directory() . '/inc/email-template/submit-user.html';
                $admin_template = get_template_directory() . '/inc/email-template/submit-admin.html';
    
                $site_url = esc_url( get_home_url('/'));
                $logo_url = $truvik_options['truvik-email-template-logo-url']['url'];
    
                $name = "{$first_name} {$last_name}";
                
                $to      = $email_address;
                $subject = $truvik_options['truvik-candidate-subject'];
                $message = file_get_contents( $email_template );
                $message = str_replace( '{{name}}', $name, $message );
                $message = str_replace( '{{site_url}}', $site_url, $message );
                $message = str_replace( '{{logo_url}}', $logo_url, $message );
                $headers = array('Content-Type: text/html; charset=UTF-8');
    
                $send    = wp_mail( $to, $subject, $message, $headers );
    
    
                // send to admin
                $admin_to      = $truvik_options['truvik-admin-email'];
                $admin_subject = $truvik_options['truvik-admin-subject'];
                $admin_name    = $truvik_options['truvik-admin-name-set'];
                $current_date  = date('Y-m-d');
                $current_time  = date('H:i:s');
                $time          = "{$current_date}:{$current_time}";
                $form_id       = uniqid('cilca_');
                $admin_message = file_get_contents( $admin_template );
                $admin_message = str_replace( '{{admin_name}}', $admin_name, $admin_message );
                $admin_message = str_replace( '{{date_time}}', $current_date, $admin_message );
                $admin_message = str_replace( '{{subject}}', $inquiry_type, $admin_message );
                $admin_message = str_replace( '{{name}}', $name, $admin_message );
                $admin_message = str_replace( '{{email_address}}', $email_address, $admin_message );
                $admin_message = str_replace( '{{phone_number}}', $phone_number, $admin_message );
                $admin_message = str_replace( '{{site_url}}', $site_url, $admin_message );
                $admin_message = str_replace( '{{logo_url}}', $logo_url, $admin_message );
    
                $send_admin    = wp_mail( $admin_to, $admin_subject, $admin_message, $headers );
                
                // redirect after email send successfull
                if( $send && $send_admin ){
                    wp_redirect(esc_url( $truvik_options['truvik-assessment-form-redirect'] ));
                    exit;
                }
                       
            }
        }else{
            echo 'Failed nonce varification.';
        }

    }
}
