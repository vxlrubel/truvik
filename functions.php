<?php
/**
 * Truvik functions and definitions
 *
 * @link https://facebook.com/rubel.ft.me
 *
 * @package Truvik
 * @since 1.0.0
 */
defined('ABSPATH') OR exit;


require_once 'inc/autoload.php';


final class Truvik{

    // define theme version
    public const version = '1.0';

    // singletone instanceof Application
    private static $instance;
    
    // define custom meta fields
    public $post_meta;


    /**
     * constructor function
     */
    public function __construct(){

        // define constant
        $this->constant();

        // desable block editor
        $this->disable_block_editor();

        // enable classic editor
        $this->enable_classic_widgets();



        // custom action

        add_action( 'truvik_content_before', [ $this, 'truvik_content_before' ] );

        // after setup theme
        add_action( 'truvik_content_after', [ $this, 'truvik_content_after' ] );

        // header top section control
        add_action( 'truvik_header_top', [ $this, 'truvik_header_top' ] );

        // custom style
        add_action( 'truvik_header_editor', [ $this, 'truvik_header__style_editor' ] );

        // custom script
        add_action( 'truvik_footer_editor', [ $this, 'truvik_header__script_editor' ] );

        // custom header tag
        add_action( 'truvik_header_metatag', [ $this, 'truvik_header_metatag' ] );

        // scroll to top
        add_action( 'truvik_scroll_to_top', [ $this, 'truvik_scroll_to_top' ] );
        
       
        /**
         * footer area widget
         * truvik_footer_widget()
         * @return widget
         */
        add_action( 'truvik_footer_area', [ $this, 'truvik_footer_widget' ], 10 );

        add_action( 'truvik_footer_area', [ $this, 'truvik_privacy_area' ], 15 );
      
        /**
         * footer area widget
         * truvik_footer_copyright()
         * @return widget
         */
        add_action( 'truvik_footer_area', [ $this, 'truvik_footer_copyright' ], 20 );
        
        // footer wraper start
        add_action( 'truvik_footer_wrap_start', [ $this, 'truvik_footer_wrap_start' ], 10 );

        add_action( 'truvik_footer_wrap_end', [ $this, 'truvik_footer_wrap_end' ], 10 );

        // pagination
        add_action( 'truvik_posts_pagination', [ $this, 'truvik_posts_pagination' ], 10 );

        // page title and service title
        add_action( 'truvik_page_header_title', [ $this, 'truvik_page_header_title' ] );

        // custom culumn add inside the service post type
        add_filter('manage_services_posts_columns', [ $this, 'add_culumn_id' ] );
        
        add_action('manage_services_posts_custom_column', [ $this, 'render_service_custom_culumn' ], 10, 2);


        // setup the default
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

        // enqueue_scripts
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

        // load custom style
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_custom_scripts' ] );

        // register widgets
        add_action( 'widgets_init', [ $this, 'truvik_register_sidebar' ] );

        // register widget items
        add_action( 'widgets_init', [ $this, 'truvik_register_widget_items' ] );
        
        // update page title
        add_filter( 'pre_get_document_title', [ $this, 'update_page_title' ], 0 );
        
        // change the meta description 
        add_action( 'wp_head', [ $this, 'change_meta_description' ] );

        /**
         * change the site color
         * @return void
         */
        add_action( 'wp_head', [ $this, 'change_theme_color' ], 5 );
        
        // admin style
        add_action( 'admin_head', [ $this, 'admin_style' ], 5 );



        /**
         * redirect template
         * 
         * @return template
         */
        add_action( 'template_redirect', [ $this, 'truvik_redirect_templates' ] );

        /**
         * create admin bar menu
         * 
         * @return void
         */
        add_action('admin_bar_menu', [ $this, 'truvik_admin_bar_menu' ], 999 );


        /**
         * disable emojis from frontend
         * 
         * @return void
         */
        add_action( 'init', [ $this, 'disable_emojis'] );
    }

    /**
     * main content before
     * truvik_content_before()
     *
     * @return void
     */
    public function truvik_content_before(){
        echo "<div class=\"site-main\">\n";
    }
    /**
     * main content after
     * truvik_content_before()
     *
     * @return void
     */
    public function truvik_content_after(){
        echo "</div>\n";
    }

