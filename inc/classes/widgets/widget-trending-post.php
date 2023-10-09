<?php

defined('ABSPATH') OR exit('No direct script access allowed');

class Trending_Post extends WP_Widget {
    function __construct() {
        parent::__construct(
            'tending_post_widget',
            __('Truvik: Teanding Post', 'truvik'),
            array('description' => __('Drop this items into sidebar where you want to display.', 'text_domain'))
        );
    }

    public function widget( $args, $instance ){
        $title = $instance['title'] ? $instance['title'] : 'Trending Posts';
        ?>
        <aside class="widget widget-recent-post with-title">
            <?php echo $args['before_title'] . $title . $args['after_title'];?>
            <ul class="widget-post prt-recent-post-list">
                <?php 
                    if( have_posts() ){
                        
                        while( have_posts() ) : the_post(); ?>
                            <li>
                                <div class="post-img">
                                    <img width="80" height="80" class="truvik-radius-sm" src="<?php the_post_thumbnail_url(); ?>" alt="" />
                                </div>
                                <div class="post-detail">
                                    <span class="post-date"><?php the_time( 'F d,Y' ); ?> </span>
                                    <a href="<?php the_permalink(); ?>" class="trending-link"><?php the_title(); ?></a>
                                </div>
                            </li>
                        
                        <?php endwhile;

                        wp_reset_postdata();


                    }else{
                        echo '<li>No Post Abailable</li>';
                    }

                ?>
                
            </ul>
        </aside>
        
        <?php
    }

    public function form( $instance ){
        $value = $instance['title'] ? $instance['title'] : 'Trending Post';
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>

                <input 
                value="<?php esc_attr_e( $value, 'truvik' ) ?>" 
                id="<?php echo $this->get_field_id('title'); ?>" 
                type="text" class="widefat title" 
                name="<?php echo $this->get_field_name('title'); ?>">
            </p>
        <?php
    }
}