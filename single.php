<?php get_header(); ?>
        <!-- page-title -->
        <div class="prt-titlebar-wrapper prt-bg" style="background-image: url(<?php Truvik\Post::thumbnail_url();?>)">
            <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
            <div class="prt-titlebar-wrapper-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="prt-page-title-row-heading">

                                <div class="page-title-heading">
                                    <?php Truvik\Post::post_title(); ?>
                                </div>

                                <?php Truvik\Post::breadcrumb( false ); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>                    
        </div>
        <!-- page-title end -->

        <!--site-main start-->
        <div class="site-main">

            <!--sidebar-->
            <div class="sidebar prt-sidebar-right prt-blog bg-base-grey clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row g-0">
                    	<div class="col-lg-8 content-area prt-blog-single">

                            <?php 
                                while( have_posts() ): the_post();
                                    get_template_part( 'template-parts/content', 'single' );
                                endwhile;
                            ?>
 
	                    </div>

                        <!-- sidebar -->
                        <?php get_sidebar(); ?>      	                    		                    
                    </div><!-- row end -->
                </div>
            </div>
            <!--sidebar end-->

        </div><!-- site-main end-->
<?php get_footer(); ?>

