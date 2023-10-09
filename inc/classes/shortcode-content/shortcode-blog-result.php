<section class="prt-row home01-blog-section clearfix">
    <div class="container">
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

        <!-- feature post -->

        <?php 
            $args = [
                'post_type'      => 'post',
                'posts_per_page' => 1
            ];
            $feature_post = new WP_Query( $args );

            if( $feature_post->have_posts() ){
                while( $feature_post->have_posts() ){
                    $feature_post->the_post();
                    get_template_part( 'template-parts/content', 'feature' );
                }
                wp_reset_postdata();
            }
        ?>

        <!-- feature post end -->


        <div class="row">
            <div class="col-xl-5 col-lg-12"></div>
            <div class="col-xl-7 col-lg-12" data-aos="fade-left">
                <div class="spacing-9 bg-base-grey position-relative z-index-2">
                    <div class="row">

                        <?php
                        $latest_post = new WP_Query( [
                            'post_type'      => 'post',
                            'posts_per_page' => 4,
                            'offset'         => 1
                        ] );

                        if( $latest_post->have_posts() ) {
                            while ( $latest_post->have_posts() ) {
                                $latest_post->the_post();
                                get_template_part( 'template-parts/content', 'latest' );
                            }
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>