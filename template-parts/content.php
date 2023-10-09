<div class="col-lg-12">
    <div class="featured-imagebox featured-imagebox-blog style4">
        <div class="row g-0 row-equal-height">
           
            <div class="col-sm-4">
                <div class="prt-bg prt-col-bgimage-yes col-bg-img-ten spacing-8">
                    <div class="prt-col-wrapper-bg-layer prt-bg-layer truvik-radius" style="background-image: url(<?php Truvik\Post::the_thumbnail_url(); ?>)"></div>
                    <div class="layer-content">
                        <?php Truvik\Post::date(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="featured-content">
                    <div class="post-meta">
                        <a href="blog.html">
                            <span>Admin</span>
                            
                        </a>
                        <?php Truvik\Post::comments_number();?>
                    </div>
                    <div class="featured-title">
                        <?php Truvik\Post::title(); ?>
                    </div>
                    <div class="prt-horizontal_sep"></div>
                    <div class="featured-desc">

                        <?php Truvik\Post::excerpt( 15, ' [...]'); ?>
                        
                    </div>
                    <div class="featured-bottom">
                        <?php Truvik\Post::read_more(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>