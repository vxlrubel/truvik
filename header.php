<?php global $truvik_options; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 

        /**
         * custom meta tag 
         * truvik_header_metatag()
         * @return metatag
         */
        do_action( 'truvik_header_metatag' );

        // default wordpress function
        wp_head();

        /**
         * custom style
         * truvik_header__style_editor()
         * @return style
         */
        do_action( 'truvik_header_editor' );
    ?>

</head>

<body <?php body_class(); ?> >

    <!-- page start -->
    <div class="page">


        <!-- header start -->
        <header id="masthead" class="header prt-header-style-01">
            <!-- topbar -->
            <?php do_action('truvik_header_top'); ?>
            <!-- topbar end -->
            <!-- site-header-menu -->
            <div id="site-header-menu" class="site-header-menu">
                <div class="site-header-menu-inner prt-stickable-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 main-header-custom-space">
                                <!--site-navigation -->
                                <div class="site-navigation d-flex align-items-center justify-content-between">
                                    <!-- site-branding -->
                                    <div class="site-branding me-auto logo-width">

                                        <?php 

                                        if( $truvik_options['truvik-enable-header-bottom-logo-enable'] == 1 ){
                                            Truvik\Header::logo();
                                        }
                                        ?>
                                        
                                    </div><!-- site-branding end -->
                                    <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                        <span class="menubar-box">
                                            <span class="menubar-inner"></span>
                                        </span>
                                    </div>

                                    <!-- menu -->
                                    <nav class="main-menu menu-mobile" id="menu">

                                        <?php Truvik\primary_menu(); ?>

                                    </nav><!-- menu end -->
                                    <!-- header_extra -->
                                    <div class="header_extra d-flex flex-row align-items-center justify-content-end">

                                        <?php 
                                            // search form
                                            if( $truvik_options['truvik-enable-header-bottom-search-enable'] == 1 )
                                                Truvik\Header::search();

                                            // quote button

                                            if( $truvik_options['truvik-enable-header-bottom-quote-enable'] == 1)
                                                Truvik\Header::get_quote();
                                        ?>

                                    </div><!-- header_extra end -->
                                    <div class="mobile-quote-show">
                                        <?php Truvik\Header::get_quote(); ?>
                                    </div>
                                        
                                    
                                </div><!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- site-header-menu end-->

            
        </header><!-- header end -->
