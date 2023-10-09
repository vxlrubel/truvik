<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Shortcodes{
    // singletone instance
    private static $instance;

    public function __construct(){

        // slider section
        add_shortcode( 'truvik_home_slider', [ $this, 'home_main_slider'] );

        // about section
        add_shortcode( 'truvik_about', [ $this, 'about'] );
        
        // services section
        add_shortcode( 'truvik_services', [ $this, 'services'] );

        // broken section
        add_shortcode( 'truvik_broken', [ $this, 'broken'] );

        // immigration section
        add_shortcode( 'truvik_immigration', [ $this, 'immigration'] );

        // testimonial section
        add_shortcode( 'truvik_testimonial', [ $this, 'testimonials'] );

        // fid section
        add_shortcode( 'truvik_fid', [ $this, 'fid'] );

        // truvik blog result
        add_shortcode( 'truvik_get_blog', [ $this, 'truvik_get_blog_result'] );

        // clients section
        add_shortcode( 'truvik_clients_area', [ $this, 'truvik_get_clients'] );
        

        

    }


    /**
     * Slider exicution
     *
     * @param [type] $atts
     * @return void
     */
    public function home_main_slider( $atts ){

        global $truvik_options;
        
        // set img url
        $img1 = esc_url( $truvik_options['tehs-image-1']['url'] );
        $img2 = esc_url( $truvik_options['tehs-image-2']['url'] );

        $title1_1 = $truvik_options['tehs-title-1'];
        $title1_2 = $truvik_options['tehs-title-1_2'];
        $title2_1 = $truvik_options['tehs-title-2'];
        $title2_2 = $truvik_options['tehs-title-2_2'];

        // subtitle set
        $subtitle1 = $truvik_options['tehs-subtitle-1'];
        $subtitle2 = $truvik_options['tehs-subtitle-2'];

        // button text
        $btn_text_1 = $truvik_options['tehs-button-text-1'];
        $btn_text_2 = $truvik_options['tehs-button-text-2'];

        // btn url
        
        $btn_url1 = $truvik_options['tehs-button-url-1'];
        $btn_url2 = $truvik_options['tehs-button-url-2'];

        // contact info

        $contact_text = $truvik_options['tehs-contact-text'];
        $contact_number = $truvik_options['tehs-contact-number'];

            // Extract attributes (if any)
        $atts = shortcode_atts( [
            'title'      => [
                'text1_1' => __( $title1_1, 'truvik' ),
                'text1_2' => __( $title1_2, 'truvik' ),
                'text2_1' => __( $title2_1, 'truvik' ),
                'text2_2' => __( $title2_2, 'truvik' ),
            ],
            'subtitle'    => [
                'text1' => __( $subtitle1, 'truvik' ),
                'text2' => __( $subtitle2, 'truvik' ),
            ],
            'thumbnail'  => [
                'url_1' => esc_url( $img1 ),
                'url_2' => esc_url( $img2 ),
            ],
            'button'    => [
                'fst' => [
                    'text' => __( $btn_text_1, 'truvik' ),
                    'url'  => $btn_url1,
                ],
                'snd' => [
                    'text' => __( $btn_text_2, 'truvik' ),
                    'url'  => $btn_url2,
                ],
            ],
            'contact'    => [
                'text'   => $contact_text,
                'number' => $contact_number,
            ],

        ], $atts);

        ob_start();

        require_once 'shortcode-content/shortcode-slider.php';
        
        return ob_get_clean();
              
    }

    /**
     * about section for truvik
     *
     * @param [type] $atts
     * @return void
     */
    public function about( $atts ){

        global $truvik_options;

        $title    = $truvik_options['truvik-about-title'];
        $subtitle = $truvik_options['truvik-about-subtitle'];
        $content  = $truvik_options['truvik-about-content'];

        // get image url
        $img1 = $truvik_options['truvik-about-image1']['url'];
        $img2 = $truvik_options['truvik-about-image2']['url'];

        // youtube link

        $youtube_text = $truvik_options['truvik-about-youtube-text'];
        $youtube_url = $truvik_options['truvik-about-youtube-url'];
        

        // get item of array
        
        $get_items = $truvik_options['truvik-about-items'] ? $truvik_options['truvik-about-items'] : [];

        $atts = shortcode_atts( [
            'image'       => [
                'url_1' => esc_url( $img1 ),
                'url_2' => esc_url( $img2 )
            ],
            'video'       => [
                'text' => __( $youtube_text, 'truvik' ),
                'url'  => esc_url( $youtube_url ),
            ],
            'description' => esc_html__( $content, 'truvik' ),
            'title'       => [
                'upper' => $subtitle,
                'main'  => $title
            ],
            'items'       => $get_items,
        ], $atts);

        ob_start();

        require_once 'shortcode-content/shortcode-about.php';

        return ob_get_clean();
    }

    /**
     * services section for truvik
     *
     * @param [type] $atts
     * @return void
     */
    public function services( $atts ){
        global $truvik_options;
        $title    = $truvik_options['truvik-service-title'];
        $subtitle = $truvik_options['truvik-service-subtitle'];

        $atts = shortcode_atts( [
            'title' => [
                'subtitle' => esc_html__( $subtitle, 'truvik' ),
                'main'     => __( $title, 'truvik' )
            ]
        ], $atts );

        ob_start();

        require_once 'shortcode-content/shortcode-service.php';

        return ob_get_clean();
    }

    /**
     * services section for truvik
     *
     * @param [type] $atts
     * @return void
     */
    public function broken( $atts ){

        global $truvik_options;

        $img_src  = esc_url( $truvik_options['truvik-broken-image']['url'] );
        $title    = $truvik_options['truvik-broken-title'];
        $subtitle = $truvik_options['truvik-broken-subtitle'];

        $content_title_1 = $truvik_options['truvik-broken-content-title-1'];
        $content_title_2 = $truvik_options['truvik-broken-content-title-2'];
        $content_desc_1 = $truvik_options['truvik-broken-content-description-1'];
        $content_desc_2 = $truvik_options['truvik-broken-content-description-2'];


        // count values

        $count_text_1 = $truvik_options['truvik-broken-count-text-1'];
        $count_text_2 = $truvik_options['truvik-broken-count-text-2'];
        $count_text_3 = $truvik_options['truvik-broken-count-text-3'];
        
        $count_num_1 = $truvik_options['truvik-broken-count-number-1'];
        $count_num_2 = $truvik_options['truvik-broken-count-number-2'];
        $count_num_3 = $truvik_options['truvik-broken-count-number-3'];

        $atts = shortcode_atts( [
            'image' => $img_src,
            'title' => [
                'main'     => __( $title, 'truvik' ),
                'subtitle' => esc_html__( $subtitle, 'truvik' ),
            ],
            'count' => [
                [
                    'text'   => esc_html__( $count_text_1, 'truvik' ),
                    'number' => $count_num_1
                ],
                [
                    'text'   => esc_html__( $count_text_2, 'truvik' ),
                    'number' => $count_num_2
                ],
                [
                    'text'   => esc_html__( $count_text_3, 'truvik' ),
                    'number' => $count_num_3
                ]
            ],
            'content' => [
                'title_1' => esc_html__( $content_title_1, 'truvik' ),
                'title_2' => esc_html__( $content_title_2, 'truvik' ),
                'desc_1'  => esc_html__( $content_desc_1, 'truvik' ),
                'desc_2'  => esc_html__( $content_desc_2, 'truvik' ),
            ]
        ], $atts );

        ob_start();

        require_once 'shortcode-content/shortcode-broken.php';

        return ob_get_clean();
    }

    /**
     * testimonials section for truvik
     * testimonials()
     *
     * @param [type] $atts
     * @return void
     */
    public function testimonials( $atts ){

        global $truvik_options;

        $title = $truvik_options['truvik-testimonial-title'];

        $subtitle = $truvik_options['truvik-testimonial-sub-title'];

        $img_src = $truvik_options['truvik-testimonial-image']['url'];


        $atts = shortcode_atts( [
            'title'     => $title,
            'subtitle'  => $subtitle,
            'image_src' => $img_src,
        ], $atts );

        ob_start();

        require_once 'shortcode-content/shortcode-testimonial.php';

        return ob_get_clean();
    }


    /**
     * register immigration areas
     * immigration
     * @param [type] $atts
     * @return void
     */
    public function immigration( $atts ){

        global $truvik_options;

        $title = $truvik_options['truvik-immigration-title'];
        $subtitle = $truvik_options['truvik-immigration-sub-title'];
       
        $atts = shortcode_atts( [
            'title'    => $title,
            'subtitle' => $subtitle,

        ], $atts );

        ob_start();
        
        require_once 'shortcode-content/shortcode-immigration.php';

        return ob_get_clean();
    }

    /**
     * fid section
     * fid()
     * @param [type] $atts
     * @return void
     */
    public function fid( $atts ){

        global $truvik_options;

        $atts = shortcode_atts( [
            'title'    => 'title',
            'subtitle' => 'title',

        ], $atts );

        ob_start();
        
        require_once 'shortcode-content/shortcode-fid.php';

        return ob_get_clean();
    }
    public function truvik_get_blog_result( $atts ){

        global $truvik_options;

        $title = $truvik_options['truvik-home-blog-title'];
        $subtitle = $truvik_options['truvik-home-blog-subtitle'];

        $atts = shortcode_atts( [
            'title'    => $title,
            'subtitle' => $subtitle,

        ], $atts );

        ob_start();
        
        require_once 'shortcode-content/shortcode-blog-result.php';

        return ob_get_clean();

    }

    /**
     * get clients 
     * truvik_get_clients()
     *
     * @param [type] $atts
     * @return void
     */
    public function truvik_get_clients( $atts ){
        global $truvik_options;

        ob_start();

        require_once 'shortcode-content/shortcode-clients.php';
        
        return ob_get_clean();
    }
    /**
     * Evil is used
     * singleton instance
     * 
     * @return void
     */
    public static function get_instance() {
        if( is_null( self::$instance ) )
            self::$instance = new self();
        return self::$instance;
    }

}
Shortcodes::get_instance();