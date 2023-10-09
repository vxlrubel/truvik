<?php

class Truvik_Meta_Boxes{
    // singletone instance
    private static $instance;

    /**
     * singletone instance
     * get_instance() 
     *
     * @return void
     */
    public static function get_instance(){
        if( is_null(self::$instance) )
            self::$instance = new self();
        return self::$instance;
    }



    /**
     * constructor method for
     */
    public function __construct(){

        // add meta box into testimonial post type
        add_action('add_meta_boxes_testimonial', [ $this, 'testimoniall' ] );

        // update testimonial post type
        add_action( 'save_post', [ $this, 'update_testimonial_fields' ], 10, 2 );

        // add meta box into team post type
        add_action( 'add_meta_boxes', [ $this, 'team_fields' ] );

        // update post meta
        add_action( 'save_post', [ $this, 'update_fields' ] );

        
        // meta boxes for all post type
        add_action( 'add_meta_boxes', [ $this, 'wp_custom_meta_boxes' ] );

        // save meta boxes
        add_action( 'save_post', [ $this, 'update_meta_fields' ] );

    }

    /**
     * add meta boxes in custom fields
     * testimonial()
     *
     * @return void
     */
    public function testimoniall() {
        add_meta_box( 'truvik-testimonial-fields', 'Truvik Custom Fields', [ $this, '_cb_testimonial_fields' ], 'testimonial', 'side', 'high' );
    }

    /**
     * custom fields call back 
     *
     * @param [type] $post
     * @return void
     */
    public function _cb_testimonial_fields( $post ){

        wp_nonce_field( basename(__FILE__), 'testimonial_author_designation' );

        $designation =  get_post_meta( $post->ID, '_truvik_testimonial_author_designation', true );
        
        $designation ? $designation : '';
        
        $ratting =  get_post_meta( $post->ID, '_truvik_testimonial_author_ratting', true );

        $ratting ? $ratting : '';
        
        ?>
    
            <p>
                <label for="truvik-author-designation">Designation: </label>
                <input type="text" name="truvik_testimonial_author_designation" id="truvik-author-designation" class="widefat" value="<?php echo $designation; ?>">
            </p>
            <p style="display: flex; justify-content: space-between; align-items-center">
                <label for="truvik-testimonial-rating" style="display: inline-flex; align-items:center;"><?php esc_html_e( 'Give Ratting', 'truvik' ); ?></label>
                <select name="truvik_testimonial_author_ratting" id="truvik-testimonial-rating">
                    <option value=""><?php esc_html_e( '--Select Ratting--', 'truvik' ); ?></option>

                    <?php
                        for ($i=1; $i < 6; $i++) { 
                            echo '<option value="'.$i.'"'. selected( $ratting, $i, false ) . '>' .$i. ' Star</option>';
                        }
                    ?>
                </select>
            </p>
    
        <?php
    }

    /**
     * update custom meta fields for testimonal fields
     *
     * @param [type] $post_id
     * @param [type] $post
     * @return void
     */
    public function update_testimonial_fields( $post_id, $post ){

        if( ! isset( $_POST['testimonial_author_designation'] ) || ! wp_verify_nonce( $_POST['testimonial_author_designation'], basename(__FILE__) ) ) return;
    
        if( ! current_user_can( 'edit_posts' ) ) return;
        
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
        if( 
            isset( $_POST['truvik_testimonial_author_designation'] ) || 
            isset( $_POST['truvik_testimonial_author_ratting'] )
        )
        {
            $designation = sanitize_text_field( $_POST['truvik_testimonial_author_designation'] );
            $ratting = sanitize_text_field( $_POST['truvik_testimonial_author_ratting'] );

            update_post_meta( $post_id, '_truvik_testimonial_author_designation', $designation );
            update_post_meta( $post_id, '_truvik_testimonial_author_ratting', $ratting );
        }
    }


    /**
     * team fields 
     *
     * @return void
     */
    public function team_fields(){
        $post_types = [ 'team_member' ];
        add_meta_box(
            'truvik_team_fields',                      // set id
            __( 'Truvik Custom Fields', 'truvik' ),    // set title
            [ $this, 'add_fields' ],                   // callback function
            $post_types,                               // post types
            'normal',                                  // content type
            'high'                                     // priority
        );
    }


