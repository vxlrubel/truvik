<section class="prt-row home01-welcome-section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-12" data-aos="fade-right">
                <div class="position-relative text-center text-sm-start">
                    <div class="prt_single_image-wrapper">
                        <img class="img-fluid" src="<?php echo $atts['image']['url_1']; ?>" alt="single-img-06">
                    </div>
                    <div class="prt-single-img-1" data-aos="slide-right" data-aos-offset="500" data-aos-duration="500">
                        <div class="prt_single_image-wrapper">
                            <img class="img-fluid" src="<?php echo $atts['image']['url_2']; ?>" alt="single-img-06">
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-xl-6 col-lg-12" data-aos="fade-left">
                <div class="mt-30">
                    <!--section-title -->
                    <div class="section-title">
                        <div class="title-header">

                            <h3><?php echo $atts['title']['upper']; ?></h3>
                            <h2 class="title"><?php echo $atts['title']['main']; ?></h2>

                        </div>
                        <div class="title-desc">
                            <p><?php echo $atts['description']; ?></p>
                        </div>
                    </div><!--section-title-end -->
                    <div class="row pt-10 res-991-pt-0">
                        <div class="col-lg-8 col-md-8 col-sm-12 align-self-center">
                            <ul class="prt-list style1">

                                <?php 
                                    foreach ( $atts['items'] as $item ) { ?>
                                        <li>
                                            <i class="fa fa-check"></i>
                                            <span class="prt-list-li-content"><?php echo $item; ?></span>
                                        </li> 
                                    <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 align-self-center">
                            <div class="prt-play-icon-btn style1 text-center">
                                <a href="<?php echo $atts['video']['url']; ?>" target="_self" class="prt_prettyphoto">
                                    <i class="fa fa-play text-base-skin"></i>
                                </a>
                                <h3><?php echo $atts['video']['text']; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>