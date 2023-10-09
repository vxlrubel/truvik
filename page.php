<?php 

    /**
     * load all the header content
     * 
     * @return header content
     */
    get_header();


    /**
     * showing the heading title of post type page and services and others
     * truvik_page_header_title()
     * 
     * @return page title with background image
     */
    do_action('truvik_page_header_title');


    /**
     * main content before 
     * @return div with class 'main-content'
     */
    do_action( 'truvik_content_before' );


    /**
     * retrive the all the content
     * 
     * @return content
     */
    the_content();


    /**
     * main content after 
     * @return div
     */
    do_action( 'truvik_content_after' );


    /**
     * load all the footer content
     * 
     * @return footer content
     */
    get_footer();