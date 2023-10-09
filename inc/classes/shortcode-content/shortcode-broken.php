<section class="prt-row padding_zero-section broken-section bg-layer-equal-height clearfix">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6">
                <!-- col-img-img-two -->
                <div class="col-bg-img-one prt-bg prt-col-bgimage-yes prt-left-span z-index-2">
                    <div class="prt-col-wrapper-bg-layer prt-bg-layer" style="background-image:url(<?php echo $atts['image']; ?>)"></div>
                    <div class="layer-content position-relative">
                        <div class="row">
                            <div class="col-xl-7 col-lg-12"></div>
                            <div class="col-xl-5 col-lg-12 res-991-pl-0 res-991-pr-0">
                                <div class="services-info-fid">

                                    <?php foreach ( $atts['count'] as $count ) : ?>
                                        <div class="prt-fid inside style1 bg-base-skin">
                                            <div class="prt-fid-contents text-base-white">
                                                <h4 class="prt-fid-inner">
                                                    <span   data-appear-animation="animateDigits" 
                                                            data-from="0" 
                                                            data-to="<?php echo $count['number']; ?>" 
                                                            data-interval="50" 
                                                            data-before="" 
                                                            data-before-style="sup" 
                                                            data-after="+"
                                                            data-after-style="sub" 
                                                            class="numinate"><?php echo $count['number']; ?>
                                                    </span>
                                                </h4>
                                                <h3 class="prt-fid-title"><?php echo $count['text']; ?></h3>
                                            </div>
                                        </div> 
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
            <div class="col-lg-6">
                <!-- col-img-img-two -->
                <div class="prt-bg prt-col-bgcolor-yes bg-base-dark prt-right-span spacing-1">
                    <div class="prt-col-wrapper-bg-layer prt-bg-layer"></div>
                    <div class="layer-content">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">
                                <h3><?php echo $atts['title']['subtitle']; ?></h3>
                                <h2 class="title"><?php echo $atts['title']['main']; ?></h2>
                            </div>
                        </div><!-- section title end -->
                        <div class="pt-5">
                            <h3><?php echo $atts['content']['title_1']; ?></h3>
                            <p><?php echo $atts['content']['desc_1']; ?></p>
                            <div class="prt-horizontal_sep mt-30 mb-30"></div>
                            <h3><?php echo $atts['content']['title_2']; ?></h3>
                            <p><?php echo $atts['content']['desc_2']; ?></p>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
    </div>
</section>