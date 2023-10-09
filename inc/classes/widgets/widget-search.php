<?php

defined('ABSPATH') OR exit('No direct script access allowed');

class Search_Form extends WP_Widget {

    function __construct() {
        parent::__construct(
            'search_widget',
            __('Truvik: Search Form', 'truvik'),
            array('description' => __('Drop this items into sidebar where you want to display.', 'text_domain'))
        );
    }

    public function widget( $args, $instance ) {

        $title = $instance['title'] ? $instance['title'] : 'Search';
        ?>
        <aside class="widget widget-search with-title">
            <?php echo $args['before_title'] . $title. $args['after_title']; ?>
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(get_home_url('/') ); ?>">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="input-text" placeholder="Search …" value="<?php echo get_search_query(); ?>"
                        name="s">
                </label>
                <button
                    class=""
                    type="submit">
                    <i class="fa fa-search"></i>
                </button>
                
            </form>
        </aside>
        <?php
       
    }

    public function form($instance) {
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>

                <input 
                value="<?php echo $instance['title']; ?>" 
                id="<?php echo $this->get_field_id('title'); ?>" 
                type="text" class="widefat title" 
                name="<?php echo $this->get_field_name('title'); ?>">
            </p>
        <?php
     
    }

    // public function update($new_instance, $old_instance) {
    //     // You can handle widget settings updates here if needed
    // }
}
new Search_Form;