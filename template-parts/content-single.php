<div class="prt-blog-single-content">
    <div class="prt_single_image-wrapper">
        <?php the_post_thumbnail( 'truvik-post-thumbnail-image', ['class'=>'img-fluid w-100'] ); ?>
    </div>
    <div class="entry-content">
        <div class="prt-box-desc-text">

            <?php the_content(); ?>

            <!-- media block -->
            <div class="blog-tag-and-media-block">
                <div class="social-media-block">

                    <?php Truvik\Post::tag_list(); ?>
                    
                </div>
                <!-- social share button  -->
                <?php Truvik\Post::social_share(); ?>   
                
            </div>
            <!-- media block end -->

            <div class="prt-horizontal_sep"></div>


            <?php Truvik\Post::prev_next_post(); ?>

            <?php comments_template(); ?>
        </div>
    </div>
</div>