    /**
     * add custom fields
     * add_fields()
     *
     * @param [type] $post
     * @return void
     */
    public function add_fields( $post ){

        wp_nonce_field( basename(__FILE__), 'truvik_team_member_meta' );

        global $post;
        $designation = get_post_meta( $post->ID, '_truvik_team_designation', true );
        $facebook    = get_post_meta( $post->ID, '_truvik_team_facebook', true );
        $instagram   = get_post_meta( $post->ID, '_truvik_team_instagram', true );
        $pinterest   = get_post_meta( $post->ID, '_truvik_team_pinterest', true );
        $email       = get_post_meta( $post->ID, '_truvik_team_email', true );
        ?>
        <div style="padding: 25px 50px; border: 1px solid #8c8f94; border-radius: 4px;">
            
            <p>
                <label for="truvik-team-designation" style="display:inline-flex; min-width: 130px; align-items:center"> <strong>Designation :-</strong> </label>
                <input type="text" class="regular-text" id="truvik-team-designation" style="margin-top: 3px;" name="truvik_team_designation" value="<?php echo $designation; ?>" />
            </p>
            <p> <strong>Social Share Url</strong> </p>
            <p>
                <label for="truvik-team-email" style="display:inline-flex; min-width: 130px; align-items:center"> <strong>Email :-</strong> </label>
                <input type="email" class="regular-text" id="truvik-team-email" style="margin-top: 3px;" name="truvik_team_email" value="<?php echo $email; ?>" />
            </p>
            <p>
                <label for="truvik-team-facebook" style="display:inline-flex; min-width: 130px; align-items:center"> <strong>Facebook Url:-</strong> </label>
                <input type="url" class="regular-text" id="truvik-team-facebook" style="margin-top: 3px;" name="truvik_team_facebook" value="<?php echo $facebook; ?>" />
            </p>
            <p>
                <label for="truvik-team-instagram" style="display:inline-flex; min-width: 130px; align-items:center"> <strong>Instagram Url:-</strong> </label>
                <input type="url" class="regular-text" id="truvik-team-instagram" style="margin-top: 3px;" name="truvik_team_instagram" value="<?php echo $instagram; ?>" />
            </p>
            <p>
                <label for="truvik-team-pinterest" style="display:inline-flex; min-width: 130px; align-items:center"> <strong>Pinterest Url:-</strong> </label>
                <input type="url" class="regular-text" id="truvik-team-pinterest" style="margin-top: 3px;" name="truvik_team_pinterest" value="<?php echo $instagram; ?>" />
            </p>
        </div>
        
        <?php
    }

    /**
     * update custom fields
     *
     * @param [type] $post_id
     * @return void
     */
    public function update_fields( $post_id ){

        if(
            ! isset( $_POST['truvik_team_member_meta'] ) || ! wp_verify_nonce( $_POST['truvik_team_member_meta'], basename(__FILE__) )) return;

        if(defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // if you have not permission
        if( ! current_user_can( 'edit_post', $post_id ) ){
            return;
        }

        /**
         * define the key of meta_fields into $keys
         * @array $keys
         */
        $keys = ['designation', 'facebook', 'instagram', 'pinterest', 'email'];

        // update the meta fields value with new value
        foreach( $keys as $key ){

            if( isset( $_POST['truvik_team_'. $key ] )){
                $value = sanitize_text_field( $_POST['truvik_team_'. $key ] );
                update_post_meta( $post_id, "_truvik_team_{$key}", $value );
            }
        }
    }

    /**
     * wp_custom_meta_boxes()
     *
     * @return void
     */
    public function wp_custom_meta_boxes(){
        $post_types = [ 'post', 'page', 'team_member' ];
        add_meta_box(
            'wp_custom_meta',                          // set id
            __( 'WP title and description', 'wpm' ),   // set title
            [ $this, 'add_meta_fields' ],              // callback function
            $post_types,                               // post types
            'normal',                                  // content type
            'high'                                     // priority
        );
    }

    /**
     * add_meta_fields()
     *
     * @param $post
     * @return void
     */
    public function add_meta_fields( $post ){
        $nonce       = wp_create_nonce( 'wpm_meta_fields' );
        wp_nonce_field( basename(__FILE__), 'truvik_global_meta_fields' );
        $title       = get_post_meta( $post->ID, '_wpm_title', true );
        $description = get_post_meta( $post->ID, '_wpm_description', true ); ?>

        <div style="padding: 25px 50px; border: 1px solid #8c8f94; border-radius: 4px;">
            <p style="background:#0080000f;border-left: 4px solid green;; padding: 7px;">
                <strong style="display: block;">Provide SEO Friendly Title and Meta Description</strong>
                <span>You can now set different title and meta description for each post type <strong>( 'post', 'page', 'product' )</strong> if you want.</span>
            </p>
            <p>
                <label for="wp-custom-mets-title"> <strong>Website title :-</strong> </label>
                <input type="text" class="widefat" id="wp-custom-mets-title" style="margin-top: 3px;" name="wp-custom-meta_title" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="wp-custom-meta-description"> <strong>Meta Description :- </strong></label>
                <textarea name="wp-custom-meta_description" id="wp-custom-meta-description" class="widefat" style="margin-top: 3px; min-height: 90px; max-height: 150px;"><?php echo $description; ?></textarea>
            </p>
            <div style="text-align:right">
                <span>Developed By</span>
                <a href="https://www.facebook.com/rubel.ft.me" target="_blank" style="display: inline-block; text-decoration: none; color: #008000;">Rubel Mahmud ( Sujan )</a>
            </div>
            <input type="hidden" name="wp-custom-meta_nonce" value="<?php echo $nonce; ?>">
        </div>
        <?php

    }

    /**
     * update all the fields value by this method
     * update_meta_fields()
     *
     * @param [type] $post_id
     * @return void
     */
    public function update_meta_fields( $post_id ){

        if( ! isset( $_POST['truvik_global_meta_fields'] ) || ! wp_verify_nonce( $_POST['truvik_global_meta_fields'], basename( __FILE__) ) ) return;

        // auto save security 
        if(defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // if you have not permission
        if( ! current_user_can( 'edit_post', $post_id ) ) return;

        /**
         * define the key of meta_fields into $keys
         * @array $keys
         */
        $keys = ['title', 'description' ];

        // update the meta fields value with new value
        if(
            isset( $_POST['wp-custom-meta_title'] ) || 
            isset( $_POST['wp-custom-meta_description'] )
        )
        {
            foreach( $keys as $key ){
                $value = sanitize_text_field( $_POST['wp-custom-meta_'. $key ] );
                update_post_meta( $post_id, "_wpm_{$key}", $value );
            }
        }

        
    }

}

Truvik_Meta_Boxes::get_instance();