<div class="prt-row padding_zero-section home01-client-section bg-base-grey clearfix">
    <div class="container-fluid">
        <!-- row -->
        <div class="row text-center">
            <div class="col-md-12">
                <!-- slick_slider -->
                <div class="slick_slider row" data-slick='{"slidesToShow": 6, "slidesToScroll": 1, "arrows":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}}, {"breakpoint":575,"settings":{"slidesToShow": 2}}, {"breakpoint":420,"settings":{"slidesToShow": 1}}]}'>
                    <?php

                        $images = $truvik_options['truvik-client-image'];

                        foreach( $images as $image ): ?>

                            <div class="col-lg-12">
                                <div class="client-box style1">
                                    <div class="client-thumbnail">
                                        <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="clients image">
                                    </div>
                                </div>
                            </div>

                    <?php endforeach; ?>
                    
                </div><!-- slick_slider end -->      
            </div>
        </div><!-- row end -->
    </div>
</div>