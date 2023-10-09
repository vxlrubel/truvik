<section class="prt-row home01-fid-section bg-base-skin clearfix">
    <div class="container-fliud">
        <div class="row spacing-13 prt-vertical_sep">


            <?php
                global $truvik_options;
                $count = count($truvik_options['truvik-fid-repeater-title']);
                // $count = $truvik_options['truvik-fid-repeater-title'];
                for ($i=0; $i < $count; $i++) {
                    $title = $truvik_options['truvik-fid-repeater-title'][$i];
                    $description = $truvik_options['truvik-fid-repeater-description'][$i];
                    $counter = $truvik_options['truvik-fid-repeater-count'][$i];
                    ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <!-- prt-fid -->
                            <div class="prt-fid inside prt-fid-with-icon prt-fid-view-lefticon style2">
                                <div class="prt-fid-icon-wrapper">
                                    <i class="flaticon-office-building"></i>
                                </div>
                                <div class="prt-fid-contents">
                                    <h4 class="prt-fid-inner">
                                        <span   data-appear-animation="animateDigits" 
                                                data-from="0" 
                                                data-to="<?php echo $counter; ?>" 
                                                data-interval="5" 
                                                data-before="" 
                                                data-before-style="sup" 
                                                data-after="+" 
                                                data-after-style="sub" 
                                                class="numinate"><?php echo $counter; ?>
                                        </span>
                                    </h4>
                                </div>
                                <h3 class="prt-fid-title"><?php echo $title; ?></h3>
                                <div class="prt-fid-desc">
                                    <p><?php echo $description; ?></p>
                                </div>
                            </div><!-- prt-fid end -->
                        </div>

                    <?php
                } 
            ?>
            
        </div>
    </div>
</section>