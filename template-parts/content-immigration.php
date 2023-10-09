<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="featured-imagebox featured-imagebox-portfolio style1 truvik-radius">
        <div class="featured-imagebox-wrapper">
            <div class="featured-thumbnail">
                <img width="656" height="484" class="img-fluid"
                    src="<?php Truvik\Post::the_thumbnail_url(); ?>" alt="<?php Truvik\Post::title(); ?>">
            </div>
            <div class="featured-content">
                <div class="featured-title">
                    <h3><a href="<?php Truvik\Post::post_url(); ?>"><?php the_title(); ?></a></h3>
                </div>
            </div>
        </div>
    </div>
</div>