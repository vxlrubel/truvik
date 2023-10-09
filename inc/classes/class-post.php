<?php

namespace Truvik;

// directly access denied
defined('ABSPATH') OR exit;

class Post {

    /**
     * constructor method
     */
    public function __construct() {}

    /**
     * get post thumbnail url from post
     * get_thumbnail_url()
     * @return url
     */
    public static function get_thumbnail_url(){
        global $post;
        if( has_post_thumbnail()){
            $url = get_the_post_thumbnail_url( $post->ID );
        }else{
            $url = TRUVIK_URI . 'assets/img/blog-post.jpg';
        }
        return $url;
    }

    /**
     * get post thumbnail url from post
     * get_thumbnail_url()
     * @print url
     */
    public static function the_thumbnail_url(){
        echo self::get_thumbnail_url();
    }

    /**
     * if post is not found
     *
     * @return image url
     */
    public static function not_found_post_image(){
        $img = TRUVIK_URI . 'assets/img/post-not-found.jpg';
        echo $img;
    }

    /**
     * not found title
     *
     * @return title text
     */
    public static function not_found_title(){
        $text  = esc_html__( 'Post Not Found', 'truvik' );
        $print = apply_filters( 'no_post_found_title', $text );
        echo "<h3>{$print}</h3>";

    }

    /**
     * not found description
     *
     * @return void
     */
    public static function not_found_desc(){

        $text = esc_html__('There are no post available, If you are admin or editor then you will show the button below for creating a new post.', 'truvik');
        $printable = apply_filters( 'truvik_no_post_found_desc', $text );
        echo "<p>{$printable}</p>";
    }

    public static function create_post_if_not( $link_text = 'Create New Post' ){
        if( ! is_user_logged_in() )
            return;
        if( ! current_user_can( 'edit_posts' ) )
            return;
        
        $text = esc_html__( $link_text, 'truvik' );
        $link = esc_url( home_url('/wp-admin/post-new.php') );
        $changeable_text = apply_filters( 'truvik_create_post_link_text', $text );
        echo "<a class=\"prt-btn btn-inline prt-btn-color-dark\" href=\"{$link}\" target=\"_blank\">{$changeable_text}</a>";
    }

    /**
     * get the date of post
     * date()
     * @return date
     */
    public static function date(){ 
        ?>
            <div class="prt-box-post-date">
                <span><?php the_time('d'); ?></span>
                <label><?php the_time('M'); ?></label>
            </div>
        <?php 
    }

    /**
     * get comments count and number
     * comments_number()
     *
     * @return comments_number
     */
    public static function comments_number(){
        $comments_link    = get_comments_link();
        $comments_number = get_comments_number();
        if ($comments_number === 0) {
            $count = 'No Comments';
        } elseif ($comments_number === 1) {
            $count = '1 Comment';
        } else {
            $count = $comments_number . ' Comments';
        }

        echo "<a href=\"{$comments_link}\"><span>{$count}</span></a>";
    }

    /**
     * get post title 
     * get_title()
     *
     * @return void
     */
    public static function get_title(){
        global $post;
        $title_text = esc_html( get_the_title( $post->ID ) );
        $permalink= esc_url( get_the_permalink( $post->ID ) );
        $title = "<h3><a href=\"{$permalink}\">{$title_text}</a></h3>";

        return apply_filters( 'truvik_post_title', $title );

    }

    /**
     * get post title 
     * get_title()
     *
     * @return void
     */
    public static function title(){
        echo self::get_title();
    }

    /**
     * get excerpt
     *
     * @param integer $count
     * @param string $more
     * @return void
     */
    public static function get_excerpt( $count = 25, $more = ''){
        global $post;
        $trim_content = wp_trim_words( get_the_content( $post->ID ), $count, $more );
        $text         = apply_filters( 'truvik_post_excerpt', $trim_content );

        return $text;
    }

    /**
     * get the excerpt
     *
     * @param integer $count
     * @param string $more
     * @return void
     */
    public static function excerpt( $count = 25, $more = '' ){
        echo self::get_excerpt( $count, $more );
    }

