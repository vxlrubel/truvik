<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Header{
    public function __construct(){}


    /**
     * custom logo
     * logo()
     *
     * @param boolean $url
     * @return void
     */
    public static function logo( $url = true ){

        global $truvik_options;

        $logo_id = get_theme_mod('custom_logo');
        
        $logo = wp_get_attachment_image_src($logo_id, 'full');

        $site_url = esc_url( get_home_url('/') );

        if( $truvik_options['truvik-enable-header-bottom-logo']['url'] ){
            $img_src = esc_url( $truvik_options['truvik-enable-header-bottom-logo']['url'] );
            $img = '<img id="logo-img" height="48" width="147" class="img-fluid auto_size w-100"
            src="'.$img_src.'" alt="' . get_bloginfo('name') . '">';
        } else{

            if ( $logo ) {
                $img = '<img id="logo-img" height="48" width="147" class="img-fluid auto_size w-100"
                src="'.esc_url($logo[0]).'" alt="' . get_bloginfo('name') . '">';
            } else{
                $img = $img = '<img id="logo-img" height="48" width="147" class="img-fluid auto_size w-100"
                src="' . TRUVIK_URI . 'assets/img/logo.png' .'" alt="' . get_bloginfo('name') . '">';
            }
        }

        if( false == $url ){
            echo $img;
        }else{
            echo "<a class=\"home-link\" href=\"{$site_url}\" title=\"Truvik\" rel=\"home\">{$img}</a>";
        }
    }


    /**
     * clreate global search form
     * search()
     *
     * @param boolean $ajax
     * @return void
     */
    public static function search( $ajax = true ){
        ?>
            <div class="header_search d-flex">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn-default search_btn"><i class="fa fa-search"></i></a>
                <div class="header_search_content">
                    <div class="header_search_content_inner">
                        <form id="searchbox" method="get" action="<?php echo esc_url( get_home_url('/') ); ?>">
                            <input class="search_query" type="text" id="search_query_top"
                                name="s" placeholder="Search Here..." value="">
                        </form>
                    </div>
                </div>
            </div>
        
        <?php

    }


    /**
     * create main menu of this theme
     * main_menu()p;
     *
     * @return void
     */
    public static function main_menu(){
        $args = [
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'menu',
            // 'walker'          => new Truvik_Nav_Walker,
            'theme_location'  => 'primary-menu',
        ];
        wp_nav_menu( $args );
        
    }

    public static function get_quote( $url = '#', $enable_new_window = false ) {

        global $truvik_options; 
        if ( $truvik_options['truvik-enable-header-bottom-quote-enable'] == 1 ){
            $btn_text = $truvik_options['truvik-enable-header-bottom-quote-text'];
            $url = $truvik_options['truvik-enable-header-bottom-quote-url'];
        }
        $new_window = false == $enable_new_window ? '' : ' target="_blank" ';
        $html = '<div class="header_btn">';
        $html .= '<a class="prt-btn prt-btn-size-sm truvik-radius prt-btn-style-fill prt-btn-color-skincolor"'.$new_window.'
        href="' . esc_url( $url ) . '">';
        $html .= esc_html__( $btn_text, 'truvik' );
        $html .= '</a>';
        $html .= '</div>';
        
        echo $html;
    }
}