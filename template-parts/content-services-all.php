<div class="col-lg-4 col-md-6">
    <!-- featured-imagebox-post -->
    <div class="featured-imagebox featured-imagebox-services style1">
        <!-- featured-thumbnail -->
        <div class="featured-thumbnail truvik-radius">
        <?php if( has_post_thumbnail( get_the_ID() ) ){
                the_post_thumbnail( 'truvik-service-imgae-thumbnail', ['class'=>'img-fluid'] );
            } ?>
        </div><!-- featured-thumbnail end-->
        <div class="featured-details-wrap">
            <div class="featured-content">
                <div class="featured-title">
                    <h3><a href="<?php Truvik\Post::post_url(); ?>" tabindex="0"><?php the_title(); ?></a></h3>
                </div>
            </div>
            <div class="featured-explore-more">
                <?php Truvik\Post::read_more( 'explore more' ); ?>
            </div>
        </div>
        <div class="services-details-wrap">
            <div class="services-details-box truvik-radius overflow-hidden">
                <div class="services-content">
                    <div class="services-title">
                        <h3><a href="<?php Truvik\Post::post_url(); ?>" tabindex="0"><?php Truvik\Post::title(); ?></a></h3>
                    </div>
                    <div class="services-desc">
                        <p><?php Truvik\Post::excerpt( 10, '...' ); ?></p>
                    </div>
                </div>
                <div class="services-explore-more">
                    <?php Truvik\Post::read_more( 'explore more' ); ?>
                </div> 
            </div>
        </div>
    </div><!-- featured-imagebox-post end -->
</div>