    public static function read_more( $text = 'View More' ){
        global $post;
        $link_text = esc_html__( $text, 'truvik');
        $permalink = esc_url( get_permalink( $post->ID ) );
        $view_more = "<a class=\"prt-btn btn-inline prt-btn-color-dark\" href=\"{$permalink}\">{$link_text}</a>";
        $view      = apply_filters( 'truvik_ream_more', $view_more );
        echo $view;
    }

    public static function tag_list( $text = 'Tags:' ){ 
        $tag = esc_html__( $text, 'truvik' );
        ?>
        <div class="prt_tag_lists">
            <span class="prt-tags-links-title"><?php echo $tag; ?></span>
            <span class="prt-tags-links">
                <?php the_tags('','',''); ?>
            </span>
        </div>
        <?php
    }

    /**
     * get the post title
     * post_title()
     * 
     * @return post title
     */
    public static function post_title(){
        global $post;
        $title = esc_html( get_the_title( $post->ID ) );

        if( $title ){
            $title_text = $title;
        }else{
            $title_text = 'No title found for this post.';
        }

        echo "<h2 class=\"title\">{$title_text}</h2>";
    }

    /**
     * get the post title
     * get_post_title()
     *
     * @return void
     */
    public static function truvik_post_title(){
        $title = esc_html( get_post_title( $post->ID ) );
        if ( $title ) {
            $text = $title;
        }
        
        return $text;
    }


    /**
     * breadcrumbs
     * breadcrumb()
     * @return void
     */
    public static function breadcrumb( $enable = true ){ 
        if( true == $enable ): ?>
            <div class="breadcrumb-wrapper">
                <i class="flaticon-home"></i>
                <span>
                    <a title="Homepage" href="index.html">Home</a>
                </span>
                <div class="prt-sep"> - </div>
                <span>
                    <a href="blog.html">Blog</a>
                </span>
                <div class="prt-sep"> - </div>
                <span>How to ensure a direct hassle-free bussiness visa application</span>
            </div>
        <?php endif;
    }

    /**
     * get thumbnail url
     * thumbnail_url()
     *
     * @return void
     */
    public static function thumbnail_url() {

        // Get the post thumbnail URL using the post ID
        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID() );

