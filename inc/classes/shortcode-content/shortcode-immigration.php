<section class="prt-row home01-immigration-and-services-section clearfix">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-10 m-auto">
                <!--section-title-->
                <div class="section-title title-style-center_text">
                    <div class="title-header">
                        <h3><?php echo $atts['subtitle']; ?></h3>
                        <h2 class="title"><?php echo $atts['title']; ?></h2>
                    </div>
                </div><!--section-title end-->
            </div>
        </div>
        <div class="row mt_15">
            

            <?php

                $args = [
                    'post_type'      => 'immigration',
                    'posts_per_page' => 8
                ];

                $query = new wp_Query( $args );

                if( $query->have_posts() ) {
                    while( $query->have_posts() ){ 
                        $query->the_post();
                        get_template_part('template-parts/content', 'immigration');
                    }
                    wp_reset_postdata();
                }
                ?>


        </div>
    </div>
</section>