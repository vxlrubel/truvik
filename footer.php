
        <!-- footer start -->
            
        <?php
            /**
             * footer wrap start
             * truvik_footer_wrap_start()
             * @return void
             */
            do_action( 'truvik_footer_wrap_start' );

           /**
             * footer wrap start
             * truvik_footer_widget(), 10
             * truvik_footer_copyright(), 15
             * 
             * @return void
             */
            do_action( 'truvik_footer_area' );
            /**
             * footer wrap start
             * truvik_footer_wrap_end()
             * @return void
             */
            do_action( 'truvik_footer_wrap_end' );
       
            /**
             * scroll to top
             * truvik_scroll_to_top()
             * 
             * @return void
             */
            do_action( 'truvik_scroll_to_top' ); ?>
        <!-- back-to-top end -->

    </div><!-- page end -->

    <?php 

        // load WordPress default script
        wp_footer();

        /**
         * custom footer script
         * truvik_header__script_editor();
         * 
         * @return script
         */
        do_action( 'truvik_footer_editor' );
    
    ?>
</body>

</html>