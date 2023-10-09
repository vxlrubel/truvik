<div class="col-lg-12">
    <div class="featured-imagebox featured-imagebox-blog style4">
        <div class="row g-0 row-equal-height">
           
            <div class="col-sm-4">
                <div class="prt-bg prt-col-bgimage-yes col-bg-img-ten spacing-8">
                    <div class="prt-col-wrapper-bg-layer prt-bg-layer truvik-radius" style="background-image: url(<?php Truvik\Post::not_found_post_image(); ?>)"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="featured-content">
                    
                    <div class="featured-title">
                        <?php Truvik\Post::not_found_title(); ?>
                    </div>
                    <div class="prt-horizontal_sep"></div>
                    <div class="featured-desc">

                        <p>
                            <?php Truvik\Post::not_found_desc(); ?>
                        </p>
                        
                    </div>
                    <div class="featured-bottom">
                        <?php Truvik\Post::create_post_if_not();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>