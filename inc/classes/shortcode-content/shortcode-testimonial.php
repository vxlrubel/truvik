<section class="prt-row padding_zero-section home01-testimonial-section clearfix">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6 mb_80 res-991-mb-0">
                <div class="prt-bg prt-col-bgimage-yes prt-col-bgcolor-yes prt-left-span bg-base-dark spacing-2">
                    <div class="prt-col-wrapper-bg-layer prt-bg-layer">
                        <div class="prt-col-wrapper-bg-layer-inner"></div>
                    </div>
                    <div class="layer-content">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">
                                <h3><?php echo $atts['subtitle']; ?></h3>
                                <h2 class="title"><?php echo $atts['title']; ?></h2>
                            </div>
                        </div><!-- section title end -->

                        <div class="row vertical_slider testimonial-vertical" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 2}}, {"breakpoint":992,"settings":{"slidesToShow": 1}}, {"breakpoint":768,"settings":{"slidesToShow": 1}}, {"breakpoint":576,"settings":{"slidesToShow": 1}}]}'>
                            
                            <?php 
                                $args = [
                                    'post_type'      => 'testimonial',
                                    'posts_per_page' => -1
                                ];

                                $query = new WP_Query( $args );

                                if( $query->have_posts() ){
                                    while( $query->have_posts() ){
                                        $query->the_post();
                                        get_template_part( 'template-parts/content', 'testimonial' );
                                    }
                                    wp_reset_postdata();
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="prt-bg prt-col-bgimage-yes prt-right-span col-bg-img-two">
                    <div class="prt-col-wrapper-bg-layer prt-bg-layer" style="background-image:url(<?php echo $atts['image_src']; ?>)"></div>
                    <div class="layer-content"></div>
                </div>
            </div>
        </div>
    </div>
</section>
