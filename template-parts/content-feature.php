<div class="row g-0 mt_15 res-991-mt-0 sujan">
    <div class="col-lg-6 res-1199-pl-15 res-1199-pr-15" data-aos="fade-right">
        <div class="featured-imagebox featured-imagebox-blog style1">
            <div class="featured-thumbnail truvik-radius">
                <img width="741" class="img-fluid" style="height: 600px;" src="<?php Truvik\Post::thumbnail_url(); ?>" alt="blog-09">
            </div>
        </div>
    </div>
    <div class="col-lg-6"> 
        <div class="featured-imagebox featured-imagebox-blog style1">                                     
            <div class="featured-content">
                <div class="post-meta">
                    <a href="#">
                        <span>Admin</span>
                    </a>
                    <?php Truvik\Post::comments_number();?>
                </div>
                <div class="featured-title">
                    <h3><a href="<?php Truvik\Post::post_url(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <div class="featured-desc">
                    <p><?php Truvik\Post::excerpt(25);?></p>
                </div>
            </div>
        </div>
    </div>
</div>