<?php get_header(); ?>
        <!-- page-title -->
        <div class="prt-titlebar-wrapper prt-bg">
            <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
            <div class="prt-titlebar-wrapper-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="prt-page-title-row-heading">
                                <div class="page-title-heading">
                                    <h2 class="title"><?php esc_html_e( 'Error Page', 'truvik' );?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
        <!-- page-title end -->

        <!--site-main start-->
        <div class="site-main">

            <!--error-404-->
            <section class="error-404">
                <div class="container">
                    <div class="row">
                        <?php get_template_part('template-parts/content', '404'); ?>
                    </div>
                </div>
            </section>
            <!--error-404 end-->

        </div><!--site-main end-->
<?php get_footer(); ?>