        $url = $thumbnail_url ? esc_url($thumbnail_url) : TRUVIK_URI . 'assets/img/pagetitle-bg.jpg';
        echo $url;
    }

    /**
     * set error page thumbnail
     * error_image_404()
     * @return void
     */
    public static function error_image_404(){
        $url  = TRUVIK_URI . 'assets/img/error.png';
        $img  = '<div class="prt-404-img text-center text-lg-start">';
        $img .= '<img width="701" height="258" class="img-fluid" src="'.esc_url( $url ).'" alt="error.png">';
        $img .= '</div>';
        echo $img;
    }

    /**
     * search result not found
     * search_fot_found()
     *
     * @return void
     */
    public static function search_not_found() {
        $get_query = esc_html( get_search_query() );
        $description_text = esc_html('You search result is not found, Maybe you are looking for something different [...]');
        $site_url = esc_url( get_home_url('/') );
        $go_home = apply_filters( 'truvik_go_home_search_result', esc_html__( 'Go To Home Page', 'truvik' ) );
        ?>
            <div class="featured-title">
                <h3>
                    <?php
                        echo "<span style=\"color:#df2353\">'{$get_query}'</span> is not found";
                    ?>
                </h3>
            </div>
            <div class="prt-horizontal_sep"></div>
            <div class="featured-desc">
                <p>
                    <?php _e( $description_text, 'truvik' ); ?>
                </p>
            </div>
            <div class="featured-bottom">
                <?php echo "<a class=\"prt-btn btn-inline prt-btn-color-dark\" href=\"{$site_url}\">{$go_home}</a>";  ?>
            </div>
        <?php
    }


    /**
     * get pots permalink
     * get_post_url()
     * 
     * @return void
     */
    public static function get_post_url(){
        global $post;

        $url = esc_url( get_permalink( $post->ID ) );
        return $url;
    }

    /**
     * post permalink
     * post_url()
     *
     * @return void
     */
    public static function post_url(){
        echo self::get_post_url();
    }


    /**
     * get next and previous posts
     * prev_next_post
     *
     * @return void
     */
    public static function prev_next_post(){

        $previous_post = get_previous_post();
        $next_post     = get_next_post(); ?>

        <div class="row mt-55 mb-45 res-991-mt-30 res-991-mb-30">
            <?php
            
            if ($previous_post) :
                $previous_permalink = get_permalink($previous_post);
                $previous_title     = $previous_post->post_title;
                $previous_image_id  = get_post_thumbnail_id($previous_post->ID);
                $previous_image_url = wp_get_attachment_image_url($previous_image_id, 'full');
            ?>

            <div class="col-sm-6 d-flex justify-content-start">
                <div class="featured-imagebox featured-imagebox-prev-next">
                    <div class="featured-thumbnail flow-hidden truvik-radius-sm">
                        <img class="img-fluid truvik-radius-sm" src="<?php echo $previous_image_url; ?>" width="70" height="70" alt="blog-07">
                    </div>
                    <div class="featured-content pl-25">
                        <div class="featured-desc">
                            <a href="<?php echo $previous_permalink; ?>">Previous Post</a>
                        </div>
                        <div class="featured-title">
                            <h3><a href="<?php echo $previous_permalink; ?>"><?php echo $previous_title; ?></a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            
            endif;

            /**
             * get next post 
             * 
             * @return next post details
             */
            if ($next_post) :
            $next_permalink = get_permalink($next_post);
            $next_title     = $next_post->post_title;
            $next_image_id  = get_post_thumbnail_id($next_post->ID);
            $next_image_url = wp_get_attachment_image_url($next_image_id, 'full'); ?>

                <div class="col-sm-6 d-flex justify-content-end res-575-mt-15">
                    <div class="featured-imagebox featured-imagebox-prev-next">
                        <div class="featured-content text-end pr-25">
                            <div class="featured-desc">
                                <a href="<?php echo $next_permalink; ?>">Next Post</a>
                            </div>
                            <div class="featured-title">
                                <h3><a href="<?php echo $next_permalink; ?>"><?php echo $next_title; ?></a></h3>
                            </div>
                        </div>
                        <div class="featured-thumbnail flow-hidden truvik-radius-sm">
                            <img class="img-fluid truvik-radius-sm" src="<?php echo $next_image_url; ?>" width="70" height="70" alt="blog-05">
                        </div>
                    </div>
                </div>

            <?php endif ?>

        </div> <?php
    }

    /**
     * social share button
     *
     * @return void
     */
    public static function social_share(){

        $current_post_url = get_permalink( get_the_ID() );

        // Generate social sharing links
        $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($current_post_url);
        $twitter = 'https://twitter.com/intent/tweet?url=' . urlencode($current_post_url);
        $linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($current_post_url);
        $pinterest = 'https://www.pinterest.com/pin/create/button/?url=' . urlencode($current_post_url);
        ?>
            <div class="prt-social-share-wrapper align-self-center res-575-mt-15">
                <ul class="social-icons square">
                    <li class="social-twitter">  
                        <a href="<?php echo esc_url( $twitter); ?>" target="_blank" tabindex="0" rel="noopener" aria-label="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li class="social-facebook">
                        <a href="<?php echo esc_url( $facebook); ?>" target="_blank" tabindex="0" rel="noopener" aria-label="facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li class="social-pinterest">
                        <a href="<?php echo esc_url( $pinterest); ?>" target="_blank" tabindex="0" rel="noopener" aria-label="pinterest"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                    </li>
                    <li class="social-linkedin">
                        <a href="<?php echo esc_url( $linkedin); ?>" target="_blank" tabindex="0" rel="noopener" aria-label="linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        
        <?php
    }
    
}