    /**
     * setup theme
     * setup_theme();
     *
     * @return void
     */
    public function setup_theme(){
        load_theme_textdomain( 'truvik', TRUVIK_DIR . 'lang' );
        add_theme_support( 'title-tag' );
		add_theme_support(
			'post-formats',
			[
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
            ]
		);
        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'woocommerce');

		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => esc_html__( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
            ]
		);

        add_image_size( 'truvik-post-thumbnail-image', 1200, 720, true );

        add_image_size( 'truvik-service-imgae-thumbnail', 550, 350, true );

        // add logo
        add_theme_support( 'custom-logo' );

        // register nav menus
        register_nav_menus( [
            'primary-menu'   => __( 'Primary Menu', 'truvik' ),
            'secondary-menu' => __( 'Secondary Menu', 'truvik' )
        ] );
        
    }

    /**
     * enqueue all the scripts for the theme support
     *
     * @return void
     */
    public function enqueue_scripts(){
        $styles  = self::get_styles();
        $scripts = self::get_scripts();

        // include the all style file
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : '';
            wp_enqueue_style(
                $handle,            // handler name
                $style['src'],      // source of file || string
                $deps,              // dependencies
                self::version,      // version
                // true                // enabled || media:string
            );
        }

        // include all the scripts file 
        foreach ( $scripts as $handle => $script ) {
           
            $deps = isset( $script['deps'] ) ? $script['deps'] : '';
            wp_enqueue_script(
                $handle,            // handler name
                $script['src'],     // source of file || strine
                $deps,              // dependencies
                self::version,      // version
                true                // enabled || footer
            );
        }
    }


    /**
     * get all the theme stylesheet
     * get_style();
     *
     * @return void
     */
    public static function get_styles(){
        $styles = [
            'bootstrap'     => [
                'src'   => TRUVIK_ASSETS_CSS . 'bootstrap.min.css',
            ],
            'aos'           => [
                'src'   => TRUVIK_ASSETS_CSS . 'aos.css',
            ],
            'animate'       => [
                'src'   => TRUVIK_ASSETS_CSS . 'animate.css',
            ],
            'font_awesome'  => [
                // 'src'   => TRUVIK_ASSETS_CSS . 'font-awesome.css',
                'src'   => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css',
            ],
            'fontello'      => [
                'src'   => TRUVIK_ASSETS_CSS . 'fontello.css',
            ],
            'flaticon'      => [
                'src'   => TRUVIK_ASSETS_CSS . 'flaticon.css',
            ],
            'flag_icon'     => [
                'src'   => TRUVIK_ASSETS_CSS . 'flag-icon.css',
            ],
            'themify_icons' => [
                'src'   => TRUVIK_ASSETS_CSS . 'themify-icons.css',
            ],
            'slick'         => [
                'src'   => TRUVIK_ASSETS_CSS . 'slick.css',
            ],
            'prettyPhoto'   => [
                'src'   => TRUVIK_ASSETS_CSS . 'prettyPhoto.css',
            ],
            'twentytwenty'  => [
                'src'   => TRUVIK_ASSETS_CSS . 'twentytwenty.css',
            ],
            'shortcodes'    => [
                'src'   => TRUVIK_ASSETS_CSS . 'shortcodes.css',
            ],
            'main'          => [
                'src'   => TRUVIK_ASSETS_CSS . 'main.css',
            ],
            'megamenu'      => [
                'src'   => TRUVIK_ASSETS_CSS . 'megamenu.css',
            ],
            'responsive'    => [
                'src'   => TRUVIK_ASSETS_CSS . 'responsive.css',
            ],
            'revsli'    => [
                'src'   => TRUVIK_ASSETS . 'revolution/css/rs6.css',
            ],
            'style'         => [
                'src'   => TRUVIK_URI . 'style.css',
            ],
        ];

        return $styles;
    }


    public static function get_scripts(){

        $scripts = [
            'bootstrap'       => [
                'src'  => TRUVIK_ASSETS_JS. 'bootstrap.bundle.js',
                'deps' => ['jquery']
            ],
            'aos'             => [
                'src'  => TRUVIK_ASSETS_JS. 'aos.js',
                'deps' => ['jquery']
            ],
            'jquery-validate' => [
                'src'  => TRUVIK_ASSETS_JS. 'jquery-validate.js',
                'deps' => ['jquery']
            ],
            'prettyPhoto'     => [
                'src'  => TRUVIK_ASSETS_JS. 'jquery.prettyPhoto.js',
                'deps' => ['jquery']
            ],
            'slick'           => [
                'src'  => TRUVIK_ASSETS_JS. 'slick.min.js',
                'deps' => ['jquery']
            ],
            'waypoints'       => [
                'src'  => TRUVIK_ASSETS_JS. 'jquery-waypoints.js',
                'deps' => ['jquery']
            ],
            'numinate'        => [
                'src'  => TRUVIK_ASSETS_JS. 'numinate.min.js',
                'deps' => ['jquery']
            ],
            'imagesloaded'    => [
                'src'  => TRUVIK_ASSETS_JS. 'imagesloaded.min.js',
                'deps' => ['jquery']
            ],
            'isotope'         => [
                'src'  => TRUVIK_ASSETS_JS. 'jquery-isotope.js',
                'deps' => ['jquery']
            ],
            'twentytwenty'    => [
                'src'  => TRUVIK_ASSETS_JS. 'jquery.twentytwenty.js',
                'deps' => ['jquery']
            ],
            'circle-progress' => [
                'src'  => TRUVIK_ASSETS_JS. 'circle-progress.min.js',
                'deps' => ['jquery']
            ],
            'main'            => [
                'src'  => TRUVIK_ASSETS_JS. 'main.js',
                'deps' => ['jquery']
            ],
            'revolution'      => [
                'src'  => TRUVIK_ASSETS. 'revolution/js/revolution.tools.min.js',
                'deps' => ['jquery']
            ],
            'rs6'             => [
                'src'  => TRUVIK_ASSETS. 'revolution/js/rs6.min.js',
                'deps' => ['jquery']
            ],
            'slider'          => [
                'src'  => TRUVIK_ASSETS. 'revolution/js/slider.js',
                'deps' => ['jquery']
            ]
        ];

        return $scripts;
    }

    /**
     * desable gutenberg block editor
     * disable_block_editor();
     *
     * @return void
     */
    public function disable_block_editor(){

        // Disable the block editor (Gutenberg) for posts
        add_filter('use_block_editor_for_post', '__return_false', 10);

        // Disable the block editor (Gutenberg) for pages
        add_filter('use_block_editor_for_page', '__return_false', 10);
    }


    /**
     * enable the classic widget area
     * enable_classic_widgets()
     *
     * @return void
     */
    public function enable_classic_widgets(){

        // Disables the block editor from managing widgets in the Gutenberg plugin.
        add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
        // Disables the block editor from managing widgets.
        add_filter( 'use_widgets_block_editor', '__return_false' );

    }
    public function truvik_register_sidebar(){
        $args = [
            'name'           => esc_html__( 'Truvik :: Sidebar', 'truvik' ),
            'id'             => 'truvik-right-sidebar',
            'description'    => esc_html__( 'Drag the widgets item from left to drag here', 'truvik'),
            'before_widget'  => '<aside class="widget with-title">',
            'after_widget'   => "</aside>\n",
            'before_title'   => '<h3 class="widget-title">',
            'after_title'    => "</h3>\n",
            // 'show_in_rest'   => false,
        ];
        // register right sidebar
        register_sidebar( $args );

        $widgets_args = [
            'before_widget'  => "<div class=\"widget\">\n",
            'after_widget'   => "</div>\n",
            'before_title'   => "<div class=\"widget-title\">\n<h1>\n",
            'after_title'    => "</h1>\n</div>\n",
        ];


        
        /**
         * register all footer sidebar
         * register_sidebar()
         * 
         * @return sidebar content
         */

        for ($i=1; $i < 5; $i++) { 
            register_sidebar( array_merge( $widgets_args, [
                'id'          => 'truvik-footer-'. $i,
                'name'        => esc_html__( 'Truvik :: Footer '. $i, 'truvik' ),
                'description' => esc_html__( 'Drag the widgets item and drop here.', 'truvik' ),
            ] ) ); 
        }


        
    }


    /**
     * define instance
     * get_instance()
     *
     * @return void
     */
    public static function get_instance() {
        if( is_null( self::$instance ) ){
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * define constant
     *
     * @return void
     */
    public function constant(){
        
        define( 'TRUVIK_DIR', trailingslashit( get_template_directory() ) ); 
        define( 'TRUVIK_URI', trailingslashit( get_template_directory_uri() ) );
        define( 'TRUVIK_ASSETS', trailingslashit( TRUVIK_URI . 'assets' ) ); 
        define( 'TRUVIK_ASSETS_CSS', trailingslashit( TRUVIK_ASSETS .'css' ) ); 
        define( 'TRUVIK_ASSETS_JS', trailingslashit( TRUVIK_ASSETS .'js' ) ); 
        
    }

    /**
     * update the page title when set the title
     * update_page_title()
     *
     * @return void
     */
    public function update_page_title( $title ){
		global $post;
        if (is_single() || is_page()) {
            $custom_title = get_post_meta( $post->ID, '_wpm_title', true);
            if ($custom_title) {
                $title = $custom_title;
            }
        }
        return $title;
    }

    /**
     * change the meta description for each page
     * change_meta_description();
     *
     * @return void
     */
    public function change_meta_description(){

        global $post;

        $description = esc_attr(get_post_meta( get_the_ID(), '_wpm_description', true ) );

        if( $description ){
            echo "<meta name=\"description\" content=\"{$description}\">\n";
        }
    }

    public function truvik_header_top(){
        global $truvik_options;
        
        if( $truvik_options['truvik-enable-header-top'] == 1 ): ?>

            <div class="top_bar prt-topbar-wrapper text-base-white clearfix">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-row align-items-start justify-content-start">
                            
                                <?php
                                    $info = $truvik_options['truvik-header-top-left-info'];
                                    $icon = $truvik_options['truvik-header-top-left-icon'];
                                    
                                    $info_count = count( $info );

                                    for ($i=0; $i < $info_count; $i++) {
                                        echo '<div class="top_bar_contact_item"><span class="text-base-skin"><i class="'.$icon[$i].'"></i></span><a href="#">'.$info[$i].'</a></div>';
                                    }
                                
                                ?>
                                
                                <div class="top_bar_contact_item top_bar_social ms-auto">

                                    <?php
                                        if( $truvik_options['truvik-enable-header-top-social'] == 1 ){
                                            Truvik\secondary_menu();
                                        }else{

                                            $texts = $truvik_options['truvik-social-link-text'];
                                            $icons = $truvik_options['truvik-social-link-icon'];
                                            $links = $truvik_options['truvik-social-link-validate'];
                                            $count = count( $icons );

                                            for ($i=0; $i < $count; $i++) { 
                                                echo "<a href=\"{$links[$i]}\" class=\"header-top-social\"><i class=\"{$icons[$i]}\"></i></a>";
                                            }
                                        };
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
    }

    /**
     * admin style
     * @return mixed
     */

    public function admin_style(){

        global $truvik_options; ?>
        <style>
            :root {
                --base-bodyfont-color: <?php echo $truvik_options['truvik-base-bodyfont-color']; ?>;
                --base-dark: <?php echo $truvik_options['truvik-base-dark-color']; ?>;
                --base-grey: <?php echo $truvik_options['truvik-base-gray-color']; ?>;
                --base-skin: <?php echo $truvik_options['truvik-base-skin-color']; ?>;
                --base-white: <?php echo $truvik_options['truvik-base-white-color']; ?>;
            }
        </style>
        <?php
    }

    /**
     * define base color for this theme
     * change_theme_color()
     *
     * @return void
     */
    public function change_theme_color(){
        global $truvik_options; ?>
        <style>
            :root {
                
                --base-bodyfont-color: <?php echo $truvik_options['truvik-base-bodyfont-color']; ?>;
                --base-dark: <?php echo $truvik_options['truvik-base-dark-color']; ?>;
                --base-grey: <?php echo $truvik_options['truvik-base-gray-color']; ?>;
                --base-skin: <?php echo $truvik_options['truvik-base-skin-color']; ?>;
                --base-white: <?php echo $truvik_options['truvik-base-white-color']; ?>;
            }
        </style>
        <?php
    }

    /**
     * truvik_header__style_editor()
     * custom style
     *
     * @return void
     */
    public function truvik_header__style_editor(){
        global $truvik_options; ?>

        <style>
            <?php echo $truvik_options['truvik-editor-ace-css']; ?>
        </style>

        <?php
    }

    /**
     * truvik_header__script_editor()
     * custom style
     *
     * @return void
     */
    public function truvik_header__script_editor(){
        global $truvik_options; ?>

        <script>
            <?php echo $truvik_options['truvik-editor-ace-js']; ?>
        </script>

        <?php
    }


    /**
     * include meta tag in the head section
     * truvik_header_metatag()
     *
     * @return void
     */
    public function truvik_header_metatag(){
        global $truvik_options;
        echo $truvik_options['truvik-header-metatag'];
    }

    /**
     * footer widget area
     * truvik_footer_widget()
     * prioroty 10
     *
     * @return void
     */
    public function truvik_footer_widget(){
        global $truvik_options;

        if( $truvik_options['truvik-enable-footer-widget'] != 1 )
            return;
        ?>
            <div class="second-footer prt-bgimage-yes bg-footer prt-bg bg-base-dark">
                <div class="prt-row-wrapper-bg-layer prt-bg-layer"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 widget-area">
                            <?php dynamic_sidebar( 'truvik-footer-1' ); ?>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 widget-area">

                            <?php dynamic_sidebar( 'truvik-footer-2' ); ?>

                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 widget-area">

                            <?php dynamic_sidebar( 'truvik-footer-3' ); ?>
                            
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 widget-area">
                        <?php dynamic_sidebar( 'truvik-footer-4' );
                            
                         ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php
    }


    /**
     * footer privacy area
     * truvik_privacy_area()
     *
     * @return void
     */
    public function truvik_privacy_area(){
        global $truvik_options;

        if( $truvik_options['truvik-enable-footer-privacy'] != 1 )
            return;
        ?>

            <div class="privacy-footer bg-base-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="privacy-link">
                                <ul>
                                    <?php 
                                        $count = count( $truvik_options['truvik-privacy-text'] );
                                        for ($i=0; $i < $count; $i++) { 
                                           echo "<li><a href=\"{$truvik_options['truvik-privacy-link'][$i]}\">{$truvik_options['truvik-privacy-text'][$i]}</a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
    }

    /**
     * footer copyright area
     * truvik_footer_copyright()
     * prioroty 10
     *
     * @return void
     */
    public function truvik_footer_copyright(){

        global $truvik_options;

        if( $truvik_options['truvik-enable-footer-copyright'] != 1 )
            return;
        ?>
            <div class="bottom-footer-text prt-bg copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-left">

                                <?php echo $truvik_options['truvik-footer-copyright-text']; ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }


    /**
     * footer wrapper start
     * truvik_footer_wrap_srat()
     *
     * @return void
     */
    public function truvik_footer_wrap_start(){
        echo "<footer class=\"footer widget-footer clearfix\">\n";
    }

    /**
     * footer wrapper start
     * truvik_footer_wrap_end()
     *
     * @return void
     */
    public function truvik_footer_wrap_end(){
        echo "</footer>\n";
    }

    public function truvik_posts_pagination(){

        echo "<div class=\"pagination-block\">\n";

            $pagination_links = paginate_links([
                'prev_text' => '<i class="icon-arrow-left"></i>',
                'next_text' => '<i class="icon-arrow-right"></i>',
                'type' => 'array',
            ]);

            if (!empty($pagination_links)) {
                foreach ($pagination_links as $link) {
                    echo $link;
                }
            }

        echo "</div>\n";
    }

    /**
     * enable / disable scroll to top button
     * truvik_scroll_to_top()
     *
     * @return void
     */
    public function truvik_scroll_to_top(){

        global $truvik_options;

        if( $truvik_options['truvik-enable-scrolltop'] == 1 ){
            echo '<a id="totop" href="#top"><i class="fa fa-angle-up"></i></a>';
        }
    }

    /**
     * redirect functionality 
     *
     * @param [type] $original_url
     * @param [type] $redirect_url
     * @return void
     */
    public static function custom_redirect( $original_url, $redirect_url ) {
        // Get the current requested URL
        $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        // Check if the current URL matches the original URL
        if ($current_url === $original_url) {
            wp_redirect($redirect_url);
            exit;
        }
    }

    /**
     * redirect template
     * truvik_redirect_templates()
     *
     * @return void
     */
    public function truvik_redirect_templates(){

        // self::custom_redirect('http://localhost/truvik/about-page/', 'http://localhost/truvik/');
    }

    /**
     * generate page title 
     *
     * @return void
     */
    public function truvik_page_header_title(){
        ?>
            <div class="prt-titlebar-wrapper prt-bg about-img" style="background-image:url(<?php Truvik\Post::thumbnail_url(); ?>); ">
                <div class="prt-titlebar-wrapper-bg-layer prt-bg-layer"></div>
                <div class="prt-titlebar-wrapper-inner">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="prt-page-title-row-heading">
                                    <div class="page-title-heading">
                                        <h2 class="title"><?php wp_title( '' );?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        
        <?php
    }


    /**
     * add new culumn in service post type
     * add_culumn_id()
     *
     * @param [type] $columns
     * @return void
     */
    public function add_culumn_id( $columns ){
        $new_columns = array();
        foreach ($columns as $key => $value) {
            $new_columns[$key] = $value;
            if ($key === 'title') {
                $new_columns['post_id'] = 'Post ID';
            }
        }
        return $new_columns; 
    }

    /**
     * render the custom custom of post type services
     * render_service_custom_culumn()
     *
     * @param [type] $column
     * @param [type] $post_id
     * @return void
     */
    public function render_service_custom_culumn( $column, $post_id ){
        if ($column === 'post_id') {
            echo "<span class=\"input-id-select\">{$post_id}</span>";
        }
    }

    /**
     * create a menu item in the top bar of admin panel
     *truvik_admin_bar_menu()
     *
     * @param [type] $menu_options
     * @return void
     */
    public function truvik_admin_bar_menu( $menu_options ){
        $args = [
            'id'    => 'truvik_admin_top_bar_menu',
            'title' => 'visit site',
            'href'  => get_home_url(),
            'meta'  => [
                'target' => '_blank',
            ]
        ];
        
        $menu_options->add_node( $args );
    }

    /**
     * include custom css for admin style
     *
     * @return void
     */
    public function admin_custom_scripts(){
        $args = [
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'ajax_exporter' => wp_create_nonce( 'ajax_exporter' )
        ];
        
        wp_enqueue_style( 'bootstrap', TRUVIK_ASSETS_CSS . 'bootstrap.min.css' );
        wp_enqueue_style( 'truvik-admin-style', TRUVIK_URI . 'assets/admin/admin-style.css' );

        wp_enqueue_script( 'bootstrap', TRUVIK_ASSETS_JS. 'bootstrap.bundle.js', ['jquery'], '5.0.2', true );
        wp_enqueue_script( 'truvik-admin-scripts', TRUVIK_URI . 'assets/admin/js/admin-script.js', ['jquery'], '1.0.0', true );
        wp_localize_script( 'truvik-admin-scripts', 'truvik', $args );
    }

    /**
     * regoster widget items 
     * truvik_register_widget_items()
     *
     * @return void
     */
    public function truvik_register_widget_items(){
        register_widget( 'Search_Form' );
        register_widget( 'Trending_Post' );
    }

    /**
     * desable emoji
     * disable_emojis()
     *
     * @return void
     */
    public function disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );	
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        
        // Remove from TinyMCE
        add_filter( 'tiny_mce_plugins', [ $this, 'disable_emojis_tinymce' ] );
    }

    /**
     * desable emojis from tinymce
     * disable_emojis_tinymce()
     *
     * @param [type] $plugins
     * @return void
     */
    public function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
            return array();
        }
    }

}

/**
 * create instance of Truvik class
 * truvik()
 * 
 * @return class Truvik
 */
if( ! function_exists( 'truvik' ) ) {
    function truvik(){
        return Truvik::get_instance();
    }
}
truvik();


// comment form fields change
function truvik_custom_form($fields) {
    // unset( $fields['author']);
    $comment_field = $fields['comment'];

    unset( $fields['comment']);

    $fields['comment'] = $comment_field;

    return $fields;
}
add_filter('comment_form_fields', 'truvik_custom_form');
