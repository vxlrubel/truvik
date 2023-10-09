<?php global $truvik_options; ?>
<section class="prt-row home01-services-section bg-img1 bg-base-grey prt-bg prt-bgimage-yes clearfix">
    <div class="prt-row-wrapper-bg-layer prt-bg-layer"></div>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-10 m-auto">
                <!--section-title-->
                <div class="section-title title-style-center_text">
                    <div class="title-header">
                        <h3><?php echo $atts['title']['subtitle']; ?></h3>
                        <h2 class="title"><?php echo $atts['title']['main']; ?></h2>
                    </div>
                </div><!--section-title end-->
            </div>
        </div>
        
        <?php 
            if( $truvik_options['truvik-service-enable-specefic-items'] == 1 ): ?>

                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 2}} , {"breakpoint":991,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>

                    <?php
                        $item_1 = (int) $truvik_options['truvik-service-enable-specefic-item1'];
                        $item_2 = (int) $truvik_options['truvik-service-enable-specefic-item2'];
                        $item_3 = (int) $truvik_options['truvik-service-enable-specefic-item3'];

                        $service_ids = array($item_1, $item_2, $item_3);

                        foreach ($service_ids as $service_id) {
                            $service = get_post($service_id);
                            $thumbnail_url = get_the_post_thumbnail_url( $service_id, 'truvik-service-imgae-thumbnail' );
                            $permalink = get_permalink($service_id);
                            $content = wp_trim_words($service->post_content, 15);
                            $title = $service->post_title;
                            if ($service) : ?>
                                <div class="col-lg-6">
                                    <div class="featured-imagebox featured-imagebox-services style1">
                                        <div class="featured-thumbnail truvik-radius">
                                            <img class="img-fluid" src="<?php echo $thumbnail_url ?>" alt="<?php echo $title; ?>">
                                        </div>
                                        <div class="featured-details-wrap">
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h3>
                                                        <a href="<?php echo $permalink; ?>" tabindex="0"><?php echo $title; ?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="featured-explore-more">
                                                <a class="prt-btn btn-inline prt-btn-color-dark" href="<?php echo $permalink; ?>" tabindex="0">explore more</a>
                                            </div>
                                        </div>
                                        <div class="services-details-wrap">
                                            <div class="services-details-box truvik-radius overflow-hidden">
                                                <div class="services-content">
                                                    <div class="services-title">
                                                        <h3>
                                                            <a href="<?php echo $permalink; ?>" tabindex="0"><?php echo $title; ?></a>
                                                        </h3>
                                                    </div>
                                                    <div class="services-desc">
                                                        <p><?php echo $content; ?></p>
                                                    </div>
                                                </div>
                                                <div class="services-explore-more">
                                                    <a class="prt-btn btn-inline prt-btn-color-dark" href="<?php echo $permalink; ?>"
                                                        tabindex="0">explore more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;
                        }
                        // wp_reset_postdata();
                    ?>
                </div>

            <?php else: ?>
                <div class="row slick_slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":false, "infinite":true, "responsive": [{"breakpoint":1024,"settings":{"slidesToShow": 2}} , {"breakpoint":991,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
            
                    <?php
                        $args = array(
                            'post_type'      => 'services',
                            'posts_per_page' => 3,
                        );
                        
                        $query = new WP_Query( $args );
                        
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                
                                $query->the_post();

                                get_template_part( 'template-parts/content', 'services' );
                                
                            }
                            wp_reset_postdata(); 
                        }
                    ?>

                </div>
            <?php endif;
        ?>

        <!-- specefic post -->

    </div>
</section>