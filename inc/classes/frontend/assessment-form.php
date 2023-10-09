<?php

// directly access denied

defined('ABSPATH') || exit; ?>

<div class="container">
    <form class="assessment-form" action="" enctype="multipart/form-data" method="POST">
        <?php wp_nonce_field( 'truvik_assessment_form_nonce', 'truvik_assessment_form_nonce_field' ); ?>
        <div class="row">
            <div class="col-md-6">
                <label for="firstName">First Name</label>
                <input type="text" placeholder="First Name" id="firstName" name="first_name" required="true">
            </div>
            <div class="col-md-6">
                <label for="lastName">Last Name</label>
                <input type="text" placeholder="Last Name" id="lastName" name="last_name" required="true">
            </div>
            <!-- death of birth -->
            <div class="col-md-4">
                <label for="dob">Date of Birth</label>
                <input type="date" placeholder="Date Of Birth" id="dob" name="dob" required="true">
            </div>
            <div class="col-md-4">
                <label for="age">Age:</label>
                <input type="number" placeholder="25" id="age" min="18" max="99" step="1" name="age" required="true">
            </div>
            <div class="col-md-4">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required="true">
                    <option value="">---Select Gender----</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="nationality">Nationality:</label>
                <input type="text" placeholder="Nationality" id="nationality" name="nationality" required="true">
            </div>
            <div class="col-md-4">
                <label for="country">Country:</label>
                <input type="text" placeholder="Country" id="country" name="country" required="true">
            </div>
            <div class="col-md-4">
                <label for="city">City:</label>
                <input type="text" placeholder="City" id="city" name="city" required="true">
            </div>
            <div class="col-md-6">
                <label for="phoneNumber">Phone Number:</label>
                <input required type="number" name="phone_number" placeholder="Phone Number" id="phoneNumber" placeholder="123456789" min="55555" max="9999999999999">
            </div>
            <div class="col-md-6">
                <label for="emailAddress">Email Address:</label>
                <input type="email" placeholder="Email Address" id="emailAddress" name="email_address" required="true">
            </div>
            <div class="col-md-6">
                <label for="inqueryType">Inquiry Type:</label>
                <select name="inquiry_type" id="inqueryType" required="true">
                    <option value="">---Inquiry Type---</option>
                    <option value="Aged Parent">Aged Parent</option>
                    <option value="Business Innovation">Business Innovation</option>
                    <option value="Child Visa">Child Visa</option>
                    <option value="Contributory Parent">Contributory Parent</option>
                    <option value="Employer Nomination">Employer Nomination</option>
                    <option value="New Zealand Citizen Family relationship">New Zealand Citizen Family relationship</option>
                    <option value="Others">Others</option>
                    <option value="Parent Visa">Parent Visa</option>
                    <option value="Partner offshore">Partner offshore</option>
                    <option value="Partner onshore">Partner onshore</option>
                    <option value="Prospective Marriage">Prospective Marriage</option>
                    <option value="Regional Sponsor Migration Scheme">Regional Sponsor Migration Scheme</option>
                    <option value="Skilled Independent">Skilled Independent</option>
                    <option value="Skilled Nominated">Skilled Nominated</option>
                    <option value="Skilled Regional">Skilled Regional</option>
                    <option value="Temporary Work">Temporary Work</option>
                    <option value="Visitor Visa">Visitor Visa</option>
                    <option value="Working Holiday">Working Holiday</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="occupation">Occupation: </label>
                <input type="text" placeholder="Occupation" id="occupation" name="occupation" required="true" >
            </div>
            <div class="col-12">
                <label for="textMessage">Message: </label>
                <textarea name="text_message" id="textMessage" placeholder="Write Your Message" required="true"></textarea>
            </div>

            <div class="col-12">
                <label>Upload Resume</label>
                <input type="file" required="true" id="resume_upload" accept=".doc, .docs, .pdf"name="assessment_resume" class="form-control border-none shadow-none">
            </div>

            <div class="col-12">
                <input type="submit" class="truvik-radius" value="Submit Here" name="submit_assessment_form" id="submit_assessment_form">
            </div>
        </div>
    </form>

</div>