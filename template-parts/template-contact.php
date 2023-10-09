<?php 
/*
Template Name: Contact
*/
get_header(); 
?>
        <div class="prt-titlebar-wrapper prt-bg about-img" style="background-image:url(<?php Truvik\Post::thumbnail_url(); ?>); ">
            <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
            <div class="prt-titlebar-wrapper-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="prt-page-title-row-heading">
                                <div class="page-title-heading">
                                    <h2 class="title"><?php wp_title( '' );?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
        

        <!--site-main start-->
        <div class="site-main">

            <!-- contact-form-section -->
            <section class="prt-row padding_bottom_zero-section contact-us-contact-form-section clearfix">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="col-bg-img-thirty-seven prt-bg prt-col-bgimage-yes col-bg-img-six">
                                <div class="prt-col-wrapper-bg-layer prt-bg-layer" style="background-image:url(<?php echo get_template_directory_uri(). '/assets/img/contact.png'; ?>)"></div>
                                <div class="layer-content"></div>                           
                            </div>
                            
                            <img class="img-fluid prt-equal-height-image" src="<?php echo get_template_directory_uri(). '/assets/img/contact.png'; ?>" alt="col-bgimage-37">
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-base-grey spacing-25">
                                <!-- section title -->
                                <div class="section-title style7">
                                    <div class="title-header">
                                        <h2 class="title">Have be any question? <br>feel free to <span>Contact</span></h2>
                                    </div>
                                </div><!-- section title end -->

                                <?php echo do_shortcode( '[contact-form-7 id="5a60d6a" title="Contact Form"]' ); ?>
                                <form action="#" class="contact_form clearfix" method="post">

                                    
                                    <!-- <div class="row">
                                        <h3>Personal Information:</h3>
                                        <div class="col-md-6 col-lg-12">               
                                            <input name="fname" type="text" value="" placeholder="First Name" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">                  
                                            <input name="lname" type="text" value="" placeholder="Last Name" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">                  
                                            <input name="dob" type="date" value="" placeholder="Date of Birth" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">                  
                                            <input name="number" type="text" value="" placeholder="Age" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <select name="sex" id="">
                                                <option value="male">---Select Gender---</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 col-lg-12">                  
                                            <input name="nationality" type="text" value="" placeholder="Nationality" required="required">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h3>Contact Information:</h3>

                                        <div class="col-md-6 col-lg-12">
                                            <input name="country" type="text" value="" placeholder="Country Name:" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <input name="city" type="text" value="" placeholder="City:" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <input name="phone-number" type="text" value="" placeholder="Phone Number" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <input name="email" type="email" value="" placeholder="Email Address:" required="required">
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <select name="inquiry-type" id="">
                                                <option value="">---Inquiry Type---</option>
                                                <option value="aged-parent">Aged Parent</option>
                                                <option value="business-innovation">Business Innovation</option>
                                                <option value="child-visa">Child Visa</option>
                                                <option value="contributory-parent">Contributory Parent</option>
                                                <option value="Employer-nomination">Employer Nomination</option>
                                                <option value="nz-citizen-family">New Zealand Citizen Family relationship</option>
                                                <option value="others">Others</option>
                                                <option value="parent-visa">Parent Visa</option>
                                                <option value="partner-offstore">Partner offshore</option>
                                                <option value="partner-onstore">Partner onshore</option>
                                                <option value="prosperctive-marriage">Prospective Marriage</option>
                                                <option value="regional-schema">Regional Sponsor Migration Scheme</option>
                                                <option value="skilled-independent">Skilled Independent</option>
                                                <option value="skilled-nominated">Skilled Nominated</option>
                                                <option value="skilled-region">Skilled Regional</option>
                                                <option value="temporary-works">Temporary Work</option>
                                                <option value="visitor-visa">Visitor Visa</option>
                                                <option value="working-holidy">Working Holiday</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-lg-12">
                                            <input name="occupation" type="text" value="" placeholder="Occupation" required="required">
                                        </div>
                                        <div class="col-md-12">
                                            <textarea name="message" rows="4" placeholder="Your Message" required="required"></textarea>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" accept=".pdf, .docs, .doc" id="opend-upload-box" class="d-none">
                                            <button type="button" id="upload-resume" class=" prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor">Upload Resume</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="submit prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor" type="submit" value="submit">Submit Here</button> 
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                        </div>                        
                    </div>
                </div>
            </section>
            <!-- contact-form-section-end -->

        </div><!-- site-main end-->

<?php get_footer(); ?>