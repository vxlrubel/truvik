<?php
/**
 * custom login page style
 * 
 * @return login page
 */
namespace Rubel;

defined('ABSPATH') OR exit('No direct script access allowed');


class Login_Page{
    static $instance = false;

    public function __construct(){
        // modify login page style
        add_action('login_head', [ $this, 'login_page_style'] );

        // change the login page title and text
        add_filter('login_headertext', [ $this, 'login_title' ]);

        // change the header url
        add_filter('login_headerurl', [ $this, 'change_url' ] );
    }

    /**
     * modify the login page style
     * login_page_style()
     * @return void
     */
    public function login_page_style(){

        global $truvik_options;

        $color = $truvik_options['truvik-base-skin-color'];
        $logo_src = esc_url( $truvik_options['truvik-login-page-logo']['url'] );
        $background_src = esc_url( $truvik_options['truvik-login-page-background']['url'] );
        $background_overlay_color = $truvik_options['truvik-login-page-background-overlay'];
        $background_overlay_color_opacity = $truvik_options['truvik-login-page-background-overlay-opacity'];
        $opacity = (int) $background_overlay_color_opacity * 0.1;

        ?>
        
        
        <style type="text/css">

            body{
                position: relative;
                background-image: url(<?php echo $background_src; ?>);
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
            }
            body::after{
                position: absolute;
                content: '';
                z-index: -1;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                background-color: <?php echo $background_overlay_color; ?>;
                opacity: <?php echo $opacity; ?>;
            }
            #login-message,
            #login_error,
            .message {
                margin-bottom: 0 !important;
            }
            #backtoblog a,
            .login #nav a {
                color: white !important;
            }
            #login {
                width: 350px !important;
            }

            .login h1 {
                text-align: center;
                background: #fff;
                padding: 10px;
                border-radius: 15px 15px 0 0;
            }
                        
            .login form {
                margin-top: 0;
                padding: 26px 24px 34px;
                font-weight: 400;
                overflow: hidden;
                border-radius: 0 0 15px 15px;
                background: #fff;
                border: none;
            }
            .login .button.wp-hide-pw {
                margin-top: 5px !important;
                border: 0 !important;
                box-shadow: none !important;
            }
            #loginform input[type="text"],
            #loginform input[type="password"] {
                border: 1px solid <?php echo $color; ?>;
                margin-top: 5px;
                padding-left: 15px;
                padding-right: 15px;
                box-shadow: 0 0 1px 0 <?php echo $color; ?> !important;
            }
            .login .button.wp-hide-pw .dashicons {
                color:  <?php echo $color; ?> !important;
            }
            #wp-submit {
                background: <?php echo $color; ?>;
                border-color: <?php echo $color; ?>;
                min-width: 100px;
            }
            .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary:focus {
                box-shadow: 0 0 0 1px #fff,0 0 0 3px <?php echo $color; ?>;
            }
            #rememberme {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                border-color: <?php echo $color; ?>;
                outline: none;
                cursor: pointer;
                position: relative;
                box-shadow: none !important;
            }

            #rememberme::before {
                content: "";
                display: block;
                width: 100%;
                height: 100%;
            }

            #rememberme:checked::before {
                content: "\2713"; /* Unicode checkmark character */
                font-size: 13px;
                color: <?php echo $color; ?>; /* Change this to the desired checked icon color */
                text-align: center;
                line-height: 16px;
                margin-left: 1px;
            }
            .login h1 a {
                background-image: url(<?php echo $logo_src; ?>) !important;
                background-size: contain !important;
                width: 50% !important;
                background-position: center center;
                margin-bottom: 0 !important;
            }
            
        </style>

        <?php
    }

    /**
     * modify website title and logo title
     * login_title()
     * @return $title
     */
    public function login_title(){

        $title = esc_html( wp_get_document_title() );

        return $title;
    }

    /**
     * change the website url so that visit website directly
     * change_url()
     * @return $url
     */
    public function change_url( $url ){
        $url = esc_url( home_url('/') );
        return $url;
    }

    /**
     * initialize singleton instance
     * init()
     *
     * @return void
     */
    static public function init(){
        if( ! self::$instance )
            self::$instance = new self();
        return self::$instance;
    }
}


if( ! function_exists('login_page') ){
    function login_page(){
        return Login_Page::init();
    }
}

/**
 * exicute the class using this function
 * custom_login_page()
 */
login_page();