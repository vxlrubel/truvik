<div class="col-lg-6 col-md-6 col-sm-12">
    <div class="featured-imagebox featured-imagebox-blog style2">
        <div class="featured-thumbnail">                                                    
            <img width="92" height="92" class="img-fluid" src="<?php Truvik\Post::the_thumbnail_url(); ?>" alt="blog-05">
        </div>
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
        </div>
    </div>
</div>