
<?php 
/*
Template Name: Service
*/
get_header();

?>

        <?php do_action('truvik_page_header_title'); ?>
        <!-- page-title end -->

        <!--site-main start-->
        <div class="site-main">
            <!--services-section-->
            <section class="prt-row service01-services-section clearfix">
                <div class="prt-row-wrapper-bg-layer prt-bg-layer"></div>
                <div class="container">
                    <div class="row">

                    <?php

                        $args = [
                            'post_type'      => 'services',
                            'posts_per_page' => -1
                        ];
                        $query = new WP_Query( $args );

                        if( $query->have_posts() ) :
                            while( $query->have_posts() ): $query->the_post();
                                get_template_part( 'template-parts/content', 'services-all' );
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        
                    ?>

                    </div>
                </div>
            </section>

        </div><!-- site-main end-->

<?php get_footer() ?>