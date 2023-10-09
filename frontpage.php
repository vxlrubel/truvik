<?php 
// global $truvik_options;
/*
Template Name: Frontpage
*/
get_header(); 

    if( $truvik_options['truvik-enable-home-slider'] == '1' ){
        echo do_shortcode( '[truvik_home_slider]' );   
    }


    /**
     * main content before 
     * @return div with class 'main-content'
     */
    do_action( 'truvik_content_before' );



    if( $truvik_options['truvik-enable-home-about'] == 1 ){
        echo do_shortcode( '[truvik_about]' );
    }
    if( $truvik_options['truvik-enable-home-services'] == 1 ){
        echo do_shortcode( '[truvik_services]' );
    }
    if( $truvik_options['truvik-enable-home-broken'] == 1 ){
        echo do_shortcode( '[truvik_broken]' );
    }
    if( $truvik_options['truvik-enable-home-immigration'] == 1 ){
        echo do_shortcode( '[truvik_immigration]' );
    }
    if( $truvik_options['truvik-enable-home-testimonial'] == 1 ){
        echo do_shortcode( '[truvik_testimonial]' );
    }
    if( $truvik_options['truvik-enable-home-fid'] == 1 ){
        echo do_shortcode( '[truvik_fid]' );
    }
    if( $truvik_options['truvik-enable-home-blog'] == 1 ){
        echo do_shortcode( '[truvik_get_blog]' );
    }
    if( $truvik_options['truvik-enable-home-clients'] == 1 ){
        echo do_shortcode( '[truvik_clients_area]' );
    }
    
    

    /**
     * main content after 
     * @return div
     */
    do_action( 'truvik_content_after' );

get_footer();